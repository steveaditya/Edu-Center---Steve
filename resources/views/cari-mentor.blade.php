@extends('layout')
@section('content')
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}">
    <title>EduCenter</title>
    <style>
        .card {
            height: 700px;
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
        .schedule-card:hover {
            transform: scale(1.05);
            transition: transform 0.3s ease;
        }
       
        .pagination .page-link{
            color: #164189;
            font-weight: ;
        }

        .pagination .page-item.active .page-link{
            background-color: #164189;
            color: #F3F3E0;
            border-color: #164189;
        }

        .pagination .page-link:hover {
            background-color: #164189;
            color: #F3F3E0;
        }
    </style>
</head>

<body>

<br>
<h2 class="text-center text"><b>Mentor Kami</b></h2>
<p class="text-center textp">Temui para mentor berpengalaman dan berdedikasi yang siap membimbing, menginspirasi, dan mendukung perjalanan belajar kalian!</p>

<br><br>
<div class="container mt-3">
    <h3 class="text"><b>Matematika</b></h3>
    <p style="text-align: justify; color: #133E87;">Matematika adalah dasar berpikir logis dan pemecahan masalah yang penting untuk berbagai bidang ilmu. 
        Kursus ini mencakup topik utama seperti kalkulus, aljabar linear, dan statistika, dengan penerapan 
        praktis dalam menghadapi tantangan dunia nyata. Mahasiswa akan mengembangkan kemampuan analisis, 
        pemodelan matematis, serta penyelesaian masalah secara sistematis. Kursus ini dirancang untuk 
        membangun pola pikir kritis yang mendukung keberhasilan akademis dan profesional.</p>
    <div class="row">
        @foreach($mathMentors as $mentor)
            <div class="col-md-4 mb-4">
                <form action="/pilih-mentor" method="POST">
                    @csrf 

                    <div class="card text-center shadow-sm schedule-card">
                        <img src="{{ asset($mentor->image_path) }}" alt="{{ $mentor->nama }}" class="card-img-top">
                        <div class="card-body">
                            <h5 class="card-title">{{ $mentor->nama }}</h5>
                            <p class="card-text text-muted">Professor @Binus University</p>
                            <div class="description-container">
                                <p style="text-align: justify;" class="card-text">{{ $mentor->description }}</p>
                            </div>
                            @if((Auth::check() && Auth::user()->role == 'mentor') || (Auth::check() && Auth::user()->role == 'user'))
                            <div class="btn-container">
                                <a href="{{ route('jadwal.edit', $mentor->id) }}" class="btn my-2 mx-auto rounded-pill fw-bold" id="ButtonDaftar">Pilih!</a>
                            </div>
                            @else
                            <div class="btn-container">
                                <a href="/login" class="btn my-2 mx-auto rounded-pill fw-bold" id="ButtonDaftar">Daftar!</a>
                            </div>
                            @endif 
                        </div>
                    </div>
                </form>
            </div>
        @endforeach
    </div>
    <br>
    {{ $mathMentors->links() }}

    <br><br><br>

    <h3 class="text"><b>Ilmu Komputer</b></h3>
    <p style="text-align: justify; color: #133E87;">Ilmu komputer mempelajari teori, penerapan, dan desain sistem komputer serta perangkat lunak. 
        Kursus ini mencakup topik seperti algoritma, struktur data, pemrograman, dan kecerdasan buatan, 
        yang sangat relevan untuk mengatasi tantangan teknologi modern. Mahasiswa akan belajar untuk 
        mengembangkan solusi teknis melalui pemrograman dan analisis masalah yang kompleks. Kursus ini 
        bertujuan untuk membangun keterampilan teknis dan pemikiran analitis yang diperlukan dalam industri
         teknologi dan riset komputer</p>
    <div class="row">
        @foreach($computerMentors as $mentor)
            <div class="col-md-4 mb-4">
                <form action="/pilih-mentor" method="POST">
                    @csrf 
                    
                    <div class="card text-center shadow-sm schedule-card">
                        <img src="{{ asset($mentor->image_path) }}" alt="{{ $mentor->nama }}" class="card-img-top">
                        <div class="card-body">
                            <h5 class="card-title">{{ $mentor->nama }}</h5>
                            <p class="card-text text-muted">Professor @Binus University</p>
                            <div class="description-container">
                                <p style="text-align: justify;" class="card-text">{{ $mentor->description }}</p>
                            </div>
                            @if((Auth::check() && Auth::user()->role == 'mentor') || (Auth::check() && Auth::user()->role == 'user'))
                            <div class="btn-container">
                                <a href="{{ route('jadwal.edit', $mentor->id) }}" class="btn my-2 mx-auto rounded-pill fw-bold" id="ButtonDaftar">Pilih!</a>
                            </div>
                            @else
                            <div class="btn-container">
                                <a href="/login" class="btn my-2 mx-auto rounded-pill fw-bold" id="ButtonDaftar">Daftar!</a>
                            </div>
                            @endif 
                        </div>
                    </div>
                </form>
            </div>
        @endforeach
    </div>
    <br>
    {{ $computerMentors->links() }}
</div>

</body>
@endsection
</html>
