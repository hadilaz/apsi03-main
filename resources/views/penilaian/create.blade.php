@extends('sb-admin/app')
@section('title', 'Penilaian')

@section('content')
    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800">Penilaian</h1>

    <form action="/penilaian" method="POST">
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
            <label for="laporan">laporan</label>
            <select class="form-control" id="laporan" name="laporan">
                <option value="A">A</option>
                <option value="B">B</option>
                <option value="C">C</option>
                <option value="D">D</option>
            </select>
        </div>
        <div class="form-group">
            <label for="aplikasi">aplikasi</label>
            <select class="form-control" id="aplikasi" name="aplikasi">
                <option value="A">A</option>
                <option value="B">B</option>
                <option value="C">C</option>
                <option value="D">D</option>
            </select>
        </div>
        <div class="form-group">
            <label for="presentasi">presentasi</label>
            <select class="form-control" id="presentasi" name="presentasi">
                <option value="A">A</option>
                <option value="B">B</option>
                <option value="C">C</option>
                <option value="D">D</option>
            </select>
        </div>
        <button type="submit" class="btn btn-primary btn-sm">Tambah</button>
        <a href="/penilaian" class="btn btn-secondary btn-sm">Kembali</a>
    </form>
@endsection
