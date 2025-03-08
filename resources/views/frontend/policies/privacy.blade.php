@extends('layouts.frontend.app')

@section('title', 'Privacy Policies')

@section('content')
    <!-- Breadcrumb Begin -->
    <div class="breadcrumb-option">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="breadcrumb__links">
                        <a href="{{ url('/') }}"><i class="fa fa-home"></i> Home</a>
                        <span>Privacy Policies</span>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <section id="privacy-policy-section">
        <div class="privacy-container">
            <h4>Privacy Policy</h4>
            <p>Effective Date: February 28, 2025</p>

            <h5>Introduction</h5>
            <p>Welcome to Anime Otaku Haven Shop! Your privacy is important to us. This Privacy Policy explains how we collect, use, and protect your information when you shop with us.</p>

            <h5>Information We Collect</h5>
            <ul>
                <li><b>Personal Information:</b> We collect personal information when you create an account, place an order, or contact us. This may include your Name, Email, Phone number, Shipping and Billing Address, and Payment Information.</li>
                <li><b>Order Details:</b> Information related to your purchases, such as products ordered, order history, and preferences.</li>
                <li><b>Usage Data:</b> We collect data on how you interact with our website, including IP address, browser type, pages visited, and time spent on our platform.</li>
                <li><b>Cookies:</b> We use cookies to enhance your shopping experience, remember your preferences, and improve our services.</li>
            </ul>

            <h5>How We Use Your Information</h5>
            <ul>
                <li>To process and fulfill your orders.</li>
                <li>To provide customer support and respond to inquiries.</li>
                <li>To personalize your shopping experience.</li>
                <li>To send you order updates, promotions, and newsletters (with your consent).</li>
                <li>To improve our website and services based on user behavior and feedback.</li>
            </ul>

            <h5>Your Data Protection Rights</h5>
            <ul>
                <li><b>Access:</b> You have the right to request access to your personal data.</li>
                <li><b>Correction:</b> You can update or correct inaccurate information in your account settings.</li>
                <li><b>Deletion:</b> You can request the deletion of your personal data, subject to legal and business requirements.</li>
                <li><b>Opt-out:</b> You can opt out of promotional emails by following the unsubscribe link in any email.</li>
            </ul>

            <h5>Data Security</h5>
            <p>We take your privacy seriously and implement security measures to protect your data. However, no online transmission is 100% secure, and we encourage you to use strong passwords and secure connections when shopping with us.</p>

            <h5>Changes to This Policy</h5>
            <p>We may update our Privacy Policy from time to time. Any changes will be posted on this page with an updated date. We recommend reviewing this policy periodically to stay informed about our practices.</p>

            <p>If you have any questions or concerns about this Privacy Policy, please contact us at otakuhaven@gmail.com. </p>
        </div>
    </section>

    <style>
        .privacy-container {
            max-width: 800px;
            margin: 0 auto;
            padding: 20px;
            background: #f9f9f9;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            margin-top: 50px;
        }
        .privacy-container h4{
            color: #db4444;
        }

        .privacy-container h5{
            color: #000000;
        }

        .privacy-container p, .privacy-container ul {
            color: #555;
            line-height: 1.6;
        }
        .privacy-container ul {
            padding-left: 20px;
        }
        .privacy-container ul li {
            margin-bottom: 10px;
        }
        @media (max-width: 768px) {
            .privacy-container {
                padding: 15px;
            }
        }
    </style>
@endsection
