@extends('adminlte::page')

@section('title', 'Admin | Village')

@section('content_header')
    <h1>Ubah Data Koordinator</h1>
@stop

@section('content')
    <p>Silakan isikan form berikut</p>

    <div class="col-lg-6">
      <form method="post" action="/coordinator/{{ $coordinator->id }}">
        @method('put')
        @csrf
          <div class="form-group">
            <label for="name">Nama Koordinator</label>
            <input type="text" class="form-control" id="name" placeholder="silahkan input nama Koordinator" name="name" required autofocus value="{{ old('name', $coordinator->name) }}">
          </div>
          <div class="form-group">
            <label for="nik">NIK</label>
            <input type="number" class="form-control @error('nik') is-invalid @enderror" id="nik" name="nik" required value="{{ old('nik', $coordinator->nik) }}">
          </div>
          <div class="form-group">
              <label for="address">Alamat</label>
              <input type="text" class="form-control" id="address" name="address" placeholder="silahkan input alamat Koordinator" required value="{{ old('address', $coordinator->address) }}">
            </div>
          <div class="form-group">
              <label for="village_id">Desa</label>
              <select class="form-control" id="village_id" name="village_id">
                <option value="null">-- silahkan pilih desa --</option>
                @foreach ($villages as $village)
                  @if(old('village_id', $coordinator->village_id) == $village->id)
                    <option value="{{ $village->id }}" selected>{{ $village->name }}</option>
                  @else
                    <option value="{{ $village->id }}">{{ $village->name }}</option>
                  @endif
                @endforeach
              </select>
          </div>
          <button type="submit" class="btn btn-primary">Ubah Koordinator</button>
      </form>
    </div>


@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    <script> console.log('Hi!'); </script>
@stop
