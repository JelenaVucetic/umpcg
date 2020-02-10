@extends('layouts.app')

@section('content')
    @if(count($posts) > 0)
           @php
           //Columns must be a factor of 12 (1,2,3,4,6,12)
           $numOfCols = 3;
           $rowCount = 0;
           $bootstrapColWidth = 12 / $numOfCols;
           @endphp
           <div class="row">
                   @foreach($posts as $post)
               <div class="col-md-@php echo $bootstrapColWidth; @endphp" style="padding-top: 30px;">
                   <div class="postBox">
                       <small>Objavljeno {{$post->created_at}} </small>
                       <img src="/storage/cover_images/{{$post->cover_image}}">
                       <h3>{{$post->title}}</h3>
                       <div class="half-a-border-on-top">
                           <small>2k pregleda</small>
                           <a href="/posts/{{$post->id}}">Procitaj vise</a>
                       </div>
                   </div>
               </div>
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