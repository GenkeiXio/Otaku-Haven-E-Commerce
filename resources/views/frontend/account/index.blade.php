@extends('layouts.frontend.app')

@section('title', 'Account Setting')

@section('content')
<div class="breadcrumb-option">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="breadcrumb__links">
                    <a href="{{ url('/') }}"><i class="fa fa-home"></i> Home</a>
                    <a href="{{ route('frontend.account.index') }}">Account Setting</a>
                    <span>
                        @if(request()->segment(2) === 'profile')
                            Profile
                        @elseif(request()->segment(2) === 'changepassword')
                            Change Password
                        @elseif(request()->segment(2) === 'wishlist')
                            Wishlist
                        @elseif(request()->segment(2) === 'returns')
                            Returns
                        @elseif(request()->segment(2) === 'cancellations')
                            Cancellations
                        @else
                            Account Setting
                        @endif
                    </span>
                </div>
            </div>
        </div>
    </div>
</div>


    <div class="container mt-5">
        <div class="row">
            <!-- Sidebar -->
            <div class="col-md-3">
                <h6>
                    <img src="{{ asset('ashion/img/logo/profile.png') }}" alt="Profile Logo" class="profile-logo">
                    Manage My Account
                </h6>
                <ul class="list-group">
                    <li class="list-group-item"><a href="{{ route('frontend.account.section', 'profile') }}">Profile</a></li>
                    <li class="list-group-item"><a href="{{ route('frontend.account.changepassword', 'changepassword') }}">Change Password</a></li>
                </ul>

                <h6 class="mt-4">
                    <img src="{{ asset('ashion/img/logo/purchase.png') }}" alt="Profile Logo" class="profile-logo">
                    My Purchase
                </h6>
                <ul class="list-group">
                    <li class="list-group-item"><a href="{{ route('frontend.account.section', 'wishlist') }}" class="load-section" data-target="wishlist">Wishlist</a></li>
                    <li class="list-group-item"><a href="{{ route('frontend.account.section', 'cancellations') }}" class="load-section" data-target="cancellations">Cancelled</a></li>
                    <li class="list-group-item"><a href="{{ route('frontend.account.section', 'returns') }}" class="load-section" data-target="returns">Return Refund</a></li>
                </ul>
            </div>

            <!-- Dynamic Content Section -->
            <div class="col-md-9">
                @yield('account_content') 
            </div>
        </div>
    </div>
@endsection


@push('scripts')
<script>
    document.addEventListener("DOMContentLoaded", function() {
        document.querySelectorAll(".load-section").forEach(item => {
            item.addEventListener("click", function(event) {
                event.preventDefault();
                let target = this.getAttribute("data-target");

                fetch(`/account/section/${target}`)
                    .then(response => {
                        if (!response.ok) {
                            throw new Error("Page not found");
                        }
                        return response.text();
                    })
                    .then(data => {
                        document.getElementById("content-area").innerHTML = data;
                        window.history.pushState({}, '', `/account/section/${target}`);
                    })
                    .catch(error => {
                        document.getElementById("content-area").innerHTML = "<p>Error loading section</p>";
                    });
            });
        });

        // Handle browser back/forward button
        window.addEventListener("popstate", function() {
            let path = window.location.pathname.split("/").pop();
            if (path && ["profile", "address", "changepassword", "wishlist", "returns", "cancellations"].includes(path)) {
                fetch(`/account/section/${path}`)
                    .then(response => response.text())
                    .then(data => {
                        document.getElementById("content-area").innerHTML = data;
                    });
            }
        });
    });
</script>
@endpush

<style>
    /* Custom styles for the profile edit page */
body {
    background-color: white; /* Light gray background */
}

/* Sidebar styles */
.list-group-item {
    background: none !important;
    border: none !important;
    padding: 5px 0;
    font-size: 14px;
    color: black !important; /* Default color */
}

/* Hover effect: Change text color to red when hovered */
.list-group-item:hover {
    color: #E07575 !important;
    text-decoration: none;
}

/* Make links look normal */
.list-group-item a {
    text-decoration: none !important; /* Remove underline */
    color: black !important; /* Default color */
    display: block; /* Make the whole item clickable */
    padding: 5px 0;
    margin-left: 20px;
}

/* Hover effect: Change text color to red */
.list-group-item a:hover {
    color: #E07575 !important;
}

/* Remove active background color */
.sidebar .list-group-item.active {
    background: none !important;
    color: black !important;
    font-weight: bold; /* Just bold the active link */
}


/* Form Styling */
.card {
    border-radius: 8px;
    box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
}

.card-header {
    font-size: 18px;
    font-weight: bold;
    background: none !important;
    color: #db4444 !important;
    padding: 20px;
}
/* Input Fields */
.form-control {
    border-radius: 6px;
}

/* Buttons */
.btn-danger {
    background-color: #db4444;
    border-color: #db4444;
}

.btn-danger:hover {
    background-color: #E07575;
}

.btn-secondary {
    background-color: transparent;
    border-color: transparent;
    color: #000000;
}

.btn-secondary:hover {
    background-color: #5a6268;
}

.profile-logo {
    width: 28px; /* Adjust size as needed */
    height: auto;
    margin-right: 8px; /* Add spacing between logo and text */
    vertical-align: middle;
}

</style>