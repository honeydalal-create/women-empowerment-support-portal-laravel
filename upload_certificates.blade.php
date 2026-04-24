<!DOCTYPE html>
<html>
<head>
    <title>Upload Certificates - Company Panel</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body { background: #f3e5f5; }
        .table thead th { background-color: #6a1b9a; color: #fff; }
        .btn-upload { background: #4CAF50; color: #fff; border: none; padding: 5px 10px; border-radius: 5px; }
        .btn-upload:hover { background: #45a049; }
    </style>
</head>
<body>
@include('company.header')<br><br><br><br>
@include('company.sidebar')

<div class="container mt-5" style="margin-left: 260px;">
    <h3>Upload Training Certificates for Women</h3>

    @if(session('success'))
    <div class="alert alert-success">{{ session('success') }}</div>
@endif

@if(session('error'))
    <div class="alert alert-danger">{{ session('error') }}</div>
@endif

@if($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach($errors->all() as $err)
                <li>{{ $err }}</li>
            @endforeach
        </ul>
    </div>
@endif


    @if($applications->isEmpty())
        <p>No approved training applications found.</p>
    @else
        <table class="table table-bordered table-striped mt-3">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Woman Name</th>
                    <th>Email</th>
                    <th>Training Program</th>
                    <th>Upload Certificate</th>
                </tr>
            </thead>
            <tbody>
                @foreach($applications as $app)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $app->user->name }}</td>
                        <td>{{ $app->user->email }}</td>
                        <td>{{ $app->training->title ?? 'N/A' }}</td>
                        <td>
                            <form action="{{ route('company.certificates.store') }}" method="POST" enctype="multipart/form-data">
    @csrf
    <input type="hidden" name="application_id" value="{{ $app->id }}">
    <input type="file" name="certificate" required>
    <button type="submit" class="btn-upload">Upload</button>
</form>

                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    @endif
</div>
@include('company.footer')
</body>
</html>
