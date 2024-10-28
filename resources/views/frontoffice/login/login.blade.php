<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <title>Login</title>
        <link
            href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"
            rel="stylesheet"
        />
        <link
            href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;700&display=swap"
            rel="stylesheet"
        />
        <link
            rel="stylesheet"
            href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css"
        />
        <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}"  />
    </head>
    <body>
        <div
            class="container d-flex justify-content-center align-items-center vh-100"
        >
            <div class="card" style="width: 30rem; height:30rem; border-radius: 30px;">
                <div class="card-body">
                    <figure
                        class="d-flex justify-content-center align-items-center mb-5"
                    >
                        <img
                            class="img-fluid me-2"
                            style="width: 100px; height: 100px"
                            src="{{ asset('image/logo.png') }}"
                            alt="Logo"
                        />
                        <figcaption>
                            <h2
                                class="text-secondary m-4"
                                style="line-height: 15px"
                            >
                                <strong class="text-primary">
                                    <p style="color: black; font-size:40px">Portal</p>
                                </strong>
                                <p style="color: orange; font-size:40px ">Alumni</p>
                            </h2>
                        </figcaption>
                    </figure>
                    <form method="POST" action="{{ route('user.login') }}">
                        @csrf
                        <div class="mb-3 input-group">
                            <span class="input-group-text">
                                <i class="fas fa-envelope fa-2x"></i>
                            </span>
                            <input
                                type="text"
                                class="form-control @error('nim') is-invalid @enderror"
                                id="nim"
                                name="email"
                                placeholder="Nim"
                                value="{{ old('nim') }}"
                                required
                                autofocus
                            />
                            @error('nim')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="mb-3 input-group">
                            <span class="input-group-text">
                                <i class="fas fa-lock fa-2x"></i>
                            </span>
                            <input
                                type="password"
                                class="form-control @error('password') is-invalid @enderror"
                                id="password"
                                name="password"
                                placeholder="Kata Sandi"
                                required
                            />
                            @error('password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="d-flex justify-content-center">
                            <button
                                type="submit"
                                class="btn btn-primary"
                                style="
                                margin-top: 20px;
                                    width: 170px;
                                    height: 55px;
                                    border-radius: 15px;
                                    background-color: #3355ab;
                                "
                            >
                                Masuk
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/5.1.0/js/bootstrap.bundle.min.js"></script>
    </body>
</html>

<style>
    body {
        background-image: url('{{ asset('image/login1.png') }}'), url('{{ asset('image/login2.png') }}');
        background-position: top left, bottom right;
        background-repeat: no-repeat, no-repeat;
        background-size: 600px 400px, 400px 600px;
    }
</style>