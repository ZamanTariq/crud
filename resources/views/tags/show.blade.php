@extends('pages.main')
@section('content')

<h2>{{$tag->name}} Tag </h2>
{{-- <h1>{{$tag->name}} Tag <small>{{ $tag->posts()->count()}}Posts}}</small></h1>  --}}

<div class="row">
    <div class="col-md-12">
        <table class="table">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Title</th>
                    <th>Tags</th>
                    <th></th>
                </tr>
            </thead>

            <tbody>
                @foreach ($tag->posts as $post)
                <tr>
                <th>{{$post->id}}</th>
                <td>{{$post->title}}</td>
                <td>
                    @foreach ($post->tags as $tag)
                <span class="label label-default">{{$tag->name}}</span>
                    @endforeach
                </td>
                </tr>
                    
                @endforeach
            </tbody>
        </table>
    </div>
</div>

@endsection