@extends('layouts.app')

@section('content')
{!! Breadcrumbs::render('projects') !!}
    @if(count($posts) > 0)
           @php
           //Columns must be a factor of 12 (1,2,3,4,6,12)
           $numOfCols = 3;
           $rowCount = 0;
           $bootstrapColWidth = 12 / $numOfCols;
           @endphp
           <div class="row">
            @foreach($posts as $post)
            @if( $rowCount == 5 )
               <div class="col-md-@php echo $bootstrapColWidth; @endphp" style="padding-top: 30px;">
                   <div class="postBox" style="background:none;box-shadow:none;padding: 70px 30px;">
                       <img src="/img/Baner-EYCA-UMPCG.png" style="border:none; width:100%">    
                   </div>
               </div>
               @else
               <div class="col-md-@php echo $bootstrapColWidth; @endphp" style="padding-top: 30px;">
                   <div class="postBox">
                   <span class="category" ></span>
                       <small style="color:#292663">Objavljeno: {{ \Carbon\Carbon::parse($post->created_at)->format('d.m.Y')}}  </small>
                       <img id="postImg" src="/storage/cover_images/{{$post->cover_image}}">
                       <h3>{{$post->title}}</h3>
                       <div class="half-a-border-on-top">
                           <small> <img src="/img/Pregledi-ikonica copy.svg" alt=""> {{$post->views}} pregleda</small>
                           <a href="/posts/{{$post->id}}">Pročitaj vise</a>
                       </div>
                   </div>
               </div>
               @endif
               @php
               $rowCount++;
               @endphp
              
               @if($rowCount % $numOfCols == 0)
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
  {!! Breadcrumbs::render('projects') !!}
</div>
@endsection