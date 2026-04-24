<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Helpline Numbers</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
        body {
            font-family: 'Poppins', sans-serif;
            background-image: url('/image/p2.jpg');
            background-size: cover;
            background-position: center;
            background-attachment: fixed;
            background-repeat: no-repeat;
            min-height: 100vh;
            display: flex;
            flex-direction: column;
        }

        /* NAVBAR FIX */
        .navbar-nav {
            flex-wrap: nowrap;
        }

        .navbar-nav .nav-link {
            white-space: nowrap;
        }

        /* SAME AS ABOUT PAGE */
        .page-wrapper {
            flex: 1;
            display: flex;
            justify-content: center;
            align-items: center;
            padding-top: 80px;   /* 🔽 yaha 120px se 80px kiya */
            padding-bottom: 40px;
        }

        .container {
            max-width: 950px;
        }

        h2 {
            text-align: center;
            color: #4a148c;
            margin-bottom: 20px;
            font-weight: 600;
        }

        /* 🌸 COLORFUL HELPLINE CARD DESIGN */
        .card {
            background: linear-gradient(180deg, #f9f4ff, #ffffff);
            border-radius: 14px;
            padding: 24px 18px;
            text-align: center;
            box-shadow: 0 8px 20px rgba(74,20,140,0.18);
            transition: all 0.3s ease;
            height: 100%;
            border: none;
            position: relative;
            overflow: hidden;
        }

        /* TOP COLOR STRIP */
        .card::before {
            content: "";
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 6px;
            background: linear-gradient(90deg, #7b1fa2, #ab47bc);
        }

        .card:hover {
            transform: translateY(-6px);
            box-shadow: 0 14px 30px rgba(74,20,140,0.30);
        }

        .card h5 {
            font-size: 16px;
            font-weight: 600;
            margin-bottom: 12px;
            color: #6a1b9a;
        }

        .card p {
            font-size: 14px;
            margin-bottom: 6px;
            color: #555;
        }

        .card strong {
            font-size: 24px;
            font-weight: 700;
            display: block;
            margin: 6px 0;
            color: #4a148c;
        }

        .card a {
            color: #4a148c;
            text-decoration: none;
        }

        .card a:hover {
            text-decoration: underline;
        }

        .text-muted {
            font-size: 13px;
            color: #666 !important;
        }
    </style>
</head>
<body>

@include('visitor.header')

<div class="page-wrapper">
    <div class="container">

        <h2>Emergency Helpline Numbers</h2>

        @if($helplines->isEmpty())
            <p class="text-center text-muted">No Helpline Numbers Available</p>
        @else
            <div class="row justify-content-center">
                @foreach($helplines as $helpline)
                    <div class="col-md-4 col-sm-6 mb-4">
                        <div class="card p-3">
                            <h5>{{ $helpline->name }}</h5>

                            <p>
                                <strong>
                                    <a href="tel:{{ $helpline->number }}">
                                        {{ $helpline->number }}
                                    </a>
                                </strong>
                            </p>

                            @if($helpline->description)
                                <p class="text-muted">{{ $helpline->description }}</p>
                            @endif
                        </div>
                    </div>
                @endforeach
            </div>
        @endif

    </div>
</div>

@include('visitor.footer')

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
