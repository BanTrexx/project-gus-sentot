@extends('adminlte::page')

@section('title', 'Admin | Responsible')

@section('content_header')
    <h1>Tambah Data Penanggung Jawab</h1>
@stop

@section('content')
    <p>Silakan isikan form berikut</p>

    <div class="col-lg-6">
        <form method="post" action="/responsible">
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
                <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name" required
                       autofocus value="{{ old('name') }}">
                @error('name')
                <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>
            <div class="form-group">
                <label for="nik">Alamat <span style="color:#ff0000">*</span></label>
                <input type="text" class="form-control @error('address') is-invalid @enderror" id="address" name="address" required
                       autofocus value="{{ old('address') }}">
                @error('address')
                <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>
            <div class="form-group">
                <label for="nik">No. HP <span style="color:#ff0000">*</span></label>
                <input type="number" class="form-control @error('phone_number') is-invalid @enderror" id="phone_number" name="phone_number" required
                       autofocus value="{{ old('phone_number') }}">
                @error('phone_number')
                <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>
            <div class="form-group">
                <label for="">Koordinator <span style="color:#ff0000">*</span></label>
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
            <button type="submit" class="btn btn-primary">Tambah Penanggung Jawab</button>
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
            $('#coordinator_id').select2();
        });
    </script>
@stop
