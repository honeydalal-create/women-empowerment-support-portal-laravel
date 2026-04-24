<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Edit Helpline</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
        body {
            background: #f3e5f5;
            font-family: Arial;
        }

        .container {
            max-width: 600px;
            margin: 80px auto;
            margin-left: 260px;
            background: #fff;
            padding: 25px;
            border-radius: 10px;
            box-shadow: 0 4px 15px rgba(0,0,0,0.1);
        }

        h2 {
            text-align: center;
            color: #4a0072;
            margin-bottom: 25px;
        }

        .btn-update {
            background: #ff9800;
            color: #fff;
        }

        .btn-update:hover {
            background: #fb8c00;
            color: #fff;
        }
    </style>
</head>
<body>

@include('admin.header')
@include('admin.sidebar')

<div class="container">
    <h2>Edit Helpline Number</h2>

    <form action="{{ route('admin.helplines.update', $helpline->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label class="form-label">Helpline Name</label>
            <input type="text" name="name" class="form-control"
                   value="{{ $helpline->name }}" required>
        </div>

        <div class="mb-3">
            <label class="form-label">Phone Number</label>
            <input type="text" name="number" class="form-control"
                   value="{{ $helpline->number }}" required>
        </div>

        <div class="mb-3">
            <label class="form-label">Description</label>
            <textarea name="description" class="form-control" rows="3">{{ $helpline->description }}</textarea>
        </div>

        <div class="d-flex justify-content-between">
            <a href="{{ route('admin.helplines.index') }}" class="btn btn-secondary">
                Back
            </a>
            <button type="submit" class="btn btn-update">
                Update Helpline
            </button>
        </div>
    </form>
</div>

@include('admin.footer')

</body>
</html>
