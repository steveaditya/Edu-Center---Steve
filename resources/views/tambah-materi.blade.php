@extends('layout')

@section('title', 'Tambah Materi')

@section('content')

<div class="container mb-5" >
<h3 style="color:#133E87"><b>Tambah Materi Baru</b></h3>
@if(session('success'))
    <div class="alert alert-success">{{ session('success') }}</div>
@endif
@if($errors->any())
    <div class="alert alert-danger">
    <ul>
        @foreach ($errors->all() as $error)
            <li>{{$error}}</li>
        @endforeach
    </ul>
    </div>
@endif
<form action={{ route('buat-materi') }} method="POST" enctype="multipart/form-data">
    @csrf

    <div class="mb-3">
        <label for="course_code" class="form-label">Kode Materi</label>
        <input type="text" class="form-control" id="course_code" name="kode" value="{{ old('kode') }}">
    </div>

    <div class="mb-3">
        <label for="course_name" class="form-label">Nama Materi</label>
        <input type="text" class="form-control" id="course_name" name="nama" value="{{ old('nama') }}">
    </div>

    <div class="mb-3">
        <label for="description" class="form-label">Deskripsi</label>
        <textarea class="form-control" id="description" name="deskripsi" rows="3">{{ old('deskripsi') }}</textarea>
    </div>

    <div class="mb-3">
        <label for="duration" class="form-label">Durasi</label>
        <input type="text" class="form-control" id="duration" name="durasi" value="{{ old('durasi') }}">
    </div>

    <div class="mb-3">
        <label for="video_link" class="form-label">Link Video (hanya Embed Code)</label>
        <input type="text" class="form-control" id="video_link" name="link" value="{{ old('link') }}">
    </div>

    <div class="mb-3">
        <label for="material_content" class="form-label">Isi Materi</label>
        <textarea class="form-control" id="material_content" name="isi" rows="5">{{ old('isi') }}</textarea>
    </div>

    <div class="mb-3">
        <label for="course_image" class="form-label">Gambar Cover Materi</label>
        <input type="file" class="form-control" id="course_image" name="foto">
    </div>


    <button type="submit" class="btn my-2 mx-auto rounded-pill fw-bold" id="ButtonDaftar">Tambah Materi</button>
</form>
</div>
@endsection