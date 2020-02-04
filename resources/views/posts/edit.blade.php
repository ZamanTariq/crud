@extends('pages.main')
@section('content')
<div class="row">
<div class="col-md-8 col-md-offset-2">
    <h1 class="text-center">Edit new post</h1>
    {!! Form::model($post, ['route' => ['posts.update',$post-> id], 'method' => 'put']) !!}

    {{Form::label('title', 'Title:')}}
    {{Form::text('title',null,array('class'=>'form-control'))}}

    {{Form::label('category_id', "Category:")}}
    {{Form::select('category_id', $categories, null,['class'=>'form-control'])}}
   
    {{Form::label('body', 'Post Body:')}}
    {{Form::textarea('body',null,array('class'=>'form-control', 'placeholder'=>"Enter text here..."))}}
   
    {{Form::submit('Update Post',array('class'=>'btn-primary'))}}
    <a href="/posts" class="btn btn-primary">Back</a>
   
    {!! Form::close() !!}
</div>
</div>
@endsection