<!DOCTYPE html>
<html>
<head>
<title>Submit Complaint</title>

<style>
body{
    margin:0;
    font-family: 'Segoe UI', Arial, sans-serif;

    background-color: #FFF4F8;
}

.container{
    display:flex;
}

/* ===== Content Area ===== */
.content{
    padding:30px;
    width:100%;
}

/* Card Design */
.form-card{
    max-width:700px;
    background:#ffffff;
    margin:auto;
    padding:25px 30px;
    border-radius:8px;
    box-shadow:0 4px 12px rgba(0,0,0,0.1);
}

.form-card h3{
    margin-bottom:20px;
    color:#6a1b9a;
    border-bottom:2px solid #eee;
    padding-bottom:10px;
}

/* Form Fields */
.form-group{
    margin-bottom:15px;
}

.form-group label{
    font-weight:600;
    color:#333;
    display:block;
    margin-bottom:5px;
}

.form-group input,
.form-group textarea{
    width:100%;
    padding:10px;
    border:1px solid #ccc;
    border-radius:5px;
    font-size:14px;
}

.form-group input:focus,
.form-group textarea:focus{
    border-color:#6a1b9a;
    outline:none;
}

/* Readonly Fields */
.form-group input[readonly]{
    background:#f1f1f1;
    cursor:not-allowed;
}

/* Button */
.submit-btn{
    background:#6a1b9a;
    color:#fff;
    border:none;
    padding:12px 25px;
    font-size:15px;
    border-radius:5px;
    cursor:pointer;
    transition:0.3s;
}

.submit-btn:hover{
    background:#4a148c;
}
</style>
</head>

<body>

@include('woman.header')<br><br><br><br>

<div class="container">
@include('woman.sidebar')

<div class="content">

    <div class="form-card">
        <h3>Submit Complaint</h3>

        <form method="POST" action="{{ route('woman.complaint.store') }}">
            @csrf

            <div class="form-group">
                <label>Name</label>
                <input type="text" value="{{ $user->name }}" readonly>
            </div>

            <div class="form-group">
                <label>Email</label>
                <input type="email" value="{{ $user->email }}" readonly>
            </div>

            <div class="form-group">
                <label>Phone</label>
                <input type="text" value="{{ $user->phone }}" readonly>
            </div>

            <div class="form-group">
                <label>Subject</label>
                <input type="text" name="subject" placeholder="Enter complaint subject" required>
            </div>

            <div class="form-group">
                <label>Message</label>
                <textarea name="message" rows="5" placeholder="Describe your complaint..." required></textarea>
            </div>

            <button type="submit" class="submit-btn">Submit Complaint</button>
        </form>
    </div>

</div>
</div>

@include('woman.footer')

</body>
</html>
