<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>EmpowerHer - Login</title>

    <!-- Google Font -->
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600;700&display=swap" rel="stylesheet">

    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
        body {
            font-family: 'Poppins', sans-serif;
            background: linear-gradient(to right, #f3e5f5, #fce4ec);
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        h1 {
            text-align: center;
            font-size: 42px;
            color: #6a1b9a;
            font-weight: 700;
            margin-bottom: 10px;
        }

        .subtitle {
            text-align: center;
            color: #555;
            margin-bottom: 30px;
            font-size: 18px;
        }

        .main-card {
            max-width: 1050px;
            margin: auto;
            background: rgba(255, 255, 255, 0.85);
            border-radius: 22px;
            overflow: hidden;
            box-shadow: 0 20px 40px rgba(0,0,0,0.2);
        }

        .form-card {
            padding: 45px;
        }

        .image-side {
            background-image: url('/image/login.jpeg');
            background-size: cover;
            background-position: center;
            position: relative;
        }

        .image-side::after {
            content: '';
            position: absolute;
            inset: 0;
            background: linear-gradient(to bottom right, rgba(106,27,154,0.7), rgba(255,79,139,0.6));
        }

        .image-text {
            position: relative;
            z-index: 2;
            height: 100%;
            display: flex;
            align-items: center;
            justify-content: center;
            text-align: center;
            color: #fff;
            padding: 40px;
        }

        .label-title {
            font-weight: 600;
            color: #6a1b9a;
        }

        .btn-submit {
            background: linear-gradient(to right, #ff4f8b, #e91e63);
            border: none;
            font-size: 20px;
            padding: 12px;
            border-radius: 10px;
        }

        .btn-submit:hover {
            opacity: 0.9;
        }

        /* LINKS SIDE BY SIDE */
        .links {
            display: flex;
            justify-content: space-between;
            margin-top: 15px;
            font-size: 14px;
        }

        .links a {
            color: #e91e63;
            text-decoration: none;
            font-weight: 500;
        }

        .links a:hover {
            text-decoration: underline;
        }

        @media (max-width: 768px) {
            .image-side {
                display: none;
            }
        }
    </style>
</head>

<body>

<div class="container">
    <h1>Your Journey Starts Here</h1>
    <p class="subtitle">Learn, grow, and build a stronger future with EmpowerHer.</p>

    <div class="row main-card">

        <!-- LEFT FORM -->
        <div class="col-md-6 form-card">
            <form action="{{ route('login') }}" method="POST">
                @csrf

                <div class="mb-3">
                    <label class="label-title">Email Address</label>
                    <input type="email" name="email" class="form-control" placeholder="Enter your email" required>
                </div>

                <div class="mb-3">
                    <label class="label-title">Password</label>
                    <input type="password" name="password" class="form-control" placeholder="Enter your password" required>
                </div>

                <button type="submit" class="btn btn-submit text-white w-100">Login</button>

                <!-- SIDE BY SIDE LINKS -->
                <div class="links">
                    <a href="{{ route('visitor.forgotpassword') }}">Forgot Password?</a>
                    <a href="{{ route('welcome') }}">Home</a>
                    
                </div>

                <p class="text-center mt-3">
                    Don't have an account?
                    <a href="{{ route('register') }}">Register here</a>
                </p>
            </form>
        </div>

        <!-- RIGHT IMAGE -->
        <div class="col-md-6 image-side">
            <div class="image-text">
                <div>
                    <h2>Welcome Back 💖</h2>
                    <p>Unlock skills, explore careers, and build a confident future.</p>
                </div>
            </div>
        </div>

    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
