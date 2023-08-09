<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

class UserController extends Controller
{
   
    public function login(Request $request)
    {   
        if(Auth::attempt(['email'=>$request->email,'password'=>$request->password],$request->remember??null)){            
            return to_route('dashboard');
        }else{
            return to_route('login');
        }        
    }

    public function register(Request $request)
    {
        User::create($request->all());
        $credentials = $request->only('email', 'password');
        Auth::attempt($credentials);
        return to_route('dashboard');
    }

    public function destroy(string $id)
    {
        //
    }
}
