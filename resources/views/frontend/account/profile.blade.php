@extends('frontend.account.index')

@section('account_content')
<div class="card">
    <div class="card-header bg-danger text-white">
        <h5>My Profile</h5>
    </div>
    <div class="card-body">
        <form action="{{ route('frontend.account.update') }}" method="POST">
            @csrf
            @method('PUT')

            <div class="mb-3">
                <label for="name" class="form-label">Full Name</label>
                <input type="text" class="form-control" id="name" name="name" 
                       value="{{ old('name', Auth::user()->name) }}" required>
            </div>

            <div class="mb-3">
                <label for="email" class="form-label">Email</label>
                <input type="email" class="form-control" id="email" name="email" 
                       value="{{ old('email', Auth::user()->email) }}" required>
            </div>

            <h5 class="mt-4">Password Changes</h5>
            <div class="mb-3">
                <label for="current_password" class="form-label">Current Password</label>
                <input type="password" class="form-control" id="current_password" name="current_password">
            </div>
            <div class="mb-3">
                <label for="new_password" class="form-label">New Password</label>
                <input type="password" class="form-control" id="new_password" name="new_password">
            </div>
            <div class="mb-3">
                <label for="confirm_password" class="form-label">Confirm New Password</label>
                <input type="password" class="form-control" id="confirm_password" name="new_password_confirmation">
            </div>

            <div class="d-flex justify-content-between">
                <button type="reset" class="btn btn-secondary">Cancel</button>
                <button type="submit" class="btn btn-danger">Save Changes</button>
            </div>
        </form>
    </div>
</div>
@endsection
