@extends('adminlte::page')

@section('title', 'Admin | Village')

@section('content_header')
    <h1>Tambah Data Koordinator</h1>
@stop

@section('content')
    <p>Silakan isikan form berikut</p>

    <div class="col-lg-6">
      <form method="post" action="/coordinator">
        @csrf
          <div class="form-group">
            <label for="name">Nama Koordinator</label>
            <input type="text" class="form-control" id="name" placeholder="silahkan input nama Koordinator" name="name" required autofocus value="{{ old('name') }}">
          </div>
          <div class="form-group">
            <label for="nik">NIK</label>
            <input type="number" class="form-control @error('nik') is-invalid @enderror" id="nik" name="nik" required value="{{ old('nik') }}">
          </div>
          <div class="form-group">
              <label for="address">Alamat</label>
              <input type="text" class="form-control" id="address" name="address" placeholder="silahkan input alamat Koordinator" required value="{{ old('address') }}">
          </div>
          <div class="form-group">
              <label for="address">Email</label>
              <input type="text" class="form-control" id="email" name="email" placeholder="silahkan input email Koordinator" required value="{{ old('email') }}">
          </div>
          <div class="form-group">
              <label for="address">Password</label>
              <input type="password" class="form-control" id="password" name="password" placeholder="silahkan input password Koordinator" required value="{{ old('password') }}">
          </div>
          <div class="form-group">
              <label for="address">Konfirmasi Password</label>
              <input type="password" class="form-control" id="password_confirmation" name="password_confirmation" placeholder="silahkan input password Koordinator" required value="{{ old('password_confirmation') }}">
          </div>
          <div class="form-group">
              <label for="village_id">Desa</label>
              <select class="form-control" id="village_id" name="village_id">
                <option value="null">-- silahkan pilih desa --</option>
                @foreach ($villages as $village)
                  @if(old('village_id') == $village->id)
                    <option value="{{ $village->id }}" selected>{{ $village->name }}</option>
                  @else
                    <option value="{{ $village->id }}">{{ $village->name }}</option>
                  @endif
                @endforeach
              </select>
          </div>
          <button type="submit" class="btn btn-primary">Tambah Koordinator</button>
      </form>
    </div>


@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    <script> console.log('Hi!'); </script>
@stop
