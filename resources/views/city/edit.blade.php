@extends('layouts.master')

@section('content')
<form action="{{route('city.update', $city->id)}}" method="POST">
    @csrf
  @method('patch')
    <div class="container">
        
        <div class="mb-3">
            <label for="exampleFormControlInput1" class="form-label">Nama Kota</label>
            <input type="text" name="city_name" class="form-control" value="{{$city->city_name}}" id="exampleFormControlInput1">
        </div>
        <button type="submit" class="btn btn-success ">Kirim</button>
    </div>
</form>
    @endsection