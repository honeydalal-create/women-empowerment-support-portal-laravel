<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Training</title>
    <style>
        body{font-family: Arial,sans-serif; margin:0; padding:0; background: linear-gradient(120deg,#f3e5f5,#ede7f6);}
        .container{max-width:600px; margin:50px auto; padding:20px;}
        .card{background:#fff; padding:25px; border-radius:10px; box-shadow:0 10px 25px rgba(0,0,0,0.1);}
        h2{text-align:center; color:#4a0072; margin-bottom:20px;}
        label{font-weight:bold; margin-top:15px; display:block;}
        input,textarea{width:100%; padding:10px; margin-top:6px; border:1px solid #ccc; border-radius:5px;}
        button{width:100%; margin-top:20px; padding:12px; background:#6a1b9a; color:#fff; border:none; border-radius:5px; font-size:16px; cursor:pointer;}
        .error{color:red; font-size:14px; margin-top:5px;}
        .back{display:block; margin-bottom:15px; color:#6a1b9a; text-decoration:none;}
    </style>
</head>
<body>

    @include('company.header')<br><br><br><br>
@include('company.sidebar')

<div class="container">

    <div class="card">
        <h2>Add Training</h2>
        <form method="POST" action="{{ route('company.store') }}" enctype="multipart/form-data">
            @csrf
            <label>Training Title</label>
            <input type="text" name="title" value="{{ old('title') }}">
            @error('title')<div class="error">{{ $message }}</div>@enderror

            <label>Duration</label>
            <input type="text" name="duration" value="{{ old('duration') }}">
            @error('duration')<div class="error">{{ $message }}</div>@enderror

            <label>Description</label>
            <textarea name="description" rows="4">{{ old('description') }}</textarea>
            @error('description')<div class="error">{{ $message }}</div>@enderror

            <label>Image</label>
            <input type="file" name="image">

            <button type="submit">Save Training</button>
        </form>
    </div>
</div>

@include('company.footer')
</body>
</html>
