<?php

namespace App\Http\Controllers;

use App\Models\Mentor;
use Illuminate\Http\Request;

class MentorController extends Controller
{
    public function index(Request $request)
    {
        $mentors = Mentor::latest()
            ->when($request->full_name, function ($query) use ($request) {
                $query->where('full_name', 'like', '%' . $request->full_name . '%');
            })
            ->when($request->email, function ($query) use ($request) {
                $query->where('email', 'like', '%' . $request->email . '%');
            })
            ->when($request->phone, function ($query) use ($request) {
                $query->where('phone', 'like', '%' . $request->phone . '%');
            })
            ->when($request->expertise, function ($query) use ($request) {
                $query->where('expertise', 'like', '%' . $request->expertise . '%');
            })
            ->when($request->experience, function ($query) use ($request) {
                $query->where('experience', 'like', '%' . $request->experience . '%');
            })
            ->when($request->date_from, function ($query) use ($request) {
                $query->whereDate('created_at', '>=', $request->date_from);
            })
            ->when($request->date_to, function ($query) use ($request) {
                $query->whereDate('created_at', '<=', $request->date_to);
            })
            ->paginate(10)
            ->withQueryString();

        return view('mentor.index', compact('mentors'));
    }

    public function destroy($id)
    {
        $mentor = Mentor::findOrFail($id);
        $mentor->delete();

        return back()->with('success', 'Mentor deleted successfully.');
    }
}
