@extends('sb-admin/app')
@section('title', 'penilaian')

@section('content')
    {{-- flashdata --}}
    {!! session('sukses') !!}

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800">Penilaian</h1>

    <a href="/penilaian/create" class="btn btn-primary btn-sm"><i class="fas fa-plus"></i> Tambah</a>

    {{-- table --}}
    <table class="table mt-4 table-hover table-bordered">
        <thead>
            <tr>
                <th scope="col">No</th>
                <th scope="col">Nama Mahasiswa</th>
                <th scope="col">Laporan</th>
                <th scope="col">Aplikasi</th>
                <th scope="col">Persentasi</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($nilai as $row)
                <tr>
                    <th scope="row">{{ $loop->iteration }}</th>
                    <td>{{ $row->User->name}}</td>
                    <td>{{ $row->laporan }}</td>
                    <td>{{ $row->aplikasi }}</td>
                    <td>{{ $row->presentasi }}</td>
                    <td width="20%">
                        <div class="btn-group" role="group" aria-label="Basic example">
                            <a href="/penilaian/{{ $row->id }}/edit" class="btn btn-primary btn-sm mr-1"><i
                                    class="fas fa-edit"></i> Edit</a>
                            <form action="/penilaian/{{ $row->id }}" method="post">
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
    {{$nilai->links()}}
    <div class="row">
        <div class="col-2 text-truncate">
            <br>
            <p class="text-capitalize">Keterangan</p>
            <h6>A = Sangat Baik</h6>
            <h6>B = Baik</h6>
            <h6>C = Cukup</h6>
            <h6>D = Kurang Cukup</h6>
        </div>
      </div>

@endsection
