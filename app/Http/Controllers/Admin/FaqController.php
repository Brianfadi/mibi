<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Faq;
use Illuminate\Http\Request;

class FaqController extends Controller
{
    public function index()
    {
        $faqs = Faq::ordered()->get()->groupBy('category');

        return view('admin.faqs.index', compact('faqs'));
    }

    public function store(Request $request)
    {
        Faq::create($request->validate([
            'question' => ['required', 'string', 'max:500'],
            'answer' => ['required', 'string'],
            'category' => ['required', 'string', 'in:general,services,payment,booking'],
            'sort_order' => ['integer', 'min:0'],
        ]));

        return back()->with('success', 'FAQ added.');
    }

    public function update(Request $request, Faq $faq)
    {
        $faq->update($request->validate([
            'question' => ['required', 'string', 'max:500'],
            'answer' => ['required', 'string'],
            'category' => ['required', 'string', 'in:general,services,payment,booking'],
            'sort_order' => ['integer', 'min:0'],
            'is_published' => ['boolean'],
        ]));

        return back()->with('success', 'FAQ updated.');
    }

    public function destroy(Faq $faq)
    {
        $faq->delete();

        return back()->with('success', 'FAQ deleted.');
    }
}
