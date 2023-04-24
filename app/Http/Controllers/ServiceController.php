<?php

namespace App\Http\Controllers;

use App\Models\Department;
use App\Models\Service;
use App\Models\User;
use Illuminate\Http\Request;

class ServiceController extends Controller
{
    public function index()
    {
        $departments = Department::all();
        $users = User::leftJoin('model_has_roles', function($join) {
            $join->on('users.id', '=', 'model_has_roles.model_id')
                 ->where('model_has_roles.role_id', '=', 3);
                })
                ->where('model_has_roles.role_id', '=', 3)
                ->get();
        return view('welcome', compact('departments', 'users'));
    }

    public function store(Request $request)
    {
        // Validate the form data
        $validatedData = $request->validate([
            'department' => 'required',
            'eqptName' => 'required',
            'serial' => 'required',
            'model' => 'required',
            'reportedBy' => 'required',
            'telephone' => 'required',
            'designation' => 'required',
            'fault' => 'required',
            'description' => 'required',
            'user' => 'required'
        ]);


        // Create a new Equipment Request with the validated data
        $service = Service::create($validatedData);

        // Redirect to the Equipment Request index page with a success message
        return redirect()->route('welcome')->with('success', 'Equipment request created successfully.');
    }

}
