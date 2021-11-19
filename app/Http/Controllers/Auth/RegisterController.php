<?php

namespace App\Http\Controllers\Auth;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Auth\Events\Registered;

class RegisterController extends Controller
{

    public function __construct()
    {
        return $this->middleware('guest');
    }
    public function index(){
        return view('auth.register');
    }

    public function store(Request $request){
        
        $this->validate($request, [
            "name"=>"required|max:255",
            "username"=>"required|max:255",
            "email"=>"required|max:255|email",
            "password"=>"required|confirmed"
        ]);


        $user = User::create([
            "name"=>$request->name,
            "username"=>$request->username,
            "email"=>$request->email,
            "password"=>Hash::make($request->password)
        ]);
        
        Auth::attempt([
            'email' => $request->email, 
            'password' => $request->password
        ]);

        //auth()->attempt($request->only(['email', 'password']));
        
        event(new Registered($user));

        return redirect()->route('dashboard');
    }
}
