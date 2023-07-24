@extends('adminlte::page')

@section('title', 'Admin | District')

@section('content_header')
    <h1>District Page</h1>
@stop

@section('content')
    <p>Welcome to district page!</p>

    <a href="/district/add">
        <button type="button" class="btn btn-primary mb-3">Tambah Data Kecamatan</button>
    </a>

    <table class="table">
        <thead class="thead-dark">
          <tr>
            <th scope="col">No</th>
            <th scope="col">Kecamatan</th>
            <th scope="col">Edit</th>
            <th scope="col">Hapus</th>
          </tr>  
        </thead>
        <tbody>
          @php($no = 1)
          @foreach ($districts as $district)    
            <tr>
              <th scope="row">{{ $no++ }}</th>
              <td>{{ $district->name }}</td>
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