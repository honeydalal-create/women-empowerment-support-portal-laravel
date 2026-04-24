<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>View User</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body{
             background: linear-gradient(120deg, #f3e5f5, #ede7f6);
        }
        </style>
</head>
<body>
@include('admin.header')<br><br><br><br>
@include('admin.sidebar')

<div class="container mt-5">
    <h2>User Details</h2>
    <div class="card mt-3">
        <div class="card-header">
            {{ $user->name }}
        </div>
        <div class="card-body">
            <p><strong>Email:</strong> {{ $user->email }}</p>
            <p><strong>Phone:</strong> {{ $user->phone ?? '-' }}</p>
            <p><strong>Gender:</strong> {{ ucfirst($user->gender) }}</p>
            <p><strong>Date of Birth:</strong> {{ $user->date_of_birth }}</p>
            <p><strong>City:</strong> {{ $user->city }}</p>
            <p><strong>State:</strong> {{ $user->state }}</p>
            <p><strong>Occupation:</strong> {{ $user->occupation }}</p>
            <p><strong>Address:</strong> {{ $user->address }}</p>
            <p><strong>Role:</strong> {{ $user->role }}</p>
            @if($user->profile_photo)
                <p><strong>Profile Photo:</strong> <img src="{{ asset('storage/'.$user->profile_photo) }}" alt="Profile Photo" width="100"></p>
            @endif
        </div>
        <div class="card-footer">
            <a href="{{ route('admin.users.index') }}" class="btn btn-secondary">Back to Users</a>
        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
@include('admin.footer')
</body>
</html>
