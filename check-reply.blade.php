<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Check Admin Reply</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            font-family: 'Poppins', sans-serif;
            background: linear-gradient(135deg, #f3e5f5, #ede7f6);
            min-height: 100vh;
            display: flex;
            justify-content: center; /* center horizontally */
            align-items: center;    /* center vertically */
            padding: 20px;          /* some padding for smaller screens */
        }

        /* Container card */
        .reply-card {
            background: #fff;
            padding: 40px 30px;
            border-radius: 15px;
            max-width: 700px;
            width: 100%;
            box-shadow: 0 8px 20px rgba(0,0,0,0.1);
        }

        h2 {
            text-align: center;
            color: #6a1b9a;
            margin-bottom: 25px;
            font-weight: 600;
        }

        /* Back button styling */
        .back-button {
            margin-bottom: 25px;
        }

        .reply-message {
            background: #f0f4ff;
            padding: 15px;
            border-left: 4px solid #6a1b9a;
            border-radius: 8px;
            margin-bottom: 15px;
        }

        .reply-message strong {
            color: #4a0072;
        }

        .no-reply, .alert-warning {
            text-align: center;
        }


            .reply-card {
                padding: 25px 20px;
            }
            h2 {
                font-size: 24px;
            }
        
    </style>
</head>
<body>

    <div class="reply-card">
        <!-- Back Button -->
        <a href="{{ route('contact') }}" class="btn btn-outline-secondary back-button">&larr; Back to Contact Page</a>

        <h2>Check Admin Reply</h2>

        <!-- Email Form -->
        <form action="{{ route('check.reply.submit') }}" method="POST" class="mb-4">
            @csrf
            <div class="mb-3">
                <label for="email" class="form-label">Enter Your Email</label>
                <input type="email" name="email" id="email" class="form-control" placeholder="your@email.com" required value="{{ old('email') }}">
                @error('email')
                    <div class="text-danger mt-1">{{ $message }}</div>
                @enderror
            </div>
            <button type="submit" class="btn btn-primary w-100">Check Reply</button>
        </form>

        <!-- Display Replies -->
        @if(isset($contacts))
            @if(count($contacts) > 0)
                <h5 class="mb-3">Replies for {{ $request->email }}:</h5>
                @foreach($contacts as $contact)
                    <div class="reply-message">
                        <p><strong>Your Message:</strong> {{ $contact->message }}</p>
                        <p><strong>Admin Reply:</strong> {{ $contact->admin_reply }}</p>
                    </div>
                @endforeach
            @else
                <div class="alert alert-warning">No replies found for this email yet.</div>
            @endif
        @endif
    </div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
