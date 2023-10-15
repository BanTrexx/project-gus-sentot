@extends('adminlte::page')

@section('title', 'Admin | Desa')

@section('content_header')
    <h1>Detail Kecamatan </h1>
@stop

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Daftar Koordinator {{ $district }}</h3>
                    </div>
                    <div class="card-body">
                        <table @if(count($coordinators) > 0) id="myTable" @endif class="table">
                            <thead class="thead-dark">
                            <tr>
                                <th scope="col">No</th>
                                <th scope="col">NIK</th>
                                <th scope="col">Nama</th>
                                <th scope="col">Desa</th>
                                <th scope="col">Alamat</th>
                                <th scope="col">No. HP</th>
                                <th scope="col">Edit</th>
                                <th scope="col">Hapus</th>
                            </tr>
                            </thead>
                            <tbody>
                            @php($no = 1)
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
                    </div>
                </div>
            </div>

            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Daftar Penanggung Jawab</h3>
                    </div>
                    <div class="card-body">
                        <table @if(count($responsibles) > 0) id="responsibleTable" @endif class="table">
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
                            @php($no = 1)
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
                    </div>
                </div>
            </div>

            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Daftar Penduduk</h3>
                    </div>
                    <div class="card-body">
                        <table @if(count($supporters) > 0) id="supporterTable" @endif class="table">
                            <thead class="thead-dark">
                            <tr>
                                <th scope="col">No</th>
                                <th scope="col">NIK</th>
                                <th scope="col">Nama</th>
                                <th scope="col">Alamat</th>
                                <th scope="col">DPT/TPS</th>
                                <th scope="col">Penanggung Jawab</th>
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
        let responsibleTable = new DataTable('#responsibleTable');
        let supporterTable = new DataTable('#supporterTable');
    </script>
@stop
