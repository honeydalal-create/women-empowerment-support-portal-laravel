<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Manage Trainings</title>
<style>
body{font-family: Arial,sans-serif; margin:0; padding:0; background: linear-gradient(120deg,#f3e5f5,#ede7f6);}
.container{max-width:1200px; margin:50px auto; padding:20px; background:#fff; border-radius:8px; box-shadow:0 4px 10px rgba(0,0,0,0.1);}
h2{text-align:center; color:#4a0072; margin-bottom:20px;}
table{width:100%; border-collapse:collapse;}
th,td{border:1px solid #ccc; padding:10px; text-align:left;}
th{background:#6a1b9a; color:#fff;}
img{max-width:80px; border-radius:5px;}
a,button{padding:6px 10px; text-decoration:none; border:none; cursor:pointer; border-radius:4px; font-size:14px;}
.add{display:inline-block; margin-bottom:15px; background:#6a1b9a; color:#fff;}
.edit{background:#4a0072; color:#fff; margin-right:5px;}
.delete{background:red; color:#fff;}
.success{color:green; margin-bottom:10px; text-align:center;}
form{display:inline;}

</style>
</head>
<body>

    @include('company.header')
@include('company.sidebar')

<div class="container">
<h2>Manage Trainings</h2>

@if(session('success'))
    <div class="success">{{ session('success') }}</div>
@endif

<a href="{{ route('company.create') }}" class="add">+ Add Training</a>

<table>
<thead>
<tr>
<th>#</th>
<th>Title</th>
<th>Duration</th>
<th>Description</th>
<th>Image</th>
<th>Action</th>
</tr>
</thead>
<tbody>
@forelse($trainings as $training)
<tr>
<td>{{ $loop->iteration }}</td>
<td>{{ $training->title }}</td>
<td>{{ $training->duration }}</td>
<td>{{ $training->description }}</td>
<td>
@if($training->image)
<img src="{{ asset('storage/'.$training->image) }}">
@else
N/A
@endif
</td>
<td>
<a href="{{ route('company.edit',$training->id) }}" class="edit">Edit</a>

<form method="POST" action="{{ route('company.delete',$training->id) }}" onsubmit="return confirm('Delete this training?')">
@csrf
<button class="delete">Delete</button>
</form>
</td>
</tr>
@empty
<tr>
<td colspan="6" align="center">No trainings found</td>
</tr>
@endforelse
</tbody>
</table>
</div>

@include('company.footer')
</body>
</html>
