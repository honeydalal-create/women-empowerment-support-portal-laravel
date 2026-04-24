<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>header</title>
    <style>
        header {
            height: 70px;
            padding: 0 30px;
            position: fixed;
            top: 0;
            left: 240px;
            right: 0;
            z-index: 1000;
            display: flex;
            align-items: center;
            justify-content: space-between;
            color: #fff;
            background: rgba(106, 27, 154, 0.95); /* Slightly more opaque for joint effect */
            box-shadow: 0 4px 12px rgba(106, 27, 154, 0.5);
            border-radius: 0; /* Remove rounded corners for joint */
        }

        .header-left {
            font-size: 26px;
            font-weight: 700;
            letter-spacing: 1.5px;
            color: #fff;
        }

        .header-right button {
            background: #fff;
            color: #6a1b9a;
            border: none;
            padding: 10px 24px;
            border-radius: 25px;
            cursor: pointer;
            font-size: 14px;
            font-weight: 600;
            transition: all 0.3s ease;
        }

        .header-right button:hover {
            background: #4a0072;
            color: #fff;
            transform: scale(1.05);
        }
        </style>
</head>
<body>
<header>
    <div class="header-left">Strength • Support • Success</div>
    <div class="header-right">
        <form method="POST" action="{{ route('woman.logout') }}">
            @csrf
            <button type="submit">Logout</button>
        </form>
    </div>
</header>

</body>
</html>
