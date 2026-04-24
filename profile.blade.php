<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Woman Profile</title>

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
        body {
            font-family: 'Poppins', sans-serif;
            background-color: #FFF4F8;
        }

        .main-content {
            margin-left: 240px;
            margin-top: 80px;
            padding: 10px;
        }

        /* Profile card */
        .profile-card {
            background: #fff;
            padding: 15px 25px; /* slightly bigger padding */
            border-radius: 12px;
            box-shadow: 0 0 12px rgba(0,0,0,0.1);
            max-width: 750px; /* bigger width */
            margin: 20px auto; /* center horizontally */
        }

        .profile-card h4 {
            font-size: 1.4rem;
            margin-bottom: 15px;
        }

        .profile-photo {
            width: 90px;  /* slightly bigger photo */
            height: 90px;
            border-radius: 50%;
            object-fit: cover;
            border: 2px solid #0d6efd;
        }

        .mb-2, .mb-3 {
            margin-bottom: 8px !important; /* compact spacing */
        }

        @media (max-width: 768px) {
            .main-content {
                margin-left: 0;
                margin-top: 60px;
                padding: 5px;
            }
            .profile-card {
                max-width: 100%;
                padding: 10px 15px;
            }
            .profile-photo {
                width: 75px;
                height: 75px;
            }
        }
    </style>
</head>
<body>

@include('woman.header')
@include('woman.sidebar')

<div class="main-content">
    <div class="profile-card">

        <h4 class="text-center">Edit Profile</h4>

        @if(session('success'))
            <div class="alert alert-success p-1">{{ session('success') }}</div>
        @endif

        <!-- PROFILE PHOTO -->
        <div class="text-center mb-2">
            <img
                src="{{ $user->profile_photo ? asset('storage/'.$user->profile_photo) : asset('images/default-user.png') }}"
                class="profile-photo"
                alt="Profile Photo">
        </div>

        <form action="{{ route('woman.profile.update', $user->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('POST')

            <div class="mb-2">
                <label class="form-label">Full Name *</label>
                <input type="text" name="name" value="{{ old('name', $user->name) }}" class="form-control form-control-sm" required>
            </div>

            <div class="row">
                <div class="col-6 mb-2">
                    <label class="form-label">Email *</label>
                    <input type="email" name="email" value="{{ old('email', $user->email) }}" class="form-control form-control-sm" required>
                </div>
                <div class="col-6 mb-2">
                    <label class="form-label">Mobile</label>
                    <input type="text" name="phone" value="{{ old('phone', $user->phone) }}" class="form-control form-control-sm">
                </div>
            </div>

            <div class="row">
                <div class="col-6 mb-2">
                    <label class="form-label">Gender *</label>
                    <select name="gender" class="form-select form-select-sm" required>
                        <option value="Female" {{ old('gender',$user->gender)=='Female'?'selected':'' }}>Female</option>
                        <option value="Other" {{ old('gender',$user->gender)=='Other'?'selected':'' }}>Other</option>
                    </select>
                </div>
                <div class="col-6 mb-2">
                    <label class="form-label">DOB</label>
                    <input type="date" name="date_of_birth" value="{{ old('date_of_birth', $user->date_of_birth) }}" class="form-control form-control-sm">
                </div>
            </div>

            <div class="row">
                <div class="col-6 mb-2">
                    <label class="form-label">City</label>
                    <input type="text" name="city" value="{{ old('city', $user->city) }}" class="form-control form-control-sm">
                </div>
                <div class="col-6 mb-2">
                    <label class="form-label">State</label>
                    <input type="text" name="state" value="{{ old('state', $user->state) }}" class="form-control form-control-sm">
                </div>
            </div>

            <div class="mb-2">
                <label class="form-label">Occupation</label>
                <input type="text" name="occupation" value="{{ old('occupation', $user->occupation) }}" class="form-control form-control-sm">
            </div>

            <div class="mb-2">
                <label class="form-label">Address</label>
                <textarea name="address" rows="2" class="form-control form-control-sm">{{ old('address', $user->address) }}</textarea>
            </div>

            <div class="mb-2">
                <label class="form-label">Profile Photo</label>
                <input type="file" name="profile_photo" class="form-control form-control-sm">
            </div>

            <button type="submit" class="btn btn-success btn-sm w-100">Update Profile</button>
        </form>

    </div>
</div>

@include('woman.footer')

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
