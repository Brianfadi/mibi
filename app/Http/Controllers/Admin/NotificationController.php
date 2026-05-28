<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\AdminNotification;
use Illuminate\Http\Request;

class NotificationController extends Controller
{
    public function index()
    {
        $notifications = AdminNotification::latest()->paginate(30);
        $unreadCount = AdminNotification::unread()->count();

        return view('admin.notifications.index', compact('notifications', 'unreadCount'));
    }

    public function markRead(AdminNotification $notification)
    {
        $notification->markAsRead();
        return response()->json(['status' => 'ok']);
    }

    public function markAllRead()
    {
        AdminNotification::unread()->update(['is_read' => true, 'read_at' => now()]);
        return back()->with('success', 'All notifications marked as read.');
    }

    public function destroy(AdminNotification $notification)
    {
        $notification->delete();
        return back()->with('success', 'Notification deleted.');
    }

    public function unread()
    {
        return response()->json([
            'count' => AdminNotification::unread()->count(),
            'notifications' => AdminNotification::unread()->latest()->take(5)->get(),
        ]);
    }
}
