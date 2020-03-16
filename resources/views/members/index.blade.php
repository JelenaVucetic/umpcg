@extends('layouts.app')
@section('members')
<div class="container" id="breadSection">
{!! Breadcrumbs::render('members') !!}
</div>

<div class="container" id="membersSection">

    <div class="row random">
        @foreach($members as $member)
            <div class=" col-lg-3 col-md-4 col-sm-6  company" style="margin-top: 30px;">
                <div class="inner">
                    <div style="padding: 0 10px;">
                        <h4>{{ $member->company }}</h4>
                    </div>
                    <hr width="25%">
                    @if($member->image)
                    <img src="/img/{{ $member->image }}" alt="">
                    @else 
                    <img src="/img/icon-no-image.svg" alt="">
                    @endif
                    <div>
                    <div style="position: absolute; bottom: 0; padding:10px;">
                        <p class="description">{{ $member->description}}</p>
                    </div>
                </div>
                    <div class="overlay">
                        <div class="text">
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
    
        @endforeach
    </div>
</div>
@endsection

@section('breadcrumbs')
<div class="container-fluid" id='myBreadcrums'>
    {!! Breadcrumbs::render('members') !!}
</div>
@endsection