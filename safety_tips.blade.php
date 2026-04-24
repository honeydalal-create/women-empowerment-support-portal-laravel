<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Manage Safety Tips</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
        body {
            font-family: Arial;
            background: #f3e5f5;
            margin: 0;
            padding: 0;
        }

        .container {
            max-width: 1200px;
            margin: 50px auto;
            padding: 20px;
        }

        h2 {
            text-align: center;
            color: #4a0072;
            margin-bottom: 40px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            background: #fff;
            box-shadow: 0 4px 15px rgba(0,0,0,0.1);
            border-radius: 10px;
            overflow: hidden;
        }

        th, td {
            padding: 12px;
            text-align: left;
            border-bottom: 1px solid #ddd;
            vertical-align: middle;
        }

        th {
            background: #6a1b9a;
            color: #fff;
        }

        tr:hover {
            background: #f1e6f9;
        }

        .btn-add {
            background: #6a1b9a;
            color: #fff;
            padding: 8px 14px;
            border-radius: 6px;
            text-decoration: none;
        }

        .btn-add:hover {
            background: #4a0072;
            color: #fff;
        }

        /* EDIT AND DELETE BUTTONS SAME SIZE */
        .btn-edit, .btn-delete {
            padding: 5px 10px;
            border-radius: 5px;
            color: #fff;
            border: none;
            display: inline-block;
            text-align: center;
            text-decoration: none;
            font-size: 14px;
        }

        .btn-edit {
            background: #ff9800;
        }

        .btn-edit:hover {
            background: #fb8c00;
        }

        .btn-delete {
            background: #e53935;
        }

        .btn-delete:hover {
            background: #d32f2f;
        }

        .no-data {
            text-align: center;
            color: #777;
            padding: 20px 0;
        }

        img.tip-img {
            width: 70px;
            border-radius: 6px;
        }
    </style>
</head>
<body>

@include('admin.header')
@include('admin.sidebar')

<br><br><br><br>

<div class="container">

    <div class="d-flex justify-content-between align-items-center mb-4">
        <h2>Manage Safety Tips</h2>
        <a href="{{ route('admin.safety_tips.create') }}" class="btn-add">
            + Add Safety Tip
        </a>
    </div>

    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    @if($tips->isEmpty())
        <p class="no-data">No Safety Tips Found.</p>
    @else
        <table>
            <thead>
                <tr>
                    <th>#</th>
                    <th>Image</th>
                    <th>Title</th>
                    <th>Description</th>
                    <th width="160">Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach($tips as $index => $tip)
                <tr>
                    <td>{{ $index + 1 }}</td>

                    <td>
                        @if($tip->photo)
                            <img src="{{ asset('storage/'.$tip->photo) }}" class="tip-img">
                        @else
                            <span class="text-muted">No Image</span>
                        @endif
                    </td>

                    <td>{{ $tip->title }}</td>

                    <td>
                        <div style="
                            max-width:350px;
                            white-space:nowrap;
                            overflow:hidden;
                            text-overflow:ellipsis;">
                            {{ $tip->description }}
                        </div>
                    </td>

                    <td>
                        <a href="{{ route('admin.safety_tips.edit', $tip->id) }}"
                           class="btn-edit">
                            Edit
                        </a>

                        <form action="{{ route('admin.safety_tips.destroy', $tip->id) }}"
                              method="POST"
                              style="display:inline"
                              onsubmit="return confirm('Are you sure?')">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn-delete">
                                Delete
                            </button>
                        </form>
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
