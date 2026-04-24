<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Breaking Barriers in Education</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
        body {
            font-family: 'Poppins', sans-serif;

    background-color: #FFF4F8;
}

        .container {
            max-width: 900px;
            margin-top: 50px;
            background: #fff;
            padding: 25px;
            border-radius: 15px;
            box-shadow: 0 4px 20px rgba(0,0,0,0.1);
        }

        h1 {
            color: #6a1b9a;
            font-weight: 700;
            margin-bottom: 20px;
        }

        p {
            font-size: 16px;
            line-height: 1.7;
            color: #333;
        }

        img {
            max-width: 100%;
            border-radius: 12px;
            margin-bottom: 20px;
        }

        .back-btn {
            background: #6a1b9a;
            color: white;
            padding: 8px 20px;
            border-radius: 25px;
            text-decoration: none;
            display: inline-block;
            margin-bottom: 20px;
        }

        .back-btn:hover {
            background: #5a1582;
            color: white;
        }
    </style>
</head>
<body>

<div class="container">



    <h1>Women Entrepreneurs</h1>

    <img src="{{ asset('image/e.jpg') }}" alt="Women Entrepreneurs">

    <p>
        Women entrepreneurs play a vital role in driving economic growth and innovation across the world.
        By starting and managing their own businesses, women are creating jobs, solving real-world problems, and contributing to local and global economies.
        Advances in education, technology, and access to digital platforms have made entrepreneurship more accessible, enabling women to turn ideas into successful ventures across diverse industries.
    <p>
        Entrepreneurship offers women greater independence, flexibility, and the opportunity to lead on their own terms.
        Many women entrepreneurs bring strong skills in creativity, collaboration, and resilience, which help them navigate competitive markets.
        Support systems such as mentorship programs, business networks, and access to training and funding are essential in helping women grow their enterprises and overcome early challenges.
    </p>

    <p>
        Despite growing success, women entrepreneurs still face obstacles such as limited access to capital, gender bias, and balancing business responsibilities with personal commitments.
        Addressing these challenges requires supportive policies, inclusive financial systems, and societal encouragement.
        Empowering women entrepreneurs not only promotes gender equality but also strengthens economies by fostering innovation, diversity, and sustainable development.    </p>

    <a href="{{ route('woman.articlelisting') }}" class="back-btn">
        ← Back to Articles
    </a>

</div>

</body>
</html>
