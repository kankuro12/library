<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;

class SessionsController extends Controller
{
    public function __construct()
    {
        $this->middleware('guest', [
            'only' => ['create']
        ]);
    }

    public function create()
    {
        return view('sessions.create');
    }

    public function store(Request $request)
    {
        $credentials = $this->validate($request, [
            'email' => 'required|max:255|email',
            'password' => 'required'
        ]);


        if (Auth::attempt($credentials, $request->has('remember'))) {
            session()->flash('success', 'Welcome back!');
            return redirect()->route('users.show', [Auth::user()]);
        } else {
            session()->flash('danger', 'Login failed');
            return redirect()->back()->withInput();
        }
    }

    public function destroy()
    {
        Auth::logout();
        session()->flash('success', 'See you!');
        return redirect()->route('home');
    }

    public function application()
    {
        return view('users.applications', ['apps' => \App\Models\User::where('confirmed', 0)->where('authority', '>=', 0)->get()]);
    }
    public function accept(\App\Models\User $user)
    {
        $user->confirmed = 1;
        $user->save();
        return redirect()->back();
    }
}
