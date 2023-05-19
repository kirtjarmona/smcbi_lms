<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Redirect;
use App\User;

class AdminController extends Controller
{
    public function dashboard()
    {
        return view('admin.dashboard');
    }
    public function register()
    {
        return view('admin.register');
    }
    public function admin_users()
    {
        $users = User::where('type', 'admin')->get();
        // return $users;
        return view('admin.admin_user', ['users' => $users]);
    }

    public function admin_users_id($id)
    {
        $users = User::find($id);
        // return $users;
        return view('admin.admin_user_edit', ['users' => $users]);
    }
    public function admin_users_update(Request $request, $id)
    {
        $user = User::find($id);
        
        $request->validate([
            'first_name' => 'string|max:255',
            'middle_name' => 'string|max:255',
            'last_name' => 'string|max:255',
            'contact_info' => 'string|max:255',
            'email' => 'string|email|max:255',
        ]);

        if ($request->password != '') {
            $request->validate([
                'password' => 'required|string|min:4|confirmed',
            ]);
            $pass_word = Hash::make($request->password);    
        }

        // Update the user's password
        $user->first_name = $request->first_name;
        $user->middle_name = $request->middle_name;
        $user->last_name = $request->last_name;
        $user->contact_info = $request->contact_info;
        $user->email = $request->email;
        if ($request->password != '') {$user->password = $pass_word;}
        $user->save();

        Session::flash('success', 'User updated successfully.');
        return redirect()->back();
    }

    public function deleteUser($id)
    {
        $user = User::find($id);

        if ($user) {
            $user->delete();
            // return Redirect::back()->with('success', 'User deleted successfully.');
            Session::flash('success', 'User Deleted successfully.');

            $users = User::where('type', 'admin')->get();
            return view('admin.admin_user', ['users' => $users]);
        } else {
            return "User not found.";
        }
    }
    
    
    public function create(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:4|confirmed',
            'type' => 'required|in:admin,teacher,student',
        ]);

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'type' => $request->type,
        ]);
        
        $users = User::where('type', 'admin')->get();
        Session::flash('success', 'New user added successfully.');
        return view('admin.admin_user', ['users' => $users]);
    }
}
