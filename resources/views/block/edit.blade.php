@extends('layouts.app')
@section('menu')
    @parent
@endsection

@section('content')
    @if(session('errors'))
        @foreach(session('errors')->all() as $error)
            <div class="alert alert-danger">

                {{$error }}<br>
                {{--{{session('errors')}};--}}
            </div>
        @endforeach
    @endif

    {!! Form::model($block,['route'=>['block.update',$block->id],'method'=>'PUT','files'=>true]) !!}

    <div class="form-group">
        {!! Form::label('topicid','Select topic') !!}
        {!! Form::select('topicid',$topics,$block->topicid,['class'=>'form-control']) !!}

    </div>

    <div class="form-group">
        {!! Form::label('title','Edit title') !!}
        {!! Form::text('title',$block->title,['class'=>'form-control']) !!}
    </div>
    <div class="form-group">
        {!! Form::label('block_content','Edit content') !!}
        {!! Form::textarea('block_content',$block->content,['class'=>'form-control']) !!}
    </div>

    <div class="form-group">
        {!! Form::label('imagepath','Edit image') !!}
        <br>
        <p>{{$block->imagepath}}</p>
        {!! Form::image($block->imagepath) !!}
        <br>
        {!! Form::file('imagepath',['class'=>'form-control']) !!}
    </div>

    {!! Form::submit('Edit and save block',['class'=>'btn btn-primary']) !!}

    {!! Form::close() !!}

@endsection