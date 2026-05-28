<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Models\Service;
use App\Models\Faq;

class ServiceController extends Controller
{
    public function index()
    {
        $services = Service::active()->orderBy('sort_order')->get()->groupBy('session_type');
        $faqs = Faq::published()->category('services')->ordered()->get();

        return view('services.index', compact('services', 'faqs'));
    }

    public function show(string $slug)
    {
        $service = Service::where('slug', $slug)->active()->firstOrFail();
        $relatedServices = Service::active()
            ->where('id', '!=', $service->id)
            ->where('session_type', $service->session_type)
            ->take(3)
            ->get();

        return view('services.show', compact('service', 'relatedServices'));
    }
}
