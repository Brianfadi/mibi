<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Program;
use Illuminate\Http\Request;

class ProgramController extends Controller
{
    public function index()
    {
        $programs = Program::orderBy('sort_order')->get();
        return view('admin.programs.index', compact('programs'));
    }

    public function create()
    {
        return view('admin.programs.create');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'title' => ['required', 'string', 'max:255'],
            'description' => ['nullable', 'string'],
            'short_description' => ['nullable', 'string', 'max:300'],
            'price' => ['nullable', 'numeric', 'min:0'],
            'currency' => ['required', 'string', 'size:3'],
            'duration_value' => ['nullable', 'integer', 'min:1'],
            'duration_unit' => ['nullable', 'string', 'in:weeks,months'],
            'max_participants' => ['nullable', 'integer', 'min:1'],
            'features' => ['nullable', 'json'],
            'prerequisites' => ['nullable', 'json'],
            'is_featured' => ['boolean'],
            'sort_order' => ['integer', 'min:0'],
        ]);

        if ($request->hasFile('image')) {
            $data['image'] = $request->file('image')->store('programs', 'public');
        }

        Program::create($data);

        return redirect()->route('admin.programs.index')->with('success', 'Program created.');
    }

    public function edit(Program $program)
    {
        return view('admin.programs.edit', compact('program'));
    }

    public function update(Request $request, Program $program)
    {
        $data = $request->validate([
            'title' => ['required', 'string', 'max:255'],
            'description' => ['nullable', 'string'],
            'short_description' => ['nullable', 'string', 'max:300'],
            'price' => ['nullable', 'numeric', 'min:0'],
            'currency' => ['required', 'string', 'size:3'],
            'duration_value' => ['nullable', 'integer', 'min:1'],
            'duration_unit' => ['nullable', 'string', 'in:weeks,months'],
            'max_participants' => ['nullable', 'integer', 'min:1'],
            'features' => ['nullable', 'json'],
            'prerequisites' => ['nullable', 'json'],
            'is_featured' => ['boolean'],
            'is_active' => ['boolean'],
            'sort_order' => ['integer', 'min:0'],
        ]);

        $program->update($data);

        return redirect()->route('admin.programs.index')->with('success', 'Program updated.');
    }

    public function destroy(Program $program)
    {
        $program->delete();
        return back()->with('success', 'Program deleted.');
    }
}
