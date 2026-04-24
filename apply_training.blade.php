<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Apply for Training</title>

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
        /* ======== Sidebar ======== */
        .sidebar {
            width: 240px;
            height: 100vh;
            position: fixed;
            top: 0;
            left: 0;
            padding-top: 20px;
            background: #6a1b9a;
            color: #fff;
        }

        .sidebar h2 {
            text-align: center;
            margin-bottom: 25px;
        }

        .sidebar a {
            display: block;
            padding: 14px 22px;
            color: #ddd;
            text-decoration: none;
            border-left: 4px solid transparent;
            transition: 0.3s;
        }

        .sidebar a:hover,
        .sidebar a.active {
            background: #4a0072;
            border-left: 4px solid #ff4081;
            color: #fff;
            padding-left: 30px;
        }

        /* ======== Header ======== */
        header {
            height: 70px;
            padding: 0 30px;
            position: fixed;
            top: 0;
            left: 240px;
            right: 0;
            z-index: 1000;
            display: flex;
            align-items: center;
            justify-content: space-between;
            color: #fff;
            background: rgba(106, 27, 154, 0.95);
            box-shadow: 0 4px 12px rgba(106, 27, 154, 0.5);
        }

        .header-left {
            font-size: 26px;
            font-weight: 700;
            letter-spacing: 1.5px;
        }

        .header-right button {
            background: #fff;
            color: #6a1b9a;
            border: none;
            padding: 10px 24px;
            border-radius: 25px;
            cursor: pointer;
            font-size: 14px;
            font-weight: 600;
            transition: all 0.3s ease;
        }

        .header-right button:hover {
            background: #4a0072;
            color: #fff;
            transform: scale(1.05);
        }

        /* ======== Footer ======== */
        footer {
            position: fixed;
            bottom: 0;
            left: 240px;
            right: 0;
            text-align: center;
            padding: 14px;
            font-size: 14px;
            color: #fff;
            background: rgba(106, 27, 154, 0.95);
            box-shadow: 0 -4px 12px rgba(106, 27, 154, 0.6);
            font-weight: 600;
            z-index: 1000;
        }

        /* ======== Main Content ======== */
        main {
            margin-left: 240px;
            padding: 100px 30px 80px 30px; /* top header + bottom footer */
            background: #f3e5f5;
            min-height: 100vh;
        }

        .card {
            max-width: 600px;
            margin: auto;
            padding: 25px;
            border-radius: 12px;
            box-shadow: 0 8px 25px rgba(0,0,0,0.1);
            background: #fff;
        }

        h2 {
            text-align: center;
            color: #6a1b9a;
            margin-bottom: 20px;
        }

        label {
            font-weight: 500;
            margin-top: 15px;
            display: block;
        }

        input, select {
            width: 100%;
            padding: 10px;
            margin-top: 6px;
            border-radius: 6px;
            border: 1px solid #ccc;
        }

        button.submit-btn {
            width: 100%;
            padding: 12px;
            margin-top: 20px;
            background: #6a1b9a;
            color: #fff;
            font-size: 16px;
            border: none;
            border-radius: 6px;
            cursor: pointer;
        }

        button.submit-btn:hover {
            background: #4a0072;
        }

        .error {
            color: red;
            font-size: 14px;
        }

        .success {
            color: green;
            text-align: center;
            margin-bottom: 15px;
        }
        .sidebar h2 {
    text-align: center;
    margin-bottom: 25px;
    font-size: 24px;
    font-weight: 700;
    color: #fff;  /* Make sure text color is white */
    position: relative; /* ensure it’s inside sidebar */
    z-index: 2; /* above background */
}
    </style>

</head>
<body>

    <!-- Sidebar -->
    <div class="sidebar">
        <h2 style="margin-top: 20px;">EmpowerHer</h2>
        <a href="{{ route('woman.dashboard') }}" class="{{ request()->routeIs('woman.dashboard') ? 'active' : '' }}">Dashboard</a>
        <a href="{{ route('woman.profile') }}" class="{{ request()->routeIs('woman.profile') ? 'active' : '' }}">Profile</a>
        <a href="{{ route('woman.apply_training') }}" class="{{ request()->routeIs('woman.apply_training') ? 'active' : '' }}">Apply for Training</a>
        <a href="{{ route('woman.user_training_applications') }}" class="{{ request()->routeIs('woman.user_training_applications') ? 'active' : '' }}">My Training Applications</a>
        <a href="{{ route('woman.training_certificates') }}" class="{{ request()->routeIs('woman.training_certificates') ? 'active' : '' }}">Training Certificates</a>
        <a href="{{ route('woman.joblisting') }}" class="{{ request()->routeIs('woman.joblisting') ? 'active' : '' }}">Job Listings</a>
        <a href="{{ route('woman.applied_jobs') }}" class="{{ request()->routeIs('woman.applied_jobs') ? 'active' : '' }}">My Apply Jobs</a>
        <a href="{{ route('woman.articlelisting') }}" class="{{ request()->routeIs('woman.articlelisting') ? 'active' : '' }}">Read Articles</a>
        <a href="{{ route('woman.complaint') }}" class="{{ request()->routeIs('woman.complaint') ? 'active' : '' }}">Submit Complaint</a>
        <a href="{{ route('woman.complaint.status') }}" class="{{ request()->routeIs('woman.complaint.status') ? 'active' : '' }}">Complaint Status</a>
    </div>

    <!-- Header -->
    <header>
        <div class="header-left">Strength • Support • Success</div>
        <div class="header-right">
            <form method="POST" action="{{ route('woman.logout') }}">
                @csrf
                <button type="submit">Logout</button>
            </form>
        </div>
    </header>

    <!-- Main Content -->
    <main>
        <div class="card">
            <h2>Apply for Training</h2>

            {{-- Success message --}}
            @if(session('success'))
                <div class="success">{{ session('success') }}</div>
            @endif

            <form method="POST" action="{{ route('woman.apply_training.store') }}">
                @csrf

                {{-- Name --}}
                <label>Name</label>
                <input type="text" name="name"
                    value="{{ old('name', auth()->guard('female_user')->user()->name ?? '') }}" required>
                @error('name') <div class="error">{{ $message }}</div> @enderror

                {{-- Email --}}
                <label>Email</label>
                <input type="email" name="email"
                    value="{{ old('email', auth()->guard('female_user')->user()->email ?? '') }}" required>
                @error('email') <div class="error">{{ $message }}</div> @enderror

                {{-- Phone --}}
                <label>Phone</label>
                <input type="text" name="phone"
                    value="{{ old('phone', auth()->guard('female_user')->user()->phone ?? '') }}" required>
                @error('phone') <div class="error">{{ $message }}</div> @enderror

                {{-- Training Program --}}
                <label>Training Program</label>
                <select name="training_id" required>
                    <option value="">-- Select Training --</option>
                    @foreach($trainings as $training)
                        <option value="{{ $training->id }}" {{ old('training_id') == $training->id ? 'selected' : '' }}>
                            {{ $training->title }} ({{ $training->duration }})
                        </option>
                    @endforeach
                </select>
                @error('training_id') <div class="error">{{ $message }}</div> @enderror

                {{-- Payment Mode --}}
                <label>Payment Mode</label>
                <select name="payment_mode" required>
                    <option value="">-- Select Payment Mode --</option>
                    <option value="Cash" {{ old('payment_mode') == 'Cash' ? 'selected' : '' }}>Cash</option>
                    <option value="Online" {{ old('payment_mode') == 'Online' ? 'selected' : '' }}>Online</option>
                </select>
                @error('payment_mode') <div class="error">{{ $message }}</div> @enderror

                <button type="submit" class="submit-btn">Submit Application</button>
            </form>
        </div>
    </main>

    <!-- Footer -->
    <footer>
        © 2025 EmpowerHer | Women Safety & Empowerment Portal
    </footer>

</body>
</html>
