@extends('layouts.app')
@section('members')
<div class="container-fluid" style="margin:0 125px;">
{!! Breadcrumbs::render('members') !!}
</div>

<div class="container-fluid" id="membersSection">
@php
$rowCount = 0;
@endphp
    <div class="row random">
        @foreach($members as $member)
            <div class="col-md-3  company">
                <div class="inner">
                    @if($member->image)
                    <img src="/storage/cover_images/{{ $member->image }}" alt="">
                    @else 
                    <img src="/img/icon-no-image.svg" alt="">
                    @endif
                    <div class="overlay">
                        <div class="text">
                            <h4>{{ $member->company }}</h4>
                            <p class="description">{{ $member->description}}</p>
                            <p>{{ $member->firstname}}</p>
                            <p>{{ $member->work}}</p>
                            <p>{{ $member->email}}</p>
                            <p>{{ $member->web}}</p>
                        </div>
                    </div>
                </div>
            </div>
            @php
            $rowCount++;
            @endphp
            
            @if($rowCount % 4 == 0)
            </div><div class="row">
            @endif
        @endforeach
    </div>
</div>
@endsection

@section('breadcrumbs')
<div class="container-fluid" id='myBreadcrums'>
    {!! Breadcrumbs::render('members') !!}
</div>
@endsection