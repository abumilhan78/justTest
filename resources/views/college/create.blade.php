@extends('layouts.master')

@section('content')
<form action="{{route('college.store')}}" method="post">
    @csrf
    {{ method_field('POST') }}
    <div class="container">
        <label for="">Asal Kota</label>
        <select class="form-select" name="city_id" aria-label="Default select example">
            <option selected>Open this select menu</option>
            @foreach ($cities as $city)
            <option value="{{$city->id}}">{{$city->city_name}}</option>
            @endforeach
        </select>
        <div class="mb-3">
            <label for="exampleFormControlInput1" class="form-label">Nama Kampus</label>
            <input type="text" class="form-control" name="college_name" id="exampleFormControlInput1">
        </div>
        <button type="submit" class="btn btn-success ">Kirim</button>
    </div>
</form>
    @endsection