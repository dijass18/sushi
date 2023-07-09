<?php

namespace App\Http\Controllers;
use Spatie\Permission\Traits\HasRoles;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Contracts\Role;
use Illuminate\Auth\Events\Validate;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function login()
    {
        return view('admin.login');
    }
    public function authenticate(Request $request)
    {
        $credentials = $request->validate([
            'email' => ['required', 'string', 'email'],
            'password' => ['required', 'string'],
        ]);
        if (Auth::attempt($credentials)) {
            
            $request->session()->regenerate();
            return redirect()->intended('admin');
        };
        return back()
            ->withErrors([
                'email' => 'The provided credentials do not match our records.',
            ])
            ->onlyInput('email');
        }
}