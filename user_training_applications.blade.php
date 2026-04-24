<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>My Training Certificates</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #FFF4F8;
        }

        /* Sidebar styling */
        .sidebar {
            width: 240px;
            height: 100vh;
            position: fixed;
            top: 0;
            left: 0;
            padding-top: 20px;
            background: #6a1b9a;
            color: #fff;
        }
        .sidebar h2 {
            text-align: center;
            margin-bottom: 25px;
        }
        .sidebar a {
            display: block;
            padding: 14px 22px;
            color: #ddd;
            text-decoration: none;
            border-left: 4px solid transparent;
            transition: 0.3s;
        }
        .sidebar a:hover,
        .sidebar a.active {
            background: #4a0072;
            border-left: 4px solid #ff4081;
            color: #fff;
            padding-left: 30px;
        }

        /* Content area */
        .content {
            margin-left: 240px;
            padding: 20px;
        }

        .table th, .table td {
            vertical-align: middle;
        }
    </style>
</head>
<body>

    {{-- Sidebar --}}
    @include('woman.sidebar')

    <div class="content">
        {{-- Header --}}
        @include('woman.header')
        <br><br><br>

        <div class="container my-5">
            <h2 class="mb-4 text-center">My Training </h2>

            @if($applications->isEmpty())
                <div class="alert alert-info text-center">
                    You have not applied for any trainings yet.
                </div>
            @else
                <div class="table-responsive">
                    <table class="table table-bordered table-striped align-middle">
                        <thead class="table-light">
                            <tr>
                                <th>#</th>
                                <th>Training Program</th>
                                <th>Payment Mode</th>
                                <th>Status</th>

                            </tr>
                        </thead>
                        <tbody>
                            @foreach($applications as $index => $application)
                                <tr>
                                    <td>{{ $index + 1 }}</td>
                                    {{-- Show training title safely --}}
                                    <td>{{ $application->training?->title ?? 'N/A' }}</td>
                                    <td>{{ $application->payment_mode ?? 'N/A' }}</td>
                                    <td>{{ ucfirst($application->status ?? 'Pending') }}</td>
                                    {{-- Show certificate created_at safely --}}


                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            @endif
        </div>

        {{-- Footer --}}
        @include('woman.footer')
    </div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
