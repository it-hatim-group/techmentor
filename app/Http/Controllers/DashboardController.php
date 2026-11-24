<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use App\Models\User;
use App\Models\Organization;
use App\Models\Mentor;
use App\Models\Mentee;
use App\Models\ProcessStep;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $numberOfPermissions = Permission::count();
        $numberOfRoles = Role::count();
        $numberOfUsers = User::count();

        $numberOfOrganizations = Organization::count();
        $numberOfMentors = Mentor::count();
        $numberOfMentees = Mentee::count();
        $numberOfContacts = Contact::count();
        $numberOfProcessSteps = ProcessStep::count();

        return view('dashboard', compact(
            'numberOfPermissions',
            'numberOfRoles',
            'numberOfUsers',
            'numberOfOrganizations',
            'numberOfMentors',
            'numberOfMentees',
            'numberOfContacts',
            'numberOfProcessSteps',
        ));
    }
}
