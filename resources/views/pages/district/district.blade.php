@extends('adminlte::page')

@section('title', 'Admin | District')

@section('content_header')
    <h1>District Page</h1>
@stop

@section('content')
    <p>Welcome to district page!</p>

    <a href="/district/create">
        <button type="button" class="btn btn-primary mb-3">Tambah Data Kecamatan</button>
    </a>

    @if(session()->has('success'))
      <div class="alert alert-success" role="alert">
        <i class="fas fa-check-circle mr-2"></i>
        {{ session('success') }}
      </div>
    @endif

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
                <a href="/district/{{ $district->id }}/edit" style="color: black">
                  <i class="far fa-edit" style="cursor: pointer;"></i>
                </a>
              </td>
              <td>
                <form action="#" method="">
                  <button style="border: none; background: transparent;" onclick="return confirm('Apakah Anda Yakin Ingin Menghapus?')">
                    <i class="fas fa-trash" style="color: #ff0000; cursor: pointer;"></i>
                  </button>
                </form>
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