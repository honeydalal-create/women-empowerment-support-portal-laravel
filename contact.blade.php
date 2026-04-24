<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>EmpowerHer - Contact Us</title>

    <!-- Google Font -->
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600&display=swap" rel="stylesheet">

    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
        body {
            font-family: 'Poppins', sans-serif;
            background-image: url('/image/p2.jpg');
            background-size: cover;
            background-position: center;
            background-attachment: fixed;
            min-height: 100vh;
            display: flex;
            flex-direction: column;
        }

        h1 {
            text-align: center;
            font-size: 46px;
            color: #6a1b9a;
            font-weight: 700;
            margin-top: 40px;
        }

        .subtitle {
            text-align: center;
            color: #333;
            margin-bottom: 40px;
            font-size: 18px;
        }

        .contact-card {
            background: white;
            padding: 40px;
            border-radius: 15px;
            box-shadow: 0 0 14px rgba(0, 0, 0, 0.15);
            max-width: 1050px;
            width: 95%;
            margin: 0 auto 50px auto;
        }

        .contact-label {
            font-weight: 600;
            color: #6a1b9a;
        }

        .btn-submit {
            background-color: #ff4f8b;
            border: none;
            font-size: 20px;
            padding: 12px 20px;
            border-radius: 8px;
        }

        .btn-submit:hover {
            background-color: #ff2e72;
        }

        .btn-reply {
            background-color: #6a1b9a;
            border: none;
            font-size: 20px;
            padding: 12px 20px;
            border-radius: 8px;
            margin-left: 15px;
        }

        .btn-reply:hover {
            background-color: #7b1fa2;
        }

        .error-text {
            color: red;
            font-size: 14px;
            margin-top: 4px;
        }

        .form-buttons {
            display: flex;
            align-items: center;
            margin-top: 20px;
        }
    </style>
</head>

<body>

    <!-- NAVBAR -->
    @include('visitor.header')

    <!-- PAGE HEADING -->
    <h1>Contact Us</h1>
    <p class="subtitle">If you have questions, need support, or want to connect with us — we are here to help.</p>

    <!-- CONTACT FORM -->
    <div class="contact-card">
        @if(session('success'))
            <div class="alert alert-success alert-dismissible fade show mb-4">
                {{ session('success') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
            </div>
        @endif

        <form action="/contact" method="POST">
            @csrf

            <!-- FULL NAME -->
            <div class="mb-3">
                <label class="contact-label">Full Name</label>
                <input type="text"
                       name="name"
                       value="{{ old('name') }}"
                       class="form-control @error('name') is-invalid @enderror"
                       placeholder="Enter your full name">
                @error('name')
                    <div class="error-text">{{ $message }}</div>
                @enderror
            </div>

            <!-- EMAIL -->
            <div class="mb-3">
                <label class="contact-label">Email Address</label>
                <input type="email"
                       name="email"
                       value="{{ old('email') }}"
                       class="form-control @error('email') is-invalid @enderror"
                       placeholder="Enter your email">
                @error('email')
                    <div class="error-text">{{ $message }}</div>
                @enderror
            </div>

            <!-- MOBILE -->
            <div class="mb-3">
                <label class="contact-label">Mobile Number</label>
                <input type="text"
                       name="mobile"
                       value="{{ old('mobile') }}"
                       class="form-control @error('mobile') is-invalid @enderror"
                       placeholder="Enter your phone number">
                @error('mobile')
                    <div class="error-text">{{ $message }}</div>
                @enderror
            </div>

            <!-- MESSAGE -->
            <div class="mb-3">
                <label class="contact-label">Message</label>
                <textarea name="message"
                          rows="6"
                          class="form-control @error('message') is-invalid @enderror"
                          placeholder="Write your message here...">{{ old('message') }}</textarea>
                @error('message')
                    <div class="error-text">{{ $message }}</div>
                @enderror
            </div>

            <!-- FORM BUTTONS -->
            <div class="form-buttons">
                <button type="submit" class="btn btn-submit text-white">
                    Send Message
                </button>

                <!-- Reply Button -->
                <a href="{{ route('check.reply') }}" class="btn btn-reply text-white">
                    View Replies
                </a>
            </div>
        </form>
    </div>

    <!-- FOOTER -->
    @include('visitor.footer')

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
