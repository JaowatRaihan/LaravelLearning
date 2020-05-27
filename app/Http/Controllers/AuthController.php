<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;

class AuthController extends Controller
{

    public function login(Request $request)
    {
        $user = User::where("name",$request->name )->where("password",$request->password)->get();
        if(!empty($user) && $user->is_registered == 1 )
        {
            return view("front.post.index");
        }
        return back()->with('fail', 'Logged In Failed');
    }

    public function store(Request $request)
    {
        $insert = new User();
        $insert->email = $request->email;
        $insert->password = $request->password;
        $insert->name = "jaowat";
        $insert->is_registered = false;
        $insert->save();
        return back()->with('success', 'Message sent successfully');
    }
}
