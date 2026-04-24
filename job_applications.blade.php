<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<title>Job Applications</title>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
<style>
.table-responsive { max-height: 600px; overflow-y: auto; }

        body{
             background: linear-gradient(120deg, #f3e5f5, #ede7f6);
        }
.table thead th {
            background-color: #6a1b9a;
            color: #fff;
        }
</style>
</head>
<body>

@include('company.header')<br><br><br><br>
@include('company.sidebar')

<div class="container mt-5 mb-5">
    <h3 class="mb-4 text-center">Job Applications</h3>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <div class="table-responsive">
        <table class="table table-bordered table-striped align-middle">
            <thead class="table-dark text-center">
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
                @forelse($applications as $key => $application)
                <tr class="text-center">
                    <td>{{ $key + 1 }}</td>
                    <td>{{ $application->name }}</td>
                    <td>{{ $application->email }}</td>
                    <td>{{ $application->phone ?? '-' }}</td>
                    <td>{{ $application->job_title }}</td>
                    <td>{{ $application->company_name }}</td>
                    <td>{{ Str::limit($application->message, 50) }}</td>
                    <td>
                        @if($application->resume)
                            {{-- Show latest uploaded resume --}}
                            <a href="{{ asset('storage/'.$application->resume) }}" target="_blank" class="btn btn-sm btn-primary">View/Download</a>
                        @else
                            N/A
                        @endif
                    </td>
                    <td>{{ $application->created_at->format('d-m-Y H:i') }}</td>
                    <td>
                       <form action="{{ route('company.job.update.status', $application->id) }}" method="POST">
    @csrf
    @method('PUT')

    <select name="status"
            class="form-select form-select-sm"
            onchange="this.form.submit()">

        <option value="Pending" {{ $application->status === 'Pending' ? 'selected' : '' }}>
            Pending
        </option>
        <option value="Hired" {{ $application->status === 'Hired' ? 'selected' : '' }}>
            Hired
        </option>
        <option value="Rejected" {{ $application->status === 'Rejected' ? 'selected' : '' }}>
            Rejected
        </option>
    </select>
</form>

                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="10" class="text-center">No applications found.</td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>

@include('company.footer')
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
