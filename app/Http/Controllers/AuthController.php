<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use App\User;
use Session;

class AuthController extends Controller
{

    public function login(Request $request)
    {
        $validate = Validator::make($request->all(), ['email' => 'required|email', 'password' => 'required'] );
        if($validate->fails()){ return back()->withErrors($validate)->withInput(); }

        if(Auth::guard('usergaurd')->attempt([
            'email' =>  $request->email,
            'password' =>  $request->password
        ])){
            $request->session()->put('sessionUser', $request->email );
            return redirect('/posts')->with('success', 'Logged in successful');
        }
        return redirect('/')->with('error', 'Email/Password Do not match');      
    }

    public function store(Request $request)
    {
    
        $validate = Validator::make($request->all(),
            ['name' => 'required|max:100|unique:posts,name,NULL,id,deleted_at,NULL',
             'email' => 'required|email|max:150',
             'password' => 'required|min:3|max:20',
             'conf_password' => 'required|same:password|min:3|max:20'
            ]
           // 'email' => 'required|email|unique:users,email,'.$request->id.',id,deleted_at,NULL'
           
            // ['name.unique' => 'Company Name exists!']
        );
        if($validate->fails()){ 
            return back()->withErrors($validate)->withInput();
        }
       
        $insert = new User();
        $insert->email = $request->email;
        $insert->password = $request->password;
        $insert->name = "jaowat";
        $insert->is_registered = false;
        $insert->save();
        return back()->with('success', 'Message sent successfully');
    }

    public function logout(Request $request)
    {
        $request->session()->forget('sessionUser');
        $request->session()->flush();
        Auth::guard('usergaurd')->logout();
        return redirect('/')->with('success', 'Logged out successfully.');    
    }
}
