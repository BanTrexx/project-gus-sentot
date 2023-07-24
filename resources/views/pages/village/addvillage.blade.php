@extends('adminlte::page')

@section('title', 'Admin | Village')

@section('content_header')
    <h1>Tambah Data Desa</h1>
@stop

@section('content')
    <p>Silakan isikan form berikut</p>

    <form action="#">
        <div class="form-group">
          <label for="village-name">Nama Desa</label>
          <input type="text" class="form-control" id="village-name" placeholder="silahkan input nama desa">
        </div>
        <div class="form-group">
            <label for="district">Kecamatan</label>
            <select class="form-control" id="district">
              <option>-- silahkan pilih kecamatan --</option>
              <option>Diwek</option>
              <option>Denanyar</option>
              <option>Mojoagung</option>
              <option>Peterongan</option>
            </select>
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