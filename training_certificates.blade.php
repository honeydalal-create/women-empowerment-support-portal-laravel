<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>My Training Certificates</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
@include('woman.sidebar')
<div class="content">
    @include('woman.header')
    <br><br><br><br>

    <div class="container my-5">
        <h2 class="text-center mb-4">My Training Certificates</h2>

        @if($certificates->isEmpty())
            <div class="alert alert-info text-center">
                No certificates available yet.
            </div>
        @else
            <table class="table table-bordered">
                <thead class="table-light">
                    <tr>
                        <th>#</th>
                        <th>Training Program</th>
                        <th>Certificate</th>
                        <th>Issued On</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($certificates as $index => $cert)
                        <tr>
                            <td>{{ $index + 1 }}</td>
                            <td>{{ $cert->application->training->title ?? 'N/A' }}</td>
                            <td>
                                <a href="{{ route('woman.training_certificates.download', $cert->id) }}"
                                   class="btn btn-success btn-sm">
                                   Download
                                </a>
                            </td>
                            <td>{{ $cert->created_at->format('d M Y') }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        @endif
    </div>
    @include('woman.footer')
</div>
</body>
</html>
