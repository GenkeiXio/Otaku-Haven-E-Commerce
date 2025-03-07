    <!-- Footer -->
    <footer class="footer text-center">
        <div class="container">
            <div class="row">
                <!-- Company Info -->
                <div class="col-md-3">
                    <h5>Otaku Haven</h5>
                    <p>Get 10% off your first order</p>
                    <div class="email-subscribe">
                        <input type="email" class="email-input" placeholder="Enter your email">
                        <button class="send-btn"><i class="bi bi-send"></i></button>
                    </div>
                </div>
                
                <!-- Support -->
                <div class="col-md-3">
                    <h5>Support</h5>
                    <p>123 Rizal Street, Barangay 27, Legazpi City, Albay</p>
                    <p>Email: otakuhaven@gmail.com</p>
                    <p>Phone: 09510168807</p>
                </div>

                <!-- Quick Links -->
                <div class="col-md-3">
                    <h5>Quick Links</h5>
                    <p><a href="{{ route('frontend.policies.privacy') }}">Privacy Policy</a></p>
                    <p><a href="{{ route('frontend.policies.terms') }}">Terms of Use</a></p>
                    <p><a href="{{ route('frontend.policies.faq') }}">FAQ</a></p>
                    <p><a href="{{ route('frontend.contact') }}">Contact</a></p>
                </div>

                <!-- Download App -->
                <div class="col-md-3">
                    <h5>Download App</h5>
                    <p>Save 5% with App New User Only</p>
                    <img src="{{ asset('ashion/img/logo/googleplay-logo.png') }}" alt="Google Play">
                    <img src="{{ asset('ashion/img/logo/apple-logo.png') }}" alt="App Store">
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
}

.email-input {
    width: 100%;
    padding: 10px 40px 10px 10px; /* Extra space for button */
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
    margin-top: 20px;
}
.footer h5 {
    color: #F5F5F5;
    text-decoration: none;
}
.footer a {
    color:  rgba(255, 255, 255, 0.6);
    text-decoration: none;
}
.footer p {
    color:  rgba(255, 255, 255, 0.6);
    text-decoration: none;
}
.footer a:hover {
    text-decoration: underline;
}

</style>