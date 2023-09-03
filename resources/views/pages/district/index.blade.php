@extends('adminlte::page')

@section('title', 'Admin | District')

@section('content_header')
    <h1>District Page</h1>
@stop

@section('content')
    <p>Welcome to district page!</p>

    <a href="/district/create">
        <button type="button" class="btn btn-primary mb-3">Tambah Data Kecamatan</button>
    </a>

    @if(session()->has('success'))
      <div class="alert alert-success" role="alert">
        <i class="fas fa-check-circle mr-2"></i>
        {{ session('success') }}
      </div>
    @endif

    <table @if(count($districts) > 0) id="myTable" @endif class="table">
        <thead class="thead-dark">
          <tr>
            <th scope="col">No</th>
            <th scope="col">Kecamatan</th>
            <th scope="col">Edit</th>
            <th scope="col">Hapus</th>
          </tr>
        </thead>
        <tbody>
          @php($no = 1)
          @forelse ($districts as $district)
            <tr>
              <th scope="row">{{ $no++ }}</th>
              <td>{{ $district->name }}</td>
              <td>
                <a href="/district/{{ $district->id }}/edit" style="color: black">
                  <i class="far fa-edit" style="cursor: pointer;"></i>
                </a>
              </td>
              <td>
                  <form action="{{ route('district.destroy', $district) }}" method="POST">
                      @csrf
                      @method('DELETE')
                      <button type="submit" class="fas fa-trash" style="color: #ff0000; cursor: pointer; border:none; background:transparent;"></button>
                  </form>
              </td>
            </tr>
          @empty
            <tr>
                <td colspan="4" class="text-center">Data tidak tersedia.</td>
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
