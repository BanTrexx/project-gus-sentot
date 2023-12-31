@extends('adminlte::page')

@section('title', 'Admin | Desa')

@section('content_header')
    <h1>Daftar Desa</h1>
@stop

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">

                        <a href="/village/create">
                            <button type="button" class="btn btn-primary mb-3">Tambah Data Desa</button>
                        </a>

                        @if(session()->has('success'))
                            <div class="alert alert-success" role="alert">
                                <i class="fas fa-check-circle mr-2"></i>
                                {{ session('success') }}
                            </div>
                        @endif

                        <table @if(count($villages) > 0) id="myTable" @endif class="table">
                            <thead class="thead-dark">
                            <tr>
                                <th scope="col">No</th>
                                <th scope="col">Desa</th>
                                <th scope="col">Kecamatan</th>
                                <th scope="col">Jumlah Koordinator</th>
                                <th scope="col">Jumlah Pendukung</th>
                                @can('edit')
                                    <th scope="col">Edit</th>
                                @endcan
                                <th scope="col">Hapus</th>
                            </tr>
                            </thead>
                            <tbody>
                            @php($no = 1)
                            @forelse ($villages as $village)
                                <tr>
                                    <th scope="row">{{ $no++ }}</th>
                                    <td>{{ $village->name }}</td>
                                    <td>{{ $village->district?->name }}</td>
                                    <td>{{ $village->coordinator_count }}</td>
                                    <td>{{ $village->supporter_count }}</td>
                                    @can('edit')
                                        <td>
                                            <a href="/village/{{ $village->id }}/edit" style="color: black">
                                                <i class="far fa-edit" style="cursor: pointer;"></i>
                                            </a>
                                        </td>
                                    @endcan
                                    <td>
                                        <form action="{{ route('village.destroy', $village) }}" method="POST">
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
                    </div>
                </div>
            </div>
        </div>
    </div>
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
    <link rel="stylesheet" href="//cdn.datatables.net/1.13.6/css/jquery.dataTables.min.css">
@stop

@section('js')
    <script> console.log('Hi!'); </script>

    <script src="//cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>

    <script>
        let table = new DataTable('#myTable');
    </script>
@stop
