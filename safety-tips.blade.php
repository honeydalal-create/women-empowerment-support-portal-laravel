<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Safety Tips</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
        body {
            background-image: url('/image/p2.jpg');
            font-family: Arial, sans-serif;
            display: flex;
            flex-direction: column;
            min-height: 100vh; /* ensures footer sticks at bottom */
            margin: 0;
        }

        /* Header Title and Subtitle */
        .page-header {
            text-align: center;
            margin: 30px 0; /* reduced spacing */
        }

        .page-header h1 {
            color: #6a1b9a; /* custom color for h1 */
            font-weight: bold;
            font-size: 28px; /* smaller than before */
            margin-bottom: 5px;
        }

        .page-header .subtitle {
            color: #4a0072; /* custom color for subtitle */
            font-size: 14px; /* smaller subtitle */
            font-weight: 500;
        }

        .tip-card {
            background: #ffffff;
            border-radius: 12px;
            box-shadow: 0 4px 15px rgba(0,0,0,0.1);
            transition: 0.3s;
            height: 100%;
        }

        .tip-card:hover {
            transform: translateY(-5px);
        }

        .tip-card img {
            width: 100%;
            height: 200px;
            object-fit: cover;
            border-radius: 12px 12px 0 0;
        }

        .tip-content {
            padding: 15px;
        }

        .tip-content h4 {
            color: #6a1b9a;
            font-size: 16px; /* slightly smaller card title */
            font-weight: bold;
        }

        .tip-content p {
            color: #555;
            font-size: 13px; /* slightly smaller card text */
        }


    </style>
</head>
<body>

{{-- Visitor Header --}}
@include('visitor.header')

<div class="container">
    <!-- Page Header -->
    <div class="page-header">
        <h1>Women Safety Tips</h1>
        <p class="subtitle">Stay aware, stay strong, and stay safe.</p>
    </div>

    <div class="row g-4">

        @forelse($tips as $tip)
            <div class="col-md-4 col-sm-6">
                <div class="tip-card">

                    @if($tip->photo)
                        <img src="{{ asset('storage/'.$tip->photo) }}" alt="Safety Tip Image">
                    @else
                        <img src="https://via.placeholder.com/400x200?text=Safety+Tip" alt="No Image">
                    @endif

                    <div class="tip-content">
                        <h4>{{ $tip->title }}</h4>
                        <p>{{ $tip->description }}</p>
                    </div>

                </div>
            </div>
        @empty
            <div class="col-12">
                <p class="text-center text-muted">
                    No Safety Tips Available
                </p>
            </div>
        @endforelse

    </div>
</div>


@include('visitor.footer')
</body>
</html>
