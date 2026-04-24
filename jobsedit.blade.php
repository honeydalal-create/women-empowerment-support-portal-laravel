<!-- resources/views/admin/jobsedit.blade.php -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Edit Job</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
        body{
             background: linear-gradient(120deg, #f3e5f5, #ede7f6);
        }
        </style>
</head>
<body>

    @include('company.header')<br><br><br><br>
@include('company.sidebar')
<div class="container mt-5">
    <h3>Edit Job</h3>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <!-- Edit Job Form -->
    <form action="{{ route('company.jobs.update', $job->id) }}" method="POST">
        @csrf

        <div class="mb-3">
            <label for="title" class="form-label">Job Title</label>
            <input type="text" class="form-control" id="title" name="title" value="{{ $job->title }}" required>
        </div>

        <div class="mb-3">
            <label for="company" class="form-label">Company Name</label>
            <input type="text" class="form-control" id="company" name="company" value="{{ $job->company }}" required>
        </div>

        <div class="mb-3">
            <label for="location" class="form-label">Location</label>
            <input type="text" class="form-control" id="location" name="location" value="{{ $job->location }}">
        </div>

        <div class="mb-3">
            <label for="salary" class="form-label">Salary</label>
            <input type="text" class="form-control" id="salary" name="salary" value="{{ $job->salary }}">
        </div>

        <div class="mb-3">
            <label for="skills" class="form-label">Skills Required</label>
            <textarea class="form-control" id="skills" name="skills">{{ $job->skills }}</textarea>
        </div>

        <div class="mb-3">
            <label for="description" class="form-label">Job Description</label>
            <textarea class="form-control" id="description" name="description">{{ $job->description }}</textarea>
        </div>

        <div class="mb-3">
            <label for="status" class="form-label">Status</label>
            <select class="form-select" id="status" name="status">
                <option value="active" {{ $job->status == 'active' ? 'selected' : '' }}>Active</option>
                <option value="inactive" {{ $job->status == 'inactive' ? 'selected' : '' }}>Inactive</option>
            </select>
        </div>

        <button type="submit" class="btn btn-success">Update Job</button>
        <a href="{{ route('company.jobs') }}" class="btn btn-secondary">Cancel</a>
    </form>
</div>

@include('company.footer')
</body>
</html>
