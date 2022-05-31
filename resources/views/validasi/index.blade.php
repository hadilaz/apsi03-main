@extends('sb-admin/app')
@section('title', 'validasi')

@section('content')
    {{-- flashdata --}}
    {!! session('sukses') !!}

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800">Validasi</h1>

    <a href="/validasi/create" class="btn btn-primary btn-sm"><i class="fas fa-plus"></i> Tambah</a>

    {{-- table --}}
    <table class="table mt-4 table-hover table-bordered">
        <thead>
            <tr>
                <th scope="col">No</th>
                <th scope="col">Nama Mahasiswa</th>
                <th scope="col">Proposal</th>
                <th scope="col">Laporan</th>
                <th scope="col">Seminar</th>
                <th scope="col">Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($validasi as $row)
                <tr>
                    <th scope="row">{{ $loop->iteration }}</th>
                    <td>{{ $row->User->name}}</td>
                    <td>{{ $row->proposal }}</td>
                    <td>{{ $row->laporan }}</td>
                    <td>{{ $row->seminar }}</td>
                    <td width="20%">
                        <div class="btn-group" role="group" aria-label="Basic example">
                            <a href="/validasi/{{ $row->id }}/edit" class="btn btn-primary btn-sm mr-1"><i
                                    class="fas fa-edit"></i> Edit</a>
                            <form action="/validasi/{{ $row->id }}" method="post">
                                @method('DELETE')
                                @csrf
                                <button type="submit" class="btn btn-danger btn-sm"><i class="fas fa-trash"></i>
                                    Hapus</button>
                            </form>
                        </div>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

@endsection
