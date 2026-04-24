<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Add Safety Tip</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
        body {
            font-family: Arial;
            background: #f3e5f5;
        }
        .form-card {
            background: #fff;
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0 4px 15px rgba(0,0,0,0.1);
        }
        h2 {
            color: #4a0072;
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

<br><br><br><br>

<div class="container">
    <h2 class="mb-4">Add Safety Tip</h2>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul class="mb-0">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <div class="form-card">
        <form action="{{ route('admin.safety_tips.store') }}" method="POST" enctype="multipart/form-data">
            @csrf

            <div class="mb-3">
                <label class="form-label fw-bold">Title</label>
                <input type="text" name="title" class="form-control" value="{{ old('title') }}" required>
            </div>

            <div class="mb-3">
                <label class="form-label fw-bold">Description</label>
                <textarea name="description" rows="5" class="form-control" required>{{ old('description') }}</textarea>
            </div>

            <div class="mb-4">
                <label class="form-label fw-bold">Image (optional)</label>
                <input type="file" name="photo" class="form-control">
            </div>

            <button type="submit" class="btn btn-save">Save Safety Tip</button>
            <a href="{{ route('admin.safety_tips.index') }}" class="btn btn-secondary ms-2">Back</a>
        </form>
    </div>
</div>

@include('admin.footer')

</body>
</html>
