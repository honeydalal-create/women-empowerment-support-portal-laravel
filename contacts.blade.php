<!DOCTYPE html>
<html>
<head>
    <title>View Visitor Messages</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <style>
        body {
            margin: 0;
            font-family: 'Segoe UI', Arial, sans-serif;
            background: #f3e5f5;
        }

        .container {
            display: flex;
            justify-content: center;
            padding: 30px;
        }

        .content {
            width: 100%;
            max-width: 1200px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            background: #fff;
            border-radius: 8px;
            overflow: hidden;
            box-shadow: 0 4px 12px rgba(0,0,0,0.1);
            margin: 0 auto; /* Center the table */
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
            resize: vertical;
        }

        .reply-form button {
            padding: 6px 12px;
            background-color: #6a1b9a;
            color: white;
            border: none;
            cursor: pointer;
            border-radius: 4px;
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
        }

        @media screen and (max-width: 768px) {
            table, thead, tbody, th, td, tr {
                display: block;
            }
            table th {
                text-align: right;
            }
            table td {
                text-align: right;
                padding-left: 50%;
                position: relative;
            }
            table td::before {
                content: attr(data-label);
                position: absolute;
                left: 15px;
                width: calc(50% - 30px);
                font-weight: bold;
                text-align: left;
            }
        }
    </style>
</head>
<body>

@include('admin.header')
<br><br><br><br>

<div class="container">
    @include('admin.sidebar')

    <div class="content">
        <h3>View Visitor Messages & Reply</h3>

        <div id="success-msg" class="success-message" style="display:none;"></div>

        <table>
            <thead>
                <tr>
                    <th>#</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Phone</th>
                    <th>Message</th>
                    <th>Admin Reply</th>
                    <th>Date</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @forelse($contacts as $contact)
                <tr id="contact-row-{{ $contact->id }}">
                    <td data-label="#">{{ $loop->iteration }}</td>
                    <td data-label="Name">{{ $contact->name }}</td>
                    <td data-label="Email">{{ $contact->email }}</td>
                    <td data-label="Phone">{{ $contact->mobile }}</td>
                    <td data-label="Message">{{ $contact->message }}</td>
                    <td data-label="Admin Reply">
                        <div class="current-reply" id="current-reply-{{ $contact->id }}">
                            {{ $contact->admin_reply ?? '—' }}
                        </div>
                    </td>
                    <td data-label="Date">{{ $contact->created_at->format('d M Y') }}</td>
                    <td data-label="Action">
                        <form class="reply-form" data-id="{{ $contact->id }}">
                            @csrf
                            <textarea name="admin_reply" placeholder="Type your reply..." required></textarea>
                            <button type="submit">Submit</button>
                        </form>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="8" class="no-data">No messages found</td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>

@include('admin.footer')

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
$(document).ready(function(){
    $.ajaxSetup({
        headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') }
    });

    $('.reply-form').on('submit', function(e){
        e.preventDefault();
        var form = $(this);
        var contactId = form.data('id');
        var reply = form.find('textarea[name="admin_reply"]').val();

        $.ajax({
            url: '/admin/contacts/reply/' + contactId,
            type: 'POST',
            data: { admin_reply: reply },
            success: function(response){
                // Update reply in table
                $('#current-reply-' + contactId).text(reply);
                // Clear textarea
                form.find('textarea[name="admin_reply"]').val('');
                // Show success message
                $('#success-msg').text('Reply sent successfully!').fadeIn().delay(2000).fadeOut();
            },
            error: function(xhr){
                alert('Error: ' + xhr.responseJSON.message);
            }
        });
    });
});
</script>

</body>
</html>
