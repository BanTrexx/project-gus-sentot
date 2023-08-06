@extends('adminlte::page')

@section('title', 'Admin | Supporter')

@section('content_header')
    <h1>Supporter Page</h1>
@stop

@section('content')
    <p>Welcome to supporter page!</p>

    <a href="/supporter/create">
        <button type="button" class="btn btn-primary mb-3">Tambah Data Pendukung</button>
    </a>

    @if(session()->has('success'))
      <div class="alert alert-success" role="alert">
        <i class="fas fa-check-circle mr-2"></i>
        {{ session('success') }}
      </div>
    @endif

    <table class="table">
        <thead class="thead-dark">
        <tr>
            <th scope="col">No</th>
            <th scope="col">NIK</th>
            <th scope="col">Nama</th>
            <th scope="col">Alamat</th>
            <th scope="col">DPT/TPS</th>
            <th scope="col">Koordinator</th>
            <th scope="col">Edit</th>
            <th scope="col">Hapus</th>
        </tr>
        </thead>
        <tbody>
        @php($no = 1)
        @forelse ($supporters as $supporter)
            <tr>
                <th scope="row">{{ $no++ }}</th>
                <td>{{ $supporter->nik }}</td>
                <td>{{ $supporter->name }}</td>
                <td>{{ $supporter->address }}</td>
                <td>{{ $supporter->dpt_tps }}</td>
                <td>{{ $supporter->coordinator->name }}</td>
                <td>
                    <a href="{{ route('supporter.edit', $supporter) }}" style="color: black">
                        <i class="far fa-edit" style="cursor: pointer;"></i>
                    </a>
                </td>
                <td>
                    <form action="{{ route('supporter.destroy', $supporter) }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="fas fa-trash" style="color: #ff0000; cursor: pointer; border:none; background:transparent;"></button>
                    </form>
                </td>
            </tr>
        @empty
            <tr>
                <td colspan="8" class="text-center">Data tidak tersedia.</td>
            </tr>
        @endforelse
        </tbody>
    </table>
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    <script> console.log('Hi!'); </script>
@stop
