<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>EmpowerHer - Register</title>

    <!-- Google Font -->
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600&display=swap" rel="stylesheet">

    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
        html, body {
            height: 100%;
            margin: 0;
        }

        /* 🔥 MAIN LAYOUT FIX */
        body {
            font-family: 'Poppins', sans-serif;
            background: linear-gradient(135deg, #fce4ec, #ede7f6);
            display: flex;
            flex-direction: column;
        }

        /* Header + Footer ke beech content */
        .page-content {
            flex: 1; /* 🔥 pushes footer to bottom */
            display: flex;
            align-items: center;
        }

        /* ---- EXISTING DESIGN (UNCHANGED SIZE) ---- */
        .register-wrapper {
            padding: 20px 0;
            width: 100%;
        }

        .register-card {
            background: #fff;
            border-radius: 14px;
            box-shadow: 0 8px 18px rgba(0, 0, 0, 0.12);
            overflow: hidden;
            max-width: 960px;
            width: 100%;
            margin: auto;
        }

        .register-image {
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 10px;
        }

        /* 🔥 Increased max-height for larger image */
        .register-image img {
            width: 100%;
            max-height: 550px;
            object-fit: contain;
        }

        .form-section {
            padding: 14px;
        }

        .form-section .mb-3 {
            margin-bottom: 6px;
        }

        label {
            font-size: 12px;
            font-weight: 500;
        }

        .form-control {
            font-size: 13px;
            padding: 6px 8px;
        }

        button {
            padding: 8px;
        }
    </style>
</head>

<body>

<!-- 🔹 HEADER -->
@include('visitor.header')

<!-- 🔹 CONTENT -->
<div class="page-content">
    <div class="container register-wrapper">
        <div class="register-card">
            <div class="row g-0 align-items-center">

                <!-- LEFT IMAGE -->
                <div class="col-md-6 register-image">
                    <img src="/image/register.jpeg" alt="Register Image">
                </div>

                <!-- RIGHT FORM -->
                <div class="col-md-6 form-section">

                    <div class="form-card">

                        @if(session('success'))
                            <div class="alert alert-success alert-dismissible fade show mb-4">
                                {{ session('success') }}
                                <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                            </div>
                        @endif

                        <form method="POST" action="{{ route('register.store') }}" enctype="multipart/form-data">
                            @csrf

                            <div class="mb-3">
                                <label>Full Name</label>
                                <input type="text" name="name" value="{{ old('name') }}" class="form-control @error('name') is-invalid @enderror">
                                @error('name') <div class="text-danger">{{ $message }}</div> @enderror
                            </div>

                            <!-- Email + Phone -->
                            <div class="row mb-3">
                                <div class="col-6">
                                    <label>Email</label>
                                    <input type="email" name="email" value="{{ old('email') }}" class="form-control @error('email') is-invalid @enderror">
                                    @error('email') <div class="text-danger">{{ $message }}</div> @enderror
                                </div>
                                <div class="col-6">
                                    <label>Phone</label>
                                    <input type="text" name="phone" value="{{ old('phone') }}" class="form-control @error('phone') is-invalid @enderror">
                                    @error('phone') <div class="text-danger">{{ $message }}</div> @enderror
                                </div>
                            </div>

                            <!-- Gender + DOB -->
                            <div class="row mb-3">
                                <div class="col-6">
                                    <label>Gender</label><br>
                                    <input type="radio" name="gender" value="Female" {{ old('gender')=='Female'?'checked':'' }}> Female
                                    <input type="radio" name="gender" value="Other" {{ old('gender')=='Other'?'checked':'' }}> Other
                                    @error('gender') <div class="text-danger">{{ $message }}</div> @enderror
                                </div>
                                <div class="col-6">
                                    <label>Date of Birth</label>
                                    <input type="date" name="date_of_birth" value="{{ old('date_of_birth') }}" class="form-control @error('date_of_birth') is-invalid @enderror">
                                    @error('date_of_birth') <div class="text-danger">{{ $message }}</div> @enderror
                                </div>
                            </div>

                            <!-- City + State -->
                            <div class="row mb-3">
                                <div class="col-6">
                                    <label>City</label>
                                    <input type="text" name="city" value="{{ old('city') }}" class="form-control @error('city') is-invalid @enderror">
                                    @error('city') <div class="text-danger">{{ $message }}</div> @enderror
                                </div>
                                <div class="col-6">
                                    <label>State</label>
                                    <input type="text" name="state" value="{{ old('state') }}" class="form-control @error('state') is-invalid @enderror">
                                    @error('state') <div class="text-danger">{{ $message }}</div> @enderror
                                </div>
                            </div>

                            <div class="mb-3">
                                <label>Occupation</label>
                                <input type="text" name="occupation" value="{{ old('occupation') }}" class="form-control @error('occupation') is-invalid @enderror">
                                @error('occupation') <div class="text-danger">{{ $message }}</div> @enderror
                            </div>

                            <div class="mb-3">
                                <label>Address</label>
                                <textarea name="address" class="form-control @error('address') is-invalid @enderror" rows="3">{{ old('address') }}</textarea>
                                @error('address') <div class="text-danger">{{ $message }}</div> @enderror
                            </div>

                            <div class="mb-3">
                                <label>Profile Photo</label>
                                <input type="file" name="profile_photo" class="form-control @error('profile_photo') is-invalid @enderror">
                                @error('profile_photo') <div class="text-danger">{{ $message }}</div> @enderror
                            </div>

                            <div class="mb-3">
                                <label>Password</label>
                                <input type="password" name="password" class="form-control @error('password') is-invalid @enderror">
                                @error('password') <div class="text-danger">{{ $message }}</div> @enderror
                            </div>

                            <div class="mb-3">
                                <label>Confirm Password</label>
                                <input type="password" name="password_confirmation" class="form-control">
                            </div>

                            <div class="mb-3 form-check">
                                <input type="checkbox" name="terms" class="form-check-input" {{ old('terms')?'checked':'' }}>
                                <label class="form-check-label">I agree to Terms & Conditions</label>
                                @error('terms') <div class="text-danger">{{ $message }}</div> @enderror
                            </div>

                            <button type="submit" class="btn btn-primary w-100">Register</button>
                        </form>

                    </div>

                </div>
            </div>
        </div>
    </div>
</div>

<!-- 🔹 FOOTER (ALWAYS AT BOTTOM) -->
@include('visitor.footer')

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
