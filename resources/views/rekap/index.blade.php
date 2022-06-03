@extends('sb-admin/app')
@section('title', "rekap")

@section('content')
    {{-- flashdata --}}
    {!! session('sukses') !!}

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800">Rekaptulasi</h1>

    {{-- table --}}
    <table class="table mt-4 table-hover table-bordered">
        <thead>
            <tr>
                <th scope="col">No</th>
                <th scope="col">Nama Mahasiswa</th>
                <th scope="col">Proposal</th>
                <th scope="col">Laporan</th>
                <th scope="col">Seminar</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($rekap as $row)
                <tr>
                    <th scope="row">{{ $loop->iteration }}</th>
                    <td>{{ $row->User->name}}</td>
                    <td>{{ $row->proposal }}</td>
                    <td>{{ $row->laporan }}</td>
                    <td>{{ $row->seminar }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
    {{$rekap->links()}}

@endsection