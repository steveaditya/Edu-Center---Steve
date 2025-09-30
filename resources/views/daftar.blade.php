<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar</title>
    <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}">
</head>
<body>
    <div class="container mt-5">
        <h1 class="text-center">Form Pendaftaran</h1>

        @if(session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif

        <form action="{{ url('/daftar') }}" method="POST">
            @csrf
            <div class="mb-3">
                <label for="nama" class="form-label">Nama Lengkap</label>
                <input type="text" class="form-control" id="nama" name="nama" value="{{ old('nama') }}" required>
                @error('nama') <div class="text-danger">{{ $message }}</div> @enderror
            </div>

            <div class="mb-3">
                <label for="email" class="form-label">Email</label>
                <input type="email" class="form-control" id="email" name="email" value="{{ old('email') }}" required>
                @error('email') <div class="text-danger">{{ $message }}</div> @enderror
            </div>

            <div class="mb-3">
                <label for="password" class="form-label">Password</label>
                <input type="password" class="form-control" id="password" name="password" required>
                @error('password') <div class="text-danger">{{ $message }}</div> @enderror
            </div>

            <div class="mb-3">
                <label for="password_confirmation" class="form-label">Konfirmasi Password</label>
                <input type="password" class="form-control" id="password_confirmation" name="password_confirmation" required>
            </div>

            <div class="mb-3">
                <label for="nomor_hp" class="form-label">Nomor HP</label>
                <!-- <input type="text" class="form-control" id="nomor_hp" name="nomor_hp" value="{{ old('nomor_hp') }}" required> -->
                <input type="text" name="nomor_hp" placeholder="Nomor HP" required>
                @error('nomor_hp') <div class="text-danger">{{ $message }}</div> @enderror
            </div>

            <div class="mb-3">
                <label for="jenis_kelamin" class="form-label">Jenis Kelamin</label>
                <!-- <select id="jenis_kelamin" class="form-select" name="jenis_kelamin" required>
                    <option value="" disabled selected>Pilih</option>
                    <option value="Male">Laki-laki</option>
                    <option value="Female">Perempuan</option>
                </select> -->
                <select name="jenis_kelamin" required>
                    <option value="Male">Male</option>
                    <option value="Female">Female</option>
                </select>

                @error('jenis_kelamin') <div class="text-danger">{{ $message }}</div> @enderror
            </div>

            <div class="mb-3">
                <label for="umur" class="form-label">Umur</label>
                <input type="number" class="form-control" id="umur" name="umur" value="{{ old('umur') }}" required>
                @error('umur') <div class="text-danger">{{ $message }}</div> @enderror
            </div>

            <button type="submit" class="btn btn-primary">Daftar</button>
        </form>
    </div>
</body>
</html>
