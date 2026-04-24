<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Women Empowerment | Jobs</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
        body { font-family: 'Poppins', sans-serif; padding-left: 260px; }
        h1 { text-align: center; color: #6a1b9a; margin: 30px 0 20px; }
        .job-card { background: #fff; padding: 20px; border-radius: 15px; box-shadow: 0 8px 20px rgba(0,0,0,0.15); border-top: 5px solid #6a1b9a; }
        .apply-btn { background: #6a1b9a; color: #fff; border-radius: 8px; padding: 8px 16px; border: none; }
        .apply-btn:hover { background: #4a0072; }
        @media(max-width: 992px) { body { padding-left: 0; } }
    </style>
</head>
<body>

@include('woman.header')
@include('woman.sidebar')

<div class="container mt-4">
    <h1>Job Listings</h1>
    <p class="text-center">Discover job opportunities specially curated for women.</p>

    @if(session('success'))
        <div class="alert alert-success text-center">
            {{ session('success') }}
        </div>
    @endif

    <div class="row g-4">
        @php
            $jobs = [
                ['title'=>'Front-End Web Developer','company'=>'TechEase Pvt. Ltd.','location'=>'Surat','salary'=>'₹25,000 – ₹40,000'],
                ['title'=>'Office Executive','company'=>'WomenRise Foundation','location'=>'Ahmedabad','salary'=>'₹15,000 – ₹22,000'],
                ['title'=>'Digital Marketing Assistant','company'=>'BrandBoost Agency','location'=>'Pune','salary'=>'₹20,000 – ₹35,000'],
            ];
        @endphp

        @foreach($jobs as $job)
            <div class="col-md-4">
                <div class="job-card">
                    <h5>{{ $job['title'] }}</h5>
                    <p>{{ $job['company'] }}</p>
                    <p>{{ $job['location'] }} | {{ $job['salary'] }}</p>
                    <button class="apply-btn" data-bs-toggle="modal" data-bs-target="#applyModal"
                            onclick="setJob('{{ $job['title'] }}','{{ $job['company'] }}')">Apply Now</button>
                </div>
            </div>
        @endforeach
    </div>
</div>

<!-- Apply Job Modal -->
<div class="modal fade" id="applyModal" tabindex="-1">
    <div class="modal-dialog modal-lg">
        <form method="POST" action="{{ route('apply.job') }}" enctype="multipart/form-data" class="modal-content">
            @csrf
            <div class="modal-header">
                <h5 class="modal-title">Apply Job</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>

            <div class="modal-body">
                <input type="hidden" id="job_title" name="job_title">
                <input type="hidden" id="company_name" name="company_name">

                <div class="mb-3">
                    <label>Name</label>
                    <input type="text" name="name" class="form-control" value="{{ Auth::guard('female_user')->user()->name }}" required>
                </div>
                <div class="mb-3">
                    <label>Email</label>
                    <input type="email" name="email" class="form-control" value="{{ Auth::guard('female_user')->user()->email }}" required>
                </div>
                <div class="mb-3">
                    <label>Phone</label>
                    <input type="text" name="phone" class="form-control" value="{{ Auth::guard('female_user')->user()->phone }}" required>
                </div>
                <div class="mb-3">
                    <label>Resume</label>
                    <input type="file" name="resume" class="form-control" required>
                </div>
                <div class="mb-3">
                    <label>Message</label>
                    <textarea name="message" class="form-control"></textarea>
                </div>
            </div>

            <div class="modal-footer">
                <button class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                <button type="submit" class="btn btn-success">Submit</button>
            </div>
        </form>
    </div>
</div>

<script>
function setJob(title, company) {
    document.getElementById('job_title').value = title;
    document.getElementById('company_name').value = company;
}
</script>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
@include('woman.footer')
</body>
</html>
