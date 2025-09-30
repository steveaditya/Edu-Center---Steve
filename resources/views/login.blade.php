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
                <h3 class="card-title text-center mb-4" style="color:#133E87"><b>Login</b></h3>

                @if ($errors->any())
                    <div class="alert alert-danger">
                        @foreach ($errors->all() as $error)
                            {{ $error }}
                        @endforeach
                    </div>
                @endif

                <form method="POST" action="{{ route('login') }}">
                    @csrf
                    <div class="mb-3">
                        <label for="email" class="form-label">Email</label>
                        <input type="email" class="form-control" id="email" name="email" 
                               value="{{ old('email') }}" required>
                    </div>

                    <div class="mb-3">
                        <label for="password" class="form-label">Password</label>
                        <input type="password" class="form-control" id="password" name="password" required>
                    </div>

                    <div class="mb-3 form-check">
                        <input type="checkbox" class="form-check-input" id="remember_me" name="remember_me">
                        <label class="form-check-label" for="remember_me">Remember Me</label>
                    </div>

                    <div class="d-grid">
                        <button type="submit" class="btn my-2 mx-auto rounded-pill fw-bold" id="ButtonDaftar">Login</button>
                        <!-- <a href="{{ route( 'tentang-kami') }}" class="btn ms-auto rounded-pill fw-bold" id="ButtonDaftar">Login</a> -->

                    </div>
                </form>

                <div class="text-center mt-3">
                    <p>Don't have an account? <a href="{{ route('register') }}" class="text-1">Register</a></p>
                </div>
            </div>
        </div>
    </div>

</div>
</body>
</html>