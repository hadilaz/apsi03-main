@extends('sb-admin/app')
@section('title', 'validasi')

@section('content')
    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800"> Edit Validasi</h1>

    <form action="/validasi/{{$validasi->id}}" method="POST">
        @csrf
        @method('PATCH')
        <div class="form-group">
            <label for="user_id">Nama</label>
            <select class="form-control" aria-label="default select example" name="user_id" value="{{$validasi->user_id}}">
            @foreach ($users as $User)
            <option value="{{$User->id}}">{{$User->name }}</option>
            @endforeach 
        </select>
        </div>
        <div class="form-group">
            <label for="proposal">Proposal</label>
            <select class="form-control" id="proposal" name="proposal" value="{{$validasi->proposal}}">
                <option value="Selesai">Selesai</option>
                <option value="Belum Selesai">Belum Selesai</option>
            </select>
        </div>
        <div class="form-group">
            <label for="laporan">laporan</label>
            <select class="form-control" id="laporan" name="laporan" value="{{$validasi->laporan}}">
                <option value="Selesai">Selesai</option>
                <option value="Belum Selesai">Belum Selesai</option>
            </select>
        </div>
        <div class="form-group">
            <label for="seminar">presentasi</label>
            <select class="form-control" id="seminar" name="seminar" value="{{$validasi->seminar}}">
                <option value="Selesai">Selesai</option>
                <option value="Belum Selesai">Belum Selesai</option>
            </select>
        </div>
        <button type="submit" class="btn btn-primary btn-sm">Tambah</button>
        <a href="/validasi" class="btn btn-secondary btn-sm">Kembali</a>
    </form>
@endsection
