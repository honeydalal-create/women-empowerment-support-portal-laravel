<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<title>Sidebar</title>

<style>
.sidebar {
    width: 240px;
    height: 100vh;
    position: fixed;
    top: 0;
    left: 0;
    padding-top: 20px;
    background: #6a1b9a;
    color: #fff;
}

.sidebar h2 {
    text-align: center;
    margin-bottom: 25px;
}

.sidebar a {
    display: block;
    padding: 14px 22px;
    color: #ddd;
    text-decoration: none;
    border-left: 4px solid transparent;
    transition: 0.3s;
}

.sidebar a:hover,
.sidebar a.active {
    background: #4a0072;
    border-left: 4px solid #ff4081;
    color: #fff;
    padding-left: 30px;
}
</style>
</head>

<body>

<div class="sidebar">
    <h2>EmpowerHer</h2>

    <a href="{{ route('woman.dashboard') }}" class="{{ request()->routeIs('woman.dashboard') ? 'active' : '' }}">Dashboard</a>
    <a href="{{ route('woman.profile') }}" class="{{ request()->routeIs('woman.profile') ? 'active' : '' }}">Profile</a>
    <a href="{{ route('woman.apply_training') }}" class="{{ request()->routeIs('woman.apply_training') ? 'active' : '' }}">Apply for Training</a>
    <a href="{{ route('woman.user_training_applications') }}" class="{{ request()->routeIs('woman.user_training_applications') ? 'active' : '' }}">My Training Applications</a>
   <a href="{{ route('woman.training_certificates') }}"
   class="{{ request()->routeIs('woman.training_certificates') ? 'active' : '' }}">
   <i class="fa-solid fa-certificate"></i> Training Certificates
</a>

    <a href="{{ route('woman.joblisting') }}" class="{{ request()->routeIs('woman.joblisting') ? 'active' : '' }}">Job Listings</a>
    <a href="{{ route('woman.applied_jobs') }}" class="{{ request()->routeIs('woman.applied_jobs') ? 'active' : '' }}">My Apply Jobs</a>

    <a href="{{ route('woman.articlelisting') }}" class="{{ request()->routeIs('woman.articlelisting') ? 'active' : '' }}">Read Articles</a>
    <a href="{{ route('woman.complaint') }}" class="{{ request()->routeIs('woman.complaint') ? 'active' : '' }}">Submit Complaint</a>
    <a href="{{ route('woman.complaint.status') }}" class="{{ request()->routeIs('woman.complaint.status') ? 'active' : '' }}">Complaint Status</a>
</div>


</body>
</html>
