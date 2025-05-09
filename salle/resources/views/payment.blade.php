@extends('layouts.app')

@section('title', 'Complete Your Payment')

@section('content')
<div class="main-banner" id="top">
    <div class="video-overlay header-text">
    </div>
</div>


<div class="container py-5" style="margin-top: 5rem">
    <h2 class="text-center mb-4">Pay for Your Membership</h2>
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
        <div class="col-md-6">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title text-center">{{ $membership->name }} Membership</h5>
                    <p class="text-center">{{ $membership->description }}</p>
                    <p class="text-center">Price: ${{ number_format($membership->price, 2) }}/mo</p>

                    <form action="{{ route('payment.process', $membership) }}" method="POST">
                        @csrf
                        <div class="form-group">
                            <label for="payment_method">Payment Method</label>
                            <select name="payment_method" class="form-control" required>
                                <option value="cash">Cash</option>
                                <option value="card">Credit Card</option>
                            </select>
                        </div>

                        <button type="submit" style="background-color: #ed563b" class="btn w-100 text-white" onmouseover="this.style.backgroundColor='#d04a2b'" onmouseout="this.style.backgroundColor='#ed563b'">Complete Payment</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
