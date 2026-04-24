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



    <h1>Health & Wellness Guide</h1>

    <img src="{{ asset('image/h.jpg') }}" alt="Health & Wellness Guide">

    <p>
        Health and wellness focus on maintaining a balanced lifestyle that supports both physical and mental well-being.
        Good health begins with everyday habits such as eating nutritious foods, staying hydrated, getting enough sleep, and engaging in regular physical activity.
        These practices help strengthen the body, improve energy levels, and reduce the risk of illness, forming a strong foundation for overall wellness.
    </p>
    <p>
        Mental and emotional health are equally important aspects of a healthy life.
        Managing stress through mindfulness, relaxation techniques, hobbies, or talking with trusted people can improve mood and resilience.
        Taking breaks, setting realistic goals, and practicing self-care help individuals maintain a positive mindset and cope effectively with daily challenges.
    </p>

    <p>
        Wellness is not about perfection but about making consistent, healthy choices over time.
        Listening to your body, seeking medical advice when needed, and creating routines that support balance can lead to long-term benefits.
        By prioritizing both physical and mental health, individuals can improve their quality of life and achieve a more fulfilling and active lifestyle.
    </p>
    <a href="{{ route('woman.articlelisting') }}" class="back-btn">
        ← Back to Articles
    </a>

</div>

</body>
</html>
