@extends('layouts.frontend.app')
@section('content')
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-5">
                <div class="mb-2">
                    <h3>Create Account</h3>
                </div>
                <form method="POST" action="{{ route('register') }}">
                    @csrf


                    <div class="form-group">
                        <label for="">Full Name</label>
                        <input type="text" name="name" class="form-control rounded-0">
                        @error('name')
                            <p class="text-danger">{{ $message }}</p>
                        @enderror
                    </div>


                    <div class="form-group">
                        <label for="">Email</label>
                        <input type="email" name="email" class="form-control rounded-0">
                        @error('email')
                            <p class="text-danger">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="">Password</label>
                        <input type="password" name="password" class="form-control rounded-0">
                        @error('password')
                            <p class="text-danger">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="">Confirm Password</label>
                        <input type="password" name="password_confirmation" class="form-control rounded-0">
                    </div>
                    <button type="submit" class="site-btn w-100 rounded-0 mb-3">Register</button>
                    <div class="text-center">
                        <p>Already have an account? <a href="{{ route('login') }}">Login Here</a></p>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
