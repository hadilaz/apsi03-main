@extends('sb-admin/app')
@section('title', 'rekaptulasi')

@section('content')
  {{-- flashdata --}}
  {!! session('sukses') !!}

<!-- Page Heading -->
 <h1 class="h3 mb-4 text-gray-800">Form Upload Laporan</h1>

 @role('mahasiswa')
 <a href="/rekaptulasi/create" class="btn btn-primary btn-sm"><i class="fas fa-plus"></i> Tambah</a>
 @endrole

  {{-- table --}}
  <table class="table mt-4 table-hover table-bordered">
    <thead>
        <tr>
        <th scope="col">Nama</th>
        @role('penguji|pebimbing')
        <th scope="col">Proposal</th>
        <th scope="col">Logbook</th>
        <th scope="col">Laporan</th>
        <th scope="col">Aksi</th>
        @endrole
        </tr>
    </thead>
    <tbody>
        @foreach ($data as $row)
            <tr>
                <td>{{ $row->User->name}}</td>
        @role('penguji|pebimbing')
        <td align="center">
            <a href="dokumen/{{$row->dokumen}}"><button class="btn btn-success" type="button">Download</button></a>
        </td>
        <td align="center">
            <a href="dokumen_g/{{$row->dokumen_g}}"><button class="btn btn-success" type="button">Download</button></a>
        </td>
        <td align="center">
            <a href="dokumen_l/{{$row->dokumen_l}}"><button class="btn btn-success" type="button">Download</button></a>
        </td>
            <td width="20%">
                <div class="btn-group" role="group" aria-label="Basic example">
                    <form action="rekaptulasi/{{$row->id}}" method="post">
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
{{$data->links()}}

@endsection