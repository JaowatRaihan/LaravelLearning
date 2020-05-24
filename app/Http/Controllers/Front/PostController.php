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
        return view('front.post.view_post')->with('post',$post);
    }

    public function edit($id)
    {
        $post = Post::findOrFail($id);
        return view('front.post.edit_post') -> with('post',$post);
    }

    public function update(Request $request)
    {
        // $validate = Validator::make($request->all(),
        //     ['product_name' => 'required|max:300|unique:products,product_name,'.$request->id.',id,deleted_at,NULL',
        //      'product_id' => 'required|numeric|digits:6|unique:products,product_id,'.$request->id.',id,deleted_at,NULL',
        //      'batch_id' => 'nullable|max:40|unique:products,batch_id,'.$request->id.',id,deleted_at,NULL',
             
        //      'company_id' => 'required',
        //      'is_active' => 'required',
        //      'photo' => 'nullable|mimes:jpeg,png,jpg|max:2048' ]);
        // if($validate->fails()){ return back()->withErrors($validate)->withInput();}

        // $dt = new DateTime(); $current_date = $dt->format('d');
        // $orderCount = OrderCount::find(2);
        // $old_date = $orderCount->count_date->format('d');
        // if($old_date != $current_date) {
        //     $orderCount->count_date = now();
        //     $orderCount->count_order = 1;
        // }
        // else{
        //     $orderCount->count_order += 1;
        // }
        // $orderCount->save();

        $post = Post::find($request->id);
        //$input = $request->all();
        $post->title = $request->title;
        $post->author_name = $request->author_name;
        $post->description = $request->description;
        // $post->fill($input)->save();
        $post->save();
        return back();
    }

    public function destroy($id)
    {
        $post = Post::find($id)->delete();
        return back();
    }
}
