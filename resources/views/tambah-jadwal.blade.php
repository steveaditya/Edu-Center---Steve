@extends('layout')
@section('content')
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">
    <title>Tambah Jadwal</title>
    <style>
        body {
            background-color: #f4f7fc;
            font-family: 'Nunito', sans-serif;
        }
        .form-container {
            max-width: 500px;
            margin: 0 auto;
            padding: 30px;
            background-color: #fff;
            border-radius: 10px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        }
        .alert {
            border-radius: 5px;
        }
        .form-container h3 {
            margin-bottom: 20px;
            color: #333;
        }
        .btn-danger {
            background-color: #dc3545;
            border-color: #dc3545;
            padding: 10px 20px;
        }
        .btn-danger:hover {
            background-color: #c82333;
            border-color: #bd2130;
        }
    </style>
</head>
<body>

<div class="container mt-5 mb-5">
    <div class="row justify-content-center">
        <div class="col-12 col-md-6">
            
            @if(session('success'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    {{ session('success') }}
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            @endif

            <div class="form-container">
                <h3 class="text-center" style="color:#133E87"><b>Tambah Jadwal</b></h3>

                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <form action="/tambah-jadwal" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <label for="kode_mentor">Kode Mentor</label>
                        <input type="text" class="form-control" id="kode_mentor" name="kode_mentor" 
                            value="{{ Auth::user()->kode_mentor }}" readonly>
                    </div>
                    <div class="form-group">
                        <label for="hari">Jadwal Hari</label>
                        <input type="text" class="form-control" id="hari" name="hari" placeholder="Tuliskan Jadwal Hari" required>
                    </div>
                    <div class="form-group">
                        <label for="jam_mulai">Jam Mulai</label>
                        <input type="time" class="form-control" id="jam_mulai" name="jam_mulai" required>
                    </div>
                    <div class="form-group">
                        <label for="jam_selesai">Jam Selesai</label>
                        <input type="time" class="form-control" id="jam_selesai" name="jam_selesai" required>
                    </div>
                    <button type="submit" class="btn my-2 mx-auto rounded-pill fw-bold" id="ButtonDaftar">Tambah Jadwal</button>
                </form>
            </div>

        </div>
    </div>
</div>
</body>
@endsection