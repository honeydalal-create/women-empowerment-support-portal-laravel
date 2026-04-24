<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<title>Job Listings</title>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

<style>
    .custom-container {
        max-width: 1200px;
        margin: 0 auto;
    }

    .job-card {
        transition: transform 0.3s;
        height: 100%;
    }

    .job-card:hover {
        transform: translateY(-5px);
        box-shadow: 0 10px 20px rgba(0,0,0,0.15);
    }

    /* APPLY NOW BUTTON STYLE */
    .apply-btn {
        background: linear-gradient(135deg, #6a1b9a, #d81b60);
        color: #fff;
        border: none;
        border-radius: 25px;
        padding: 10px 18px;
        font-weight: 500;
        transition: all 0.3s ease;
    }

    .apply-btn:hover {
        background: linear-gradient(135deg, #4a0072, #ad1457);
        transform: scale(1.03);
        color: #fff;
    }

    /* SALARY BADGE STYLE */
    .salary-badge {
        background: linear-gradient(135deg, #2e7d32, #66bb6a);
        color: #fff;
        font-size: 0.85rem;
        padding: 6px 12px;
        border-radius: 20px;
        display: inline-block;
        font-weight: 500;
    }
</style>
</head>

<body>

@include('woman.header')<br><br><br><br>
@include('woman.sidebar')

<div class="container custom-container mt-5 mb-5">
    <h3 class="mb-4 text-center">Available Job Opportunities</h3>

    <div class="row g-4">
        @foreach(\App\Models\Job::where('status','active')->latest()->get() as $job)
        <div class="col-md-4">
            <div class="card job-card h-100 shadow-sm p-3 d-flex flex-column">
                <h5 class="card-title">{{ $job->title }}</h5>
                <p class="mb-1"><strong>{{ $job->company }}</strong></p>
                <p class="text-muted">{{ $job->location }}</p>
                <p>{{ $job->description }}</p>

                @if($job->salary)
                    <!-- SALARY CENTERED -->
                    <div class="text-center mb-3">
                        <span class="salary-badge">
                            💰 {{ $job->salary }}
                        </span>
                    </div>
                @endif

                <!-- Apply Now Button -->
                <button type="button"
                        class="apply-btn mt-auto"
                        data-bs-toggle="modal"
                        data-bs-target="#applyModal{{ $job->id }}">
                    Apply Now
                </button>
            </div>
        </div>

        <!-- Apply Modal -->
        <div class="modal fade" id="applyModal{{ $job->id }}" tabindex="-1">
          <div class="modal-dialog">
            <form action="{{ route('woman.apply.job') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <input type="hidden" name="job_title" value="{{ $job->title }}">
                <input type="hidden" name="company_name" value="{{ $job->company }}">

                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Apply for {{ $job->title }}</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                    </div>

                    <div class="modal-body">
                        @php
                            $user = auth()->guard('female_user')->user();
                        @endphp

                        <div class="mb-3">
                            <label>Your Name</label>
                            <input type="text" name="name" class="form-control" value="{{ $user->name ?? '' }}" required>
                        </div>

                        <div class="mb-3">
                            <label>Email</label>
                            <input type="email" name="email" class="form-control" value="{{ $user->email ?? '' }}" required>
                        </div>

                        <div class="mb-3">
                            <label>Phone</label>
                            <input type="text" name="phone" class="form-control" value="{{ $user->phone ?? '' }}" required>
                        </div>

                        <div class="mb-3">
                            <label>Cover Letter / Message</label>
                            <textarea name="message" class="form-control" rows="4"></textarea>
                        </div>

                        <div class="mb-3">
                            <label>Resume</label>
                            <input type="file" name="resume" class="form-control" required>
                        </div>

                        <div class="mb-3">
                            <label>Status</label>
                            <input type="text" class="form-control" value="Pending" disabled>
                        </div>
                    </div>

                    <div class="modal-footer">
                        <button type="submit" class="btn btn-success">Submit Application</button>
                    </div>
                </div>
            </form>
          </div>
        </div>

        @endforeach
    </div>
</div>

@include('woman.footer')

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
