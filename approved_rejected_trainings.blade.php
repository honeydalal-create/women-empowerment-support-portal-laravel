<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<title>Approved & Rejected Trainings</title>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

<style>
body{
    background: linear-gradient(120deg, #f3e5f5, #ede7f6);
    font-family: Arial, sans-serif;
}
.container{
    max-width:1200px;
    margin:60px auto;
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
.status-approved{color:green;font-weight:bold;}
.status-rejected{color:red;font-weight:bold;}
.certificate-link{
    color:#0066cc;
    text-decoration:none;
    font-weight:bold;
}
.certificate-link:hover{
    text-decoration:underline;
}
</style>
</head>
<body>

@include('admin.header')<br><br><br><br>
@include('admin.sidebar')

<div class="container">
 <h3 class="mb-4 text-center">Tranings</h3>

@if($applications->isEmpty())
<div class="alert alert-info text-center">
    No approved or rejected training records found.
</div>
@else

<table class="table table-bordered table-striped align-middle">
<thead>
<tr>
    <th>#</th>
    <th>User Name</th>
    <th>Email</th>
    <th>Phone</th>
    <th>Training Program</th>
    <th>Status</th>
    <th>Certificate</th>

</tr>
</thead>
<tbody>
@foreach($applications as $app)
<tr>
    <td>{{ $loop->iteration }}</td>
    <td>{{ $app->user->name }}</td>
    <td>{{ $app->user->email }}</td>
    <td>{{ $app->user->phone }}</td>
    <td>{{ $app->training->title ?? 'N/A' }}</td>

    <td>
        @if($app->status == 'approved')
            <span class="status-approved">Approved</span>
        @else
            <span class="status-rejected">Rejected</span>
        @endif
    </td>

    <td>
        @if($app->status == 'approved' && $app->certificate)
            <a href="{{ asset('uploads/certificates/'.$app->certificate->certificate_file) }}"
               target="_blank"
               class="certificate-link">
               View Certificate
            </a>
        @else
            <span class="text-muted">Not Available</span>
        @endif
    </td>

   
</tr>
@endforeach
</tbody>
</table>

@endif
</div>

@include('admin.footer')

</body>
</html>
