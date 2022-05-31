@extends('sb-admin/app')
@section('title', 'jadwal')

@section('content')
  {{-- flashdata --}}
  {!! session('sukses') !!}

<!-- Page Heading -->
 <h1 class="h3 mb-4 text-gray-800">Jadwal Seminar</h1>

 <a href="/jadwal/create" class="btn btn-primary btn-sm"><i class="fas fa-plus"></i> Tambah Jadwal Seminar</a>
 <a href="/exportpdf" class="btn btn-info btn-sm"><i class="fas fa-plus"></i> create pdf</a>

  {{-- table --}}
  <table class="table mt-4 table-hover table-bordered">
    <thead>
        <tr>
        <th scope="col">No</th>
        <th scope="col">Nama</th>
        <th scope="col">Waktu</th>
        <th scope="col">Penguji</th>
        <th scope="col">Ruangan</th>
        <th scope="col">Aksi</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($jadwal as $row)
            <tr>
            <th scope="row">{{$loop->iteration}}</th>
            <td>{{$row->name}}</td>
            <td>{{$row->waktu}}</td>
            <td>{{$row->penguji}}</td>
            <td>{{$row->ruangan}}</td>
            <td width="20%">
                <div class="btn-group" role="group" aria-label="Basic example">
                <a href="/jadwal/{{$row->id}}/edit" class="btn btn-primary btn-sm mr-1"><i class="fas fa-edit"></i> Edit</a>
                    <form action="/jadwal/{{$row->id}}" method="post">
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

{{$jadwal->links()}}

@endsection