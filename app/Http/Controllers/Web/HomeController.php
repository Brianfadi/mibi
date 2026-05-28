<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Models\BlogPost;
use App\Models\LiveSession;
use App\Models\Program;
use App\Models\Service;
use App\Models\Setting;
use App\Models\Testimonial;

class HomeController extends Controller
{
    public function index()
    {
        $featuredServices = Service::active()->orderBy('sort_order')->take(6)->get();
        $programs = Program::active()->orderBy('sort_order')->take(4)->get();
        $latestPosts = BlogPost::with(['author', 'categories'])->published()->recent()->take(3)->get();
        $testimonials = Testimonial::with('user')->published()->featured()->ordered()->take(6)->get();
        $upcomingSessions = LiveSession::withCount('participants')->upcoming()->take(3)->get();
        $socialLinks = Setting::whereIn('key', ['social_tiktok', 'social_instagram', 'social_facebook', 'social_youtube', 'social_twitter'])->pluck('value', 'key');
        $contactEmail = Setting::where('key', 'contact_email')->value('value') ?? 'hello@mibi.africa';
        $contactPhone = Setting::where('key', 'contact_phone')->value('value') ?? '+254 700 000 000';

        return view('home.index', compact(
            'featuredServices', 'programs', 'latestPosts', 'testimonials', 'upcomingSessions', 'socialLinks', 'contactEmail', 'contactPhone'
        ));
    }

    public function about()
    {
        return view('pages.about');
    }

    public function coaching()
    {
        $services = Service::active()->orderBy('sort_order')->get();
        $programs = Program::active()->orderBy('sort_order')->get();
        $testimonials = Testimonial::with('user')->published()->featured()->ordered()->take(4)->get();

        return view('pages.coaching', compact('services', 'programs', 'testimonials'));
    }

    public function privacy()
    {
        return view('pages.privacy');
    }

    public function terms()
    {
        return view('pages.terms');
    }
}
