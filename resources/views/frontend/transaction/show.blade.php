@extends('layouts.frontend.app')
@section('content')
    <!-- Breadcrumb Begin -->
    <div class="breadcrumb-option">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="breadcrumb__links">
                        <a href="{{ url('/') }}"><i class="fa fa-home"></i> Home</a>
                        <a href="{{ route('transaction.index') }}"> Transaction</a>
                        <span>{{ $data['order']->invoice_number }}</span>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <section class="shop-cart spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="invoice" style="border-top: 2px solid #6777ef;">
                        <div class="invoice-print">
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="invoice-title">
                                        <h2>Invoice</h2>
                                        <div class="invoice-number">Order {{ $data['order']->invoice_number }}</div>
                                    </div>
                                    <hr>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <address>
                                                <strong>{{ __('text.billed_to') }}:</strong><br>
                                                {{ $data['order']->Customer->name }}<br>
                                                {{ $data['order']->Customer->email }}<br>
                                            </address>
                                        </div>
                                        <div class="col-md-6 text-md-right">
                                            <address>
                                                <strong>{{ __('text.shipped_to') }}:</strong><br>
                                                {{ $data['order']->recipient_name }}<br>
                                                {{ $data['order']->address_detail }}<br>
                                                {{ $data['order']->destination }}
                                            </address>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <address>
                                                <strong>{{ __('text.order_status') }}:</strong>
                                                <div class="mt-2">
                                                    {!! $data['order']->status_name !!}
                                                </div>
                                            </address>
                                        </div>
                                        <div class="col-md-6 text-md-right">
                                            <address>
                                                <strong>{{ __('text.order_date') }}:</strong><br>
                                                {{ $data['order']->created_at }}<br><br>
                                            </address>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="row mt-4">
                                <div class="col-md-12">
                                    <div class="section-title font-weight-bold">{{ __('text.order_summary') }}</div>
                                    <div class="table-responsive">
                                        <table class="table table-striped table-hover table-md">
                                            <tbody>
                                                <tr>
                                                    <th data-width="40" style="width: 40px;">#</th>
                                                    <th>{{ __('field.product_name') }}</th>
                                                    <th class="text-center">{{ __('field.price') }}</th>
                                                    <th class="text-center">{{ __('text.quantity') }}</th>
                                                    <th class="text-right">Total</th>
                                                </tr>
                                                @foreach ($data['order']->orderDetail()->get() as $detail)
                                                    <tr>
                                                        <td>{{ $loop->iteration }}</td>
                                                        <td><a href="{{ route('product.show', ['categoriSlug' => $detail->Product->category->slug, 'productSlug' => $detail->Product->slug]) }}">{{ $detail->product->name }}</a></td>
                                                        <td class="text-center">{{ rupiah($detail->product->price) }}</td>
                                                        <td class="text-center">{{ $detail->qty }}</td>
                                                        <td class="text-right">{{ rupiah($detail->total_price_per_product) }}</td>
                                                    </tr>
                                                @endforeach
                                            </tbody>
                                        </table>
                                    </div>

                                    <!-- Updated Shipping Details Section -->
                                    <div class="row mt-4">
                                        <div class="col-md-6">
                                            <h5 class="font-weight-bold">{{ __('text.shipping_information') }}</h5>
                                            <table class="table">
                                                <tr>
                                                    <th>Recipient Name:</th>
                                                    <td>{{ $data['order']->recipient_name }}</td>
                                                </tr>
                                                <tr>
                                                    <th>Phone Number:</th>
                                                    <td>{{ $data['order']->phone_number }}</td>
                                                </tr>
                                                <tr>
                                                    <th>Province:</th>
                                                    <td>{{ $data['order']->province ? $data['order']->province->name : 'N/A' }}</td>
                                                </tr>
                                                <tr>
                                                    <th>City:</th>
                                                    <td>{{ $data['order']->city_name }}</td>
                                                </tr>
                                                <tr>
                                                    <th>Full Address:</th>
                                                    <td>{{ $data['order']->address_detail }}</td>
                                                </tr>
                                                <tr>
                                                    <th>Courier:</th>
                                                    <td>{{ $data['order']->courier }}</td>
                                                </tr>
                                                <tr>
                                                    <th>Shipping Method:</th>
                                                    <td>{{ $data['order']->shipping_method }}</td>
                                                </tr>
                                                @if ($data['order']->receipt_number)
                                                <tr>
                                                    <th>Tracking Number:</th>
                                                    <td>{{ $data['order']->receipt_number }}</td>
                                                </tr>
                                                @endif
                                            </table>
                                        </div>
                                    </div>

                                    <div class="col-lg-4 text-right">
                                        <div class="invoice-detail-item">
                                            <div class="invoice-detail-name">Subtotal</div>
                                            <div class="invoice-detail-value">{{ rupiah($data['order']->subtotal) }}</div>
                                        </div>
                                        <div class="invoice-detail-item">
                                            <div class="invoice-detail-name">{{ __('text.shipping_cost') }}</div>
                                            <div class="invoice-detail-value">{{ rupiah($data['order']->shipping_cost) }}</div>
                                        </div>
                                        <hr class="mt-2 mb-2">
                                        <div class="invoice-detail-item">
                                            <div class="invoice-detail-name">Total</div>
                                            <div class="invoice-detail-value invoice-detail-value-lg">{{ rupiah($data['order']->total_pay) }}</div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <hr>
                        <div class="text-md-right">
                            <button class="btn btn-warning btn-icon icon-left"><i class="fa fa-print"></i> Print</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
