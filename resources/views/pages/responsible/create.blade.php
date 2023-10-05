@extends('adminlte::page')

@section('title', 'Admin | Supporter')

@section('content_header')
    <h1>Tambah Data Penanggungjawab</h1>
@stop

@section('content')
    <p>Silakan isikan form berikut</p>

    <div class="col-lg-6">
        <form method="post" action="/supporter">
            @csrf
            <div class="form-group">
                <label for="nik">NIK</label>
                <input type="text" class="form-control" id="nik" name="nik" placeholder="silahkan input NIK" required
                       autofocus value="{{ old('nik') }}">
                @error('nik')
                <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>

            <div class="form-group">
                <label for="address">Alamat</label>
                <input type="text" class="form-control" id="address" name="address"
                       placeholder="silahkan input alamat pendukung" required autofocus value="{{ old('address') }}">
                @error('address')
                <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>
            <div class="form-group">
                <label for="coordinator_id">Koordinator</label>
                <select class="form-control" id="coordinator_id" name="coordinator_id">
                    <option value="null">-- silahkan pilih coordinator --</option>
                    @foreach ($coordinators as $coordinator)
                        @if(old('coordinator_id') == $coordinator->id)
                            <option value="{{ $coordinator->id }}" selected>{{ $coordinator->name }}</option>
                        @else
                            <option value="{{ $coordinator->id }}">{{ $coordinator->name }}</option>
                        @endif
                    @endforeach
                </select>
                @error('coordinator_id')
                <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>
            <button type="submit" class="btn btn-primary">Tambah Pendukung</button>
        </form>
    </div>
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    <script> console.log('Hi!'); </script>
@stop