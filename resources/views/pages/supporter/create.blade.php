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
                <label for="nik">NIK</label>
                <input type="text" class="form-control" id="nik" name="nik" placeholder="silahkan input NIK" required
                       autofocus value="{{ old('nik') }}">
                @error('nik')
                <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>
            <div class="form-group">
                <label for="coordinator_id">Penanggung Jawab</label>
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
