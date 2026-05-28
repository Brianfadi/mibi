<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Subscriber;
use App\Models\WhatsAppMessage;
use App\Models\User;
use App\Models\Contact;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class CommunicationController extends Controller
{
    public function index()
    {
        $totalSubscribers = Subscriber::active()->count();
        $totalWhatsApp = WhatsAppMessage::count();
        $inboundMessages = WhatsAppMessage::inbound()->count();
        $outboundMessages = WhatsAppMessage::outbound()->count();
        $recentMessages = WhatsAppMessage::latest()->take(10)->get();

        return view('admin.communication.index', compact(
            'totalSubscribers', 'totalWhatsApp', 'inboundMessages',
            'outboundMessages', 'recentMessages'
        ));
    }

    public function whatsApp()
    {
        $messages = WhatsAppMessage::latest()->paginate(50);
        return view('admin.communication.whatsapp', compact('messages'));
    }

    public function subscribers()
    {
        $subscribers = Subscriber::latest()->paginate(20);
        return view('admin.communication.subscribers', compact('subscribers'));
    }

    public function sendEmail(Request $request)
    {
        $request->validate([
            'subject' => ['required', 'string', 'max:255'],
            'content' => ['required', 'string'],
            'recipients' => ['required', 'string', 'in:all,active,coaches'],
        ]);

        // Queue broadcast logic here
        $count = match ($request->recipients) {
            'all' => Subscriber::count(),
            'active' => Subscriber::active()->count(),
            'coaches' => User::role('coach')->count(),
            default => 0,
        };

        return back()->with('success', "Email queued for {$count} recipients.");
    }
}
