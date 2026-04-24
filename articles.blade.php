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
            /* Set background image only for the body */
            background-image: url('/image/p2.jpg');
            background-size: cover;
            background-position: center;
            background-attachment: fixed;
        }


        .page-header {

            padding: 60px 0;
            text-align: center;
        }

        .article-card {
            border-radius: 15px;
            transition: 0.3s;
            background: #ffffff;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.08);
        }

        .article-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 6px 18px rgba(0, 0, 0, 0.12);
        }

        .article-image {
            height: 220px;
            object-fit: cover;
            border-top-left-radius: 15px;
            border-top-right-radius: 15px;
        }

        .read-btn {
            background: #ff6fb5;
            color: white;
            border-radius: 30px;
            padding: 8px 20px;
        }

        .read-btn:hover {
            background: #ff468f;
            color: white;
        }

    </style>
</head>
<body>
    <!-- Navigation Bar -->
    @include('visitor.header')


<!-- HEADER -->
<section class="page-header">
    <h1 class="fw-bold">Women Empowerment Articles</h1>

</section>

<div class="container my-5">

    <div class="row g-4">

        <!-- Article 1 -->
        <div class="col-md-4">
            <div class="article-card">
                <img src="image/a1.jpg" class="img-fluid article-image" alt="">
                <div class="p-3">
                    <h4 class="fw-bold">Breaking Barriers in Education</h4>
                    <p>How women across the world are reshaping the education system and achieving excellence.</p>

                </div>
            </div>
        </div>

        <!-- Article 2 -->
        <div class="col-md-4">
            <div class="article-card">
                <img src="image/a2.jpg" class="img-fluid article-image" alt="">
                <div class="p-3">
                    <h4 class="fw-bold">Women in Leadership</h4>
                    <p>Stories of empowered women leading businesses, governments, and communities.</p>

                </div>
            </div>
        </div>

        <!-- Article 3 -->
        <div class="col-md-4">
            <div class="article-card">
                <img src="image/a3.jpg" class="img-fluid article-image" alt="">
                <div class="p-3">
                    <h4 class="fw-bold">Self-Defense Tips for Women</h4>
                    <p>Essential techniques and awareness tips every woman should know for self-protection.</p>

                </div>
            </div>
        </div>

        <!-- Article 4 -->
        <div class="col-md-4">
            <div class="article-card">
                <img src="image/a4.jpg" class="img-fluid article-image" alt="">
                <div class="p-3">
                    <h4 class="fw-bold">Career Growth for Women</h4>
                    <p>Strategies to build confidence, improve skills, and succeed in competitive careers.</p>

                </div>
            </div>
        </div>

        <!-- Article 5 -->
        <div class="col-md-4">
            <div class="article-card">
                <img src="image/a5.png" class="img-fluid article-image" alt="">
                <div class="p-3">
                    <h4 class="fw-bold">Women Entrepreneurs</h4>
                    <p>Meet inspiring women building startups and changing industries with innovation.</p>

                </div>
            </div>
        </div>

        <!-- Article 6 -->
        <div class="col-md-4">
            <div class="article-card">
                <img src="image/a6.jpg" class="img-fluid article-image" alt="">
                <div class="p-3">
                    <h4 class="fw-bold">Health & Wellness Guide</h4>
                    <p>Complete guide for women’s mental and physical well-being.</p>

                </div>
            </div>
        </div>

    </div>
</div>
<!-- Footer -->
@include('visitor.footer')


</body>
</html>
