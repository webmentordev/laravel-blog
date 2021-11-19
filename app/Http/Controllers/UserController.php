<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index(User $user){
        $posts = $user->posts()->paginate(20);
        return view('profile.user',[
            'user'=>$user,
            'posts'=>$posts
        ]);
    }
}
