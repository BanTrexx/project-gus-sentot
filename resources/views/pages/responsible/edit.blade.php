@extends('adminlte::page')

@section('title', 'Admin | Responsible')

@section('content_header')
    <h1>Ubah Data Penanggung Jawab</h1>
@stop

@section('content')
    <p>Silakan isikan form berikut</p>

    <div class="col-lg-6">
        <form method="post" action="{{ route('responsible.update', $responsible) }}">
            @method('put')
            @csrf
            <div class="form-group">
                <label for="nik">NIK</label>
                <input type="text" class="form-control @error('nik') is-invalid @enderror" id="nik" name="nik" value="{{ old('nik', $responsible->nik) }}">
                @error('nik')
                <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>
            <div class="form-group">
                <label for="name">Nama <span style="color:#ff0000">*</span></label>
                <input type="text" class="form-control @error('nik') is-invalid @enderror" id="name" name="name" required value="{{ old('name', $responsible->name) }}">
                @error('name')
                <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>
            <div class="form-group">
                <label for="address">Alamat <span style="color:#ff0000">*</span></label>
                <input type="text" class="form-control @error('address') is-invalid @enderror" id="address" name="address" required value="{{ old('address', $responsible->address) }}">
                @error('address')
                <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>
            <div class="form-group">
                <label for="nik">No. HP <span style="color:#ff0000">*</span></label>
                <input type="number" class="form-control @error('phone_number') is-invalid @enderror" id="phone_number" name="phone_number" required value="{{ old('phone_number') }}">
                @error('phone_number')
                <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>
            <div class="form-group">
                <label for="coordinator_id">Koordinator <span style="color:#ff0000">*</span></label>
                <select class="form-control" id="coordinator_id" name="coordinator_id">
                    <option value="null">-- silahkan pilih coordinator --</option>
                    @foreach ($coordinators as $coordinator)
                        @if(old('coordinator_id', $responsible->coordinator_id) == $coordinator->id)
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
            <button type="submit" class="btn btn-primary">Ubah Penanggung Jawab</button>
        </form>
    </div>
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    <script> console.log('Hi!'); </script>
@stop
