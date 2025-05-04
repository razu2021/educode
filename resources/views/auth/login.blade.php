


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Authfy Login</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            margin: 0;
            padding: 0;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background: url('https://img.freepik.com/free-photo/both-male-female-tourists-stand-see-map-road_1150-24547.jpg?t=st=1746378454~exp=1746382054~hmac=d29cbf11af4e2fa79cc67c1535c990a45c612d68ea3604bcbec899639c36d5e3&w=996') no-repeat center center fixed;
            background-size: cover;
        }
        .auth-container {
            display: flex;
            flex-wrap: wrap;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
            background-color: rgba(0, 0, 0, 0.5);
        }
        .auth-box {
            background: #fff;
            border-radius: 10px;
            box-shadow: 0 0 30px rgba(0,0,0,0.2);
            overflow: hidden;
            max-width: 900px;
            width: 100%;
        }
        .auth-left, .auth-right {
            padding: 40px;
        }
        .auth-left {
            background-color: #2c3e50;
            color: white;
        }
        .auth-left h1 {
            font-size: 28px;
            margin-bottom: 20px;
        }
        .auth-left button {
            width: 100%;
            margin-bottom: 15px;
        }
        .btn-facebook { background-color: #3b5998; color: white; }
        .btn-twitter { background-color: #1da1f2; color: white; }
        .btn-google { background-color: #dd4b39; color: white; }
        .form-control:focus {
            box-shadow: none;
        }
        .auth-right h5 {
            margin-bottom: 20px;
        }
        @media (max-width: 768px) {
            .auth-left, .auth-right {
                padding: 20px;
            }
        }
        .toggle-password-btn {
            position: absolute;
            top: 73%;
            right: 0px;
            transform: translateY(-50%);
            z-index: 2;
        }
    </style>
</head>
<body>
    <div class="auth-container">
        <div class="auth-box row g-0">
            <div class="col-md-6 auth-left text-center">
                <h1>Educode!</h1>
                <p>Login using social media to get quick access</p>
                <button class="btn btn-facebook">Signin with Facebook</button>
                <button class="btn btn-twitter">Signin with Twitter</button>
                <button class="btn btn-google">Signin with Google</button>
            </div>
            <div class="col-md-6 auth-right">
                <form method="POST" action="{{ route('login') }}">
                    @csrf
                    <div class="mb-3">
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="userType" id="studentLogin" value="student">
                            <label class="form-check-label" for="studentLogin">Student Login</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="userType" id="instructorLogin" value="instructor">
                            <label class="form-check-label" for="instructorLogin">Instructor Login</label>
                        </div>
                    </div>

                    <div class="mb-3">
                        <label for="email" class="form-label">Email address</label>
                        <input type="email" class="form-control" id="email" type="email" name="email" :value="old('email')" required autofocus autocomplete="username">
                        <p class="text-danger fw-medium">@error('email') {{$message}} @enderror</p>
                    </div>

                    <div class="mb-3 position-relative">
                        <label for="password" class="form-label">Password</label>
                        <input type="password" class="form-control" id="password" name="password" required autocomplete="current-password">
                        <button type="button" class="btn btn-sm btn-outline-secondary toggle-password-btn" onclick="togglePassword()">Show</button>
                        <x-input-error :messages="$errors->get('password')" class="mt-2" />
                    </div>
                    <div class="d-flex justify-content-between align-items-center mb-3">
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" id="rememberMe" name="remember">
                            <label class="form-check-label" for="rememberMe">Remember me</label>
                        </div>
                        @if (Route::has('password.request'))
                        <a href="{{ route('password.request') }}">Forgot password?</a>
                        @endif
                    </div>
                    <button type="submit" class="btn btn-primary w-100">Login with email</button>
                </form>
            </div>
        </div>
    </div>

    <script>
        function togglePassword() {
            const passwordInput = document.getElementById('password');
            const toggleBtn = event.target;
            if (passwordInput.type === 'password') {
                passwordInput.type = 'text';
                toggleBtn.textContent = 'Hide';
            } else {
                passwordInput.type = 'password';
                toggleBtn.textContent = 'Show';
            }
        }
    </script>
</body>
</html>


