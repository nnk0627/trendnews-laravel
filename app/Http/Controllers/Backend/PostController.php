<?php

namespace App\Http\Controllers\Backend;

use App\Post;
use App\Category;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Controllers\Backend\Auth;
use App\Http\Requests\PostFormRequest;

class PostController extends Controller
{

    public function index()
    {
        $posts = Post::orderBy('id', 'asc')->paginate(6);
        return view('backend.posts.index', compact('posts'));
    }

    public function create()
    {
        $cats = Category::all();
        return view('backend.posts.create', compact('cats'));
    }

    public function store(Request $request)
    {

        $posts = new Post();
        $posts->title = $request->title;
        $posts->content = $request->content;
        $posts->date = $request->date;
        $posts->category_id = $request->category_id;
        $posts->user_id = auth()->user()->id;

        if($request->hasfile('images')){
            $images = $request->file('images');
            $imgName = time() . '_' . $images->getClientOriginalName();
            $path = public_path('images/blogimg');
            $images->move($path, $imgName);
            $posts->images = $imgName;
        }

       $posts->save();
  
       return redirect('admin/post')->with('status', 'Created Successfully!');
            
    }

    public function show($id)
    {
        //
    }


    public function edit($id)
    {
        $cats = Category::all();
        $post = Post::findOrFail($id);
        return view('backend.posts.edit', compact('cats', 'post'));
    }

    public function update(Request $request, $id)
    {

        $posts = Post::find($id);
        $posts->title = $request->title;
        $posts->content = $request->content;
        $posts->date = $request->date;
        $posts->category_id = $request->category_id;
        $posts->user_id = auth()->user()->id;

        if($request->hasfile('images')){
            $images = $request->file('images');
            $imgName = time() . '_' . $images->getClientOriginalName();
            $path = public_path('images/blogimg');
            $images->move($path, $imgName);

            $previmg = $path . $posts->images;
            if(file_exists($previmg)){
                unlink($previmg);
            }

            $posts->images = $imgName;
        }

        $posts->save();
        
       return redirect('admin/post')->with('posts',$posts)->with('status', 'Update Successfully!');
        
    }

    public function destroy($id)
    {
        Post::findOrFail($id)->delete();
        return redirect('admin/post')->with('status', 'Deleted Successfully!'); 
    }
}
