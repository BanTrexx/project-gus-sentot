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
              <input type="number" class="form-control @error('nik') is-invalid @enderror" id="nik" name="nik" value="{{ old('nik') }}">
              @error('nik')
              <span class="text-danger">{{ $message }}</span>
              @enderror
          </div>
          <div class="form-group">
              <label for="nik">Nama <span style="color:#ff0000">*</span></label>
              <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name" required value="{{ old('name') }}">
              @error('name')
              <span class="text-danger">{{ $message }}</span>
              @enderror
          </div>
          <div class="form-group">
              <label for="nik">Alamat</label>
              <input type="text" class="form-control @error('address') is-invalid @enderror" id="address" name="address" value="{{ old('address') }}">
              @error('address')
              <span class="text-danger">{{ $message }}</span>
              @enderror
          </div>
          <div class="form-group">
              <label for="nik">No. HP</label>
              <input type="number" class="form-control @error('phone_number') is-invalid @enderror" id="phone_number" name="phone_number" value="{{ old('phone_number') }}">
              @error('phone_number')
              <span class="text-danger">{{ $message }}</span>
              @enderror
          </div>
          <div class="form-group">
              <label for="">Desa <span style="color:#ff0000">*</span></label>
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
