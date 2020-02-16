@extends('layouts.app')

@section('content')
{!! Breadcrumbs::render('post', $post) !!}
<section style="margin: 50px 0; background:#EFEFEF; padding:50px;">
    <div>
        <img style="width:650px;height:340px;float: right; padding:30px;" src="/storage/cover_images/{{$post->cover_image}}">
        <small style="color:#292663">Objavljeno: {{ \Carbon\Carbon::parse($post->created_at)->format('d.m.Y')}}  </small>
        <h1 style="color:#292663; margin: 10px 0;font-size: 28px;">{{$post->title}}</h1>
        <div class="half-a-border-on-top-second" style="width:35%">
            <small> <img src="/img/Pregledi-ikonica copy.svg" alt=""> {{$views}} pregleda</small>
            <a href="/posts/{{$post->id}}">Pročitaj vise</a>
        </div>
          <p> {!!$post->body!!}</p>
    </div>


    @if(!Auth::guest())
        @if(Auth::user()->id == $post->user_id)
            <a href="/posts/{{$post->id}}/edit" class="btn btn-default">Edit</a>

            {!!Form::open(['action' => ['PostsController@destroy', $post->id], 'method' => 'POST', 'class' => 'pull-right'])!!}
                {{Form::hidden('_method', 'DELETE')}}
                {{Form::submit('Delete', ['class' => 'btn btn-danger'])}}
            {!!Form::close()!!}
        @endif
    @endif
</section>
@endsection


@section('carousel')
<div class="container-fluid"  style="margin:50px 0; background-color:#F6F6F6">
<div class="jcarousel-wrapper">
        <div class="jcarousel">
            <ul>
            @foreach($posts as $post)
                <li>
                    <div class="postBox" style="width: 300px;height: 330px; margin:auto;">
                    <small style="color:#292663;">Objavljeno: {{ \Carbon\Carbon::parse($post->created_at)->format('d.m.Y')}}  </small>
                        <img id="postImg" src="/storage/cover_images/{{$post->cover_image}}" style="max-height:130px;">
                        <h3>{{$post->title}}</h3>
                        <div class="half-a-border-on-top" style="align-items: center;">
                            <small style="display:flex;align-items: center;"> <img src="/img/Pregledi-ikonica copy.svg" alt=""> 2k pregleda</small>
                            <a href="/posts/{{$post->id}}">Pročitaj vise</a>
                        </div>
                    </div>
                </li>
                @endforeach 
            </ul>
        </div>
        <a href="#" class="jcarousel-control-prev">&lsaquo;</a>
        <a href="#" class="jcarousel-control-next">&rsaquo;</a>
    </div>
</div>
@endsection

@section('breadcrumbs')
<div class="container-fluid" id='myBreadcrums'>
{!! Breadcrumbs::render('post', $post) !!}
</div>
@endsection