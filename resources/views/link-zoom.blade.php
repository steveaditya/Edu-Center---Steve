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
        body {
            background-color: #f8f9fa;
        }
        .btn-danger {
            padding: 0.75rem 1.5rem;
        }
        .btn-danger:hover {
            background-color: #dc3545;
            color: #fff;
        }
        .card {
            border-radius: 10px;
            box-shadow: 0px 4px 10px rgba(0, 0, 0, 0.1);
        }
    </style>
</head>
<body>

<div class="container text-center mt-5">
    <h2 class="mb-4">Terima kasih sudah memilih jadwal bersama {{ $viewMentor->nama }}!</h2>
    <p class="lead text-muted">Berikut adalah link Zoom untuk jadwal yang kamu pilih. Sampai jumpa dan semoga sesi belajarmu menyenangkan!</p>
</div>

<div class="container mt-5 mb-5">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card text-center p-4">
                <div class="card-body">
                    <h5 class="card-title mb-3">Link Zoom</h5>
                    <a href="https://zoom.us/join" class="btn my-2 mx-auto rounded-pill fw-bold" id="ButtonDaftar">Gabung Sekarang</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
</html>
