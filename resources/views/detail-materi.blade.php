@extends('layout')
@section('content')

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <title>Detail Materi</title>
    <style>
        body {
            background-color: #f8f9fa;
        }
        .card {
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }
        .card-header {
            background-color: #007bff;
            color: white;
        }
        .card-body p {
            text-align: justify;
        }
        .btn-primary {
            background-color: #007bff;
            border: none;
        }
        .btn-primary:hover {
            background-color: #0056b3;
        }
    </style>
</head>
<body>
<div class="container" style="padding: 20px;">
    <div class="row text-center mb-4">
        <div class="col">
        <h1 style="color: #133E87"><b>{{$course->nama}}</b></h1>
        </div>
    </div>
    <div class="row pt-3">
        <div class="col" style="background-color: #F3F3E0; padding:15px; border-radius:20px">
        <div class="embed-responsive embed-responsive-16by9 mb-5">
            <iframe 
                class="embed-responsive-item" 
                src="https://www.youtube.com/embed/{{ $course->link }}" allowfullscreen>
            </iframe>
        </div>
        <p style="text-align: justify;">{{$course->isi}}</p>
        </div>
    </div>

</div>

</body>
</html>
@endsection
