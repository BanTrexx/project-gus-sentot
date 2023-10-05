@extends('adminlte::page')

@section('title', 'Admin | Supporter')

@section('content_header')
    <h1>Responsible Page</h1>
@stop

@section('content')

    <a href="/supporter/create">
        <button type="button" class="btn btn-primary mb-3">Tambah Data Penanggungjawab</button>
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

    <table @if(count($supporters) > 0) id="myTable" @endif class="table">
        <thead class="thead-dark">
        <tr>
            <th scope="col">No</th>
            <th scope="col">NIK</th>
            <th scope="col">Nama</th>
            <th scope="col">Alamat</th>
            <th scope="col">DPT/TPS</th>
            <th scope="col">Koordinator</th>
            @can('edit')
                <th scope="col">Edit</th>
            @endcan
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
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
    <link rel="stylesheet" href="//cdn.datatables.net/1.13.6/css/jquery.dataTables.min.css">
@stop

@section('js')
    <script> console.log('Hi!'); </script>

    <script src="cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.5.0/dist/js/bootstrap.bundle.min.js"></script>

    <script>
        let table = new DataTable('#myTable');
    </script>

    <script>
        const myModal = document.getElementById('myModal')
        myModal.addEventListener('shown.bs.modal')
    </script>
@stop
