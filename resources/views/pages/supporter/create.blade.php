@extends('adminlte::page')

@section('title', 'Admin | Supporter')

@section('content_header')
    <h1>Supporter Data Desa</h1>
@stop

@section('content')
    <p>Silakan isikan form berikut</p>

    <div class="col-lg-6">
      <form method="post" action="/village">
        @csrf
          <div class="form-group">
            <label for="name">Nama Desa</label>
            <input type="text" class="form-control" id="name" name="name" placeholder="silahkan input nama desa" required autofocus value="{{ old('name') }}">
          </div>
          <div class="form-group">
              <label for="district_id">Kecamatan</label>
              <select class="form-control" id="district_id" name="district_id">
                <option value="null">-- silahkan pilih kecamatan --</option>
                @foreach ($districts as $district)
                  @if(old('district_id') == $district->id)
                    <option value="{{ $district->id }}" selected>{{ $district->name }}</option>
                  @else
                    <option value="{{ $district->id }}">{{ $district->name }}</option>
                  @endif
                @endforeach
              </select>
          </div>
          <button type="submit" class="btn btn-primary">Tambah Desa</button>
      </form>
    </div>
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    <script> console.log('Hi!'); </script>
@stop
