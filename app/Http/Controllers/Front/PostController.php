<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Post;
use Validator;

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


    // [
    //     'batch_id.max' => 'Batch id/number may not be greater than 40 characters.',
    //     'batch_id.unique' => 'Batch id/number has already been taken.',
    //     'p_price.regex' => 'Price will be upto 2 decimal places',
//  regex:/^\d+(\.\d{1,2})?$/|between:0.01, 99999999.99
    public function store(Request $request)
    {
        $validate = Validator::make($request->all(),
            ['title' => 'required|min:3|max:20|regex:/[a-zA-Z]{9}/',
             'author_name' => 'required|min:3|max:20',
             'description' => 'nullable|min:3|max:20' ],
            ['title.min' => 'Minimum Title','title.regex' => 'Regex not matched']
        );
        if($validate->fails()){ return back()->withErrors($validate)->withInput()->with('error','Oops! Something went wrong!');}

        $post = new Post();
        // $insert->title = $request->title;
        // $insert->author_name = $request->author_name;
        // $insert->description = $request->description;
        //$insert->save();
        $input = $request->all();
        $post->fill($input)->save();
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
        $validate = Validator::make($request->all(),
        ['title' => 'required|min:3|max:20',
         'author_name' => 'required|min:3|max:20',
         'description' => 'required|min:3|max:20' ]);
        if($validate->fails()){ return back()->withErrors($validate)->withInput();}

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
