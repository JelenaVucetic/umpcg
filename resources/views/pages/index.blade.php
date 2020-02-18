@extends('layouts.app')

@section('content')
<img src="/img/Drop down strelica.svg" alt="" onclick="topFunction()" id="myBtn" title="Go to top">
{!! Breadcrumbs::render('home') !!}
    @if(count($posts) > 0)
           @php
           $rowCount = 0;
           @endphp
           <div class="row">
            @foreach($posts as $post)
            @if( $rowCount == 5 )
               <div class="col-md-4" style="padding-top: 30px;">
                   <div class="postBox" style="background:none;box-shadow:none;padding: 70px 30px;">
                       <img src="/img/Baner-EYCA-UMPCG.png" style="border:none; width:100%">    
                   </div>
               </div>

               </div><div class="row">
               <div class="col-md-4" style="padding-top: 30px;">
                   <div class="postBox">
                   <a href="/posts/{{$post->id}}">
                   <span class="category" ></span>
                       <small style="color:#292663">Objavljeno: {{ \Carbon\Carbon::parse($post->created_at)->format('d.m.Y')}}  </small>
                       <img id="postImg" src="/storage/cover_images/{{$post->cover_image}}">
                       <h3>{{$post->title}}</h3>
                       <div>
                       @if($post->views)
                        <small> <img src="/img/Pregledi-ikonica copy.svg" alt="">{{$post->views}} pregleda</small>
                        @endif
                       </div>
                       </a>
                   </div>
               </div>
               @php
               $rowCount++;
               @endphp
               @else
               <div class="col-md-4" style="padding-top: 30px;">
                   <div class="postBox">
                   <a href="/posts/{{$post->id}}">
                   @if($post->category == 'umpcg')
                   <span class="category" ></span>
                   @else
                   <span class="categoryActivities" ></span>
                   @endif
                       <small style="color:#292663">Objavljeno: {{ \Carbon\Carbon::parse($post->created_at)->format('d.m.Y')}}  </small>
                       <img id="postImg" src="/storage/cover_images/{{$post->cover_image}}">
                       <h3>{{$post->title}}</h3>
                       <div>
                       @if($post->views)
                        <small> <img src="/img/Pregledi-ikonica copy.svg" alt="">{{$post->views}} pregleda</small>
                        @endif
                       </div>
                       </a>
                   </div>
               </div>
            
               @endif
               @php
               $rowCount++;
               @endphp
              
               @if($rowCount % 3 == 0)
                </div><div class="row">
               @endif
               
            @endforeach
           </div>
        {{$posts->links()}}
    @else
        <p>No posts found</p>
    @endif

@endsection

@section('breadcrumbs')
<div class="container-fluid" id='myBreadcrums'>
    {!! Breadcrumbs::render('home') !!}
</div>
@endsection