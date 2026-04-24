<!-- resources/views/admin/jobsdetails.blade.php -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Job Details</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body{
             background: linear-gradient(120deg, #f3e5f5, #ede7f6);
        }
.card-header {
            background-color: #6a1b9a !important;
            color: #fff !important;
        }
        </style>
</head>
<body>

@include('company.header')<br><br><br><br>
@include('company.sidebar')

<div class="container mt-5">
    <h3>Job Details</h3>

    <div class="card mt-3 shadow-sm">
        <div class="card-header bg-primary text-white">
            <h4>{{ $job->title }}</h4>
        </div>
        <div class="card-body">
            <p><strong>Company:</strong> {{ $job->company }}</p>
            <p><strong>Location:</strong> {{ $job->location ?? 'Not specified' }}</p>
            <p><strong>Salary:</strong> {{ $job->salary ?? 'Not specified' }}</p>
            <p><strong>Skills Required:</strong> {{ $job->skills ?? 'Not specified' }}</p>
            <p><strong>Description:</strong></p>
            <p>{{ $job->description ?? 'No description available' }}</p>
            <p><strong>Status:</strong>
                <span class="badge bg-{{ $job->status == 'active' ? 'success' : 'secondary' }}">
                    {{ ucfirst($job->status) }}
                </span>
            </p>
        </div>
        <div class="card-footer">
            <a href="{{ route('company.jobs') }}" class="btn btn-secondary">Back to Job List</a>
            <a href="{{ route('company.jobs.edit', $job->id) }}" class="btn btn-warning">Edit Job</a>
        </div>
    </div>
</div>

@include('company.footer')

</body>
</html>
