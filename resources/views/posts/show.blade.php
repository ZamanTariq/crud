@extends('pages.main')
@section('content')
 
 <div class="row">
       <div class="col-md-8 col-md-offset-2">
        <h1 class="text-center">{{$post->title}}</h1>
        <p class="text-center">{{$post->body}}</p>
        <a href="/posts" class="btn btn-primary">Back</a>
        <hr>
       <p>Posted In: {{ $post->category->name}}</p>
 </div>
 
@endsection