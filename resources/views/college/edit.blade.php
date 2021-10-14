@extends('layouts.master')

@section('content')
<form action="{{route('college.update', $college->id)}}" method="POST">
    @csrf
    @method('patch')
    <div class="container">
        <label for="">Asal Kota</label>
        <select class="form-select" name="city_id" aria-label="Default select example">
            <option selected>Open this select menu</option>
            @foreach ($cities as $city)
            <option value="{{$city->id}}" @if($city->city_name == $college->city->city_name) selected @endif >{{$city->city_name}}</option>
            @endforeach
        </select>
        <div class="mb-3">
            <label for="exampleFormControlInput1" class="form-label">Nama Kampus</label>
            <input type="text" class="form-control" value="{{$college->college_name}}" name="college_name" id="exampleFormControlInput1">
        </div>
        <button type="submit" class="btn btn-success ">Kirim</button>
    </div>
</form>
    @endsection