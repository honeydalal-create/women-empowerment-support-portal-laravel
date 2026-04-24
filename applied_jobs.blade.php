<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<title>Women Empowerment | Applied Jobs</title>
<meta name="viewport" content="width=device-width, initial-scale=1.0">

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

<style>
body {
    font-family: 'Poppins', sans-serif;
    padding-left: 260px;
    background-color: #FFF4F8;
}
h1 {
    text-align: center;
    color: #6a1b9a;
    margin: 30px 0 20px;
}
.job-card {
    background: #fff;
    padding: 20px;
    border-radius: 15px;
    box-shadow: 0 8px 20px rgba(0,0,0,0.15);
    border-top: 5px solid #6a1b9a;
    height: 100%;
}
.badge-status {
    font-size: 14px;
    padding: 6px 12px;
    border-radius: 20px;
}
@media(max-width: 992px) {
    body { padding-left: 0; }
}
</style>
</head>

<body>

@include('woman.header')<br><br><br><br>
@include('woman.sidebar')

<div class="container mt-4 mb-5">
    <h1>Jobs You Have Applied For</h1>
    <p class="text-center">These are the jobs you have successfully applied to.</p>

    @if(session('success'))
        <div class="alert alert-success text-center">
            {{ session('success') }}
        </div>
    @endif

    <div class="row g-4">
        @forelse($appliedJobs as $job)
        <div class="col-md-4">
            <div class="job-card">

                <h5 class="fw-bold">{{ $job->job_title }}</h5>
                <p class="mb-1"><strong>Company:</strong> {{ $job->company_name }}</p>
                <p class="mb-1"><strong>Phone:</strong> {{ $job->phone }}</p>
                <p class="mb-1"><strong>Email:</strong> {{ $job->email }}</p>

                <p class="mt-2">
                    <strong>Message:</strong><br>
                    {{ $job->message ?? '—' }}
                </p>

                <!-- STATUS -->
                <p class="mt-3">
                    <strong>Status:</strong><br>

                    @if($job->status == 'Pending')
                        <span class="badge bg-warning text-dark badge-status">Pending</span>
                    @elseif($job->status == 'Hired')
                        <span class="badge bg-success badge-status">Hired</span>
                    @elseif($job->status == 'Rejected')
                        <span class="badge bg-danger badge-status">Rejected</span>
                    @else
                        <span class="badge bg-secondary badge-status">Unknown</span>
                    @endif
                </p>

                <p class="text-muted mt-3">
                    Applied on: {{ $job->created_at->format('d M, Y') }}
                </p>

            </div>
        </div>
        @empty
        <div class="col-12">
            <div class="alert alert-info text-center">
                You have not applied for any jobs yet.
            </div>
        </div>
        @endforelse
    </div>
</div>

@include('woman.footer')

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
