<!DOCTYPE html>
<html>
<head>
    <title>Woman Dashboard</title>

    <style>
        @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@400;600&display=swap');

        body {
            margin: 0;
            font-family: 'Poppins', 'Segoe UI', Arial, sans-serif;
            background-size: cover;
            background-position: center;
            background-repeat: no-repeat;
            transition: background-image 1.5s ease-in-out;
            color: #3b1e5d; /* Dark Purple Text */
            min-height: 100vh;
        }

        /* Glass Effect with EmpowerHer purple-pink tint */
        .glass {
            background: rgba(106, 27, 154, 0.15); /* #6a1b9a purple with 15% opacity */
            backdrop-filter: blur(18px);
            -webkit-backdrop-filter: blur(18px);
            box-shadow: 0 10px 35px rgba(106, 27, 154, 0.25);
            border-radius: 16px;
            border: 1px solid rgba(255, 255, 255, 0.2);
        }

        /* Content */
        .content {
            margin-left: 240px;
            margin-top: 90px;
            padding: 35px;
            padding-bottom: 120px;
            color: #3b1e5d;
            min-height: calc(100vh - 90px);
        }

        /* Welcome Box */
        .welcome-box {
            padding: 30px;
            border-radius: 22px;
            margin-bottom: 35px;
            color: #3b1e5d;
            background: rgba(255, 255, 255, 0.9);
            box-shadow: 0 4px 20px rgba(106, 27, 154, 0.2);
        }

        .welcome-box h2 {
            margin: 0;
            font-size: 30px;
            font-weight: 700;
            color: #6a1b9a;
        }

        .welcome-box p {
            margin-top: 10px;
            font-size: 16px;
            color: #4a0072;
        }

        /* Cards */
        .cards {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(260px, 1fr));
            gap: 28px;
        }

        .card {
            padding: 32px;
            border-radius: 22px;
            text-align: center;
            color: #6a1b9a;
            background: rgba(255, 255, 255, 0.95);
            box-shadow: 0 12px 25px rgba(106, 27, 154, 0.12);
            transition: all 0.35s;
            font-weight: 600;
            position: relative;
        }

        .card:hover {
            transform: translateY(-8px);
            box-shadow: 0 18px 45px rgba(106, 27, 154, 0.35);
            background: rgba(255, 255, 255, 1);
        }

        .card h3 {
            margin: 0;
            font-size: 18px;
            font-weight: 600;
            color: #4a0072;
        }

        .card p {
            font-size: 36px;
            margin-top: 14px;
            font-weight: 700;
            color: #6a1b9a;
        }

        /* More Info Button */
        .more-info-btn {
            margin-top: 20px;
            padding: 10px 18px;
            border: none;
            border-radius: 12px;
            background-color: #6a1b9a;
            color: white;
            font-weight: 600;
            cursor: pointer;
            transition: background 0.3s, transform 0.2s;
        }

        .more-info-btn:hover {
            background-color: #4a0072;
            transform: translateY(-3px);
        }

        /* Scrollbar for sidebar */
        .sidebar::-webkit-scrollbar {
            width: 6px;
        }

        .sidebar::-webkit-scrollbar-thumb {
            background-color: rgba(255, 64, 129, 0.7); /* pink */
            border-radius: 3px;
        }
    </style>
</head>

<body>

<!-- Sidebar -->
@include('woman.sidebar')

<!-- Header -->
@include('woman.header')

<!-- Content -->
<div class="content">

    <div class="welcome-box glass">
        <h2>Welcome Back, {{ Auth::user()->name }}</h2>
        <p>Here is a quick overview of your activity and progress</p>
    </div>

    <div class="cards">
        <div class="card glass">
            <h3>Total Trainings Applied</h3>
            <button class="more-info-btn" onclick="window.location.href='{{ route('woman.user_training_applications') }}'">More Info</button>
        </div>

        <div class="card glass">
            <h3>Total Jobs Applied</h3>
            <button class="more-info-btn" onclick="window.location.href='{{ route('woman.applied_jobs') }}'">More Info</button>
        </div>

        <div class="card glass">
            <h3>Total Complaints Submitted</h3>
            <button class="more-info-btn" onclick="window.location.href='{{ route('woman.complaint.status') }}'">More Info</button>
        </div>
    </div>

</div>

<!-- Footer -->
@include('woman.footer')

<script>
    const images = [
        "https://images.unsplash.com/photo-1522202176988-66273c2fd55f?auto=format&fit=crop&w=1470&q=80",
        "https://images.unsplash.com/photo-1506784983877-45594efa4cbe?auto=format&fit=crop&w=1470&q=80",
        "https://images.unsplash.com/photo-1521737604893-d14cc237f11d?auto=format&fit=crop&w=1470&q=80",
    ];

    let index = 0;

    function changeBackground() {
        document.body.style.backgroundImage = `url('${images[index]}')`;
        index = (index + 1) % images.length;
    }

    changeBackground();
    setInterval(changeBackground, 6000);
</script>

</body>
</html>
