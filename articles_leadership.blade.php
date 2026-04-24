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



    <h1>Women in Leadership</h1>

    <img src="{{ asset('image/l.jpg') }}" alt="Women in Leadership">

    <p>
        Women’s leadership has gained increasing recognition and importance in the modern world. Historically, leadership roles in politics, business, and society were dominated by men due to cultural norms and limited access to education and professional opportunities for women.
        Over time, social movements advocating for gender equality and expanded educational access have enabled more women to pursue careers and rise to leadership positions.
        This shift has helped challenge traditional stereotypes and open doors for women at all levels of decision-making.    </p>

    <p>
        The presence of women in leadership brings valuable perspectives that enrich organizational and societal outcomes.
        Research shows that gender-diverse leadership teams tend to make more balanced and innovative decisions because they combine a wider range of experiences and approaches.
        Women leaders are also known for championing inclusive environments, prioritizing collaboration, and advocating for policies that support employee well-being.
        These contributions not only enhance the effectiveness of organizations but also foster cultures where diverse voices are valued.
    </p>

    <p>
        Despite progress, women still face challenges in attaining and thriving in leadership roles.
        Persistent barriers such as unconscious bias, unequal access to mentorship and networks, and the pressure of balancing professional and personal responsibilities continue to limit women’s advancement.
        Addressing these challenges requires intentional policies, supportive workplace cultures, and systems that promote equal opportunities for all.
        Empowering women in leadership is not only a matter of fairness but also a strategic advantage that drives innovation, resilience, and long-term success.    </p>

    <a href="{{ route('woman.articlelisting') }}" class="back-btn">
        ← Back to Articles
    </a>

</div>

</body>
</html>
