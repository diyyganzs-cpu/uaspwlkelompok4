<!DOCTYPE html>
<html>

<head>
    <title>Login SIPM</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        /* Tema Ungu Gelap Kustom */
        .bg-purple-dark {
            background-color: #2c1556 !important;
        }
        .btn-purple-dark {
            background-color: #2c1556 !important;
            border-color: #2c1556 !important;
            color: #fff !important;
            transition: all 0.3s ease;
        }
        .btn-purple-dark:hover {
            background-color: #1d0e3a !important;
            border-color: #1d0e3a !important;
        }
        .text-purple-dark {
            color: #2c1556 !important;
            text-decoration: none;
            font-weight: 500;
        }
        .text-purple-dark:hover {
            color: #1d0e3a !important;
            text-decoration: underline;
        }
    </style>
</head>

<body class="bg-light">

<div class="container">
    <div class="row justify-content-center mt-5">
        <div class="col-md-4">
            <div class="card shadow border-0">
                <div class="card-header bg-purple-dark text-white py-3">
                    <h4 class="mb-0 fw-bold">Login SIPM</h4>
                </div>
                <div class="card-body p-4">
                    
                    {{-- Error Message --}}
                    @if($errors->any())
                        <div class="alert alert-danger">
                            {{ $errors->first() }}
                        </div>
                    @endif

                    <form action="{{ route('login') }}" method="POST">
                        @csrf
                        <div class="mb-3">
                            <label class="form-label fw-medium">Email atau NIK</label>
                            <input 
                                type="text" 
                                name="login" 
                                class="form-control" 
                                value="{{ old('login') }}" 
                                required>
                        </div>
                        <div class="mb-3">
                            <label class="form-label fw-medium">Password</label>
                            <input 
                                type="password" 
                                name="password" 
                                class="form-control" 
                                required>
                        </div>
                        <div class="d-grid mt-4">
                            <button type="submit" class="btn btn-purple-dark btn-lg fs-6">
                                Login
                            </button>
                        </div>
                    </form>

                    <hr class="my-4 opacity-25">
                    <div class="text-center">
                        <a href="{{ route('register') }}" class="text-purple-dark">Belum punya akun? Daftar</a>
                        <br><br>
                        <a href="{{ route('forgot.password') }}" class="text-purple-dark small">Lupa Password?</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

</body>
</html>