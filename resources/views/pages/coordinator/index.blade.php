@extends('adminlte::page')

@section('title', 'Admin | Coordinator')

@section('content_header')
    <h1>Coordinator Page</h1>
@stop

@section('content')
    <p>Welcome to coordinator page!</p>

    <a href="/coordinator/create">
        <button type="button" class="btn btn-primary mb-3">Tambah Data Koordinator</button>
    </a>

    @if(session()->has('success'))
      <div class="alert alert-success" role="alert">
        <i class="fas fa-check-circle mr-2"></i>
        {{ session('success') }}
      </div>
    @endif

    <table @if(count($coordinators) > 0) id="myTable" @endif class="table">
        <thead class="thead-dark">
          <tr>
            <th scope="col">No</th>
            <th scope="col">NIK</th>
            <th scope="col">Nama</th>
            <th scope="col">Desa</th>
            <th scope="col">Alamat</th>
              @can('edit')
                  <th scope="col">Edit</th>
              @endcan
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
