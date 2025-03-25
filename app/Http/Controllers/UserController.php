<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{

    // display Users in the Dashboard
    public function index()
    {
        // $users = User::all();

        $users = User::paginate(10); // paginate the users in tge dashboard
        
        return view('dashboard', compact('users'));
    }

    // show or Edit Form
    public function edit(User $user)
    {
        return view('edit', compact('user'));
    }

    // update User details
    public function update(Request $request, User $user)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email,' . $user->id,
        ]);

        $user->update($request->all());

        return redirect()->route('dashboard')->with('success', 'User updated successfully!');
    }

    // delete ung User
    public function destroy(User $user)
    {
        $user->delete();
        return redirect()->route('dashboard')->with('success', 'User deleted successfully!');
    }

    // create a User
    public function createUser($name, $email)
    {
        User::create([
            'name' => $name,
            'email' => $email,
        ]);
        return "User created successfully.";
    }

    // read a Users
    public function readUsers()
    {
        return User::all();
    }
}
