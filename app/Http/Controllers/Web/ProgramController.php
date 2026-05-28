<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Models\Program;
use App\Models\Faq;

class ProgramController extends Controller
{
    public function index()
    {
        $programs = Program::active()->orderBy('sort_order')->get();
        $featuredProgram = Program::active()->featured()->first();
        $faqs = Faq::published()->ordered()->get();

        return view('programs.index', compact('programs', 'featuredProgram', 'faqs'));
    }

    public function show(string $slug)
    {
        $program = Program::where('slug', $slug)->active()->firstOrFail();

        return view('programs.show', compact('program'));
    }
}
