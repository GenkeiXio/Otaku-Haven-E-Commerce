@extends('frontend.account.index')

@section('account_content')
<div class="card">
    <div class="card-header bg-danger text-white">
        <h5>Change Password</h5>
    </div>
    <div class="card-body">
        <form action="{{ route('frontend.account.updatepassword') }}" method="POST">
            @csrf
            @method('PUT')

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
