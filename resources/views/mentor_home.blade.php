<!-- resources/views/mentor/home.blade.php -->
@extends('layout')

@section('title', 'Mentor Dashboard')

@section('content')
<div class="row">
    <div class="col-md-4">
        <div class="card">
            <div class="card-header">
                <h5>Your Courses</h5>
            </div>
            <div class="card-body">
                <p>Total Courses: {{ $courseCount }}</p>
                <a href="{{ route('mentor.courses') }}" class="btn btn-primary">Manage Courses</a>
            </div>
        </div>
    </div>

    <div class="col-md-4">
        <div class="card">
            <div class="card-header">
                <h5>Your Schedule</h5>
            </div>
            <div class="card-body">
                <p>Total Scheduled Classes: {{ $scheduleCount }}</p>
                <a href="{{ route('mentor.schedule') }}" class="btn btn-primary">Manage Schedule</a>
            </div>
        </div>
    </div>

    <div class="col-md-4">
        <div class="card">
            <div class="card-header">
                <h5>Mentor Profile</h5>
            </div>
            <div class="card-body">
                <p>Name: {{ auth()->user()->name }}</p>
                <p>Email: {{ auth()->user()->email }}</p>
                <a href="{{ route('mentor.profile') }}" class="btn btn-primary">Edit Profile</a>
            </div>
        </div>
    </div>
</div>
@endsection
