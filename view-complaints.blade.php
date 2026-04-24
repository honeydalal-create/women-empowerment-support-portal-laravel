<!DOCTYPE html>
<html>
<head>
    <title>View Complaints</title>
    <style>
        body {
            margin: 0;
            font-family: 'Segoe UI', Arial, sans-serif;
           background: #f3e5f5;
        }

        .container {
            display: flex;
        }

        /* ===== Content Area ===== */
        .content {
            padding: 30px;
            width: 100%;
        }

        /* Table Styles */
        table {
            width: 80%; /* table width */
            max-width: 1000px; /* optional maximum width */
            margin: 0 auto; /* center the table */
            border-collapse: collapse;
            background: #fff;
            border-radius: 8px;
            overflow: hidden;
            box-shadow: 0 4px 12px rgba(0,0,0,0.1);
        }

        table th, table td {
            padding: 12px 15px;
            text-align: left;
            border-bottom: 1px solid #ddd;
        }

        table th {
            background-color: #6a1b9a;
            color: #fff;
        }

        table tr:hover {
            background-color: #f1f1f1;
        }

        h3 {
            color: #6a1b9a;
            border-bottom: 2px solid #eee;
            padding-bottom: 10px;
            margin-bottom: 20px;
            text-align: center;
        }

        .no-data {
            text-align: center;
            padding: 20px;
            color: #888;
        }

        .reply-form textarea {
            width: 100%;
            padding: 6px;
            margin-bottom: 5px;
        }

        .reply-form button {
            padding: 6px 12px;
            background-color: #6a1b9a;
            color: white;
            border: none;
            cursor: pointer;
        }

        .current-reply {
            font-size: 14px;
            color: green;
            margin-bottom: 5px;
        }

        .success-message {
            padding: 10px;
            background: #d4edda;
            color: #155724;
            margin-bottom: 15px;
            border-radius: 5px;
            text-align: center;
            max-width: 1000px;
            margin-left: auto;
            margin-right: auto;
        }
    </style>
</head>
<body>

@include('admin.header')<br><br><br><br>

<div class="container">
    @include('admin.sidebar')

    <div class="content">
        <h3>View Complaints & Reply</h3>

        {{-- Success message --}}
        @if(session('success'))
            <div class="success-message">{{ session('success') }}</div>
        @endif

        <table>
            <thead>
                <tr>
                    <th>#</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Phone</th>
                    <th>Subject</th>
                    <th>Message</th>
                    <th>Admin Reply</th>
                    <th>Date</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @forelse($complaints as $complaint)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $complaint->name }}</td>
                    <td>{{ $complaint->email }}</td>
                    <td>{{ $complaint->phone }}</td>
                    <td>{{ $complaint->subject }}</td>
                    <td>{{ $complaint->message }}</td>
                    <td>
                        @if($complaint->admin_reply)
                            <div class="current-reply">{{ $complaint->admin_reply }}</div>
                        @else
                            —
                        @endif
                    </td>
                    <td>{{ $complaint->created_at->format('d M Y') }}</td>
                    <td>
                        <form class="reply-form" method="POST" action="{{ route('admin.complaints.reply', $complaint->id) }}">
                            @csrf
                            <textarea name="admin_reply" placeholder="Type your reply..." required></textarea>
                            <button type="submit">Submit</button>
                        </form>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="9" class="no-data">No complaints found</td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>

@include('admin.footer')

</body>
</html>
