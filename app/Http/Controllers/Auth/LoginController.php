<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function __construct()
    {
        return $this->middleware('guest');
    }

    public function index(){
        return view('auth.login');
    }

    public function store(Request $request){
        
        $this->validate($request, [
            "email"=>"required|email",
            "password"=>"required"
        ]);
        
        /*if(!Auth::attempt(['email' => $request->email, 'password' => $request->password], $request->remember)){
            return back()->with("failed", "Invalid Details");
        }*/

        if(!auth()->attempt($request->only(['email', 'password']), $request->remember)){
            return back()->with("failed", "Invalid Details");
        }

        return redirect()->route('dashboard');
    }
}
