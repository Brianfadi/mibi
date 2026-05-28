<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Payment;
use App\Models\Booking;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PaymentController extends Controller
{
    public function index()
    {
        $payments = Payment::with(['user', 'payable', 'booking'])
            ->latest()
            ->paginate(20);

        $totalRevenue = Payment::completed()->sum('amount');
        $monthlyRevenue = Payment::completed()->whereMonth('paid_at', now()->month)->sum('amount');
        $pendingAmount = Payment::pending()->sum('amount');
        $totalTransactions = Payment::count();

        $revenueByMethod = Payment::completed()
            ->select('payment_method', DB::raw('SUM(amount) as total'), DB::raw('count(*) as count'))
            ->groupBy('payment_method')
            ->get();

        $monthlyTrend = Payment::completed()
            ->select(DB::raw('strftime("%Y-%m", paid_at) as month'), DB::raw('SUM(amount) as total'))
            ->where('paid_at', '>=', now()->subMonths(12))
            ->groupBy('month')
            ->orderBy('month')
            ->get();

        return view('admin.payments.index', compact(
            'payments', 'totalRevenue', 'monthlyRevenue',
            'pendingAmount', 'totalTransactions', 'revenueByMethod', 'monthlyTrend'
        ));
    }

    public function show(Payment $payment)
    {
        $payment->load(['user', 'booking', 'payable']);
        return view('admin.payments.show', compact('payment'));
    }

    public function confirm(Payment $payment)
    {
        $payment->update(['status' => 'completed', 'paid_at' => now()]);
        return back()->with('success', 'Payment confirmed.');
    }

    public function refund(Payment $payment)
    {
        $payment->update(['status' => 'refunded']);
        return back()->with('success', 'Payment refunded.');
    }
}
