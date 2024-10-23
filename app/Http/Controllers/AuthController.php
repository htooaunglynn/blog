<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rule;

class AuthController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $formData = request()->validate([
            'name' => 'required|min:4|max:255',
            'username' => 'required|min:4|max:255|unique:users,username',
            'email' => 'required|min:4|max:255|email|unique:users,email',
            'password' => 'required|min:8|max:255'
        ]);

        $user = User::create($formData);
        // session()->flash('success', $user->name);
        // auth()->login($user, false);
        Auth::login($user, false);

        return redirect('/')->with('success', 'Welcome Dear '.$user->name);
    }

    /**
     * Display the specified resource.
     */
    public function show(User $user)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(User $user)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, User $user)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(User $user)
    {
        //
    }

    public function register()
    {
        return view('auth.register');
    }

    public function login()
    {
        return view('auth.login');
    }

    public function logout()
    {
        $name = Auth::user()->name;

        Auth::logout();

        return redirect('/')->with('logout', $name);
    }

    public function postLogin()
    {
        $formData = request()->validate([
            'email' => 'required|email|max:255|exists:users,email',
            'password' => 'required|min:8|max:255'
        ], [
            'password.required' => 'Password can not be null.',
            'email.required' => 'We need email.',
            'email.exists' => 'Email does not exists.',
            'password.min' => 'Password should be more than 8 character.',
        ]);

        if (Auth::attempt($formData)) {
            return redirect('/')->with('success', 'Welcome Back.');
        } else {
            return redirect()->back()->withErrors([
                'email' => 'Login fail!'
            ]);
        }
    }
}
