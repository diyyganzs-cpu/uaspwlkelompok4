<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Lupa Password</title>

    {{-- Bootstrap --}}
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/css/bootstrap.min.css" rel="stylesheet">

    {{-- Font Awesome --}}
    <link rel="stylesheet"
          href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css">

    {{-- CSS Login (kalau ada) --}}
    @vite(['resources/css/akses/login.css'])

    

<div class="container d-flex justify-content-center align-items-center" style="min-height:80vh;">
    <div class="card shadow" style="width:450px;">
        <div class="card-header text-white fw-bold" style="background:#2c1556;">
            Lupa Password

        </div>



        <div class="card-body">
            @if(session('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
            @endif



            @if($errors->any())
                <div class="alert alert-danger">
                    {{ $errors->first() }}
                </div>
            @endif



            <form action="{{ route('password.reset') }}" method="POST">
                @csrf



                <div class="mb-3">
                    <label class="form-label">NIK</label>
                    <input
                        type="text"
                        name="nik"
                        class="form-control"
                        required>
                </div>



                <div class="mb-3">
                    <label class="form-label">Email</label>
                    <input
                        type="email"
                        name="email"
                        class="form-control"
                        required>
                </div>



                <div class="mb-3">
                    <label class="form-label">Password Baru</label>
                    <input
                        type="password"
                        name="password"
                        class="form-control"
                        required>
                </div>



                <div class="mb-3">
                    <label class="form-label">Konfirmasi Password</label>
                    <input
                        type="password"
                        name="password_confirmation"
                        class="form-control"
                        required>
                </div>



                <button class="btn text-white w-100"
                        style="background:#2c1556;">
                    Reset Password
                </button>

                <a href="{{ route('login') }}"
                   class="btn btn-outline-secondary w-100 mt-2">
                    Kembali ke Login
                </a>
            </form>
        </div>
    </div>

</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
</head>
<body class="bg-light">