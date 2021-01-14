@extends('layouts.master')
@section('menu')
    @parent
@endsection
@section('content')
    <div class="col-3">
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
{{--                    knopka delete--}}


{{--                    knopka redaktirovanya--}}
                </div>
            @endforeach
        @endif
    </div>

@endsection