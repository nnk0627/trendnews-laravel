<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
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
        $posts = Post::orderBy('id', 'asc')->paginate(6);
        return response()->json(compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $posts = new Post();
        $posts->title = $request->title;
        $posts->content = $request->content;
        $posts->price = $request->price;
        $posts->date = $request->date;
        $posts->category_id = $request->category_id;
        $posts->user_id = 1;

        if($request->hasfile('images')){
            $images = $request->file('images');
            $imgName = time() . '_' . $images->getClientOriginalName();
            $path = public_path('images/blogimg');
            $images->move($path, $imgName);
            $posts->images = $imgName;
        }

        $posts->save();
  
        return response()->json([
            'msg' => 'A post was created successfully.'
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $post = Post::findOrFail($id);
        $comments = $post->comments;

        if($post){
            return response()->json(compact('post', 'comments'));
        }
        
        return response()->json([ 
            'message' => 'A post not found.'
        ], 400);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        $posts = Post::find($id);
        $posts->title = $request->title;
        $posts->content = $request->content;
        $posts->date = $request->date;
        $posts->category_id = $request->category_id;
        $posts->user_id = $request->user_id;

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
        
        return response()->json([
            'msg' => 'A post was Updated successfully!'
        ]);
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
        if($post) {
            $post->delete();
            return response()->json([
                'message' => 'A post was successfully Deleted!'
            ]);
        }     
        return response()->json([ 'message' => 'A post not found.'], 400);
    }
}