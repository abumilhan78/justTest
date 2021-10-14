@extends('layouts.master')

@section('content')
    <div class="container">
        <a href="{{route('city.create')}}" class="btn btn-primary">+ Tambah Data Kota</a>
        <table class="table">
            <thead>
              <tr>
                <th scope="col">No</th>
                <th scope="col">Nama Kota</th>
                <th scope="col">Aksi</th>
              </tr>
            </thead>
            <tbody>
                @foreach ($cities as $city)
                    
                <tr>
                    <th scope="row">{{$loop->iteration}}</th>
                    <td>{{ $city->city_name }}</td>
                    <td>
                        <a href="{{route('city.edit', $city->id)}}" class="btn btn-primary">Edit</a>
                        <form action="{{route('city.destroy', $city->id)}}" method="post" class="d-inline">
                            @method('delete')
                            @csrf
                            <button type="submit" onclick="return confirm('Apakah Anda Yakin?')" class="btn btn-danger">Hapus</button>
                        </form>
                    </td>
                </tr>
                @endforeach
              
            </tbody>
          </table>
    </div>
@endsection