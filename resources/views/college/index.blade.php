@extends('layouts.master')

@section('content')
    <div class="container">
        <a href="{{route('college.create')}}" class="btn btn-primary">+ Tambah Data Kampus</a>
        <table class="table">
            <thead>
              <tr>
                <th scope="col">No</th>
                <th scope="col">Asal Kota</th>
                <th scope="col">Nama Kampus</th>
                <th scope="col">Aksi</th>
              </tr>
            </thead>
            <tbody>
                @foreach ($colleges as $college)
                    
                <tr>
                    <th scope="row">{{$loop->iteration}}</th>
                    <td>{{$college->city->city_name}}</td>
                    <td>{{ $college->college_name }}</td>
                    <td>
                        <a href="{{route('college.edit', $college->id)}}" class="btn btn-primary">Edit</a>
                        <form action="{{route('college.destroy', $college->id)}}" method="post" class="d-inline">
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