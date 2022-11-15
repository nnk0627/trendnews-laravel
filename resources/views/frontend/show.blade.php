@extends('frontend.layouts.master')

@section('title')
{{ $post->title }}
@endsection

@section('content')

<div class="popular_destination_area" >
    <div class="d-flex align-items-center justify-content-between bg-white py-2 px-4 mb-3">
        <h3 class="home-title m-0">Details of News</h3>
    </div>
    <div class="container mx-6 px-4 bg-white">
        <div class="row mb-4">
            <h4 class="px-5"><strong>{{ $post->title }}</strong></h4>
        </div>
        <div class="row tour_detail">
            <div class="col-md-6">
                <img src="{{ asset('images/blogimg/' . $post->images) }}" 
                style="float:left; margin-right: 20px; height: auto;">
            </div>
            <div class="col-md-6">
                <p class="mb-4">
                    <b class="float-left">{{ $post->category->title }}</b>
                    <span class="days float-right"><i class="fa fa-clock-o"></i>
                        {{$post->date}}
                    </span>
                </p>
                
                <p style="text-align:justify;" class="pt-3">{!! $post->content !!}</p>
            </div>
        </div>
        </div>
<hr>
    <div class="row mb-4">
    
    <div class="col-md-12 text-right">
        <a href="{{ url('/') }}" class="btn btn-primary">Go back</a>
    </div>
    </div>
</div>
@endsection