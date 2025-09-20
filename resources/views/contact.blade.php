@extends('layouts.app')

@section('content')
<div class="containerC~ mt-4">
    <h1 class="fw-bold">Contact Us</h1>
    <p>We'd love to hear from you. Send us a message and we'll get back to you shortly.</p>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <form action="{{ route('contact.store') }}" method="POST" class="mt-3">
        @csrf
        <div class="mb-3">
            <label class="form-label">Your Name</label>
            <input type="text" name="name" class="form-control" required>
        </div>

        <div class="mb-3">
            <label class="form-label">Your Email</label>
            <input type="email" name="email" class="form-control" required>
        </div>

        <div class="mb-3">
            <label class="form-label">Message</label>
            <textarea name="message" rows="5" class="form-control" required></textarea>
        </div>

        <button type="submit" class="btn btn-dark">Send Message</button>
    </form>
</div>
@endsection
