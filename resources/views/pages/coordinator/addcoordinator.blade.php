@extends('adminlte::page')

@section('title', 'Admin | Village')

@section('content_header')
    <h1>Tambah Data Koordinator</h1>
@stop

@section('content')
    <p>Silakan isikan form berikut</p>

    <form action="#">
        <div class="form-group">
          <label for="coordinator-name">Nama Koordinator</label>
          <input type="text" class="form-control" id="coordinator-name" placeholder="silahkan input nama Koordinator">
        </div>
        <div class="form-group">
          <label for="nik">NIK</label>
          <input type="number" class="form-control" id="nik">
        </div>
        <div class="form-group">
            <label for="address">Alamat</label>
            <input type="text" class="form-control" id="address" placeholder="silahkan input alamat Koordinator">
          </div>
        <div class="form-group">
            <label for="village">Desa</label>
            <select class="form-control" id="village">
              <option>-- silahkan pilih desa --</option>
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