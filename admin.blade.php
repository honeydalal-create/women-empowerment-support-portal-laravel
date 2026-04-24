<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Admin Login</title>

    <!-- Google Font -->
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600;700&display=swap" rel="stylesheet">

    <style>
        * {
            box-sizing: border-box;
        }

        body {
            margin: 0;
            padding: 0;
            font-family: 'Poppins', sans-serif;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;

            background: linear-gradient(135deg, #fceaff, #e3eaff);
            animation: pageFade 1s ease;
        }

        .container {
            width: 900px;
            height: 550px;
            display: flex;
            border-radius: 20px;
            overflow: hidden;
            box-shadow: 0 20px 40px rgba(0,0,0,0.1);
            background: #fff;
        }

        /* Left Image */
        .left {
            flex: 1.1;
            background: url('{{ asset("image/admin.jpeg") }}') center center no-repeat;
            background-size: cover;
            animation: slideLeft 1.2s ease;
        }

        /* Right Form */
        .right {
            flex: 0.5;
            padding: 60px 50px;
            display: flex;
            flex-direction: column;
            justify-content: center;
            animation: slideRight 1.2s ease;
        }

        .right h3 {
            color: #222;
            margin-bottom: 20px;
            font-weight: 700;
            font-size: 28px;
        }

        .right p {
            color: #555;
            font-size: 14px;
            margin-bottom: 30px;
        }

        .right form input {
            width: 100%;
            padding: 15px 20px;
            margin-bottom: 20px;
            border-radius: 8px;
            border: 1px solid #ddd;
            outline: none;
            font-size: 14px;
        }

        .right form button {
            width: 100%;
            padding: 15px;
            border-radius: 8px;
            border: none;
            background: #ff4d6d;
            color: #fff;
            font-weight: 700;
            cursor: pointer;
            font-size: 16px;
            transition: 0.3s;
        }

        .right form button:hover {
            background: #e43d5a;
        }

        .error {
            color: #ff4d6d;
            text-align: center;
            margin-bottom: 15px;
            font-size: 14px;
        }

        /* Forgot + Home */
        .links {
            display: flex;
            justify-content: space-between;
            margin-bottom: 20px;
            font-size: 13px;
        }

        .links a {
            color: #ff4d6d;
            text-decoration: none;
            font-weight: 500;
        }

        /* Animations */
        @keyframes slideLeft {
            from { opacity: 0; transform: translateX(-60px); }
            to { opacity: 1; transform: translateX(0); }
        }

        @keyframes slideRight {
            from { opacity: 0; transform: translateX(60px); }
            to { opacity: 1; transform: translateX(0); }
        }

        @keyframes pageFade {
            from { opacity: 0; }
            to { opacity: 1; }
        }

        /* Responsive */
        @media(max-width: 900px){
            .container {
                flex-direction: column;
                width: 90%;
                height: auto;
            }
            .left {
                height: 260px;
            }
            .right {
                padding: 30px 20px;
            }
        }

    </style>
</head>
<body>

<div class="container">

    <!-- Left Image -->
    <div class="left"></div>

    <!-- Right Form -->
    <div class="right">
        <h3>Admin Login</h3>

        @if(session('error'))
            <div class="error">{{ session('error') }}</div>
        @endif

        <form action="{{ route('visitor.admin') }}" method="POST">
            @csrf
            <input type="email" name="email" placeholder="Email" required>
            <input type="password" name="password" placeholder="Password" required>

            <div class="links">
               <a href="{{ route('admin.forgot') }}">Forgot Password?</a>

                <a href="{{ route('welcome') }}">Home</a>
            </div>

            <button type="submit">LOGIN</button>
        </form>

    </div>

</div>

</body>
</html>
