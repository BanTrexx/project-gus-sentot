@extends('adminlte::page')

@section('title', 'Admin | Village')

@section('content_header')
    <h1>Ubah Data Kecamatan</h1>
@stop

@section('content')
    <p>Silakan isikan form berikut</p>

    <form method="post" action="/district/{{ $district->id }}">
        @method('PUT')
        @csrf
        <div class="col-lg-6">
            <div class="form-group">
              <label for="name">Nama Kecamatan</label>
              <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" placeholder="silahkan input nama Kecamatan" name="name" required autofocus value="{{ old('name', $district->name) }}">
              @error('name')
              <div class="invalid-feedback">{{ $message }}</div>
              @enderror
            </div>
            <button type="submit" class="btn btn-primary">Ubah Kecamatan</button>
        </div>
    </form>

    
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    <script> console.log('Hi!'); </script>
@stop