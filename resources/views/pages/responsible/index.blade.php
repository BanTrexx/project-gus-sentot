@extends('adminlte::page')

@section('title', 'Admin | Responsible')

@section('content_header')
    <h1>Responsible Page</h1>
@stop

@section('content')

    <a href="/responsible/create">
        <button type="button" class="btn btn-primary mb-3">Tambah Data</button>
    </a>

    @if(session()->has('success'))
        <div class="alert alert-success" role="alert">
            <i class="fas fa-check-circle mr-2"></i>
            {{ session('success') }}
        </div>
    @endif

    <table @if(count($responsibles) > 0) id="myTable" @endif class="table">
        <thead class="thead-dark">
        <tr>
            <th scope="col">No</th>
            <th scope="col">NIK</th>
            <th scope="col">Nama</th>
            <th scope="col">Alamat</th>
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
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
    <link rel="stylesheet" href="//cdn.datatables.net/1.13.6/css/jquery.dataTables.min.css">
@stop

@section('js')
    <script> console.log('Hi!'); </script>

    <script src="//cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.5.0/dist/js/bootstrap.bundle.min.js"></script>

    <script>
        let table = new DataTable('#myTable');
    </script>

    <script>
        const myModal = document.getElementById('myModal')
        myModal.addEventListener('shown.bs.modal')
    </script>
@stop
