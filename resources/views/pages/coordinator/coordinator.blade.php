@extends('adminlte::page')

@section('title', 'Admin | Coordinator')

@section('content_header')
    <h1>Coordinator Page</h1>
@stop

@section('content')
    <p>Welcome to coordinator page!</p>

    <a href="/coordinator/add">
        <button type="button" class="btn btn-primary mb-3">Tambah Data Koordinator</button>
    </a>

    <table class="table">
        <thead class="thead-dark">
          <tr>
            <th scope="col">No</th>
            <th scope="col">NIK</th>
            <th scope="col">Nama</th>
            <th scope="col">Desa</th>
            <th scope="col">Alamat</th>
            <th scope="col">Edit</th>
            <th scope="col">Hapus</th>
          </tr>  
        </thead>
        <tbody>
          @php($no = 1)
          @foreach ($coordinators as $coordinator)    
            <tr>
              <th scope="row">{{ $no++ }}</th>
              <td>{{ $coordinator->nik }}</td>
              <td>{{ $coordinator->name }}</td>
              <td>{{ $coordinator->village->name }}</td>
              <td>{{ $coordinator->address }}</td>
              <td>
                <i class="far fa-edit" style="cursor: pointer;"></i>
              </td>
              <td>
                <i class="fas fa-trash" style="color: #ff0000; cursor: pointer;"></i>
              </td>
            </tr>
          @endforeach
        </tbody>
    </table>
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    <script> console.log('Hi!'); </script>
@stop