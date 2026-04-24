<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Women Empowerment Portal</title>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
        body {
            font-family: 'Poppins', sans-serif;
            /* Set background image only for the body */
            background-image: url('/image/p2.jpg');
            background-size: cover;
            background-position: center;
            background-attachment: fixed;
        }


        /* Remove background image from hero */
        .hero {
            height: 400px; /* No background image for hero section */
            display: flex;
            justify-content: center;
            align-items: center;
            text-align: center;
            color: black;
        }

        .hero h1 {
            font-size: 48px;
            font-weight: 600;
        }

        .features {
            margin-top: 50px;
        }

        .feature-card {
            background-color: #fff;
            border-radius: 8px;
            padding: 20px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            transition: transform 0.3s ease;
        }

        .feature-card:hover {
            transform: translateY(-10px);
        }

        .feature-card h3 {
            font-size: 24px;
            color: #6a1b9a;
        }

        .feature-card p {
            font-size: 16px;
            color: #555;
        }

        /* Additional styling for new sections */
        .hero p {
            font-size: 18px;
        }


        .feature-card h3 {
            font-size: 20px;
            color: #6a1b9a;
        }
    </style>
</head>

<body>

    <!-- Navigation Bar -->
    @include('visitor.header')

    <!-- Hero Section -->
    <section class="hero">
        <div>
            <h1 style="color: #6a1b9a">Empowering Women, Changing Lives</h1>
            <p style="color: #555">Join our community to access resources, support, and empowerment programs.</p>
        </div>
    </section>

    <!-- Features Section -->
    <section class="container features">
        <div class="row text-center">
            <div class="col-md-4">
                <div class="feature-card">
                    <h3>Support Groups</h3>
                    <p>Join support groups to connect with women who share similar experiences.</p>
                </div>
            </div><br><br>
            <div class="col-md-4">
                <div class="feature-card">
                    <h3>Career Resources</h3>
                    <p>Access career development resources and mentorship to enhance your skills.</p>
                </div>
            </div><br><br>
            <div class="col-md-4">
                <div class="feature-card">
                    <h3>Health & Wellbeing</h3>
                    <p>Learn about mental health, fitness, and wellbeing programs for women.</p>
                </div>
            </div><br><br>
        </div>
    </section>

    <!-- Call to Action Section -->
    <section class="text-center mt-5">
        <div class="container">
            <h2 class="mb-4" style="color: #6a1b9a">Get Involved in Empowering Women!</h2>
            <p style="color: #555">Become part of our network today and help support the empowerment of women worldwide.</p>
            <a href="/register" class="btn btn-lg btn-primary">Join Now</a>
        </div><br><br>
    </section>

    <!-- Footer -->
    @include('visitor.footer')


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
