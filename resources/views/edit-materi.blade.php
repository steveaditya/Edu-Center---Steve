@extends('layout')

@section('title', 'Edit Materi')

@section('content')
<div class="container mb-5" >
<h3>Edit Materi</h3>
@if($errors->any())
    <div class="alert alert-danger">
    <ul>
        @foreach ($errors->all() as $error)
            <li>{{$error}}</li>
        @endforeach
    </ul>
    </div>
@endif
<form action="{{ route('update-materi', $course->kode) }}" method="POST" enctype="multipart/form-data">
    @csrf

    <div class="mb-3">
        <label for="course_name" class="form-label">Nama Materi</label>
        <input type="text" class="form-control" id="course_name" name="nama" value="{{ old('nama', $course->nama) }}">
    </div>

    <div class="mb-3">
        <label for="description" class="form-label">Deskripsi</label>
        <textarea class="form-control" id="description" name="deskripsi" rows="3">{{ old('deskripsi', $course->deskripsi) }}</textarea>
    </div>

    <div class="mb-3">
        <label for="duration" class="form-label">Durasi</label>
        <input type="text" class="form-control" id="duration" name="durasi" value="{{ old('durasi', $course->durasi) }}">
    </div>

    <div class="mb-3">
        <label for="video_link" class="form-label">Link Video (hanya Embed Code)</label>
        <input type="text" class="form-control" id="video_link" name="link" value="{{ old('link', $course->link) }}">
    </div>

    <div class="mb-3">
        <label for="material_content" class="form-label">Isi Materi</label>
        <textarea class="form-control" id="material_content" name="isi" rows="5">{{ old('isi', $course->isi) }}</textarea>
    </div>

    <div class="mb-3">
        <label for="foto" class="form-label">Foto</label>
        <input type="file" class="form-control" id="foto" name="foto">
        <small class="form-text text-muted">Upload file foto</small>
    </div>

    <button type="submit" class="btn my-2 mx-auto rounded-pill fw-bold" id="ButtonDaftar">Perbarui Materi</button>
</form>
</div>
@endsection
