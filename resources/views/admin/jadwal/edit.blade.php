@extends('sb-admin/app')
@section('title', 'jadwal')

@section('content')
    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800">Jadwal</h1>

    <form action="/jadwal/{{$jadwal->id}}" method="POST">
        @csrf
        @method('PATCH')
        <div class="form-group">
            <label for="name">akun</label>
            <input type="text" class="form-control" id="name" name="name" value="{{$jadwal->name}}">
            @error('name')
                <small class="text-danger">{{ $message }}</small>
            @enderror
        </div>
        <div class="form-group">
            <label for="waktu">Waktu</label>
            <input type="text" class="form-control" id="waktu" name="waktu" value="{{$jadwal->waktu}}">
            @error('waktu')
                <small class="text-danger">{{ $message }}</small>
            @enderror
        </div>
        <div class="form-group">
            <label for="penguji">Penguji</label>
            <input type="text" class="form-control" id="penguji" name="penguji" value="{{$jadwal->penguji}}">
            @error('penguji')
                <small class="text-danger">{{ $message }}</small>
            @enderror
        </div>
        <div class="form-group">
            <label for="ruangan">Ruangan</label>
            <input type="text" class="form-control" id="ruangan" name="ruangan" value="{{$jadwal->ruangan}}">
            @error('ruangan')
                <small class="text-danger">{{ $message }}</small>
            @enderror
        </div>
        <button type="submit" class="btn btn-primary btn-sm">Tambah</button>
        <a href="/jadwal" class="btn btn-secondary btn-sm">Kembali</a>
    </form>
@endsection