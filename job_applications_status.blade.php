<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">

<title>Hired & Rejected Job Applications</title>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

<style>
body{
    background: linear-gradient(120deg, #f3e5f5, #ede7f6);
    font-family: Arial, sans-serif;
}

.container{
    margin-top: 80px;
    margin-bottom: 50px;
}

h3{
    text-align: center;
    margin-bottom: 30px;
    color: #4a0072;
}

.table thead th{
    background-color: #6a1b9a;
    color: #fff;
    text-align: center;
}

.table td{
    vertical-align: middle;
}

.status-hired{
    color: green;
    font-weight: bold;
}

.status-rejected{
    color: red;
    font-weight: bold;
}

.btn-resume{
    padding: 4px 10px;
    font-size: 13px;
}
</style>
</head>

<body>

@include('admin.header')
@include('admin.sidebar')

<div class="container">
    <h3>Hired & Rejected Job Applications</h3>

    <div class="table-responsive">
        <table class="table table-bordered table-striped align-middle">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Applicant Name</th>
                    <th>Email</th>
                    <th>Phone</th>
                    <th>Job Title</th>
                    <th>Company</th>
                    <th>Cover Letter</th>
                    <th>Resume</th>
                    <th>Applied On</th>
                    <th>Status</th>
                </tr>
            </thead>

            <tbody>
            @forelse($applications as $index => $application)
                <tr class="text-center">
                    <td>{{ $index + 1 }}</td>

                    <td>{{ $application->name }}</td>
                    <td>{{ $application->email }}</td>
                    <td>{{ $application->phone ?? '-' }}</td>

                    <td>{{ $application->job_title }}</td>
                    <td>{{ $application->company_name }}</td>

                    <td>
                        {{ \Illuminate\Support\Str::limit($application->message, 50) }}
                    </td>

                    <td>
                        @if($application->resume)
                            <a href="{{ asset('storage/'.$application->resume) }}"
                               target="_blank"
                               class="btn btn-sm btn-primary btn-resume">
                               View Resume
                            </a>
                        @else
                            <span class="text-muted">N/A</span>
                        @endif
                    </td>

                    <td>
                        {{ $application->created_at->format('d-m-Y H:i') }}
                    </td>

                    <td>
                        @if($application->status === 'Hired')
                            <span class="status-hired">Hired</span>
                        @else
                            <span class="status-rejected">Rejected</span>
                        @endif
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="10" class="text-center text-muted">
                        No hired or rejected job applications found.
                    </td>
                </tr>
            @endforelse
            </tbody>
        </table>
    </div>
</div>

@include('admin.footer')

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>
