@extends('layouts.app')
@section('content')

<div class="container">
    <br />
    <table class="table table-striped">
    <thead>
      <tr>
        <th>ID</th>
        <th>Ime</th>
        <th>Prezime</th>
        <th>Jmbg</th>
        <th>Mjesto prebivalista</th>
        <th>Telefon</th>
        <th>E-mail</th>
        <th>Logo</th>
        <th>Naziv firme</th>
        <th>Pib</th>
        <th>Datum osnivanja</th>
        <th>Adresa firme</th>
        <th>Web adresa</th>
        <th>Osnovna djelatnost</th>
        <th>Oblik organizacije</th>
        <th>Opis</th>
        <th>Facebook stranica</th>
        <th>Instagram stranica</th>
        <th>Status</th>
        <th>Akcija</th>
      </tr>
    </thead>
    <tbody>
    @foreach($members as $member)
      <tr>
        <td>{{$member->id}}</td>
        <td>{{$member->firstname}}</td>
        <td>{{$member->lastname}}</td>
        <td>{{$member->jmbg}}</td>
        <td>{{$member->place}}</td>
        <td>{{$member->phone}}</td>
        <td>{{$member->email}}</td>
        <td>  <img id="" src="/storage/cover_images/{{$member->image}}"></td>
        <td>{{$member->company}}</td>
        <td>{{$member->pib}}</td>
        <td>{{$member->date}}</td>
        <td>{{$member->address}}</td>
        <td>{{$member->web}}</td>
        <td>{{$member->work}}</td>
        <td>{{$member->organization}}</td>
        <td>{{$member->description}}</td>
        <td>{{$member->facebook}}</td>
        <td>{{$member->instagram}}</td>
        <td>
        @if($member->status == 0)
        <span class="label label-primary">Na cekanju</span>
        @elseif($member->status == 1)
        <span class="label label-success">Odobreno</span>
        @elseif($member->status == 2)
        <span class="label label-danger">Odbijeno</span>
        @else
        <span class="label label-info">Postponed</span>
       @endif
        </td>
        <td><a href="{{action('MembersController@edit', $member->id)}}" class="btn btn-warning">Promijeni status</a></td>
      </tr>
      @endforeach
    </tbody>
  </table>
  </div>
 @endsection