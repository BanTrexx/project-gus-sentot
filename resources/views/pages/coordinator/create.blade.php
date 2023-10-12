@extends('adminlte::page')

@section('title', 'Admin | Coordinator')

@section('content_header')
    <h1>Tambah Data Koordinator</h1>
@stop

@section('content')
    <p>Silakan isikan form berikut</p>

    <div class="col-lg-6">
      <form method="post" action="/coordinator">
        @csrf
          <div class="form-group">
            <label for="nik">NIK</label>
            <input type="number" class="form-control @error('nik') is-invalid @enderror" id="nik" name="nik" required value="{{ old('nik') }}">
          </div>
          <div class="form-group">
              <label for="coordinator_id">Desa</label>
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
              @error('village_id')
              <span class="text-danger">{{ $message }}</span>
              @enderror
          </div>
          <button type="submit" class="btn btn-primary">Tambah Koordinator</button>
      </form>
    </div>


@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
@stop

@section('js')
    <script> console.log('Hi!'); </script>
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
    <script>
        $(document).ready(function () {
            $('#village_id').select2();
        });
    </script>
@stop
