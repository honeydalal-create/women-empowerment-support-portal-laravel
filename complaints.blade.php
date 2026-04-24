<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Submit Complaint</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f7f7f7;
            margin: 0;
            padding: 0;
        }

        .container {
            max-width: 600px;
            margin: 50px auto;
            background-color: #fff;
            padding: 30px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0,0,0,0.1);
        }

        h2 {
            text-align: center;
            margin-bottom: 30px;
            color: #333;
        }

        .form-group {
            margin-bottom: 20px;
        }

        label {
            display: block;
            margin-bottom: 6px;
            font-weight: bold;
            color: #555;
        }

        input[type="text"],
        input[type="email"],
        input[type="date"],
        textarea {
            width: 100%;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
            box-sizing: border-box;
            font-size: 14px;
        }

        input[readonly] {
            background-color: #e9ecef;
        }

        textarea {
            resize: vertical;
        }

        .btn {
            display: block;
            width: 100%;
            background-color: #007bff;
            color: white;
            border: none;
            padding: 12px;
            font-size: 16px;
            border-radius: 5px;
            cursor: pointer;
        }

        .btn:hover {
            background-color: #0056b3;
        }

        .alert {
            padding: 12px;
            margin-bottom: 20px;
            border-radius: 5px;
        }

        .alert-success {
            background-color: #d4edda;
            color: #155724;
        }

        .alert-danger {
            background-color: #f8d7da;
            color: #721c24;
        }

        ul {
            margin: 0;
            padding-left: 20px;
        }
    </style>
</head>
<body>
@include('woman.header')<br><br><br><br>
@include('woman.sidebar')



@section('content')
<div class="container mt-5">
    <h2>Submit Complaint</h2>

    <!-- Success message -->
    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <!-- Validation errors -->
    @if($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('woman.complaints.store') }}" method="POST">
        @csrf

        <!-- Pre-filled user info -->
        <div class="form-group mb-3">
            <label>ID</label>
            <input type="text" class="form-control" value="{{ $user->id }}" readonly>
        </div>

        <div class="form-group mb-3">
            <label>Name</label>
            <input type="text" class="form-control" value="{{ $user->name }}" readonly>
        </div>

        <div class="form-group mb-3">
            <label>Email</label>
            <input type="email" class="form-control" value="{{ $user->email }}" readonly>
        </div>

        <div class="form-group mb-3">
            <label>Phone</label>
            <input type="text" class="form-control" value="{{ $user->phone }}" readonly>
        </div>

        <!-- Complaint input -->
        <div class="form-group mb-3">
            <label>Complaint Type</label>
            <input type="text" name="complaint_type" class="form-control" placeholder="Enter complaint type" required>
        </div>

        <div class="form-group mb-3">
            <label>Subject</label>
            <input type="text" name="subject" class="form-control" placeholder="Enter subject" required>
        </div>

        <div class="form-group mb-3">
            <label>Description</label>
            <textarea name="description" class="form-control" placeholder="Enter description" rows="4" required></textarea>
        </div>

        <div class="form-group mb-3">
            <label>Date</label>
            <input type="date" name="date" class="form-control" required>
        </div>

        <button type="submit" class="btn btn-primary mt-2">Submit Complaint</button>
    </form>
</div>
@endsection


@include('woman.footer')
</body>
</html>
