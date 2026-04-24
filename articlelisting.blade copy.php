<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Empowerment Articles</title>

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
        body {
            font-family: 'Poppins', sans-serif;
            background-size: cover;
            background-position: center;
            background-attachment: fixed;
        }

        .page-header {
            padding: 40px 0;
            text-align: center;
        }

        .article-card {
            border-radius: 12px;
            transition: 0.3s;
            background: #ffffff;
            box-shadow: 0 3px 10px rgba(0, 0, 0, 0.08);
            display: flex;
            flex-direction: column;
            justify-content: space-between;
        }

        .article-card:hover {
            transform: translateY(-3px);
            box-shadow: 0 6px 15px rgba(0, 0, 0, 0.12);
        }

        .article-image {
            height: 160px; /* reduced height */
            object-fit: cover;
            border-top-left-radius: 12px;
            border-top-right-radius: 12px;
        }

        .article-content {
            padding: 10px; /* reduced padding */
            flex-grow: 1;
        }

        .article-content h4 {
            font-size: 16px; /* smaller heading */
            margin-bottom: 6px;
        }

        .article-content p {
            font-size: 13px; /* smaller text */
            margin-bottom: 8px;
        }

        .read-btn {
            background: #6a1b9a;
            color: white;
            border-radius: 25px;
            padding: 6px 16px;
            text-decoration: none;
            display: inline-block;
            font-size: 13px;
        }

        .read-btn:hover {
             background: #6a1b9a;
            color: white;
        }

        /* Shift container slightly left */
        .container {
            margin-right: 175px;
        }

    </style>
</head>
<body>
    <!-- Navigation Bar -->
    @include('woman.header')<br><br><br><br>

    @include('woman.sidebar')

    <!-- HEADER -->
    <section class="page-header">
        <h1 class="fw-bold">Women Empowerment Articles</h1>
    </section>

    <div class="container my-3">
        <div class="row g-3">

            <!-- Article 1 -->
            <div class="col-md-4">
                <div class="article-card">
                    <img src="{{ asset('image/a1.jpg') }}" class="img-fluid article-image" alt="Breaking Barriers in Education">
                    <div class="article-content">
                        <h4 class="fw-bold">Breaking Barriers in Education</h4>
                        <p>How women across the world are reshaping the education system and achieving excellence.</p>
                        <a href="{{ route('woman.articles.breaking.barriers') }}" class="read-btn">
    Read More
</a>                    </div>
                </div>
            </div>

            <!-- Article 2 -->
            <div class="col-md-4">
                <div class="article-card">
                    <img src="{{ asset('image/a2.jpg') }}" class="img-fluid article-image" alt="Women in Leadership">
                    <div class="article-content">
                        <h4 class="fw-bold">Women in Leadership</h4>
                        <p>Stories of empowered women leading businesses, governments, and communities.</p>
                         <a href="{{ route('woman.articles.leadership') }}" class="read-btn">
    Read More
</a>
                    </div>
                </div>
            </div>

            <!-- Article 3 -->
            <div class="col-md-4">
                <div class="article-card">
                    <img src="{{ asset('image/a3.jpg') }}" class="img-fluid article-image" alt="Self-Defense Tips for Women">
                    <div class="article-content">
                        <h4 class="fw-bold">Self-Defense Tips for Women</h4>
                        <p>Essential techniques and awareness tips every woman should know for self-protection.</p>
                        <a href="{{ route('woman.articles.selfdefense') }}" class="read-btn">Read More</a>
                    </div>
                </div>
            </div>

            <!-- Article 4 -->
            <div class="col-md-4">
                <div class="article-card">
                    <img src="{{ asset('image/a4.jpg') }}" class="img-fluid article-image" alt="Career Growth for Women">
                    <div class="article-content">
                        <h4 class="fw-bold">Career Growth for Women</h4>
                        <p>Strategies to build confidence, improve skills, and succeed in competitive careers.</p>
                        <a href="{{ route('woman.articles.career') }}" class="read-btn">Read More</a>
                    </div>
                </div>
            </div>

            <!-- Article 5 -->
            <div class="col-md-4">
                <div class="article-card">
                    <img src="{{ asset('image/a5.png') }}" class="img-fluid article-image" alt="Women Entrepreneurs">
                    <div class="article-content">
                        <h4 class="fw-bold">Women Entrepreneurs</h4>
                        <p>Meet inspiring women building startups and changing industries with innovation.</p>
                        <a href="{{ route('woman.articles.entrepreneurs') }}" class="read-btn">Read More</a>
                    </div>
                </div>
            </div>

            <!-- Article 6 -->
            <div class="col-md-4">
                <div class="article-card">
                    <img src="{{ asset('image/a6.jpg') }}" class="img-fluid article-image" alt="Health & Wellness Guide">
                    <div class="article-content">
                        <h4 class="fw-bold">Health & Wellness Guide</h4>
                        <p>Complete guide for women’s mental and physical well-being.</p>
                        <a href="{{ route('woman.articles.health') }}" class="read-btn">Read More</a>
                    </div>
                </div>
            </div>

        </div>
    </div>

    <!-- Footer -->
    @include('woman.footer')

</body>
</html>
