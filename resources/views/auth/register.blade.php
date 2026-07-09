<!DOCTYPE html>
<html>

<head>
    <title>Registrasi SIPM</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>

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
        .form-label {
            font-weight: 500;
            color: #495057;
        }
    </style>
</head>

<body class="bg-light">

<div class="container mb-5">
    <div class="row justify-content-center mt-5">
        <div class="col-md-6">
            <div class="card shadow border-0">
                <div class="card-header bg-purple-dark text-white py-3">
                    <h4 class="mb-0 fw-bold">Registrasi SIPM</h4>
                </div>
                <div class="card-body p-4">
                    
                    {{-- Error Message --}}
                    @if($errors->any())
                        <div class="alert alert-danger rounded-3">
                            <ul class="mb-0">
                                @foreach($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    <form action="{{ route('register') }}" method="POST" autocomplete="off">
                        @csrf
                        
                        <div class="mb-3">
                            <label class="form-label">NIK</label>
                            <input type="text" name="nik" class="form-control" value="{{ old('nik') }}" autocomplete="off">
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Nama Lengkap</label>
                            <input type="text" name="name" class="form-control" value="{{ old('name') }}" autocomplete="off">
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Email</label>
                            <input type="email" name="email" class="form-control" value="{{ old('email') }}" autocomplete="off">
                        </div>

                        <div class="mb-3">
                            <label class="form-label">No HP</label>
                            <input type="text" name="no_hp" class="form-control" value="{{ old('no_hp') }}" autocomplete="off">
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Alamat</label>
                            <textarea name="alamat" class="form-control" rows="3" autocomplete="off">{{ old('alamat') }}</textarea>
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Password</label>
                            <input type="password" name="password" class="form-control" autocomplete="new-password">
                        </div>

                        <div class="mb-4">
                            <label class="form-label">Konfirmasi Password</label>
                            <input type="password" name="password_confirmation" class="form-control" autocomplete="new-password">
                        </div>

                        <div class="d-grid">
                            <button type="submit" class="btn btn-purple-dark btn-lg fs-6">
                                Daftar Sekarang
                            </button>
                        </div>
                    </form>

                    <hr class="my-4 opacity-25">
                    <div class="text-center">
                        <a href="{{ route('login') }}" class="text-purple-dark">Sudah punya akun? Login</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

</body>
</html>