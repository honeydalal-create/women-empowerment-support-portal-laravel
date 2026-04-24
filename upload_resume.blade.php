<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <title>Upload/Edit Resume</title>
    <meta name="viewport" content="width=device-width, initial-scale=1" />

    <!-- Bootstrap 5 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css" rel="stylesheet" />

    <style>
         body {
    background-color: #FFF4F8;
}
        .sidebar {
            position: fixed;
            top: 56px;
            left: 0;
            height: calc(100vh - 56px);
            width: 220px;
            background-color: #6a1b9a;
            color: white;
            padding-top: 20px;
            overflow-y: auto;
        }
        .content-wrapper { margin-right: 320px; margin-top: 56px; padding: 30px; }
        .form-card { max-width: 1000px; margin-left: auto; box-shadow: 0 0 10px rgba(0,0,0,0.1); }

        /* ✅ ONLY THIS IS NEW */
        .resume-header {
            background-color: #4a148c;
            color: #fff;
        }
    </style>
</head>
<body>

@include('woman.header')<br><br><br><br>

<div class="sidebar">
    @include('woman.sidebar')
</div>

<div class="content-wrapper">
    <div class="card form-card">
        <!-- ✅ COLOR CHANGED HERE -->
        <div class="card-header resume-header">
            <h5 class="mb-0">
                <i class="bi bi-upload"></i> Upload / Edit Resume
            </h5>
        </div>

        <div class="card-body">

            {{-- ✅ SUCCESS MESSAGE --}}
            @if(session('success'))
                <div class="alert alert-success alert-dismissible fade show">
                    <i class="bi bi-check-circle"></i>
                    {{ session('success') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                </div>
            @endif

            {{-- ❌ ERROR MESSAGE --}}
            @if(session('error'))
                <div class="alert alert-danger alert-dismissible fade show">
                    <i class="bi bi-exclamation-circle"></i>
                    {{ session('error') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                </div>
            @endif

            {{-- FORM --}}
            <form action="{{ $resume ? route('woman.resume.update') : route('woman.resume.store') }}"
      method="POST" enctype="multipart/form-data">
    @csrf

    <input type="file" name="resume"
           class="form-control"
           {{ $resume ? '' : 'required' }}>

    @if($resume)
        <a href="{{ route('woman.resume.view') }}" target="_blank"
           class="btn btn-info mt-2">
            View Resume
        </a>

        <button class="btn btn-warning mt-2">Update Resume</button>
    @else
        <button class="btn btn-success mt-2">Upload Resume</button>
    @endif
</form>


        </div>
    </div>
</div>

@include('woman.footer')

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
