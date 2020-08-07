<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class ApplicationController extends Controller
{

    public function add()
    {
        return view('users.newapplication');
    }

    public function save(Request $request)
    {
        $user = new User();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->phone = $request->phone;
        $user->address = $request->address;
        $user->description = $request->description;
        $user->password = Hash::make($request->password ?? "admin123");
        if ($request->hasFile("photo")) {
            $user->photo = $request->file('photo')->store('photos');
        }
        $user->save();
        return view('users.successapplication');
    }
}
