@extends('adminlte::page')

@section('title', 'Admin | Supporter')

@section('content_header')
    <h1>Tambah Data Pendukung</h1>
@stop

@section('content')
    <p>Silakan isikan form berikut</p>

    <div class="col-lg-6">
        <form method="post" action="/supporter">
            @csrf
            <div class="form-group">
                <label for="nik">Nama Pendukung <span style="color:#ff0000">*</span></label>
                <input type="text" class="form-control" id="name" name="name" required
                       autofocus value="{{ old('name') }}">
                @error('name')
                <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>
            <div class="form-group">
                <label for="nik">NIK <span style="color:#ff0000">*</span></label>
                <input type="text" class="form-control" id="nik" name="nik" required
                       autofocus value="{{ old('nik') }}">
                @error('nik')
                <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>
            <div class="form-group">
                <label for="phone_number">No. HP <span style="color:#ff0000">*</span></label>
                <input type="text" class="form-control" id="phone_number" name="phone_number" required
                       autofocus value="{{ old('phone_number') }}">
                @error('phone_number')
                <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>
            <div class="form-group">
                <label for="nik">Alamat <span style="color:#ff0000">*</span></label>
                <input type="text" class="form-control" id="address" name="address" required
                       autofocus value="{{ old('address') }}">
                @error('address')
                <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>
            <div class="form-group">
                <label for="rt">RT <span style="color:#ff0000">*</span></label>
                <input type="text" class="form-control" id="rt" name="rt" required
                       autofocus value="{{ old('rt') }}">
                @error('rt')
                <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>
            <div class="form-group">
                <label for="rw">RW <span style="color:#ff0000">*</span></label>
                <input type="text" class="form-control" id="rw" name="rw" required
                       autofocus value="{{ old('rw') }}">
                @error('rw')
                <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>
            <div class="form-group">
                <label for="rw">DPT/TPS <span style="color:#ff0000">*</span></label>
                <input type="text" class="form-control" id="dpt_tps" name="dpt_tps" required
                       autofocus value="{{ old('dpt_tps') }}">
                @error('dpt_tps')
                <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>
            <div class="form-group">
                <label for="coordinator_id">Penanggung Jawab <span style="color:#ff0000">*</span></label>
                <select class="form-control" id="responsible_id" name="responsible_id">
                    <option value="null">-- silahkan pilih penanggung jawab --</option>
                    @foreach ($responsibles as $responsible)
                        @if(old('responsible_id') == $responsible->id)
                            <option value="{{ $responsible->id }}" selected>{{ $responsible->name }}</option>
                        @else
                            <option value="{{ $responsible->id }}">{{ $responsible->name }}</option>
                        @endif
                    @endforeach
                </select>
                @error('responsible_id')
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
