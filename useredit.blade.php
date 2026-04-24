<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Edit User</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
        .edit-card {
            max-width: 800px;
            margin: 30px auto;
            padding: 25px;
        }

        body{
             background: linear-gradient(120deg, #f3e5f5, #ede7f6);
        }
        
    </style>
</head>
<body>

@include('admin.header')<br><br><br><br>
@include('admin.sidebar')

<div class="container">
    <div class="card shadow edit-card">
        <h4 class="text-center mb-3">Edit User</h4>

        @if($errors->any())
            <div class="alert alert-danger">
                <ul class="mb-0">
                    @foreach($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('admin.users.update', $user->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <div class="row g-3">

                <div class="col-md-6">
                    <label class="form-label">Name *</label>
                    <input type="text" name="name" class="form-control"
                           value="{{ old('name', $user->name) }}" required>
                </div>

                <div class="col-md-6">
                    <label class="form-label">Email *</label>
                    <input type="email" name="email" class="form-control"
                           value="{{ old('email', $user->email) }}" required>
                </div>

                <div class="col-md-6">
                    <label class="form-label">Phone</label>
                    <input type="text" name="phone" class="form-control"
                           value="{{ old('phone', $user->phone) }}">
                </div>

                <div class="col-md-6">
                    <label class="form-label">Gender *</label>
                    <select name="gender" class="form-select" required>
                        <option value="Female" {{ old('gender',$user->gender)=='Female'?'selected':'' }}>Female</option>
                        <option value="Other" {{ old('gender',$user->gender)=='Other'?'selected':'' }}>Other</option>
                    </select>
                </div>

                <div class="col-md-6">
                    <label class="form-label">Date of Birth</label>
                    <input type="date" name="date_of_birth" class="form-control"
                           value="{{ old('date_of_birth', $user->date_of_birth) }}">
                </div>

                <div class="col-md-6">
                    <label class="form-label">City</label>
                    <input type="text" name="city" class="form-control"
                           value="{{ old('city', $user->city) }}">
                </div>

                <div class="col-md-6">
                    <label class="form-label">State</label>
                    <input type="text" name="state" class="form-control"
                           value="{{ old('state', $user->state) }}">
                </div>

                <div class="col-md-6">
                    <label class="form-label">Occupation</label>
                    <input type="text" name="occupation" class="form-control"
                           value="{{ old('occupation', $user->occupation) }}">
                </div>

                <div class="col-12">
                    <label class="form-label">Address</label>
                    <textarea name="address" rows="2" class="form-control">{{ old('address', $user->address) }}</textarea>
                </div>

                <div class="col-md-6">
                    <label class="form-label">Profile Photo</label>
                    <input type="file" name="profile_photo" class="form-control">
                </div>

                <div class="col-md-6 d-flex align-items-center">
                    @if($user->profile_photo)
                        <img src="{{ asset('storage/'.$user->profile_photo) }}"
                             width="90" class="rounded border">
                    @endif
                </div>

            </div>

            <div class="text-center mt-4">
                <button type="submit" class="btn btn-success px-4">
                    Update User
                </button>
                <a href="{{ route('admin.users.index') }}" class="btn btn-secondary px-4 ms-2">
                    Cancel
                </a>
            </div>

        </form>
    </div>
</div>

@include('admin.footer')

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
