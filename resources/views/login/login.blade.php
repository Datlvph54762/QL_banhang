<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="{{ asset('css/login.css') }}">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM"
        crossorigin="anonymous"></script>
</head>

<body>
    <div class="container">
        <div class="login px-5 py-4 shadow-lg bg-light">
            <form action="{{ route('login') }}" method="POST">
                @csrf
                <div class="text_title">
                    <h2 class="fw-4">Sign In</h2>
                    <p>Enter your credentials to access your account</p>
                </div>

                @if ($errors->any())
                    <div class="alert alert-danger text-start">
                        <ul class="mb-0 mt-1">
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                <div class="form_input">
                    <div class="form-group text-start my-3">
                        <input type="text" name="email" class=" input form-control  " value="{{ old('email') }}"
                            placeholder="Email Address">
                        @error('email')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>

                    <div class="form-group text-start my-3">
                        <input type="password" name="password" class=" input form-control " placeholder="password">
                        @error('password')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                </div>
                <div class="form_helper d-flex ">
                    <div class="form-helper_remember">
                        <input type="checkbox">
                        <label for="">Remember me</label>
                    </div>
                    <div class="form-helper_forgot">
                        <a href="#" class="forgot">Forgot password!</a>
                    </div>
                </div>
                <div class="submit">
                    <button class="btn btn-primary w-100 my-4">Sign In</button>
                </div>
                <div class="signup_link">
                    <p>Don't have an account? <a href="#" class="link">Create one</a></p>
                </div>
            </form>
        </div>
    </div>
</body>

</html>