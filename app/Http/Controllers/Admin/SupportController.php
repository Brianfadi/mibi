<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\SupportTicket;
use App\Models\SupportMessage;
use App\Models\User;
use App\Models\AdminNotification;
use Illuminate\Http\Request;

class SupportController extends Controller
{
    public function index()
    {
        $tickets = SupportTicket::with(['user', 'assignee'])
            ->latest()
            ->paginate(20);

        $openCount = SupportTicket::open()->count();
        $resolvedCount = SupportTicket::resolved()->count();
        $urgentCount = SupportTicket::where('priority', 'urgent')->whereIn('status', ['open', 'pending'])->count();

        return view('admin.support.index', compact('tickets', 'openCount', 'resolvedCount', 'urgentCount'));
    }

    public function show(SupportTicket $ticket)
    {
        $ticket->load(['user', 'assignee', 'messages.user']);
        $staff = User::role(['admin', 'coach'])->active()->get();

        return view('admin.support.show', compact('ticket', 'staff'));
    }

    public function reply(Request $request, SupportTicket $ticket)
    {
        $request->validate(['message' => ['required', 'string']]);

        SupportMessage::create([
            'support_ticket_id' => $ticket->id,
            'user_id' => auth()->id(),
            'message' => $request->message,
            'is_staff' => true,
        ]);

        $ticket->update(['status' => 'open']);

        return back()->with('success', 'Reply sent.');
    }

    public function assign(Request $request, SupportTicket $ticket)
    {
        $ticket->update(['assigned_to' => $request->user_id]);
        return back()->with('success', 'Ticket assigned.');
    }

    public function resolve(SupportTicket $ticket)
    {
        $ticket->resolve();
        return back()->with('success', 'Ticket resolved.');
    }

    public function escalate(SupportTicket $ticket)
    {
        $ticket->update(['status' => 'escalated', 'priority' => 'urgent']);

        AdminNotification::notify('support', 'Ticket Escalated', "Ticket #{$ticket->id} escalated.");

        return back()->with('success', 'Ticket escalated.');
    }
}
