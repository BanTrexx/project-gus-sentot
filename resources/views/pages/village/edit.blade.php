@extends('adminlte::page')

@section('title', 'Admin | Village')

@section('content_header')
    <h1>Ubah Data Desa</h1>
@stop

@section('content')
    <p>Silakan isikan form berikut</p>

    <div class="col-lg-6">
      <form method="post" action="/village/{{ $village->id }}">
        @method('put')
        @csrf
          <div class="form-group">
            <label for="name">Nama Desa <span style="color:#ff0000">*</span></label>
            <input type="text" class="form-control" id="name" name="name" placeholder="silahkan input nama desa" required autofocus value="{{ old('name', $village->name) }}">
          </div>
          <div class="form-group">
              <label for="district_id">Kecamatan <span style="color:#ff0000">*</span></label>
              <select class="form-control" id="district_id" name="district_id">
                <option value="null">-- silahkan pilih kecamatan --</option>
                @foreach ($districts as $district)
                  @if(old('district_id', $village->district_id) == $district->id)
                    <option value="{{ $district->id }}" selected>{{ $district->name }}</option>
                  @else
                    <option value="{{ $district->id }}">{{ $district->name }}</option>
                  @endif
                @endforeach
              </select>
          </div>
          <button type="submit" class="btn btn-primary">Ubah Desa</button>
      </form>
    </div>
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    <script> console.log('Hi!'); </script>
@stop
