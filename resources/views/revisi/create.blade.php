@extends('sb-admin/app')
@section('title', 'revisi')

@section('content')
    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800">Tambah Revisi</h1>

    <form action="/revisi" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="form-group">
            <label for="user_id">Nama</label>
            <select class="form-control" aria-label="default select example" name="user_id">
            @foreach ($users as $User)
            <option value="{{$User->id}}">{{$User->name }}</option>
            @endforeach 
        </select>
        </div>
        <div class="form-group">
            <label for="dokumen">Dokumen*</label>
                <input type="file" class="form-control" name="dokumen" value="{{ old('dokumen') }}">
                @error('dokumen')
                <small class="text-danger">{{ $message }}</small>
                @enderror
        </div>
        <button type="submit" class="btn btn-primary btn-sm">Tambah</button>
        <a href="/revisi" class="btn btn-secondary btn-sm">Kembali</a>
    </form>
@endsection