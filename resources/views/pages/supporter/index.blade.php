@extends('adminlte::page')

@section('title', 'Admin | Penduduk')

@section('content_header')
    <h1>Daftar Penduduk</h1>
@stop

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">

                        <a href="/supporter/create">
                            <button type="button" class="btn btn-primary mb-3">Tambah Data Penduduk</button>
                        </a>

                        <a href="{{ route('export.voter-list.index') }}" target="_blank">
                            <button type="button" class="btn btn-danger mb-3">Export PDF</button>
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
                                <th scope="col">Penanggung Jawab</th>
                                @can('edit')
                                    <th scope="col">Edit</th>
                                @endcan
                                <th scope="col">Hapus</th>
                            </tr>
                            </thead>
                            <tbody>
                            @php
                                $no = ($supporters->currentPage() - 1) * $supporters->perPage() + 1;
                            @endphp
                            @forelse ($supporters as $supporter)
                                <tr>
                                    <th scope="row">{{ $no++ }}</th>
                                    <td>{{ $supporter->nik }}</td>
                                    <td>{{ $supporter->name }}</td>
                                    <td>{{ $supporter->address }}</td>
                                    <td>{{ $supporter->dpt_tps }}</td>
                                    <td>{{ $supporter->responsible->name ?? '' }}</td>
                                    @can('edit')
                                        <td>
                                            <a href="{{ route('supporter.edit', $supporter) }}" style="color: black">
                                                <i class="far fa-edit" style="cursor: pointer;"></i>
                                            </a>
                                        </td>
                                    @endcan
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

                        <div class="mt-2 d-flex justify-content-end">
                            {!! $supporters->links('pagination::bootstrap-5') !!}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    <script> console.log('Hi!'); </script>
@stop
