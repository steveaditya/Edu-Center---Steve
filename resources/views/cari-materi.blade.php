@extends('layout')
@section('content')
<style>
    .card {
        height: 500px;
        display: flex;
        flex-direction: column;
    }

    .card-img-top {
        height: 350px;
        object-fit: cover;
    }

    .card-body {
        display: flex;
        flex-direction: column;
        justify-content: space-between;
        overflow: hidden;
    }

    .description-container {
        flex-grow: 1;
        overflow-y: auto;
        max-height: 200px;
        padding-right: 5px;
    }

    .btn-container {
        margin-top: auto;
    }

    .btn-danger {
        padding: 0.5rem 1.25rem;
    }

    .text {
        color: #164189;
    }

    .textp {
        color: #608BC1;
    }

    .card:hover {
        transform: scale(1.05);
        transition: transform 0.3s ease;
    }
</style>

@if ($courses->isEmpty())
    <br>
    <h2 class="text-center textp">Mohon maaf, materi tidak tersedia</h2>
@else
    <br>
    <h2 class="text-center text"><b>Materi EduCenter</b></h2>
    <p class="text-center textp">Silahkan akses materi perkuliahan yang Anda inginkan!</p>
@endif
<br>
<div class="container mt-3">

    <div class="row">
        @foreach($courses as $course)
                    <div class="col-md-4">
                        <form action="/detail-materi" method="POST">
                            
                            <input type="hidden" name="id" value="{{ $course->id }}">
                            <div class="card text-center">
                                <img src="{{ asset($course->foto) }}" alt="{{ $course->nama }}" class="card-img-top"
                                    style="height: 200px; width: 100%; object-fit: cover;">

                                <div class="card-body">
                                    <h5 class="card-title">{{ $course->nama }}</h5>
                                    <div class="description-container">
                                        <p style="text-align: justify;" class="card-text">{{ $course->deskripsi}}</p>
                                    </div>
                                    <br>
                                    <p class="card-text"><b>Durasi: {{ $course->durasi}} menit</b></p>
                                    @csrf
                                    @if((Auth::check() && Auth::user()->role == 'mentor') || (Auth::check() && Auth::user()->role == 'user'))
                                        <div class="btn-container">
                                            <button type="submit" class="btn my-2 mx-auto rounded-pill fw-bold" id="ButtonDaftar">Akses Materi</button>
                                        </div>
                                        @else
                                        <div class="btn-container">
                                            <a href="/login" class="btn my-2 mx-auto rounded-pill fw-bold" id="ButtonDaftar">Daftar!</a>
                                        </div>
                                    @endif
                        </form>
                        @if(Auth::check() && Auth::user()->role == 'mentor')
                        <a href="{{ route('edit-materi', $course->kode) }}" class="btn my-2 mx-auto rounded-pill fw-bold" id="ButtonDaftar">Edit</a>
                        <form action="{{ route('hapus-materi', $course->kode) }}" method="POST">
                            {{method_field('DELETE')}}
                            @csrf
                            <button type="submit" class="btn my-2 mx-auto rounded-pill fw-bold" id="ButtonHapus">Hapus</button>
                        </form>
                        @endif
                    </div>
                </div>

            </div>
        @endforeach
</div>
<br>

{{$courses->links()}}

</div>
@endsection