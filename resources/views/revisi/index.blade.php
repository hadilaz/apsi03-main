@extends('sb-admin/app')
@section('title','revisi')

@section('content')
  {{-- flashdata --}}
  {!! session('sukses') !!}

<!-- Page Heading -->
 <h1 class="h3 mb-4 text-gray-800">Revisi</h1>
 @role('mahasiswa')
 <a href="/revisi/create" class="btn btn-primary btn-sm"><i class="fas fa-plus"></i> Tambah</a>
 @endrole

  {{-- table --}}
  <table class="table mt-4 table-hover table-bordered">
    <thead>
        <tr>
        <th scope="col">Nama</th>
        @role('penguji|pebimbing')
        <th scope="col">Laporan</th>
        <th scope="col">Aksi</th>
        @endrole
        </tr>
    </thead>
    <tbody>
        @foreach ($revisi as $row)
            <tr>
                <td>{{ $row->User->name}}</td>
        @role('penguji|pebimbing')
        <td align="center">
            <a href="dokumenr/{{$row->dokumen}}"><button class="btn btn-success" type="button">Download</button></a>
        </td>
        <td width="20%">
            <div class="btn-group" role="group" aria-label="Basic example">
                <form action="revisi/{{$row->id}}" method="post">
                    @method('DELETE')
                    @csrf
                    <button type="submit" class="btn btn-danger btn-sm"><i class="fas fa-trash"></i> Hapus</button>
                </form>
            </div>
        </td>
        @endrole
            </tr>
        @endforeach
    </tbody>
</table>
{{$revisi->links()}}

@endsection