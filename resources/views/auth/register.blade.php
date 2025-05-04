

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Authfy Registration</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" rel="stylesheet">
    <script src="https://www.google.com/recaptcha/api.js" async defer></script>
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
        .toggle-password-icon {
            position: absolute;
            top: 50%;
            right: 12px;
            transform: translateY(50%);
            cursor: pointer;
            z-index: 2;
            color: #888;
        }
    </style>
</head>
<body>
    <div class="auth-container">
        <div class="auth-box row g-0">
            <div class="col-md-6 auth-left text-center">
                <h1>Welcome to Authfy</h1>
                <p>Register using social media to get started quickly</p>
                <button class="btn btn-facebook">Signup with Facebook</button>
                <button class="btn btn-twitter">Signup with Twitter</button>
                <button class="btn btn-google">Signup with Google</button>
            </div>
            <div class="col-md-6 auth-right">
                <form method="POST" action="{{ route('register') }}">
                    @csrf            
                    <h5 class="mb-4">Create Your Account</h5>

                    <div class="mb-3">
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="userType" id="studentSignup" value="student">
                            <label class="form-check-label" for="studentSignup">Student</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="userType" id="instructorSignup" value="instructor">
                            <label class="form-check-label" for="instructorSignup">Instructor</label>
                        </div>
                    </div>

                    <div class="mb-3">
                        <label for="name" class="form-label">Full Name</label>
                        <input type="text" name="name" class="form-control" id="name" required :value="old('name')" required autofocus autocomplete="name">
                        <p class="text-danger fw-medium">@error('name') {{$message}} @enderror</p>
                    </div>

                   

                    <div class="mb-3">
                        <label for="email" class="form-label">Email address</label>
                        <input type="email" name="email" class="form-control" id="email" required :value="old('email')" required autocomplete="username">
                        <p class="text-danger fw-medium">@error('email') {{$message}} @enderror</p>
                    </div>
                   


                    <div class="mb-3 position-relative">
                        <label for="password" class="form-label">Password</label>
                        <input type="password"  class="form-control" id="password" required  name="password"  required autocomplete="new-password" />
                        <i class="fa-solid fa-eye toggle-password-icon" onclick="togglePassword('password', this)"></i>
                        <p class="text-danger fw-medium">@error('password') {{$message}} @enderror</p>
                    </div>
                <!-- Confirm Password -->
                    <div class="mb-3 position-relative">
                        <label for="confirmPassword" class="form-label">Confirm Password</label>
                        <input type="password" class="form-control" id="confirmPassword" required name="password_confirmation" required autocomplete="new-password">
                        <i class="fa-solid fa-eye toggle-password-icon" onclick="togglePassword('confirmPassword', this)"></i>
                        <p class="text-danger fw-medium">@error('password_confirmation') {{$message}} @enderror</p>
                    </div>

                    <div class="d-flex justify-content-between align-items-center mb-3">
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" id="terms" required>
                            <label class="form-check-label" for="terms">I agree to the terms</label>
                        </div>
                        
                    </div>
                    <div class="mb-3 text-center recaptcha-animate">
                        <div class="g-recaptcha" data-sitekey="YOUR_SITE_KEY"></div>
                    </div>
                    <button type="submit" class="btn btn-primary w-100">Register</button>
                </form>
            </div>
        </div>
    </div>

    <script>
        function togglePassword(inputId, icon) {
            const input = document.getElementById(inputId);
            const isVisible = input.type === 'text';
            input.type = isVisible ? 'password' : 'text';
            icon.classList.toggle('fa-eye');
            icon.classList.toggle('fa-eye-slash');
        }

        document.getElementById('registrationForm').addEventListener('submit', function(event) {
            event.preventDefault();

            const password = document.getElementById('password').value;
            const confirmPassword = document.getElementById('confirmPassword').value;

            if (password !== confirmPassword) {
                alert('Passwords do not match!');
                return;
            }

            alert('Registration successful!');
        });
    </script>
</body>
</html>






