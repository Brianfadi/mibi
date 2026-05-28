<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Booking;
use App\Models\Contact;
use App\Models\Payment;
use App\Models\Registration;
use App\Models\Subscriber;
use App\Models\SupportTicket;
use App\Models\User;
use App\Models\BlogPost;
use App\Models\AdminNotification;
use App\Models\ActivityLog;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    public function index()
    {
        $stats = [
            'total_users' => User::count(),
            'active_users' => User::where('is_active', true)->count(),
            'new_users_today' => User::whereDate('created_at', today())->count(),
            'total_bookings' => Booking::count(),
            'pending_bookings' => Booking::pending()->count(),
            'confirmed_bookings' => Booking::confirmed()->count(),
            'completed_bookings' => Booking::completed()->count(),
            'upcoming_bookings' => Booking::upcoming()->count(),
            'total_revenue' => Payment::completed()->sum('amount'),
            'monthly_revenue' => Payment::completed()->whereMonth('paid_at', now()->month)->sum('amount'),
            'pending_payments' => Payment::pending()->count(),
            'unread_messages' => Contact::unread()->count(),
            'total_subscribers' => Subscriber::active()->count(),
            'new_subscribers_month' => Subscriber::active()->whereMonth('created_at', now()->month)->count(),
            'pending_registrations' => Registration::pending()->count(),
            'open_tickets' => SupportTicket::open()->count(),
            'published_posts' => BlogPost::published()->count(),
            'total_coaches' => User::role('coach')->count(),
            'active_coaches' => User::role('coach')->where('is_active', true)->count(),
            'total_clients' => User::role('client')->count(),
            'unread_notifications' => AdminNotification::unread()->count(),
        ];

        // Monthly revenue chart data
        $monthlyRevenue = Payment::completed()
            ->select(DB::raw('strftime("%m", paid_at) as month'), DB::raw('strftime("%Y", paid_at) as year'), DB::raw('SUM(amount) as total'))
            ->whereYear('paid_at', now()->year)
            ->groupBy('year', 'month')
            ->orderBy('year')
            ->orderBy('month')
            ->get()
            ->map(fn ($r) => ['month' => date('M', mktime(0, 0, 0, $r->month, 1)), 'total' => (float) $r->total]);

        // Booking status distribution
        $bookingsByStatus = Booking::select('status', DB::raw('count(*) as count'))
            ->groupBy('status')
            ->pluck('count', 'status');

        // Recent activities
        $recentActivities = ActivityLog::with('user')->recent()->get();

        // Recent bookings
        $recentBookings = Booking::with(['user', 'service', 'coach'])
            ->latest()
            ->take(5)
            ->get();

        // Recent users
        $recentUsers = User::latest()->take(6)->get();

        // Top services
        $topServices = Booking::select('service_id', DB::raw('count(*) as count'))
            ->whereNotNull('service_id')
            ->groupBy('service_id')
            ->orderByDesc('count')
            ->take(5)
            ->with('service')
            ->get();

        // User growth (last 6 months)
        $userGrowth = User::select(
                DB::raw('strftime("%m", created_at) as month'),
                DB::raw('strftime("%Y", created_at) as year'),
                DB::raw('count(*) as count')
            )
            ->where('created_at', '>=', now()->subMonths(6))
            ->groupBy('year', 'month')
            ->orderBy('year')
            ->orderBy('month')
            ->get()
            ->map(fn ($r) => ['month' => date('M', mktime(0, 0, 0, $r->month, 1)), 'count' => $r->count]);

        return view('admin.dashboard', compact(
            'stats', 'monthlyRevenue', 'bookingsByStatus',
            'recentActivities', 'recentBookings', 'topServices', 'userGrowth', 'recentUsers'
        ));
    }
}
