@extends('layouts.app')
@section('menu')
    @parent
@endsection
@section('content')
    <div class="col-3">
        {!! Form::open(['action'=>'TopicController@search','class'=>'form']) !!}
        <div class="input-group">
            {!! Form::text('searchform','',['class'=>'form-control','placeholder'=>'Input topic','autocomplite'=>'off']) !!}
       <button type="submit" class="btn btn-success btn-sm">Search</button>

        </div>


        {!! Form::close() !!}

{{--        список топиков--}}
<ul class="list-unstyled">
    @foreach($topics as $topic)
        <li><a href="{{url('topic/'.$topic->id)}}" class="btn-link my-2">{{$topic->topicname}}</a></li>
    @endforeach
</ul>
    </div>
    <div class="col-9">
        {{--        блоки по выбранному топику--}}
        @if ($id!==0)
        <h1 class="text-center">{{$topicname}}</h1>
            <hr>
            @foreach($blocks as $block)
                <div class="p-2 alert alert-success">
{{--                    zagolovok--}}
                    <h2 class="text-center">{{$block->title}}</h2>

{{--                    image--}}
@if($block->imagepath)

                        <img src="{{asset($block->imagepath)}}" alt="picture" class="img-fluid my-2">

                    @endif
{{--                    text--}}
                    <p class="text-center">{{$block->content}}</p>

                    {{--        knopka redaktirovanya--}}
                    <a href="{{url('block/'.$block->id.'/edit')}}" class="btn btn-success float-left mr-4">Edit </a>

                    {{--                    knopka delete--}}
                    {!! Form::open(['route'=>['block.destroy',$block->id]])  !!}
                        {!! Form::hidden('_method','DELETE') !!}
                    <button type="submit" class="btn btn-danger">Delete</button>
                    {!! Form::close() !!}


                </div>
            @endforeach
        @endif
    </div>

@endsection