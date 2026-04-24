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



    <h1>Breaking Barriers in Education</h1>

    <img src="{{ asset('image/b.jpg') }}" alt="Breaking Barriers in Education">

    <p>
        Education is a fundamental right for every individual, yet women around the world face many barriers in accessing it.
        From social expectations to economic challenges, women must overcome multiple obstacles to achieve academic success.
    </p>

    <p>
        Many organizations and initiatives have been launched to empower women in education, offering scholarships, mentorship programs,
        and safe learning environments. By providing access and opportunities, we can ensure that women reach their full potential
        and contribute meaningfully to society.
    </p>

    <p>
        Inspirational stories from women who have broken barriers show that determination, support, and opportunity can lead to remarkable achievements.
        Encouraging girls and women to pursue education not only benefits them but strengthens entire communities.
    </p>

    <a href="{{ route('woman.articlelisting') }}" class="back-btn">
        ← Back to Articles
    </a>

</div>

</body>
</html>
