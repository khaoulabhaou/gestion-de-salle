@extends('layouts.app')

@section('title', 'Profile')

@section('content')
<div class="main-banner" id="top">
    <div class="video-overlay header-text">
    </div>
</div>
<link rel="stylesheet" href="/css/profile.css">
<div class="profile-container" style="margin-top: 8rem; max-width: 900px; margin-left: auto; margin-right: auto;">
    <h1 style="text-align:center;">Your Profile</h1>

    @if(session('success')) 
        <p class="success">{{ session('success') }}</p> 
    @endif

    <form action="{{ route('profile.update') }}" method="POST" enctype="multipart/form-data">
        @csrf

        <!-- Profile Picture -->
        <div style="margin-bottom: 30px;">
            <div style="text-align: center; ">
                 @if($user->pfp)
                     <img src="{{ asset('storage/' . $user->pfp) }}" 
                          alt="Profile Picture" 
                          style="width: 150px; height: 150px; object-fit: cover; border-radius: 50%; box-shadow: 0px 0px 5px rgba(0,0,0,0.2);">
                 @endif
            </div>
            <div style="margin-top: 3rem;">
                <label for="form-label">Choisi votre profil</label>
                <input class="form-control mt-2" type="file" name="pfp">
            </div>
        </div>

        <!-- Two Column Layout -->
        <div style="display: flex; gap: 20px; flex-wrap: wrap;">
            <div style="flex: 1;">
                <div class="form-group"><label>Name</label><input name="name" value="{{ $user->name }}"></div>
                <div class="form-group"><label>Phone</label><input name="phone" value="{{ $user->phone }}"></div>
                <div class="form-group"><label>Gender</label>
                    <select name="gender">
                        <option {{ $user->gender === 'Male' ? 'selected' : '' }}>Male</option>
                        <option {{ $user->gender === 'Female' ? 'selected' : '' }}>Female</option>
                    </select>
                </div>
                <div class="form-group"><label>Goal</label><input name="goal" value="{{ $user->goal }}"></div>
            </div>

            <div style="flex: 1;">
                <div class="form-group"><label>Email</label><input name="email" value="{{ $user->email }}"></div>
                <div class="form-group"><label>Date of Birth</label><input type="date" name="dob" value="{{ $user->dob }}"></div>
                <div class="form-group"><label>Address</label><input name="address" value="{{ $user->address }}"></div>
            </div>
        </div>
    <!-- Action Buttons -->
    <div style="display: flex; justify-content: space-between; align-items: center;margin-top:2rem;margin-bottom:1rem">
        <!-- Subscription Section -->
        <div>
            <div>
                @if($user->subscription_active)
                    <button type="button" onclick="alert('Cancel subscription logic here')">Cancel Subscription</button>
                    <button type="button" onclick="alert('Upgrade logic here')">Upgrade Plan</button>
                @else
                    <button type="button" onclick="alert('Subscribe logic here')">Subscribe Now</button>
                @endif
            </div>
        </div>

        <button id="updateBtn" type="submit">
            {{ session('success') ? 'Save Changes' : 'Update Profile' }}
        </button>

    </div>

    <form action="{{ route('logout') }}" method="POST">
        @csrf
        <button style="margin-top: 1rem;" class="btn btn-outline-danger" type="submit">Log Out</button>
    </form>

    </form>

</div>

    <script>
        document.querySelector('form').addEventListener('submit', function () {
            document.getElementById('updateBtn').textContent = 'Saving...';
        });
    </script>

<script src="/js/profile.js"></script>
@endsection
