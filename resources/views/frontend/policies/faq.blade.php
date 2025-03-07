@extends('layouts.frontend.app')

@section('title', 'FAQ - Frequently Asked Questions')

@section('content')
    <div class="faq-wrapper">
    
    <section id="faq-header-text">
        <div class="faq-header">
            <h1>Frequently Asked Questions</h1>
            <p>Below you’ll find the answers to the frequently asked questions about Anime Otaku Haven Shop.</p>
        </div>
    </section>

    <section id="faq-section">

        <div class="faq-container">
            <div class="faq-item">
                <button class="faq-question">What is Anime Otaku Haven Shop?</button>
                <div class="faq-answer">
                    <p>Anime Otaku Haven Shop is an e-commerce platform dedicated to anime enthusiasts. We offer a wide range of anime merchandise, including figures, clothing, accessories, posters, and much more.</p>
                </div>
            </div>

            <div class="faq-item">
                <button class="faq-question">How do I place an order?</button>
                <div class="faq-answer">
                    <p>To place an order, simply browse our store, add your desired items to the cart, proceed to checkout, and follow the payment instructions. You will receive a confirmation email after successful payment.</p>
                </div>
            </div>

            <div class="faq-item">
                <button class="faq-question">What payment methods do you accept?</button>
                <div class="faq-answer">
                    <p>We accept various payment methods including Gcash, Paymaya, and other secure payment gateways to ensure a smooth shopping experience.</p>
                </div>
            </div>

            <div class="faq-item">
                <button class="faq-question">Do you offer international shipping?</button>
                <div class="faq-answer">
                    <p>No! We do not offer international shipping.</p>
                </div>
            </div>

            <div class="faq-item">
                <button class="faq-question">How can I track my order?</button>
                <div class="faq-answer">
                    <p>Once your order is shipped, we will send you a tracking number via email so you can monitor your package’s delivery status.</p>
                </div>
            </div>

            <div class="faq-item">
                <button class="faq-question">What is your return and refund policy?</button>
                <div class="faq-answer">
                    <p>If you receive a damaged or incorrect item, you can request a return or refund within 14 days of receiving your order. Please refer to our return policy page for more details.</p>
                </div>
            </div>

            <div class="faq-item">
                <button class="faq-question">Do you have limited edition items?</button>
                <div class="faq-answer">
                    <p>Yes, we frequently stock exclusive and limited-edition anime merchandise. Be sure to check our website and follow us on social media to stay updated.</p>
                </div>
            </div>

            <div class="faq-item">
                <button class="faq-question">Can I cancel my order?</button>
                <div class="faq-answer">
                    <p>You can cancel your order within 24 hours of placing it. Once the order is processed for shipping, cancellations will no longer be possible.</p>
                </div>
            </div>

            <div class="faq-item">
                <button class="faq-question">How do I contact customer support?</button>
                <div class="faq-answer">
                    <p>You can reach out to our customer support team via our Contact Us page or by sending an email to otakuhaven@gmail.com.</p>
                </div>
            </div>

        </div>
    </section>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const faqQuestions = document.querySelectorAll('.faq-question');

            faqQuestions.forEach(function(question) {
                question.addEventListener('click', function() {
                    const faqItem = this.closest('.faq-item'); 
                    const answer = faqItem.querySelector('.faq-answer'); 

                    document.querySelectorAll('.faq-item').forEach(function(item) {
                        if (item !== faqItem) {
                            item.querySelector('.faq-answer').classList.remove('active');
                            item.classList.remove('active');
                        }
                    });

                    if (answer.classList.contains('active')) {
                        answer.classList.remove('active'); 
                        faqItem.classList.remove('active'); 
                    } else {
                        answer.classList.add('active'); 
                        faqItem.classList.add('active'); 
                    }
                });
            });
        });
    </script>
@endsection

    <style>
        .faq-wrapper {
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            width: 100%;
            padding-bottom: 20px;
        }

        #faq-header-text {
            padding: 50px 0;
            text-align: center;
            width: 100%;
        }

        .faq-header h1 {
            font-size: 2.5em;
            color: #db4444;
            margin-bottom: 10px;
        }

        .faq-header p {
            font-size: 1.1em;
            color: #777;
            max-width: 600px;
            margin: 0 auto;
        }

        .faq-container {
            max-width: 800px;
            margin: 0 auto;
        }

        .faq-item {
            margin: 1rem 0;
            border-radius: 8px;
            overflow: hidden;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            transition: box-shadow 0.3s ease;
            background-color: #fff;
        }

        .faq-item.active {
            box-shadow: 0 8px 16px rgba(0, 0, 0, 0.2);
        }

        .faq-question {
            width: 100%;
            background-color: #fff;
            border: none;
            padding: 1rem;
            text-align: left;
            font-size: 1.1rem;
            font-weight: bold;
            color: #E07575;
            cursor: pointer;
            border-bottom: 1px solid #e0e0e0;
            outline: none;
            transition: color 0.3s ease;
        }

        .faq-question:hover {
            color: #E07575;
        }

        .faq-answer {
            max-height: 0;
            overflow: hidden;
            padding: 0 1rem;
            background-color: #f9f9f9;
            transition: max-height 0.3s ease, padding 0.3s ease;
        }

        .faq-answer p {
            margin: 1rem 0;
            color: #555;
        }

        .faq-item.active .faq-answer {
            max-height: 200px;
            padding: 1rem;
        }
    </style>

