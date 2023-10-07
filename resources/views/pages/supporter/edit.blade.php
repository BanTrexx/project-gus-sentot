@extends('adminlte::page')

@section('title', 'Admin | Supporter')

@section('content_header')
    <h1>Ubah Data Pendukung</h1>
@stop

@section('content')
    <p>Silakan isikan form berikut</p>

    <div class="col-lg-6">
        <form method="post" action="{{ route('supporter.update', $supporter) }}">
            @method('put')
            @csrf
            <div class="form-group">
                <label for="name">Nama Pendukung</label>
                <input type="text" class="form-control" id="name" name="name" placeholder="silahkan input nama pendukung" required autofocus value="{{ old('name', $supporter->name) }}">
                @error('name')
                <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>
            <div class="form-group">
                <label for="nik">NIK</label>
                <input type="text" class="form-control" id="nik" name="nik" placeholder="silahkan input NIK" required autofocus value="{{ old('nik', $supporter->nik) }}">
                @error('nik')
                <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>
            <div class="form-group">
                <label for="dpt_tps">DPT/TPS</label>
                <input type="text" class="form-control" id="dpt_tps" name="dpt_tps" placeholder="silahkan input DPT/TPS" required autofocus value="{{ old('dpt_tps', $supporter->dpt_tps) }}">
                @error('dpt_tps')
                <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>
            <div class="form-group">
                <label for="address">Alamat</label>
                <input type="text" class="form-control" id="address" name="address" placeholder="silahkan input alamat pendukung" required autofocus value="{{ old('address', $supporter->address) }}">
                @error('address')
                <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>
            <div class="form-group">
                <label for="coordinator_id">Penanggung Jawab</label>
                <select class="form-control" id="responsible_id" name="responsible_id">
                    <option value="null">-- silahkan pilih penanggung jawab --</option>
                    @foreach ($responsibles as $responsible)
                        @if(old('coordinator_id', $supporter->responsible_id) == $responsible->id)
                            <option value="{{ $responsible->id }}" selected>{{ $responsible->name }}</option>
                        @else
                            <option value="{{ $responsible->id }}">{{ $responsible->name }}</option>
                        @endif
                    @endforeach
                </select>
                @error('coordinator_id')
                <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>
            <button type="submit" class="btn btn-primary">Ubah Pendukung</button>
        </form>
    </div>
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    <script> console.log('Hi!'); </script>
@stop
