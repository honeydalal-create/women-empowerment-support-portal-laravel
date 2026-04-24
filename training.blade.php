<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Available Trainings</title>

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Google Font -->
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">

    <style>
        body {
            font-family: 'Poppins', sans-serif;
            background-image: url('/image/p2.jpg');
            background-size: cover;
            background-position: center;
            background-attachment: fixed;
            min-height: 100vh;
            display: flex;
            flex-direction: column;
        }

        .main-content {
            flex: 1;
            padding: 60px 20px;
        }

        .page-title {
            text-align: center;
            margin-bottom: 10px;
            color: #6a1b9a;
            font-weight: 600;
        }

        .page-subtitle {
            text-align: center;
            color: #555;
            margin-bottom: 40px;
        }

        .training-card {
            background: #fff;
            border-radius: 15px;
            padding: 20px;
            display: flex;
            gap: 15px;
            align-items: flex-start;
            box-shadow: 0 8px 25px rgba(0,0,0,0.1);
            transition: transform 0.3s ease;
            height: 100%;
        }

        .training-card:hover {
            transform: translateY(-5px);
        }

        .training-card img {
            width: 200px;
            height: 160px;
            object-fit: cover;
            border-radius: 12px;
            flex-shrink: 0;
        }

        .training-details h5 {
            color: #6a1b9a;
            margin-bottom: 10px;
            font-weight: 600;
        }

        .training-details p {
            margin-bottom: 6px;
            color: #333;
            font-size: 14px;
        }

        .no-trainings {
            text-align: center;
            font-size: 16px;
            color: #777;
            margin-top: 20px;
        }

        .footer {
            background-color: rgba(106, 27, 154, 0.85);
            color: #fff;
            text-align: center;
            padding: 15px 0;
        }

        .navbar {
            background-color: rgba(106, 27, 154, 0.85);
        }

        .navbar-brand,
        .navbar-nav .nav-link {
            color: #fff !important;
            font-size: 14px;
        }

        @media (max-width: 992px) {
            .training-card {
                flex-direction: column;
                text-align: center;
            }

            .training-card img {
                width: 100%;
                height: auto;
            }
        }
    </style>
</head>
<body>

<!-- Header -->
@include('visitor.header')

<!-- MAIN CONTENT -->
<div class="main-content container">

    <h2 class="page-title">Available Trainings</h2>
    <p class="page-subtitle">Empower yourself with skill-based training programs</p>

    <div class="row g-4">
        @forelse($trainings as $training)
            <div class="col-lg-4 col-md-6 col-sm-12 d-flex">
                <div class="training-card w-100">
                    @if($training->image)
                        <img src="{{ asset('storage/'.$training->image) }}" alt="{{ $training->title }}">
                    @else
                        <img src="{{ asset('storage/default_training.png') }}" alt="Default Image">
                    @endif

                    <div class="training-details">
                        <h5>{{ $training->title }}</h5>
                        <p><strong>Duration:</strong> {{ $training->duration ?? 'N/A' }}</p>
                        <p>{{ $training->description }}</p>
                    </div>
                </div>
            </div>
        @empty
            <p class="no-trainings">No trainings available at the moment.</p>
        @endforelse
    </div>

</div>

<!-- Footer -->
@include('visitor.footer')

<!-- Bootstrap JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>
