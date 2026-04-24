<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<title>Edit Company Profile</title>

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">

<style>
*{
    box-sizing:border-box;
    margin:0;
    padding:0;
}

body{
    min-height:100vh;
    font-family:'Segoe UI',sans-serif;
    background:linear-gradient(135deg,#f3e5f5,#fce4ec);
    display:flex;
    align-items:center;
    justify-content:center;
}

/* ===== MAIN CONTAINER ===== */
.profile-container{
    width:900px;
    background:#fff;
    border-radius:22px;
    box-shadow:0 20px 45px rgba(106,27,154,0.35);
    overflow:hidden;
}

/* ===== HEADER ===== */
.profile-header{
    background:linear-gradient(135deg,#6a1b9a,#8e24aa);
    color:#fff;
    text-align:center;
    padding:30px 20px 26px;
}

.profile-header img{
    width:100px;
    height:100px;
    border-radius:50%;
    border:4px solid #fff;
    object-fit:cover;
    margin-bottom:10px;
}

.profile-header h2{
    font-size:22px;
    margin-bottom:4px;
}

.profile-header p{
    font-size:13px;
    opacity:.9;
}

/* ===== BODY ===== */
.profile-body{
    padding:30px 50px 34px; /* bottom padding controlled */
}

/* ===== FORM GRID ===== */
.profile-row{
    display:grid;
    grid-template-columns:1fr 1fr;
    gap:24px;
    margin-bottom:20px;
}

.profile-box{
    display:flex;
    flex-direction:column;
}

.profile-box label{
    font-size:13px;
    color:#555;
    margin-bottom:6px;
}

.profile-box input,
.profile-box textarea{
    padding:12px 14px;
    border-radius:10px;
    border:1px solid #ccc;
    font-size:14px;
}

textarea{
    resize:none;
    height:70px;
}

/* ===== ACTION BUTTONS ===== */
.profile-actions{
    display:flex;
    justify-content:center;
    gap:18px;
    margin-top:12px;
}

.profile-actions button,
.profile-actions a{
    padding:11px 28px;
    border-radius:30px;
    font-size:14px;
    font-weight:600;
    text-decoration:none;
    transition:.3s;
}

.save-btn{
    background:#6a1b9a;
    color:#fff;
    border:none;
    cursor:pointer;
}

.save-btn:hover{
    background:#4a0072;
}

.back-btn{
    border:2px solid #6a1b9a;
    color:#6a1b9a;
}

.back-btn:hover{
    background:#6a1b9a;
    color:#fff;
}

/* ===== MOBILE ===== */
@media(max-width:768px){
    .profile-container{
        width:94%;
    }
    .profile-body{
        padding:24px;
    }
    .profile-row{
        grid-template-columns:1fr;
    }
}
</style>
</head>

<body>

    @include('company.header')<br><br><br><br>
@include('company.sidebar')

<div class="profile-container">

    <!-- HEADER -->
    <div class="profile-header">
        <img src="{{ $company->logo ? asset($company->logo) : asset('default-company.png') }}">
        <h2>{{ $company->name }}</h2>
        <p>Edit Company Profile</p>
    </div>

    <!-- BODY -->
    <div class="profile-body">

        @if(session('success'))
            <div style="background:#d4edda;padding:10px;border-radius:8px;margin-bottom:20px;">
                {{ session('success') }}
            </div>
        @endif

       <form method="POST"
      action="{{ route('company.profile.update') }}"
      enctype="multipart/form-data">
    @csrf


            <div class="profile-row">
                <div class="profile-box">
                    <label>Company Name</label>
                    <input type="text" name="name" value="{{ old('name',$company->name) }}">
                </div>

                <div class="profile-box">
                    <label>Email</label>
                    <input type="email" name="email" value="{{ old('email',$company->email) }}">
                </div>
            </div>

            <div class="profile-row">
                <div class="profile-box">
                    <label>Phone</label>
                    <input type="text" name="phone" value="{{ old('phone',$company->phone) }}">
                </div>

                <div class="profile-box">
                    <label>Address</label>
                    <textarea name="address">{{ old('address',$company->address) }}</textarea>
                </div>
            </div>

            <div class="profile-row">
                <div class="profile-box">
                    <label>Company Logo</label>
                    <input type="file" name="logo">
                </div>
            </div>

            <div class="profile-actions">
                <button class="save-btn">
                    <i class="fa-solid fa-floppy-disk"></i> Update Profile
                </button>


            </div>

        </form>

    </div>
</div>
@include('company.footer')
</body>
</html>
