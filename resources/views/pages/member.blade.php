@extends('layouts.app')

@section('content')
<section id="memberSection">
    <div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">

<div class="panel panel-default">
    <div class="panel-heading" role="tab" id="headingOne" class="panelHeading">
        <h4 class="panel-title">
            <a role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                <i class="more-less glyphicon glyphicon-plus" style="color:white"></i>
                Šta dobijam članstvom u UMPCG?
            </a>
        </h4>
    </div>
    <div id="collapseOne" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingOne">
        <div class="panel-body">
              Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid single-origin coffee nulla assumenda shoreditch et. Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred nesciunt sapiente ea proident. Ad vegan excepteur butcher vice lomo. Leggings occaecat craft beer farm-to-table, raw denim aesthetic synth nesciunt you probably haven't heard of them accusamus labore sustainable VHS.
        </div>
    </div>
</div>

<div class="panel panel-default">
    <div class="panel-heading" role="tab" id="headingTwo" class="panelHeading">
        <h4 class="panel-title">
            <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                <i class="more-less glyphicon glyphicon-plus" style="color:white"></i>
                Koje uslove moram da ispunim da bih postao član?            </a>
        </h4>
    </div>
    <div id="collapseTwo" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingTwo">
        <div class="panel-body">
            Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid single-origin coffee nulla assumenda shoreditch et. Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred nesciunt sapiente ea proident. Ad vegan excepteur butcher vice lomo. Leggings occaecat craft beer farm-to-table, raw denim aesthetic synth nesciunt you probably haven't heard of them accusamus labore sustainable VHS.
        </div>
    </div>
</div>

<div class="panel panel-default">
    <div class="panel-heading" role="tab" id="headingThree" class="panelHeading">
        <h4 class="panel-title">
            <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                <i class="more-less glyphicon glyphicon-plus" style="color:white"></i>
                Kakve su moje obaveze kao člana UMPCG-a?
            </a>
        </h4>
    </div>
    <div id="collapseThree" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingThree">
        <div class="panel-body">
            Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid single-origin coffee nulla assumenda shoreditch et. Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred nesciunt sapiente ea proident. Ad vegan excepteur butcher vice lomo. Leggings occaecat craft beer farm-to-table, raw denim aesthetic synth nesciunt you probably haven't heard of them accusamus labore sustainable VHS.
        </div>
    </div>
</div>

</div><!-- panel-group -->

</section>

<section>
    <form action="">
        <div class="contactForm">
            <div>
                <input type="text" placeholder="Ime i prezime">
                <input type="text" placeholder="JMBG">
                <input type="text" placeholder="Mjesto Prebivalista">
                <input type="text" placeholder="Telefon">
                <input type="email" placeholder="E-mail">
                <input id="fileInput" type="file">
            </div>
            <div>
                <input type="text" placeholder="Naziv firme">
                <input type="text" placeholder="PIB">
                <input type="text" placeholder="Datum osnivanja">
                <input type="text" placeholder="Adresa firme">
                <input type="text" placeholder="Web adresa">
                <input type="text" placeholder="Osnovna djelatnost">
                <input type="text" placeholder="Oblik organizacije">
            </div>
        </div>
        <div id="submitBtn">
             <button type="submit">POŠALJI ZAHTJEV</button>
        </div>
    </form>
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