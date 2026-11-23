<?php

namespace App\Http\Controllers;

use App\Models\Mentee;
use Illuminate\Http\Request;

class MenteeController extends Controller
{
    public function index(Request $request)
    {
        $mentees = Mentee::latest()
            ->when($request->full_name, function ($query) use ($request) {
                $query->where('full_name', 'like', '%' . $request->full_name . '%');
            })
            ->when($request->email, function ($query) use ($request) {
                $query->where('email', 'like', '%' . $request->email . '%');
            })
            ->when($request->phone, function ($query) use ($request) {
                $query->where('phone', 'like', '%' . $request->phone . '%');
            })
            ->when($request->profession, function ($query) use ($request) {
                $query->where('profession', 'like', '%' . $request->profession . '%');
            })
            ->when($request->goals, function ($query) use ($request) {
                $query->where('goals', 'like', '%' . $request->goals . '%');
            })
            ->when($request->date_from, function ($query) use ($request) {
                $query->whereDate('created_at', '>=', $request->date_from);
            })
            ->when($request->date_to, function ($query) use ($request) {
                $query->whereDate('created_at', '<=', $request->date_to);
            })
            ->paginate(10)
            ->withQueryString();

        return view('mentee.index', compact('mentees'));
    }

    public function destroy($id)
    {
        $mentee = Mentee::findOrFail($id);
        $mentee->delete();

        return back()->with('success', 'Mentee deleted successfully.');
    }
}
