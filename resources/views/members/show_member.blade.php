@extends('layouts.app')
@section('members')

    <table class="table table-striped">
    <thead>
      <tr>
        <th>#</th>
        <th class="th-lg">Ime</th>
        <th class="th-lg">Prezime</th>
        <th class="th-lg">Jmbg</th>
        <th class="th-lg">Mjesto prebivalista</th>
        <th class="th-lg">Telefon</th>
        <th class="th-lg">E-mail</th>
        <th class="th-lg">Logo</th>
        <th class="th-lg">Naziv firme</th>
        <th class="th-lg">Pib</th>
        <th class="th-lg">Datum osnivanja</th>
        <th class="th-lg">Adresa firme</th>
        <th class="th-lg">Web adresa</th>
        <th class="th-lg">Osnovna djelatnost</th>
        <th class="th-lg">Oblik organizacije</th>
        <th class="th-lg">Opis</th>
        <th class="th-lg">Facebook stranica</th>
        <th class="th-lg">Instagram stranica</th>
        <th class="th-lg">Status</th>
        <th class="th-lg">Akcija</th>
        <th class="th-lg">Obriši</th>
      </tr>
    </thead>
    <tbody>
    @foreach($members as $member)
      <tr>
      <th scope="row">{{$member->id}}</th>
        <td>{{$member->firstname}}</td>
        <td>{{$member->lastname}}</td>
        <td>{{$member->jmbg}}</td>
        <td>{{$member->place}}</td>
        <td>{{$member->phone}}</td>
        <td>{{$member->email}}</td>
        <td>  <img id="" src="/storage/cover_images/{{$member->image}}" style="width:100px;"></td>
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
        <td>
        <form method="post" action="/update/{{$member->id}}">
            {{ csrf_field() }}
                <div class="form-group">
                    <select name="approve">
                        <option value="0" @if($member->status==0)selected @endif>Na cekanju</option>
                        <option value="1" @if($member->status==1)selected @endif>Odobri</option>
                        <option value="2" @if($member->status==2)selected @endif>Odbij</option>
                        <option value="3" @if($member->status==3)selected @endif>Odlozi</option> 
                    </select>
                </div>
                <div class="form-group ">
                <button type="submit" class="btn btn-success">Update</button>
                </div>
            </form>
        </td>
        <td>
          
        {!!Form::open(['action' => ['MembersController@destroy', $member->id], 'method' => 'POST', 'class' => 'pull-right'])!!}
                {{Form::hidden('_method', 'DELETE')}}
                {{Form::submit('Obriši', ['class' => 'btn btn-danger'])}}
            {!!Form::close()!!}
        </td>
      </tr>
      @endforeach
    </tbody>
  </table>
 @endsection