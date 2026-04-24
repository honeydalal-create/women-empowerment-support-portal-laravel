<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Reset Password - Admin</title>

<!-- Google Font -->
<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600;700&display=swap" rel="stylesheet">

<!-- Bootstrap -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

<style>
    body {
        font-family: 'Poppins', sans-serif;
        background: linear-gradient(135deg, #fceaff, #e3eaff);
        background-size: 200% 200%;
        animation: bgMove 8s ease infinite;   /* 🔥 background animation */
        min-height: 100vh;
        display: flex;
        justify-content: center;
        align-items: center;
    }

    /* MAIN CARD */
    .container-card {
        width: 900px;
        min-height: 560px;
        display: flex;
        border-radius: 20px;
        overflow: hidden;
        box-shadow: 0 20px 40px rgba(0,0,0,0.15);
        background: #fff;
        animation: floatCard 4s ease-in-out infinite; /* 🔥 floating animation */
    }

    .left-image {
        flex: 1.1;
        background: url('{{ asset("image/reset.png") }}') center center no-repeat;
        background-size: cover;
        position: relative;
        min-height: 560px;
    }

    .left-image::after {
        content: '';
        position: absolute;
        inset: 0;
        background: linear-gradient(
            45deg,
            rgba(106,27,154,0.6),
            rgba(255,79,139,0.5),
            rgba(106,27,154,0.6)
        );
        background-size: 300% 300%;
        animation: gradientMove 6s ease infinite; /* 🔥 gradient animation */
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
        animation: textFloat 3.5s ease-in-out infinite;
    }

    .image-text h2 {
        font-size: 30px;
        font-weight: 700;
    }

    .right-form {
        flex: 0.5;
        padding: 60px 45px;
        display: flex;
        flex-direction: column;
        justify-content: center;
        background: #fff;
    }

    .right-form h3 {
        font-size: 28px;
        font-weight: 700;
        color: #6a1b9a;
        margin-bottom: 25px;
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
        animation: pulseBtn 2.5s infinite; /* 🔥 button pulse */
    }

    .right-form button:hover {
        opacity: 0.9;
    }

    .back-link {
        text-align: center;
        margin-top: 18px;
    }

    .back-link a {
        color: #ff4f8b;
        text-decoration: none;
        font-weight: 600;
    }

    /* 🔥 CONTINUOUS ANIMATIONS */
    @keyframes bgMove {
        0% { background-position: 0% 50%; }
        50% { background-position: 100% 50%; }
        100% { background-position: 0% 50%; }
    }

    @keyframes floatCard {
        0%,100% { transform: translateY(0); }
        50% { transform: translateY(-10px); }
    }

    @keyframes gradientMove {
        0% { background-position: 0% 50%; }
        50% { background-position: 100% 50%; }
        100% { background-position: 0% 50%; }
    }

    @keyframes textFloat {
        0%,100% { transform: translateY(0); }
        50% { transform: translateY(-6px); }
    }

    @keyframes pulseBtn {
        0% { box-shadow: 0 0 0 0 rgba(233,30,99,0.6); }
        70% { box-shadow: 0 0 0 15px rgba(233,30,99,0); }
        100% { box-shadow: 0 0 0 0 rgba(233,30,99,0); }
    }

    /* Responsive */
    @media(max-width: 768px){
        .container-card {
            flex-direction: column;
            width: 90%;
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

    <!-- Left Side -->
    <div class="left-image">
        <div class="image-text">
            <div>
                <h2>EmpowerHer</h2>
                <p>Securely reset your password to access the admin dashboard.</p>
            </div>
        </div>
    </div>

    <!-- Right Side -->
    <div class="right-form">
        <h3>Reset Password</h3>

        @if(session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif

        @if(session('error'))
            <div class="alert alert-danger">{{ session('error') }}</div>
        @endif

        <form action="{{ route('visitor.reset.submit') }}" method="POST">
            @csrf
            <input type="hidden" name="email" value="{{ $email }}">
            <input type="password" name="password" placeholder="New Password" required>
            <input type="password" name="password_confirmation" placeholder="Confirm Password" required>
            <button type="submit">Reset Password</button>
        </form>

        <div class="back-link">
            <a href="{{ url('/visitor/login') }}">Back to Login</a>
        </div>
    </div>

</div>

</body>
</html>
