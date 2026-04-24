@extends('layouts.app')

@section('content')
<div style="margin-left:260px; padding:20px;">
    <h2>Submit Complaint</h2>

    @if(session('success'))
        <div style="color:green; margin-bottom:10px;">{{ session('success') }}</div>
    @endif

    @auth
    <form method="POST" action="{{ route('woman.complaint.store') }}">
        @csrf
        <div style="margin-bottom:10px;">
            <label for="title">Complaint Title:</label><br>
            <input type="text" id="title" name="title" value="{{ old('title') }}" required>
            @error('title') <div style="color:red;">{{ $message }}</div> @enderror
        </div>

        <div style="margin-bottom:10px;">
            <label for="description">Complaint Description:</label><br>
            <textarea id="description" name="description" rows="5" required>{{ old('description') }}</textarea>
            @error('description') <div style="color:red;">{{ $message }}</div> @enderror
        </div>

        <button type="submit">Submit Complaint</button>
    </form>
    @else
        <p>Please <a href="{{ route('login') }}">login</a> to submit a complaint.</p>
    @endauth
</div>
@endsection
