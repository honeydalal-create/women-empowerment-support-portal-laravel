<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<title>Add Job</title>
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
    <h3 class="mb-4">Add New Job</h3>

    <form method="POST" action="{{ route('company.jobs.store') }}">
        @csrf

        <div class="mb-3">
            <label>Job Title</label>
            <input type="text" name="title" class="form-control" required>
        </div>

        <div class="mb-3">
            <label>Company Name</label>
            <input type="text" name="company" class="form-control" required>
        </div>

        <div class="mb-3">
            <label>Location</label>
            <input type="text" name="location" class="form-control">
        </div>

        <div class="mb-3">
            <label>Salary</label>
            <input type="text" name="salary" class="form-control">
        </div>

        <div class="mb-3">
            <label>Skills</label>
            <textarea name="skills" class="form-control"></textarea>
        </div>

        <div class="mb-3">
            <label>Description</label>
            <textarea name="description" class="form-control"></textarea>
        </div>

        <div class="mb-3">
            <label>Status</label>
            <select name="status" class="form-control">
                <option value="active">Active</option>
                <option value="inactive">Inactive</option>
            </select>
        </div>

        <button class="btn btn-success">Save Job</button>
        <a href="{{ route('company.jobs') }}" class="btn btn-secondary">Back</a>
    </form>
</div>

@include('company.footer')
</body>
</html>
