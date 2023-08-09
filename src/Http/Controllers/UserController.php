<?php

namespace Ramiz\LaravelStarter\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Ramiz\LaravelStarter\Models\User;

class UserController extends Controller
{
   
    public function login(Request $request)
    {   
        if(Auth::attempt(['email'=>$request->email,'password'=>$request->password],$request->remember??null)){            
            return to_route('category.index');
        }else{
            return to_route('login');
        }        
    }

    public function register(Request $request)
    {
        User::create($request->all());
        return to_route('login');
    }

    public function destroy(string $id)
    {
        //
    }
}
