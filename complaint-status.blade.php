<!DOCTYPE html>
<html>
<head>
<title>My Complaints</title>
<style>
body{ margin:0; font-family:Arial; 
    background-color: #FFF4F8;
}
.container{ display:flex; }
.content{
    padding:20px;
    width:100%;
    max-width:900px;
    margin:0 auto;
}
table{ width:100%; border-collapse:collapse; }
th, td{ border:1px solid #ccc; padding:8px; text-align:left; }
</style>
</head>
<body>

@include('woman.header')<br><br><br><br>

<div class="container">
@include('woman.sidebar')

<div class="content">
<h3>My Complaints</h3>

<table>
<tr>
<th>Name</th>
<th>Subject</th>
<th>Status</th>
<th>Admin Reply</th>
</tr>

@foreach($complaints as $c)
<tr>
<td>{{ $c->name }}</td>
<td>{{ $c->subject }}</td>
<td>{{ ucfirst($c->status) }}</td>
<td>{{ $c->admin_reply ?? 'Pending' }}</td>
</tr>
@endforeach
</table>
</div>
</div>

@include('woman.footer')

</body>
</html>
