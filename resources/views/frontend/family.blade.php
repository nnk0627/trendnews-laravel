@extends('frontend.layouts.master')

@section ('title')
<!-- {{$category->title}} -->

@section('content')
<div class="popular_destination_area" >
    <div class="container">
        <div class="d-flex align-items-center justify-content-between bg-white py-2 px-4 mb-3">
            <h3 class="home-title m-0">{{$category->title}} </h3>
        </div>
        <div class="row">          
            @foreach($posts as $post)
                <div class="col-lg-4 col-md-6 mb-3">
                    <div class="blog_place bg-white">
                        <img src="{{ asset('images/blogimg/' . $post->images) }}" alt="" class="blog-img p-3 mb-4">
                        <span class="px-4"><b>{{$post->category->title}}</b></span>
                            <span class="days">/                              
                                    <a href="#">{{$post->date}}</a>
                                </span>
                        
                        <div class="place_info px-4">
                            <div class="pt-3">
                                    <strong>{{$post->title}}</strong>
                            </div>
                            <div class="tour_detail d-flex justify-content-between pt-3">
                                <a href="{{ url("post/$post->id") }}" ><i class="fa fa-eye pr-2"></i><b>Read More...</b></a>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>  
    </div>
    <div class="row justify-content-center">
        {{ $posts->links() }}
    </div>

</div>

@endsection