@extends('pages.main')
@section('content')
<div class="row">
<div class="col-md-8 col-md-offset-2">
    <h1 class="text-center">Create new post</h1>
    {!! Form::open(array('route' => 'posts.store')) !!}

    {{Form::label('title', 'Title:')}}
    {{Form::text('title',null,array('class'=>'form-control'))}}

    {{Form::label('category_id','Category:')}}
    <select class="form-control" name="category_id">
        @foreach ($categories as $category)
        <option value='{{ $category->id }}'>{{$category->name}}</option>    
        @endforeach
    </select>
   
    {{Form::label('slug', 'Slug')}}
    {{Form::text('slug', null, array('class'=>'form-control','required' =>'', 'minlength'=>'5' ,'maxlength'=>'255'))}}


    {{Form::label('body', 'Post Body:')}}
    {{Form::textarea('body',null,array('class'=>'form-control', 'placeholder'=>"Enter text here..."))}}
   
    {{Form::submit('Create Post',array('class'=>'btn-primary'))}}
    <a href="/posts" class="btn btn-primary">Back</a>
   
    {!! Form::close() !!}
</div>
</div>
@endsection