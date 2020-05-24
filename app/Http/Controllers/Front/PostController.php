<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Post;

class PostController extends Controller
{
    public function index()
    {
        $posts = Post::get();
        return view('front.post.index') -> with('posts',$posts);
    }
    
    public function create()
    {
        return view('front.post.add_post');
    }

    public function store(Request $request)
    {
        $insert = new Post();
        $insert->title = $request->title;
        $insert->author_name = $request->author_name;
        $insert->description = $request->description;
        //$insert->created_at = now();
        //$insert->updated_at = now();
        $insert->save();
        return back()->with('success', 'Message sent successfully');
    }

    public function show($id)
    {
        $post = Post::find($id);
        return view('front.post.show_post') -> with('post',$post);
    }

    public function edit($id)
    {
        //
    }

    public function update(Request $request, $id)
    {
        //
    }

    public function destroy($id)
    {
        //
    }
}
