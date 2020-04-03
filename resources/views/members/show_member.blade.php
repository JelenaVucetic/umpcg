@extends('layouts.app')

@section('fixed-column-script')
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-mousewheel/3.1.13/jquery.mousewheel.min.js"></script>
<script src="/js/dataTables.js"></script>
<script src="/js/dataTables-fixedColumn.js"></script>
@endsection

@section('members')
@include('inc.admin_nav')

<div class="searchMembers container-fluid">
  <label>Pretraži</label>
  <input type="text" id="myInputTextField">
</div>
<div class="container">

<div class="wrapper1">
  <div class="div1">
  </div>
</div>

<div class="wrapper2">
  <div class="div2">
    <table id="example" class="membersTable table">
    <thead>
      <tr>
        <th>#</th>
        <th class="th-lg">Logo</th>
        <th class="th-lg">Ime</th>
        <th class="th-lg">Prezime</th>
        <th class="th-lg">Jmbg</th>
        <th class="th-lg">Prebivalište</th>
        <th class="th-lg">Telefon</th>
        <th class="th-lg">E-mail</th>
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
        <th class="th-lg fixed-side" scope="col">Izmijeni</th>
        <th class="th-lg">Obriši</th>
      </tr>
    </thead>
    <tbody>
    @php $i=1; @endphp
    @foreach($members as $member)
      <tr>
      <th scope="row">@php echo $i; @endphp</th>
        <td><img id="" src="/img/{{$member->image}}" style="width:100px;"></td>
        <td>{{$member->firstname}}</td>
        <td>{{$member->lastname}}</td>
        <td>{{$member->jmbg}}</td>
        <td>{{$member->place}}</td>
        <td>{{$member->phone}}</td>
        <td>{{$member->email}}</td>
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
        <a href="/members/edit/{{$member->id}}" class="btn btn-default fixed-side">Izmjeni</a>
        </td>
        <td>
          
        {!!Form::open(['action' => ['MembersController@destroy', $member->id], 'method' => 'POST', 'class' => 'pull-right'])!!}
                {{Form::hidden('_method', 'DELETE')}}
                {{Form::submit('Obriši', ['class' => 'btn btn-danger'])}}
            {!!Form::close()!!}
        </td>
      </tr>
      @php $i++; @endphp
      @endforeach
    </tbody>
  </table>
  </div>
</div>
  
</div>

 @endsection