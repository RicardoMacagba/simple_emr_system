<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        // Fetch all users from the database
        $users = User::all();

        // Pass users to the dashboard view
        return view('dashboard', compact('users'));
    }
}
