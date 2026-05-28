<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Subscriber;
use App\Models\AdminNotification;

class SubscriberController extends Controller
{
    public function index()
    {
        $subscribers = Subscriber::latest()->paginate(20);
        $activeCount = Subscriber::active()->count();
        $totalCount = Subscriber::count();

        return view('admin.subscribers.index', compact('subscribers', 'activeCount', 'totalCount'));
    }

    public function export()
    {
        $emails = Subscriber::active()->pluck('email')->implode("\n");
        return response($emails, 200, [
            'Content-Type' => 'text/plain',
            'Content-Disposition' => 'attachment; filename="mibi-subscribers.txt"',
        ]);
    }

    public function destroy(Subscriber $subscriber)
    {
        $subscriber->delete();
        return back()->with('success', 'Subscriber removed.');
    }
}
