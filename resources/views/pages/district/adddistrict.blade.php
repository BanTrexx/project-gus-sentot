@extends('adminlte::page')

@section('title', 'Admin | Village')

@section('content_header')
    <h1>Tambah Data Kecamatan</h1>
@stop

@section('content')
    <p>Silakan isikan form berikut</p>

    <form action="#">
        <div class="form-group">
          <label for="district-name">Nama Kecamatan</label>
          <input type="text" class="form-control" id="district-name" placeholder="silahkan input nama Kecamatan">
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>

    
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    <script> console.log('Hi!'); </script>
@stop