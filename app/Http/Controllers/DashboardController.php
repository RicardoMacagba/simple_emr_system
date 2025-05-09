<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Patient;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        // Fetch all users from the database
        $users = User::latest()->paginate(10);
        $usersCount = User::count();

        // Fetch patient data
        $patientsCount = Patient::count();
        $recentPatients = Patient::latest()->take(5)->get();

        // Pass data to the dashboard view
        return view('dashboard', compact('users', 'usersCount', 'patientsCount', 'recentPatients'));
    }
}
