@extends('pages.main')
@section('content')
<h1>{{$tag->name}} Tag <small>{{ $tag->posts()->count()}}Posts</small></h1>    
@endsection