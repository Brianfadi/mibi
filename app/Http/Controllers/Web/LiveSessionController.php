<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Models\LiveSession;
use App\Services\RegistrationService;

class LiveSessionController extends Controller
{
    public function __construct(
        private RegistrationService $registrationService
    ) {}

    public function index()
    {
        $upcomingSessions = LiveSession::withCount('participants')
            ->upcoming()->get();

        $pastSessions = LiveSession::withCount('participants')
            ->past()->latest('session_date')->take(3)->get();

        return view('pages.live-sessions', compact('upcomingSessions', 'pastSessions'));
    }

    public function show(string $slug)
    {
        $session = LiveSession::withCount('participants')
            ->where('slug', $slug)
            ->active()
            ->firstOrFail();

        return view('pages.live-session-detail', compact('session'));
    }

    public function register(string $slug)
    {
        $session = LiveSession::where('slug', $slug)->active()->firstOrFail();

        try {
            $this->registrationService->registerForLiveSession(auth()->user(), $session);
            return back()->with('success', 'You are registered for this session!');
        } catch (\RuntimeException $e) {
            return back()->with('error', $e->getMessage());
        }
    }
}
