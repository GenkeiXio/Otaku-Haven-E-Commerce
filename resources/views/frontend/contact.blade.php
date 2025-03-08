@extends('layouts.frontend.app')

@section('title', 'Contact')

@section('content')
<div class="contact-container">

    <div class="contact-info">
        <div class="info-box">
            <span class="icon1">📞</span>
            <h3>Call To Us</h3>
            <p>We are available 24/7, 7 days a week.</p>
            <p>Phone: +09510168807</p>
        </div>
        <div class="info-box">
            <span class="icon1">📧</span>
            <h3>Write To Us</h3>
            <p>Fill out our form and we will contact you within 24 hours.</p>
            <p>Email: otakuhaven@gmail.com</p>
        </div>
    </div>
    
    <div class="contact-form">
        <form action="{{ route('contact.send') }}" method="POST">
            @csrf
            <div class="input-group">
                <input type="text" name="name" placeholder="Your Name *" required>
                <input type="email" name="email" placeholder="Your Email *" required>
                <input type="tel" name="phone" placeholder="Your Phone *" required>
            </div>
            <textarea name="message" class="message" placeholder="Your Message" required></textarea>
            <button type="submit" class="submit-btn1">Send Message</button>
        </form>
    </div>

</div>
@endsection


<style>
        /* General Container */
        .contact-container {
            display: flex;
            justify-content: center;
            align-items: flex-start;
            gap: 20px;
            max-width: 900px;
            margin: 40px auto;
            padding: 20px;
            background: #fff;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            border-radius: 8px;
            position: relative;
            margin-top: 50px;
        }

        /* Contact Info Section (Smaller & Aligned) */
        .contact-info {
            width: 25%;
            display: flex;
            flex-direction: column;
            gap: 10px;
        }

        .info-box {
            background: #fff;
            padding: 12px;
            border-left: 3px solid #db4444;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
            border-radius: 5px;
            text-align: left;
        }

        .info-box h3 {
            font-size: 14px;
            font-weight: bold;
            margin: 5px 0;
        }

        .info-box p {
            font-size: 12px;
            margin: 2px 0;
        }

        .icon1 {
            font-size: 16px;
            color: #db4444;
            margin-right: 5px;
        }

        /* Contact Form Section */
        .contact-form {
            width: 70%;
            padding: 10px;
        }

        form {
            display: flex;
            flex-direction: column;
            gap: 10px;
        }

        .input-group {
            display: flex;
            gap: 10px;
        }

        .input-group input {
            flex: 1;
            padding: 8px;
            border: 1px solid #ccc;
            border-radius: 4px;
            font-size: 14px;
        }

        textarea {
            width: 100%;
            height: 80px;
            padding: 8px;
            border: 1px solid #ccc;
            border-radius: 4px;
            font-size: 14px;
            resize: none;
        }

        .message {
            height: 230px;
        }

        /* Button */
        .submit-btn1 {
            background: #DB4444;
            color: #fff;
            padding: 8px 20px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            font-size: 14px;
            transition: 0.3s ease;
            align-self: flex-end;
        }

        .submit-btn1:hover {
            background: #E07575;
        }

        /* Responsive Design */
        @media screen and (max-width: 768px) {
            .contact-container {
                flex-direction: column;
                align-items: center;
                padding: 15px;
            }

            .contact-info {
                width: 100%;
                flex-direction: row;
                justify-content: space-between;
                gap: 10px;
            }

            .info-box {
                width: 48%;
                text-align: center;
            }

            .contact-form {
                width: 100%;
            }

            .input-group {
                flex-direction: column;
            }

            .input-group input {
                width: 100%;
            }
        }
    </style>