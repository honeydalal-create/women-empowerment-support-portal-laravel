<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Edit Admin Profile</title>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">

    <style>
        body {
            margin: 0;
            font-family: 'Segoe UI', sans-serif;
            background: #f3e5f5;
        }

        .container {
            max-width: 800px;
            margin: 120px auto;
            background: #fff;
            padding: 40px;
            border-radius: 20px;
            box-shadow: 0 15px 40px rgba(106,27,154,0.25);
        }

        h2 {
            text-align: center;
            color: #6a1b9a;
            margin-bottom: 30px;
        }

        .form-group {
            margin-bottom: 20px;
        }

        label {
            font-size: 14px;
            font-weight: 600;
            color: #4a0072;
        }

        input, textarea {
            width: 100%;
            padding: 12px;
            border-radius: 10px;
            border: 1px solid #ccc;
            font-size: 14px;
            margin-top: 6px;
        }

        textarea {
            resize: none;
        }

        .btn-group {
            text-align: center;
            margin-top: 30px;
        }

        button, a {
            padding: 12px 26px;
            border-radius: 30px;
            font-size: 14px;
            text-decoration: none;
            font-weight: 600;
            margin: 0 8px;
            cursor: pointer;
        }

        .save-btn {
            background: #6a1b9a;
            color: #fff;
            border: none;
        }

        .cancel-btn {
            border: 2px solid #6a1b9a;
            color: #6a1b9a;
        }

        .save-btn:hover {
            background: #4a0072;
        }

        .cancel-btn:hover {
            background: #6a1b9a;
            color: #fff;
        }
    </style>
</head>
<body>

<div class="container">

    <h2><i class="fa-solid fa-user-pen"></i> Edit Profile</h2>

    <form action="{{ route('admin.profile.update') }}" method="POST" enctype="multipart/form-data">
        @csrf

        <div class="form-group">
            <label>Full Name</label>
            <input type="text" name="full_name"
                   value="{{ auth('admin')->user()->full_name }}" required>
        </div>

        <div class="form-group">
            <label>Email (Read Only)</label>
            <input type="email"
                   value="{{ auth('admin')->user()->email }}" disabled>
        </div>

        <div class="form-group">
            <label>Contact No</label>
            <input type="text" name="contact_no"
                   value="{{ auth('admin')->user()->contact_no }}">
        </div>

        <div class="form-group">
            <label>City</label>
            <input type="text" name="city"
                   value="{{ auth('admin')->user()->city }}">
        </div>

        <div class="form-group">
            <label>State</label>
            <input type="text" name="state"
                   value="{{ auth('admin')->user()->state }}">
        </div>

        <div class="form-group">
            <label>Address</label>
            <textarea name="address" rows="3">{{ auth('admin')->user()->address }}</textarea>
        </div>

        <div class="form-group">
            <label>Profile Photo</label>
            <input type="file" name="profile_photo">
        </div>

        <div class="btn-group">
            <button class="save-btn">
                <i class="fa-solid fa-floppy-disk"></i> Save Changes
            </button>

            <a href="{{ route('admin.profile') }}" class="cancel-btn">
                Cancel
            </a>
        </div>

    </form>

</div>

</body>
</html>
