@extends('layouts.frontend.app')
@section('content')
    <!-- Breadcrumb Begin -->
    <div class="breadcrumb-option">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="breadcrumb__links">
                        <a href="{{ url('/') }}"><i class="fa fa-home"></i> Home</a>
                        <span>Checkout</span>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Checkout Section Begin -->
    <section class="checkout spad">
        <div class="container">
            <form action="{{ route('checkout.process') }}" class="checkout__form" method="POST">
                @csrf
                <div class="row">
                    <div class="col-lg-8 mb-4">
                        <h5>Billing detail</h5>
                        <div class="row">
                            <div class="col-lg-12 col-md-12 col-sm-12">
                                <div class="checkout__form__input">
                                    <p>Recipient Name <span>*</span></p>
                                    <input type="text" name="recipient_name" value="{{ auth()->user()->name }}" required>
                                </div>
                            </div>
                            <div class="col-lg-12 col-md-12 col-sm-12">
                                <div class="checkout__form__input">
                                    <p>Phone Number <span>*</span></p>
                                    <input type="text" name="phone_number" required>
                                </div>
                            </div>
                            <div class="col-lg-6 col-md-6 col-sm-6">
                                <div class="checkout__form__input">
                                    <p>Province <span>*</span></p>
                                    <select name="province_id" id="province_id" class="select-2" required>
                                        <option value="" disabled>-- Select Province --</option>
                                        @foreach ($data['provinces'] as $province)
                                            <option value="{{ $province->id }}" {{ $province->province_name == 'Albay' ? 'selected' : '' }}>
                                                {{ $province->province_name }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            
                            <div class="col-lg-6 col-md-6 col-sm-6">
                                <div class="checkout__form__input">
                                    <p>City <span>*</span></p>
                                    <input type="text" name="city_name" value="{{ old('city_name', $shipping_address->city_name ?? '') }}" required>
                                </div>
                            </div>
                            
                            <div class="col-lg-12 col-md-12 col-sm-12">
                                <div class="checkout__form__input">
                                    <p>Address Detail <span>*</span></p>
                                    <input type="text" name="address_detail" required>
                                </div>
                            </div>
                            <div class="col-lg-12 col-md-12 col-sm-12">
                                <div class="checkout__form__input">
                                    <p>Courier <span>*</span></p>
                                    <select name="courier" id="courier">
                                        <option value="jne" selected>J&T</option>
                                        <option value="tiki">Ninja Van</option>
                                        <option value="pos">Flash Express</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-lg-12 col-md-12 col-sm-12">
                                <div class="checkout__form__input">
                                    <p>Shipment Method <span>*</span></p>
                                    <input type="text" name="shipping_method" id="shipping_method" value="{{ old('shipping_method', $shipping_address->shipping_method ?? '') }}" required>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="checkout__order">
                            <h5>Your order</h5>
                            <div class="checkout__order__product">
                                <ul>
                                    <li>
                                        <span class="top__text">Product</span>
                                        <span class="top__text__right">Total</span>
                                    </li>
                                    @foreach ($data['carts'] as $cart)
                                        <li>{{ $loop->iteration }}. {{ $cart->Product->name }} x
                                            {{ $cart->qty }}<span>{{ formatPeso($cart->total_price_per_product) }}</span>
                                        </li>
                                    @endforeach
                                    <li>
                                        <span class="top__text">Total Weight</span>
                                        <span class="top__text__right">{{ $data['carts']->sum('total_weight_per_product') / 1000 }} Kg</span>
                                        <input type="hidden" name="total_weight" id="total_weight" value="{{ $data['carts']->sum('total_weight_per_product') }}">
                                    </li>
                                </ul>
                            </div>
                            <div class="checkout__order__total">
                                <ul>
                                    <li>Subtotal <span>{{ formatPeso($data['carts']->sum('total_price_per_product')) }}</span>
                                    </li>
                                    <li>Shipping Cost <span id="text-cost">₱ 0</span></li>
                                    <li>Total <span id="total">{{ formatPeso($data['carts']->sum('total_price_per_product')) }}</span></li>
                                    <input type="hidden" name="shipping_cost" id="shipping_cost">
                                </ul>
                            </div>
                            <button type="submit" class="site-btn">Place order</button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </section>
    <!-- Checkout Section End -->
@endsection
@push('js')
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    (document).ready(function () {
        $("#province_id").change(function () {
            var provinceID = $(this).val();
            console.log("Selected Province ID:", provinceID);
            loadCities(provinceID);
        });

        function loadCities(provinceID) {
            $("#city_id").prop("disabled", true);
            $("#city_id").html('<option value="" selected disabled>Loading...</option>');

            $.ajax({
                url: "/get-cities/" + provinceID,
                type: "GET",
                dataType: "json",
                success: function (data) {
                    $("#city_id").empty().append('<option value="" selected disabled>-- Select City --</option>');
                    $.each(data, function (key, city) {
                        $("#city_id").append('<option value="' + city.id + '">' + city.city_name + '</option>');
                    });
                    $("#city_id").prop("disabled", false);
                },
                error: function (xhr) {
                    console.log("Error:", xhr.responseText);
                    $("#city_id").html('<option value="" selected disabled>Error loading cities</option>');
                }
            });
        }

        function checkCost() {
            var origin = '{{ $data["shipping_address"]->city_id ?? 1 }}';
            var destination = $('#city_id option:selected').val();
            var weight = "{{ $data['carts']->sum('total_weight_per_product') }}";
            var courier = $('#courier option:selected').val();

            let _url = `/shipping/cost`;
            let _token = $('meta[name="csrf-token"]').attr('content');

            $.ajax({
                url: _url,
                type: "POST",
                data: {
                    origin: origin,
                    destination: destination,
                    weight: weight,
                    courier: courier,
                    _token: _token
                },
                dataType: "json",
                success: function(response) {
                    if (response) {
                        $('#shipping_method').empty().append('<option value="" selected disabled>-- Select Shipment Service --</option>');
                        $.each(response, function(key, cost) {
                            $('#shipping_method').append('<option value="' + cost.service + '" data-ongkir="' + cost.cost + '">' + cost.service + ' - ₱' + cost.cost + ' (Estimated ' + cost.etd + ' days)</option>');
                            if (key == 0) countCost(cost.cost);
                        });
                    }
                },
            });
        }

        $('#city_id, #courier').on('change', checkCost);

        $('#shipping_method').on('change', function() {
            var ongkir = parseInt($('#shipping_method option:selected').data('ongkir'));
            countCost(ongkir);
        });

        function countCost(ongkir) {
            var subtotal = parseInt("{{ $data['carts']->sum('total_price_per_product') }}");
            var total = subtotal + ongkir;
            $('#text-cost').text('₱' + ongkir);
            $('#shipping_cost').val(ongkir);
            $('#total').text('₱' + total);
        }
    });
</script>
@endpush