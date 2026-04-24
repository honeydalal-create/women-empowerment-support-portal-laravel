<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Women Empowerment Portal - About Us</title>

    <!-- Google Font -->
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600&display=swap" rel="stylesheet">

    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
        body {
            font-family: 'Poppins', sans-serif;
            background-image: url('/image/p2.jpg');
            background-size: cover;
            background-position: center;
            background-attachment: fixed;
            background-repeat: no-repeat;   /* ✅ semicolon added */
            min-height: 100vh;
            display: flex;
            flex-direction: column;
        }

        .page-wrapper {
            flex: 1;
            display: flex;
            justify-content: center;
            align-items: center;
            padding-top: 120px;
            padding-bottom: 40px;
        }

        .about-section {
            background: transparent;
            padding: 60px;
            border-radius: 15px;
            font-size: 18px;
            line-height: 1.8;
            box-shadow: none;
            color: black;
        }

        .about-title {
            font-size: 34px;
            font-weight: 700;
            color: black;
        }

        .about-list li {
            margin-bottom: 10px;
            font-weight: 500;
        }
    </style>
</head>

<body>

    <!-- NAVBAR -->
    @include('visitor.header')

    <!-- ABOUT CONTENT -->
    <div class="page-wrapper">
        <div class="container">
            <div class="about-section w-100">

                <h2 class="about-title text-center mb-3" style="color:rgba(106, 27, 154, 0.85); ">About Us</h2>
                <hr>

                <p>
                    Welcome to the Women Empowerment & Support Portal.
                    Our mission is to empower women by providing access to training programs, job opportunities,
                    safety resources, articles, and complaint support tools.
                </p>

                <p>
                    We believe every woman deserves equal opportunities, safety, and a strong support system.
                    The portal helps women achieve growth in multiple areas:
                </p>

                <ul class="about-list">
                    <li>Learn new skills through professional training programs</li>
                    <li>Apply for suitable and verified job opportunities</li>
                    <li>Read motivational and educational articles</li>
                    <li>Access safety tips & emergency helpline numbers</li>
                    <li>Submit and track complaints with transparency</li>
                </ul>

                <p>
                    Together, we aim to build a stronger, educated, and empowered society for women.
                </p>

            </div>
        </div>
    </div>

    <!-- FOOTER (NOW ALWAYS AT END) -->
    @include('visitor.footer')

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>
