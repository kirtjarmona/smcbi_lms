<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{

    public function showLoginForm()
    {
        return view('auth.login');
    }

    
    public function login(Request $request)
        {
            $credentials = $request->only('name', 'password');
            
            if (Auth::attempt($credentials)) {
                $user = Auth::user();
                
                if ($user->type == 'admin') {
                    return redirect()->route('admin.dashboard');
                } elseif ($user->type == 'teacher') {
                    return redirect()->route('teacher.dashboard');
                } elseif ($user->type == 'student') {
                    return redirect()->route('student.dashboard');
                } else {
                    return redirect()->route('/');
                }
            }
            
            return back()->withErrors([
                'name' => 'The provided credentials do not match our records.',
            ]);
        }
}
