<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use App\Category;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts= Post::all();
        return view('posts.index')->withPosts($posts);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::all();
        return view('posts.create')->withCategories($categories); 
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request,array(
            'title'=>'required|max:255',
            'category_id'=>'required|integer',
            'slug'=>'required|alpha_dash|min:5|max:255|unique:posts,slug',
            'body'=>'required'
        ));
        // Store in the database
        $post =new Post;
        $post->title =$request->title;
        $post ->slug =$request ->slug;
        $post->category_id = $request->category_id;
        $post ->body=$request->body;
        $post->save();
        return redirect()->route('posts.show', $post->id);  
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $post = Post::find($id);
        return view('posts.show', compact('post')); 
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $post = Post::find($id);
        $categories = Category::all();
        $cats = array();
        foreach ($categories as $category){
            $cats[$category->id] = $category->name;
        }
        return view('posts.edit')->withPost($post)->withCategories($cats);
       // return view('posts.edit', compact('post'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $post =Post::find($id);
        if($request->input('slug')== $post->slug){
            $this->validate($request, array(
            'title'=> 'required|max:255',
            'slug' => 'required'
            ));
        }
        else{       
           $this->validate($request, [
            'title'=> 'required',
            'slug' => 'required|alpha_dash|min:5|max:255|unique:posts,slug',
            'body' => 'required'
        ]);
           }

        $post = Post::find($id);
        $post->title=$request->input('title');
        $post->category_id=$request->input('category_id');
        $post->slug=$request->input('slug');
        $post->body=$request->input('body');
        $post->save();
        return redirect('/posts')->with('success','post updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $post = Post::find($id);
        $post->delete();
        return redirect ('/posts')->with('success' , 'Post Removed');
    }
}
