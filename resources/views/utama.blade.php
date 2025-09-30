@extends('layout')
@section('content')
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>EduCenter</title>
    <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <!-- NEW UPDATED FROM MANISHA AHAHAHAHA -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Noto+Sans+KR:wght@600&family=Oxanium:wght@500&family=Saira+Condensed:wght@100;200;300;400;500;600;700;800;900&display=swap" rel="stylesheet">
    
    <style>
        .content-card {
            height: 650px;
            display: flex;
            flex-direction: column;
        }
        .contents-card {
            height: 500px;
            display: flex;
            flex-direction: column;
        }
        .card{
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
        .content-card:hover {
            transform: scale(1.05);
            transition: transform 0.3s ease;
        }
        .custom-search-bar {
            background: #133E87;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            padding: 10px;
            margin: 20px 0;
        }
        .custom-search-bar .btn-search {
            background-color: #F3F3E0;
            color: #133E87;
            border: none;
            border-radius: 20px;
            padding: 10px 20px;
            font-size: 16px;
            transition: background-color 0.3s ease;
        }
        .custom-search-bar .btn-search:hover {
            background-color: #608BC1;
            color:  #F3F3E0;
        }


        /* NEW UPDATED CODE FROM MANISHA ARIE PARAMARTHA  */

.noto-sans-kr-<uniquifier> {
  font-family: "Noto Sans KR", serif;
  font-optical-sizing: auto;
  font-weight: 600;
  font-style: normal;
}


        
    </style>
</head>
<body>
    <div class="container-fluid mb-5" style="background-color: #CBDCEB; padding : 10px; border-radius: 20px">
        <div class="row pt-5 mb-5 mx-auto justify-content-evenly" style="background-color: #F3F3E0; padding : 10px; border-radius: 20px; max-width: 95%">
            <div class="col-4 mb-4 text-center">
            <div class="card mx-auto border-0" style="background-color: white; padding: 20px; max-width: 90%; border-radius: 20px">
            <div class="card-body" style="color: #133E87;">
                <h2 noto-sans-kr-<uniquifier >Belajar terarah, </h2>
                <h2 noto-sans-kr-<uniquifier >masa depan cerah!</h2>
                <br>
                <p style="text-align:justify">
                Educenter adalah platform pembelajaran online yang dirancang khusus untuk membantu mahasiswa dalam mengakses materi pembelajaran dan menemukan mentor yang tepat.
                </p>
                <form action="{{ route('search') }}" method="POST">
                @csrf
                <div class="custom-search-bar">
                    <div class="d-flex align-items-center">
                        <input 
                            class="form-control me-2 flex-grow-1" 
                            type="search" 
                            placeholder="Cari materi yang kamu inginkan!" 
                            aria-label="Search" 
                            name="search">
                        <button class="btn btn-search" type="submit" style="">Search</button>
                    </div>
                </div>
            </form>
            </div>
            </div>
            </div>
            <div class="col-4 text-center">
                <img src="{{asset('storage/homapage2.png')}}" alt="iconHomePage" class="img-fluid" style="max-width: 390px;">
            </div>
        </div>
        <hr>
        <div class="container mt-3 mb-5 pt-3">
            <div class="row">
                <h2 class="text-center text"><b>Materi EduCenter</b></h2>
                <p class="text-center textp">Silahkan akses materi perkuliahan yang Anda inginkan!</p>
                <br>
                <div class="row pt-3" style="background-color:#F3F3E0; border-radius:20px; padding: 10px">
                    @foreach($courses as $course)
                        <div class="col-md-4">
                            <form action="/detail-materi" method="POST">
                                @csrf 
                                <input type="hidden" name="id" value="{{ $course->id }}">
                                <div class="card text-center contents-card">
                                    <img src="{{ asset($course->foto) }}" alt="{{ $course->nama }}" class="card-img-top" style="height: 200px; width: 100%; object-fit: cover;">

                                    <div class="card-body">
                                        <h5 class="card-title">{{ $course->nama }}</h5>
                                        <div class="description-container">
                                          <p style="text-align: justify;" class="card-text">{{ $course-> deskripsi}}</p>
                                        </div>
                                        <br>
                                        <p class="card-text"><b>Durasi: {{ $course-> durasi}} menit</b></p>
                                        @if((Auth::check() && Auth::user()->role == 'mentor') || (Auth::check() && Auth::user()->role == 'user'))
                                        <div class="btn-container">
                                            <button type="submit" class="btn my-2 mx-auto rounded-pill fw-bold" id="ButtonDaftar">Akses Materi</button>
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
            </div>
        </div>
        <hr>
        <div class="container mt-3 mb-3 pt-3">
            <h2 class="text-center text"><b>Mentor Kami</b></h2>
            <p class="text-center textp">Temui para mentor berpengalaman dan berdedikasi yang siap membimbing, menginspirasi, dan mendukung perjalanan belajar kalian!</p>
            <br>
            <h3 class="text"><b>Matematika</b></h3>
            <p style="text-align: justify; color: #133E87;">Matematika adalah dasar berpikir logis dan pemecahan masalah yang penting untuk berbagai bidang ilmu. 
                Kursus ini mencakup topik utama seperti kalkulus, aljabar linear, dan statistika, dengan penerapan 
                praktis dalam menghadapi tantangan dunia nyata. Mahasiswa akan mengembangkan kemampuan analisis, 
                pemodelan matematis, serta penyelesaian masalah secara sistematis. Kursus ini dirancang untuk 
                membangun pola pikir kritis yang mendukung keberhasilan akademis dan profesional.</p>
            <div class="row pt-3" style="background-color:#F3F3E0; border-radius:20px; padding: 10px">
                @foreach($mathMentors as $mentor)
                    <div class="col-md-4">
                        <form action="/pilih-mentor" method="POST">
                            @csrf 

                            <div class="card text-center shadow-sm content-card">
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

            <h3 class="text"><b>Ilmu Komputer</b></h3>
            <p style="text-align: justify; color: #133E87;">Ilmu komputer mempelajari teori, penerapan, dan desain sistem komputer serta perangkat lunak. 
                Kursus ini mencakup topik seperti algoritma, struktur data, pemrograman, dan kecerdasan buatan, 
                yang sangat relevan untuk mengatasi tantangan teknologi modern. Mahasiswa akan belajar untuk 
                mengembangkan solusi teknis melalui pemrograman dan analisis masalah yang kompleks. Kursus ini 
                bertujuan untuk membangun keterampilan teknis dan pemikiran analitis yang diperlukan dalam industri
                teknologi dan riset komputer</p>
            <div class="row pt-3" style="background-color:#F3F3E0; border-radius:20px; padding: 10px">
                @foreach($computerMentors as $mentor)
                    <div class="col-md-4">
                        <form action="/pilih-mentor" method="POST">
                            @csrf 

                            <div class="card text-center shadow-sm content-card">
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
        </div>




    </div>
</body>
@endsection
</html>
