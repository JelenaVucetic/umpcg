@extends('layouts.app')
@section('members')
<div class="container-fluid" id="breadSection">
{!! Breadcrumbs::render('members') !!}
</div>

<div class="container-fluid" id="membersSection">
@php
$rowCount = 0;
@endphp
    <div class="row random" style="margin-top: 30px;">
        @foreach($members as $member)
            <div class="col-lg-2 col-md-3 col-sm-6 company" style="margin-top: 30px;">
                <div class="inner">
                    @if($member->image)
                    <img src="/img/{{ $member->image }}" alt="">
                    @else 
                    <img src="/img/icon-no-image.svg" alt="">
                    @endif
                    <div class="overlay">
                        <div class="text">
                            <h4>{{ $member->company }}</h4>
                            <hr width="25%">
                            <p class="description">{{ $member->description}}</p>
                            <div id="firstname">
                                <p>{{ $member->firstname}}</p>
                            </div>
                            <div id="work">
                                <p>{{ $member->work}}</p>
                            </div>
                            <div id="email">
                                <p>{{ $member->email}}</p>
                            </div>
                            <div id="web">
                                <p>{{ $member->web}}</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            @php
            $rowCount++;
            @endphp
            
            @if($rowCount % 6 == 0)
            </div><div class=""  style="margin-top: 30px;">
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