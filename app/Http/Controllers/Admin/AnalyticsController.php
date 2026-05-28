<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Booking;
use App\Models\Payment;
use App\Models\User;
use App\Models\BlogPost;
use App\Models\Contact;
use Illuminate\Support\Facades\DB;

class AnalyticsController extends Controller
{
    public function index()
    {
        $year = now()->year;

        // Revenue
        $monthlyRevenue = Payment::completed()
            ->select(DB::raw('strftime("%m", paid_at) as m'), DB::raw('SUM(amount) as total'))
            ->whereYear('paid_at', $year)
            ->groupBy('m')->orderBy('m')
            ->pluck('total', 'm');

        // User growth
        $monthlyUsers = User::select(DB::raw('strftime("%m", created_at) as m'), DB::raw('count(*) as c'))
            ->whereYear('created_at', $year)
            ->groupBy('m')->orderBy('m')
            ->pluck('c', 'm');

        // Bookings per month
        $monthlyBookings = Booking::select(DB::raw('strftime("%m", created_at) as m'), DB::raw('count(*) as c'))
            ->whereYear('created_at', $year)
            ->groupBy('m')->orderBy('m')
            ->pluck('c', 'm');

        // Service popularity
        $topServices = Booking::select('service_id', DB::raw('count(*) as total'))
            ->whereNotNull('service_id')
            ->groupBy('service_id')
            ->orderByDesc('total')
            ->take(10)
            ->with('service')
            ->get();

        // Payment method distribution
        $paymentMethods = Payment::completed()
            ->select('payment_method', DB::raw('SUM(amount) as total'), DB::raw('count(*) as count'))
            ->groupBy('payment_method')
            ->get();

        // Conversion rates
        $totalVisitors = 15000; // placeholder — integrate analytics later
        $totalRegistrations = User::count();
        $totalBookings = Booking::count();

        return view('admin.analytics.index', compact(
            'monthlyRevenue', 'monthlyUsers', 'monthlyBookings',
            'topServices', 'paymentMethods', 'totalVisitors',
            'totalRegistrations', 'totalBookings', 'year'
        ));
    }
}
