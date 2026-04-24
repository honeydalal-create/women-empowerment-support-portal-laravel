<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Forgot Password - Admin</title>

<!-- Google Font -->
<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600;700&display=swap" rel="stylesheet">

<!-- Bootstrap -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

<style>
    body {
        font-family: 'Poppins', sans-serif;
        background: linear-gradient(135deg, #fceaff, #e3eaff);
        min-height: 100vh;
        display: flex;
        justify-content: center;
        align-items: center;
    }

    /* ✅ HEIGHT INCREASED HERE */
    .container-card {
        width: 900px;
        min-height: 520px;      /* increased */
        display: flex;
        border-radius: 20px;
        overflow: hidden;
        box-shadow: 0 20px 40px rgba(0,0,0,0.15);
        background: #fff;
    }

    .left-image {
        flex: 1.1;
        background: url('{{ asset("image/forget.png") }}') center center no-repeat;
        background-size: cover;
        position: relative;
        min-height: 520px;      /* match container */
    }

    .left-image::after {
        content: '';
        position: absolute;
        inset: 0;
        background: linear-gradient(to bottom right, rgba(106,27,154,0.6), rgba(255,79,139,0.5));
    }

    .image-text {
        position: relative;
        z-index: 2;
        height: 100%;
        display: flex;
        justify-content: center;
        align-items: center;
        text-align: center;
        color: #fff;
        padding: 30px;
    }

    .image-text h2 {
        font-size: 30px;
        font-weight: 700;
    }

    .right-form {
        flex: 0.5;
        padding: 60px 45px;    /* more vertical space */
        display: flex;
        flex-direction: column;
        justify-content: center;
        background: #fff;
    }

    .right-form h3 {
        font-size: 28px;
        font-weight: 700;
        color: #6a1b9a;
        margin-bottom: 20px;
        text-align: center;
    }

    .right-form p {
        font-size: 14px;
        color: #555;
        margin-bottom: 20px;
        text-align: center;
    }

    .right-form input {
        width: 100%;
        padding: 15px 18px;
        margin-bottom: 20px;
        border-radius: 8px;
        border: 1px solid #ddd;
        font-size: 14px;
        outline: none;
    }

    .right-form button {
        width: 100%;
        padding: 15px;
        border-radius: 8px;
        border: none;
        background: linear-gradient(to right, #ff4f8b, #e91e63);
        color: #fff;
        font-weight: 700;
        font-size: 16px;
        cursor: pointer;
        transition: 0.3s;
    }

    .right-form button:hover {
        opacity: 0.9;
    }

    .right-form .back-link {
        text-align: center;
        margin-top: 18px;
    }

    .right-form .back-link a {
        color: #ff4f8b;
        text-decoration: none;
        font-weight: 600;
    }

    .alert {
        font-size: 14px;
        text-align: center;
    }

    /* Responsive */
    @media(max-width: 768px){
        .container-card {
            flex-direction: column;
            width: 90%;
            min-height: auto;
        }

        .left-image {
            min-height: 260px;
        }

        .right-form {
            padding: 35px 25px;
        }
    }
</style>
</head>

<body>

<div class="container-card">

    <!-- Left Side Image -->
    <div class="left-image">
        <div class="image-text">
            <div>
                <h2>EmpowerHer</h2>
                <p>Secure your admin account and reset your password easily.</p>
            </div>
        </div>
    </div>

    <!-- Right Side Form -->
    <div class="right-form">
        <h3>Forgot Password</h3>

        @if(session('error'))
            <div class="alert alert-danger">{{ session('error') }}</div>
        @endif

        <form action="{{ route('company.forgot.check') }}" method="POST">
            @csrf
            <input type="email" name="email" placeholder="Enter your registered email" required>
            <button type="submit">Next</button>
        </form>

        <div class="back-link">
            <a href="{{ url('/company/login') }}">Back to Login</a>
        </div>
    </div>

</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
