@extends('sb-admin/app')
@section('title', 'rekaptulasi')

@section('content')
  {{-- flashdata --}}
  {!! session('sukses') !!}

<!-- Page Heading -->
 <h1 class="h3 mb-4 text-gray-800">Rekaptulasi</h1>

 <a href="/rekaptulasi/create" class="btn btn-primary btn-sm"><i class="fas fa-plus"></i> Tambah</a>

  {{-- table --}}
  <table class="table mt-4 table-hover table-bordered">
    <thead>
        <tr>
        <th scope="col">Nama</th>
        <th scope="col">Proposal</th>
        <th scope="col">Logbook</th>
        <th scope="col">Laporan</th>
        <th scope="col">Aksi</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($data as $row)
            <tr>
            <td>{{$row->nama}}</td>
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
            </tr>
        @endforeach
    </tbody>
</table>

@endsection