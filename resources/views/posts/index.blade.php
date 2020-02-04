@extends('pages.main')
@section('content')
<div class="row">
<div class="col-md-8">
    <h1>All Posts</h1>
</div>    
<div class="col-md-2">
<a href="{{route('posts.create')}}" class="btn btn-lg btn-block btn-primary">Create Posts</a>
<a href="{{route('categories.index')}}" class="btn btn-block btn-primary">Create Categories</a>
</div>    
</div>

<div class="container">
<div class="row">
    <div class="col-lg-12">
        <table class="table">
            <thead>
                <th>#</th>
                <th>Title</th>
                <th>Body</th>
                <th>Created At</th>
                <th>Updated At</th>
            </thead>
            <tbody>
                @foreach ($posts as $post)
                <tr>
                <th>{{$post->id}}</th>
                <td>{{$post->title}}</td> 
                <td>{{substr($post->body, 0, 50)}}</td>
                <td>{{$post->created_at}}</td>
                <td>{{$post->updated_at}}</td>
                <td><a href="{{route('posts.edit', $post->id)}}" class="btn btn-primary">Edit</a></td>
                <td><a href="{{route('posts.show',$post->id)}}" class="btn btn-default btn-primary">View</a><td>
                    {!!Form::open(['route' => ['posts.destroy', $post->id], 'method' => 'DELETE'])!!}
                    {{Form::submit('Delete', ['class' => 'btn btn-danger'])}}
                    {!!Form::close()!!}
                </td>
                </tr>                     
                @endforeach
            </tbody>
        </table>
    </div>
</div>
</div>
@endsection