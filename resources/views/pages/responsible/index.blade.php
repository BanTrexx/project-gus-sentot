@extends('adminlte::page')

@section('title', 'Admin | Penanggung Jawab')

@section('content_header')
    <h1>Daftar Penanggung Jawab</h1>
@stop

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">

                        <a href="/responsible/create">
                            <button type="button" class="btn btn-primary mb-3">Tambah Data</button>
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
                                <th scope="col">No. HP</th>
                                <th scope="col">Koordinator</th>
                                <th scope="col">Edit</th>
                                <th scope="col">Hapus</th>
                            </tr>
                            </thead>
                            <tbody>
                            @php
                                $no = ($responsibles->currentPage() - 1) * $responsibles->perPage() + 1;
                            @endphp
                            @forelse ($responsibles as $responsible)
                                <tr>
                                    <th scope="row">{{ $no++ }}</th>
                                    <td>{{ $responsible->nik }}</td>
                                    <td>{{ $responsible->name }}</td>
                                    <td>{{ $responsible->address }}</td>
                                    <td>{{ $responsible->phone_number }}</td>
                                    <td>{{ $responsible->coordinator->name }}</td>
                                    @can('edit')
                                        <td>
                                            <a href="{{ route('responsible.edit', $responsible) }}" style="color: black">
                                                <i class="far fa-edit" style="cursor: pointer;"></i>
                                            </a>
                                        </td>
                                    @endcan
                                    <td>
                                        <form action="{{ route('responsible.destroy', $responsible) }}" method="POST">
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
                            {!! $responsibles->links('pagination::bootstrap-5') !!}
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

    <script>
        const myModal = document.getElementById('myModal')
        myModal.addEventListener('shown.bs.modal')
    </script>
@stop
