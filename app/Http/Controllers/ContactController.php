<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    public function index(Request $request)
    {
        $contacts = Contact::latest()

            ->when($request->name, function ($query) use ($request) {
                $query->where('name', 'like', '%' . $request->name . '%');
            })

            ->when($request->email, function ($query) use ($request) {
                $query->where('email', 'like', '%' . $request->email . '%');
            })

            ->when($request->interest, function ($query) use ($request) {
                $query->where('interest', 'like', '%' . $request->interest . '%');
            })

            ->when($request->message, function ($query) use ($request) {
                $query->where('message', 'like', '%' . $request->message . '%');
            })

            ->when($request->date_from, function ($query) use ($request) {
                $query->whereDate('created_at', '>=', $request->date_from);
            })

            ->when($request->date_to, function ($query) use ($request) {
                $query->whereDate('created_at', '<=', $request->date_to);
            })

            ->paginate(10)
            ->withQueryString();

        return view('contact.index', compact('contacts'));
    }

    public function destroy(Contact $contact)
    {
        $contact->delete();
        return back()->with('success', 'Contact enquiry deleted successfully.');
    }
}
