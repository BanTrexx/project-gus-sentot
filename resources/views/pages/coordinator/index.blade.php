@extends('adminlte::page')

@section('title', 'Admin | Koordinator')

@section('content_header')
    <h1>Daftar Koordinator</h1>
@stop

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">

                        <a href="/coordinator/create">
                            <button type="button" class="btn btn-primary mb-3">Tambah Data Koordinator</button>
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
                                <th scope="col">Desa</th>
                                <th scope="col">Alamat</th>
                                <th scope="col">No. HP</th>
                                @can('edit')
                                    <th scope="col">Edit</th>
                                @endcan
                                <th scope="col">Hapus</th>
                            </tr>
                            </thead>
                            <tbody>
                            @php
                                $no = ($coordinators->currentPage() - 1) * $coordinators->perPage() + 1;
                            @endphp
                            @forelse ($coordinators as $coordinator)
                                <tr>
                                    <th scope="row">{{ $no++ }}</th>
                                    <td>{{ $coordinator->nik }}</td>
                                    <td>{{ $coordinator->name }}</td>
                                    <td>{{ $coordinator->village?->name }}</td>
                                    <td>{{ $coordinator->address }}</td>
                                    <td>{{ $coordinator->phone_number }}</td>
                                    @can('edit')
                                        <td>
                                            <a href="/coordinator/{{ $coordinator->id }}/edit" style="color: black">
                                                <i class="far fa-edit" style="cursor: pointer;"></i>
                                            </a>
                                        </td>
                                    @endcan
                                    <td>
                                        <form action="{{ route('coordinator.destroy', $coordinator) }}" method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="fas fa-trash" style="color: #ff0000; cursor: pointer; border:none; background:transparent;"></button>
                                        </form>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="7" class="text-center">Data tidak tersedia.</td>
                                </tr>
                            @endforelse
                            </tbody>
                        </table>

                        <div class="mt-2 d-flex justify-content-end">
                            {!! $coordinators->links('pagination::bootstrap-5') !!}
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
