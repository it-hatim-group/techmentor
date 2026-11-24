<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\ProcessStep;
use Illuminate\Http\Request;

class ProcessStepController extends Controller
{
    public function index()
    {
        $processSteps = ProcessStep::orderBy('sort_order')->latest('id')->get();
        return view('process_steps.index', compact('processSteps'));
    }

    public function create()
    {
        return view('process_steps.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'step_number' => 'nullable|string|max:50',
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'sort_order' => 'nullable|integer',
            'status' => 'nullable|boolean',
        ]);

        ProcessStep::create([
            'step_number' => $request->step_number,
            'title' => $request->title,
            'description' => $request->description,
            'sort_order' => $request->sort_order ?? 0,
            'status' => $request->boolean('status'),
        ]);

        return back()->with('success', 'Process step added successfully!');
    }

    public function edit(ProcessStep $processStep)
    {
        return view('process_steps.edit', compact('processStep'));
    }

    public function update(Request $request, ProcessStep $processStep)
    {
        $request->validate([
            'step_number' => 'nullable|string|max:50',
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'sort_order' => 'nullable|integer',
            'status' => 'nullable|boolean',
        ]);

        $processStep->update([
            'step_number' => $request->step_number,
            'title' => $request->title,
            'description' => $request->description,
            'sort_order' => $request->sort_order ?? 0,
            'status' => $request->boolean('status'),
        ]);

        return back()->with('success', 'Process step updated successfully!');
    }

    public function destroy(ProcessStep $processStep)
    {
        $processStep->delete();
        return back()->with('success', 'Process step deleted successfully!');
    }
}
