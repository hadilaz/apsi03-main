@extends('sb-admin/app')
@section('title', 'rekaptulasi')

@section('content')
    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800">Rekaptulasi</h1>

    <form action="/rekaptulasi" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="form-group">
            <label for="name">Nama</label>
            <input type="text" class="form-control" id="nama" name="nama">
            @error('nama')
                <small class="text-danger">{{ $message }}</small>
            @enderror
        </div>
        <div class="form-group">
            <label for="dokumen">Dokumen*</label>
                <input type="file" class="form-control" name="dokumen" value="{{ old('dokumen') }}">
                @error('dokumen')
                <small class="text-danger">{{ $message }}</small>
                @enderror
        </div>
        <div class="form-group">
            <label for="dokumen_g">Dokumen logbook</label>
                <input type="file" class="form-control" name="dokumen_g" value="{{ old('dokumen_g') }}">
                @error('dokumen_g')
                <small class="text-danger">{{ $message }}</small>
                @enderror
        </div>
        <div class="form-group">
            <label for="dokumen_l">Dokumen logbook</label>
                <input type="file" class="form-control" name="dokumen_l" value="{{ old('dokumen_l') }}">
                @error('dokumen_l')
                <small class="text-danger">{{ $message }}</small>
                @enderror
        </div>
        <button type="submit" class="btn btn-primary btn-sm">Tambah</button>
        <a href="/rekaptulasi" class="btn btn-secondary btn-sm">Kembali</a>
    </form>
@endsection