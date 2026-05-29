<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Models\Testimonial;

class TestimonialController extends Controller
{
    public function index()
    {
        $featuredTestimonials = Testimonial::with('user')
            ->published()->featured()->ordered()->get();

        $testimonials = Testimonial::with('user')
            ->published()->ordered()
            ->paginate(12);

        $serviceTypes = Testimonial::published()
            ->whereNotNull('service_type')
            ->distinct('service_type')
            ->pluck('service_type');

        $totalTestimonials = Testimonial::published()->count();
        $avgRating = Testimonial::published()->whereNotNull('rating')->average('rating');

        return view('testimonials.index', compact(
            'featuredTestimonials', 'testimonials', 'serviceTypes',
            'totalTestimonials', 'avgRating'
        ));
    }
}
