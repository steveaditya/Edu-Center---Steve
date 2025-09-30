<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
<style>
   #ButtonDaftar{
        background-color: #133E87;
        color: #CBDCEB;
        padding: 10px 40px;
        border-radius: 50px;
        transition: background-color 0.2s ease, color 0.2s ease, transform 0.2s ease;
    }
    #ButtonDaftar:hover{
        background-color: #CBDCEB;
        color: #133E87;
    }
    .text-1{
        color:#133E87;
    }
</style>
</head>
<body style="background-color: #F3F3E0; overflow-x:hidden;">
<div class="row justify-content-center mt-5">
    <div class="col-md-4">
        <div class="card shadow">
            <div class="card-body">
                <h3 class="card-title text-center mb-4" style="color:#133E87"><b>Register</b></h3>

                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul class="mb-0">
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <form method="POST" action="{{ route('register') }}">
                    @csrf
                    <div class="mb-3">
                        <label for="name" class="form-label">Nama</label>
                        <input type="text" class="form-control @error('name') is-invalid @enderror" 
                               id="name" name="name" value="{{ old('name') }}" required>
                    </div>

                    <div class="mb-3">
                        <label for="email" class="form-label">Email</label>
                        <input type="email" class="form-control @error('email') is-invalid @enderror" 
                               id="email" name="email" value="{{ old('email') }}" required>
                    </div>

                    <div class="mb-3">
                        <label for="phone_number" class="form-label">Nomor Telephone</label>
                        <input type="tel" class="form-control @error('phone_number') is-invalid @enderror" 
                               id="phone_number" name="phone_number" value="{{ old('phone_number') }}" required>
                    </div>


                    <div class="mb-3">
                        <label for="phone_number" class="form-label">Umur</label>
                        <input type="tel" class="form-control @error('age') is-invalid @enderror" 
                               id="age" name="age" value="{{ old('age') }}" required>
                    </div>


                    <div class="mb-3">
                    <label class="form-label">Jenis Kelamin</label><br>
                    <div class="form-check form-check-inline">
                        <input type="radio" class="form-check-input @error('gender') is-invalid @enderror" id="Laki-laki" name="gender" value="Laki-laki" 
                        {{ old('gender') == 'Laki-laki' ? 'checked' : '' }} required>
                        <label class="form-check-label" for="Laki-laki">Laki-laki</label>
                    </div>

                    <div class="form-check form-check-inline">
                        <input type="radio" class="form-check-input @error('gender') is-invalid @enderror" id="Perempuan" name="gender" value="Perempuan" 
                        {{ old('gender') == 'Perempuan' ? 'checked' : '' }}>
                        <label class="form-check-label" for="perempuan">Perempuan</label>
                    </div>

                    @error('gender')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                    <div class="mb-3">
                        <label for="password" class="form-label">Password</label>
                        <input type="password" class="form-control @error('password') is-invalid @enderror" 
                               id="password" name="password" required>
                    </div>

                    <div class="mb-3">
                        <label for="password_confirmation" class="form-label">Confirm Password</label>
                        <input type="password" class="form-control @error('password_confirmation') is-invalid @enderror" 
                               id="password_confirmation" name="password_confirmation" required>
                    </div>

                    <!-- New Role Selection Dropdown -->
                    <div class="mb-3">
                        <label for="role" class="form-label">Role</label>
                        <select class="form-control @error('role') is-invalid @enderror" id="role" name="role" required>
                            <!-- <option value="mentor" {{ old('role') == 'mentor' ? 'selected' : '' }}>mentor</option> -->
                            <option value="user" {{ old('role') == 'user' ? 'selected' : '' }}>Student</option>
                        </select>
                    </div>

                    <div class="d-grid">
                        <button type="submit" class="btn my-2 mx-auto rounded-pill fw-bold" id="ButtonDaftar">Register</button>
                    </div>
                </form>

                <div class="text-center mt-3">
                    <p>Already have an account? <a href="{{ route('login') }}" class="text-1">Login here</a></p>
                </div>
            </div>
        </div>
    </div>
</div>
</body>
</html>