<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class PostController extends Controller
{
    public function index(){
        $posts = Post::latest()->with(['likes', 'user'])->paginate(3);
        //$posts = Post::orderby('body', 'asc')->paginate(3);
        return view('post', [
            'posts'=>$posts
        ]);
    }

    public function show(Post $post){
        return view('profile.post', [
            'post'=>$post
        ]);
    }

    public function store(Request $request){
        $this->validate($request, [
            'body'=>'required',
            'image'=>'image|mimes:png,jpg,jpeg|nullable'
        ]);

        $path = null;
        if($request->file('image') != null){
            $path = $request->file('image')->store('postImages');
        }
        
        $request->user()->posts()->create([
            'body'=> $request->body,
            'image'=> $path,
        ]);
        
        return back();
    }


    public function destroy(Post $post){
        
        $this->authorize('delete', $post);
        
        if($post->image != null){
            Storage::delete($post->image);
            $post->delete();
        }else{
            $post->delete();
        }

        return back();
    }



    public function update(Post $post, Request $request){
        
        $this->authorize('update', $post);
        
        $this->validate($request, [
            'body'=>'string',
            'image'=>'image|mimes:png,jpg,jpeg|nullable'
        ]);
        

        if($request->image != null && $post->image != null){
            Storage::delete($post->image);
            Post::find($post->id)->update([
                'body'=>$request->body,
                'image'=>$request->file('image')->store('postImages')
            ]);
        }elseif($request->image != null){
            Post::find($post->id)->update([
                'body'=>$request->body,
                'image'=>$request->file('image')->store('postImages')
            ]);
        }else{
            Post::find($post->id)->update([
                'body'=>$request->body,
            ]);
        }

        return back();
    }
}
