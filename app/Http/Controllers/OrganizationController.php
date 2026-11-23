<?php

namespace App\Http\Controllers;

use App\Models\Organization;
use Illuminate\Http\Request;

class OrganizationController extends Controller
{
    public function index()
    {
        $organizations = Organization::latest()
            ->when(request('full_name'), function ($query) {
                $query->where('full_name', 'like', '%' . request('full_name') . '%');
            })
            ->when(request('email'), function ($query) {
                $query->where('email', 'like', '%' . request('email') . '%');
            })
            ->when(request('phone'), function ($query) {
                $query->where('phone', 'like', '%' . request('phone') . '%');
            })
            ->when(request('organization_name'), function ($query) {
                $query->where('organization_name', 'like', '%' . request('organization_name') . '%');
            })
            ->when(request('date_from'), function ($query) {
                $query->whereDate('created_at', '>=', request('date_from'));
            })
            ->when(request('date_to'), function ($query) {
                $query->whereDate('created_at', '<=', request('date_to'));
            })
            ->paginate(10)
            ->withQueryString();

        return view('organization.index', compact('organizations'));
    }

    public function destroy($id)
    {
        $organization = Organization::findOrFail($id);
        $organization->delete();
        return back()->with('success', 'Organization deleted successfully.');
    }
}
