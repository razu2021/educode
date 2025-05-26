<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>We'll Be Back Soon!</title>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600;700&display=swap" rel="stylesheet">
    <style>
        body {
            margin: 0;
            padding: 0;
            font-family: 'Poppins', sans-serif;
            background: linear-gradient(135deg, #667eea, #764ba2);
            height: 100vh;
            color: #ffffff;
            display: flex;
            align-items: center;
            justify-content: center;
            flex-direction: column;
            text-align: center;
        }

        .container {
            padding: 20px;
        }

        h1 {
            font-size: 48px;
            margin-bottom: 20px;
            text-shadow: 2px 2px 4px rgba(0,0,0,0.3);
            opacity: 0; /* Initially hidden */
        }

        p {
            font-size: 20px;
            margin-bottom: 30px;
            opacity: 0; /* Initially hidden */
        }

        .logo {
            width: 120px;
            height: auto;
            margin-bottom: 20px;
            opacity: 0; /* Initially hidden */
        }

        .footer {
            position: absolute;
            bottom: 20px;
            font-size: 14px;
            color: rgba(255, 255, 255, 0.7);
            opacity: 0; /* Initially hidden */
        }
    </style>
</head>
<body>
    <div class="container">
        <!-- Logo (If you have one) -->
        {{-- <img src="{{ asset('your-logo.png') }}" alt="Logo" class="logo"> --}}

        <h1>{{$maintenancemode->title ?? "We'll Be Back Soon!"}}</h1>
        <p>{!! $maintenancemode->caption ?? 'Our website is currently under maintenance. We are working hard to bring it back soon!' !!}</p>

        <div class="footer">
            &copy; {{ date('Y') }} Your Company Name. All rights reserved.
        </div>
    </div>

    <!-- GSAP Library -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.10.1/gsap.min.js"></script>
    <script>
        window.onload = function() {
            // Animating elements using GSAP
            gsap.to("h1", { opacity: 1, y: 0, duration: 1, delay: 0.5, ease: "power3.out" });
            gsap.to("p", { opacity: 1, y: 0, duration: 1, delay: 1, ease: "power3.out" });
            gsap.to(".logo", { opacity: 1, scale: 1, duration: 1, delay: 1.2, ease: "power3.out" });
            gsap.to(".footer", { opacity: 1, y: 0, duration: 1, delay: 1.5, ease: "power3.out" });
        }
    </script>
</body>
</html>
