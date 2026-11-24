<?php

namespace App\Http\Controllers;

use App\Models\ProcessStep;
use Illuminate\Http\Request;

class FrontendController extends Controller
{
    public function index()
    {
        $processSteps = ProcessStep::where('status', 1)
            ->orderBy('sort_order', 'asc')
            ->orderBy('id', 'asc')
            ->get();

        return view('frontend.index', compact('processSteps'));
    }
}
