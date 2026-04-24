<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Add Helpline</title>
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

        .btn-save {
            background: #6a1b9a;
            color: #fff;
        }

        .btn-save:hover {
            background: #4a0072;
            color: #fff;
        }
    </style>
</head>
<body>

@include('admin.header')
@include('admin.sidebar')

<div class="container">
    <h2>Add Helpline Number</h2>

    <form action="{{ route('admin.helplines.store') }}" method="POST">
        @csrf

        <div class="mb-3">
            <label class="form-label">Helpline Name</label>
            <input type="text" name="name" class="form-control" required>
        </div>

        <div class="mb-3">
            <label class="form-label">Phone Number</label>
            <input type="text" name="number" class="form-control" required>
        </div>

        <div class="mb-3">
            <label class="form-label">Description (Optional)</label>
            <textarea name="description" class="form-control" rows="3"></textarea>
        </div>

        <div class="d-flex justify-content-between">
            <a href="{{ route('admin.helplines.index') }}" class="btn btn-secondary">
                Back
            </a>
            <button type="submit" class="btn btn-save">
                Save Helpline
            </button>
        </div>
    </form>
</div>

@include('admin.footer')

</body>
</html>
