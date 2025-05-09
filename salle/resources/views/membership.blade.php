@extends('layouts.app')

@section('title', 'Choose Your Plan')

@section('content')
<div class="main-banner" id="top">
    <div class="video-overlay header-text">
    </div>
</div>


<div class="container py-5" style="margin-top: 5rem">
    <h2 class="text-center mb-4">Choose Your Membership</h2>
    @if(session('error'))
        <div class="alert alert-danger">
            {{ session('error') }}
        </div>
    @endif
    
    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif
    <div class="row justify-content-center">
        @foreach($memberships as $membership)
            <div class="col-md-4 mb-4">
                <div class="card h-100 shadow-sm">
                    <div class="card-body d-flex flex-column">
                        <h5 class="card-title text-center">{{ $membership->name }}</h5>
                        <p class="card-text text-center text-muted">{{ $membership->description }}</p>
                        <h3 class="text-center my-3">${{ number_format($membership->price, 2) }}/mo</h3>

                        <!-- Redirect to payment page -->
                        <form action="{{ route('payment.show', $membership->id) }}" method="GET" class="mt-auto">
                            @csrf
                            <button type="submit" style="background-color: #ed563b" class="btn w-100 text-white" onmouseover="this.style.backgroundColor='#d04a2b'" onmouseout="this.style.backgroundColor='#ed563b'">Subscribe</button>
                        </form>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
</div>

@endsection
