<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\LiveSession;
use Illuminate\Http\Request;

class LiveSessionController extends Controller
{
    public function index()
    {
        $sessions = LiveSession::withCount('participants')
            ->latest()
            ->paginate(20);

        return view('admin.live-sessions.index', compact('sessions'));
    }

    public function create()
    {
        return view('admin.live-sessions.create');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'title' => ['required', 'string', 'max:255'],
            'description' => ['nullable', 'string'],
            'session_date' => ['required', 'date', 'after_or_equal:today'],
            'start_time' => ['required', 'date_format:H:i'],
            'end_time' => ['nullable', 'date_format:H:i', 'after:start_time'],
            'timezone' => ['nullable', 'string', 'max:100'],
            'meeting_link' => ['nullable', 'url'],
            'max_participants' => ['nullable', 'integer', 'min:1'],
            'is_free' => ['boolean'],
            'price' => ['nullable', 'numeric', 'min:0', 'required_if:is_free,false'],
            'session_type' => ['required', 'string', 'in:live,webinar,workshop'],
        ]);

        LiveSession::create($data);

        return redirect()->route('admin.live-sessions.index')
            ->with('success', 'Session created.');
    }

    public function edit(LiveSession $liveSession)
    {
        return view('admin.live-sessions.edit', compact('liveSession'));
    }

    public function update(Request $request, LiveSession $liveSession)
    {
        $liveSession->update($request->validate([
            'title' => ['required', 'string', 'max:255'],
            'description' => ['nullable', 'string'],
            'session_date' => ['required', 'date'],
            'start_time' => ['required', 'date_format:H:i'],
            'end_time' => ['nullable', 'date_format:H:i', 'after:start_time'],
            'timezone' => ['nullable', 'string', 'max:100'],
            'meeting_link' => ['nullable', 'url'],
            'max_participants' => ['nullable', 'integer', 'min:1'],
            'is_free' => ['boolean'],
            'price' => ['nullable', 'numeric', 'min:0'],
            'session_type' => ['required', 'string', 'in:live,webinar,workshop'],
            'is_active' => ['boolean'],
        ]));

        return redirect()->route('admin.live-sessions.index')
            ->with('success', 'Session updated.');
    }

    public function destroy(LiveSession $liveSession)
    {
        $liveSession->delete();

        return back()->with('success', 'Session deleted.');
    }
}
