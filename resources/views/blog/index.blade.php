@extends('pages.main')
@section('content')

<div class="row">
    <div class="col-md-12">
        <h2>Blog</h2>
    </div>
</div>
@foreach($posts as $post)
<h1>{{ $post->title }}</h1>
<p>{{ $post->body }}</p>
<p>{{ $post->created_at }}</p>
@endforeach
@endsection