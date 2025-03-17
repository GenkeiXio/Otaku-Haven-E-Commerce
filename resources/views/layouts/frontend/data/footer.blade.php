<!-- Footer -->
<footer class="footer text-center">
    <div class="container">
        <div class="row">
            <!-- Company Info -->
            <div class="col-lg-3 col-md-6 mb-4">
                <h5>Otaku Haven</h5>
                <p>Want to customize your own anime merch? Visit our page!</p>
                <div class="visit-page">
                    <a href="https://www.facebook.com/BibimeowOtakuHaven" target="_blank" class="btn" 
                    style="background-color: transparent; padding: 10px 15px; border-radius: 5px; text-decoration: none; display: inline-block; color: rgba(255, 255, 255, 0.6);"
                        onmouseover="this.style.textDecoration='underline'" 
                        onmouseout="this.style.textDecoration='none'">
                        Visit Our Facebook Page
                    </a>
                </div>
            </div>

            <!-- Support -->
            <div class="col-lg-3 col-md-6 mb-4">
                <h5>Support</h5>
                <p>123 Rizal Street, Barangay 27, Legazpi City, Albay</p>
                <p>Email: otakuhaven@gmail.com</p>
                <p>Phone: 09510168807</p>
            </div>

            <!-- Quick Links -->
            <div class="col-lg-3 col-md-6 mb-4">
                <h5>Quick Links</h5>
                <p><a href="{{ route('frontend.policies.privacy') }}">Privacy Policy</a></p>
                <p><a href="{{ route('frontend.policies.terms') }}">Terms of Use</a></p>
                <p><a href="{{ route('frontend.policies.faq') }}">FAQ</a></p>
                <p><a href="{{ route('category.index') }}" class="{{ request()->is('category*') ? 'active' : '' }}">Category</a></li>
            </div>

            <!-- Download App -->
            <div class="col-lg-3 col-md-6 mb-4">
                <h5>Download App</h5>
                <p>Save 5% with App New User Only</p>
                <div class="d-flex justify-content-center">
                    <img src="{{ asset('ashion/img/logo/googleplay-logo.png') }}" alt="Google Play" class="app-logo">
                    <img src="{{ asset('ashion/img/logo/apple-logo.png') }}" alt="App Store" class="app-logo">
                </div>
            </div>
        </div>
    </div>
    <hr class="bg-light">
    <p class="mb-0">&copy; Copyright Otaku Haven 2025. All rights reserved</p>
</footer>

<style>

.email-subscribe {
    position: relative;
    max-width: 300px;
    width: 100%;
    margin: auto;
}

.email-input {
    width: 100%;
    padding: 10px 40px 10px 10px;
    border: 1px solid gray;
    border-radius: 5px;
    background: transparent;
    color: white;
    outline: none;
}

.email-input::placeholder {
    color: rgba(255, 255, 255, 0.6);
}

.send-btn {
    position: absolute;
    top: 50%;
    right: 10px;
    transform: translateY(-50%);
    background: rgb(255, 255, 240);
    border: none;
    font-size: 1.2rem;
    cursor: pointer;
}

.footer {
    background: #000;
    color: rgb(255, 255, 240);
    padding: 40px 0;
    margin: 0; /* Removed margin-top and ensured no bottom margin */
    margin-top: 30px;
}

.footer h5 {
    color: #F5F5F5;
}
.footer a, .footer p {
    color: rgba(255, 255, 255, 0.6);
    text-decoration: none;
}
.footer a:hover {
    text-decoration: underline;
}

.app-logo {
    max-width: 120px;
    margin: 5px;
}

@media (max-width: 768px) {
    .footer .row {
        text-align: center;
    }
    .email-subscribe {
        max-width: 100%;
    }
}
</style>
