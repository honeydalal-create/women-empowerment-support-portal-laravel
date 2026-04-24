<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Manage Helpline Numbers</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
        body {
            font-family: Arial, sans-serif;
            background: #f3e5f5;
            margin: 0;
            padding: 0;
        }

        .container {
            max-width: 1500px;
            margin: 60px auto;
            margin-left: 260px; /* sidebar space */
            padding: 20px;
        }

        h2 {
            text-align: center;
            color: #4a0072;
            margin-bottom: 30px;
        }

        table {
            width: 100%;
            background: #fff;
            box-shadow: 0 4px 15px rgba(0,0,0,0.1);
            border-radius: 10px;
            overflow: hidden;
        }

        th, td {
            padding: 12px;
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

        /* Uniform buttons for Edit and Delete */
        .btn-edit, .btn-delete {
            padding: 5px 10px;
            border-radius: 5px;
            color: #fff;
            font-size: 14px;
            border: none;
            text-decoration: none;
            display: inline-block;
            text-align: center;
            min-width: 70px; /* same width */
            margin-right: 5px; /* small gap between buttons */
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

        form.inline-form {
            display: inline-block; /* keep delete button inline */
            margin: 0;
        }
    </style>
</head>
<body>

@include('admin.header')<br><br>
@include('admin.sidebar')

<div class="container">

    <div class="d-flex justify-content-between align-items-center mb-4">
        <h2>Manage Helpline Numbers</h2>

        <!-- CREATE LINK -->
        <a href="{{ route('admin.helplines.create') }}" class="btn-add">
            + Add Helpline
        </a>
    </div>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    @if($helplines->isEmpty())
        <p class="no-data">No Helpline Numbers Found.</p>
    @else
        <table class="table">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Helpline Name</th>
                    <th>Number</th>
                    <th>Description</th>
                    <th width="180">Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach($helplines as $index => $helpline)
                <tr>
                    <td>{{ $index + 1 }}</td>
                    <td>{{ $helpline->name }}</td>
                    <td>{{ $helpline->number }}</td>
                    <td>{{ $helpline->description }}</td>
                    <td>
                        <!-- EDIT BUTTON -->
                        <a href="{{ route('admin.helplines.edit', $helpline->id) }}"
                           class="btn-edit">
                            Edit
                        </a>

                        <!-- DELETE BUTTON INLINE -->
                        <form action="{{ route('admin.helplines.destroy', $helpline->id) }}"
                              method="POST"
                              class="inline-form"
                              onsubmit="return confirm('Are you sure you want to delete this helpline?')">
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
