<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Applied Trainings</title>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

<style>
body{font-family:Arial;background:#f3e5f5;margin:0;padding:0;}
.container{max-width:1200px;margin:50px auto;padding:20px;}
h2{text-align:center;color:#4a0072;margin-bottom:40px;}
table{width:100%;border-collapse:collapse;background:#fff;box-shadow:0 4px 15px rgba(0,0,0,0.1);border-radius:10px;overflow:hidden;}
th,td{padding:12px;text-align:left;border-bottom:1px solid #ddd;}
th{background:#6a1b9a;color:#fff;}
tr:hover{background:#f1e6f9;}
.no-applications{text-align:center;color:#777;padding:20px 0;}
.btn-approve{background:green;color:#fff;border:none;padding:5px 10px;border-radius:5px;}
.btn-reject{background:red;color:#fff;border:none;padding:5px 10px;border-radius:5px;}
.btn-approve:hover{background:darkgreen;}
.btn-reject:hover{background:darkred;}
form{display:inline;}
</style>
</head>
<body>

 @include('company.header')<br><br><br><br>
@include('company.sidebar')

<div class="container">
<h2>Applied Trainings</h2>

@if(session('success'))
<div class="alert alert-success">{{ session('success') }}</div>
@endif

@if($applications->isEmpty())
<p class="no-applications">No users have applied for trainings yet.</p>
@else
<table>
<thead>
<tr>
<th>#</th>
<th>User Name</th>
<th>Email</th>
<th>Phone</th>
<th>Training Program</th>
<th>Applied On</th>
<th>Status</th>
<th>Action</th>
</tr>
</thead>
<tbody>
@foreach($applications as $application)
<tr>
<td>{{ $loop->iteration }}</td>
<td>{{ $application->user->name }}</td>
<td>{{ $application->user->email }}</td>
<td>{{ $application->user->phone }}</td>
<td>{{ $application->training->title ?? 'N/A' }}</td>
<td>{{ $application->created_at->format('d M Y') }}</td>
<td>
<span class="{{ $application->status == 'approved' ? 'text-success' : ($application->status == 'rejected' ? 'text-danger' : 'text-warning') }}">
{{ ucfirst($application->status) }}
</span>
</td>
<td>
@if($application->status != 'approved')
<form action="{{ route('company.applied_trainings.update_status',$application->id) }}" method="POST">
@csrf
@method('PATCH')
<input type="hidden" name="status" value="approved">
<button type="submit" class="btn-approve">Approve</button>
</form>
@endif

@if($application->status != 'rejected')
<form action="{{ route('company.applied_trainings.update_status',$application->id) }}" method="POST">
@csrf
@method('PATCH')
<input type="hidden" name="status" value="rejected">
<button type="submit" class="btn-reject">Reject</button>
</form>
@endif
</td>
</tr>
@endforeach
</tbody>
</table>
@endif
</div>

@include('company.footer')

</body>
</html>
