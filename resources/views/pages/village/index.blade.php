@extends('adminlte::page')

@section('title', 'Admin | Village')

@section('content_header')
    <h1>Village Page</h1>
@stop

@section('content')
    <p>Welcome to village page!</p>

    <a href="/village/create">
        <button type="button" class="btn btn-primary mb-3">Tambah Data Desa</button>
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
            <th scope="col">Desa</th>
            <th scope="col">Kecamatan</th>
            <th scope="col">Jumlah Koordinator</th>
            <th scope="col">Jumlah Pendukung</th>
            <th scope="col">Edit</th>
            <th scope="col">Hapus</th>
          </tr>
        </thead>
        <tbody>
          @php($no = 1)
          @forelse ($villages as $v)
              <tr>
                <th scope="row">{{ $no++ }}</th>
                <td>{{ $v->$village->name }}</td>
                <td>{{ $v->$village->district?->name }}</td>
                <td>{{ $v->$coor_count }}</td>
                <td>{{ $v->$coor_count }}</td>
                <td>
                  <a href="/village/{{ $village->id }}/edit" style="color: black">
                    <i class="far fa-edit" style="cursor: pointer;"></i>
                  </a>
                </td>
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
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    <script> console.log('Hi!'); </script>
@stop