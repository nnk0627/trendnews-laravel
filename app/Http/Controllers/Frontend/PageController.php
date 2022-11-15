<?php

namespace App\Http\Controllers\Frontend;

use App\Post;
use App\Category;

use App\Http\Controllers\Controller;

class PageController extends Controller
{
    public function index(Category $id)
    {
        $posts = Post::orderby('id', 'asc')->paginate(6);
        $categories=Category::all();
        $post = Post::where('category_id','=',$id)->orderby('id', 'asc')->paginate(6);
        $category=Category::find($id);
        return view('frontend.index', compact('posts','categories','category','post'));


    }

    public function show($id)
    {
        $post = Post::findOrFail($id);
        
        $categories=Category::all();
        return view('frontend.show', compact('post','categories'));
    }
    
    public function about()
    {
        $categories=Category::all();
        return view('frontend.about',compact('categories'));
    }

    public function contact()
    {
        $categories=Category::all();
        return view('frontend.contact',compact('categories'));
    }

    public function blog()
    {
        $posts = Post::orderby('id', 'asc')->paginate(6);
        $categories=Category::all();
        return view('frontend.blog', compact('posts','categories'));
    }

     public function family($id)
    {
        $posts = Post::where('category_id','=',$id)->orderby('id', 'asc')->paginate(6);
        $category=Category::find($id);
        $categories=Category::all();
        return view('frontend.family', compact('posts','categories','category'));
    }

}
