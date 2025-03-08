@extends('frontend.account.index')

@section('account_content')

@if($addresses->isEmpty())
    <p>No addresses found.</p>

@else
    @foreach ($addresses as $address)

    {{ dd($addresses) }}

        <div class="card">
            <div class="card-header bg-danger text-white">
                <h5>Edit Address</h5>
            </div>
            <div class="card-body">
                <form action="{{ route('address.update', $address->id) }}" method="POST">
                    @csrf
                    <div class="mb-3">
                        <label class="form-label">Full Name</label>
                        <input type="text" class="form-control" name="full_name" value="{{ $address->full_name }}" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Phone Number</label>
                        <input type="text" class="form-control" name="phone_number" value="{{ $address->phone_number }}" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Region</label>
                        <input type="text" class="form-control" name="region" value="{{ $address->region }}" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Province</label>
                        <input type="text" class="form-control" name="province" value="{{ $address->province }}" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">City</label>
                        <input type="text" class="form-control" name="city" value="{{ $address->city }}" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Barangay</label>
                        <input type="text" class="form-control" name="barangay" value="{{ $address->barangay }}" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Postal Code</label>
                        <input type="text" class="form-control" name="postal_code" value="{{ $address->postal_code }}" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Street Name</label>
                        <input type="text" class="form-control" name="street_name" value="{{ $address->street_name }}" required>
                    </div>
                    <div class="text-end">
                        <button type="submit" class="btn btn-danger">Update</button>
                    </div>
                </form>
            </div>
        </div>
    @endforeach
@endif

@endsection
