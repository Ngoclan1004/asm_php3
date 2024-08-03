@extends('client.layouts.master')
@section('content')
    <div class="bg-light py-3">
        <div class="container">
            <div class="row">
                <div class="col-md-12 mb-0"><a href="{{ url('') }}">Home</a> <span class="mx-2 mb-0">/</span> <strong
                        class="text-black">Cart</strong></div>
            </div>
        </div>
    </div>

    <div class="site-section">
        <div class="container">
            <div class="row mb-5">
                @if ($cartItems->isEmpty())
                    <div class="col-md-12 text-center">
                        <h2>Your cart is empty</h2>
                        <p><a href="{{ url('shop') }}" class="btn btn-primary">Start Shopping</a></p>
                    </div>
                @else
                    <form class="col-md-12" method="post" action="{{ route('cart.update') }}">
                        @csrf
                        <div class="site-blocks-table">
                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th class="product-thumbnail">Image</th>
                                        <th class="product-name">Product</th>
                                        <th class="product-price">Price</th>
                                        <th class="product-quantity">Quantity</th>
                                        <th class="product-total">Total</th>
                                        <th class="product-remove">Remove</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($cartItems as $item)
                                        <tr>
                                            <td class="product-thumbnail">
                                                <img src="{{ Storage::url($item->img) }}" alt="" class="img-fluid">
                                            </td>
                                            <td class="product-name">
                                                <h2 class="h5 text-black">{{ $item->name }}</h2>
                                            </td>
                                            <td class="product-price js-price" data-price="{{ $item->price }}">
                                                {{ number_format($item->price) }}₫ </td>
                                            <td>

                                                <div class="input-group mb-3" style="max-width: 120px;">
                                                    <div class="input-group-prepend">
                                                        <button class="btn btn-outline-primary js-btn-minus"
                                                            type="button">&minus;</button>
                                                    </div>
                                                    <input type="hidden" name="id" value="{{ $item->id }}">
                                                    <input type="" class="form-control text-center js-quantity-input"
                                                        value="{{ $item->quantity }}" min="1" step="1" max="100" placeholder=""
                                                        name="quantity" aria-label="Example text with button addon"
                                                        aria-describedby="button-addon1" aria-label="Quantity">
                                                    <div class="input-group-append">
                                                        <button class="btn btn-outline-primary js-btn-plus"
                                                            type="button">&plus;</button>
                                                    </div>
                                                </div>

                                            </td>

                                            <td class="product-total js-total-price">
                                                {{ number_format($item->price * $item->quantity) }} ₫</td>

                                            <td><a href="{{ route('cart.remove', $item->id) }}"
                                                    class="btn btn-primary btn-sm">X</a></td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <a href="{{ route('order.create') }}" class="btn btn-primary btn-sm btn-block">Proceed Checkout</a>
                            </div>
                            <div class="col-md-6">
                                <a href="{{ url('') }}" class="btn btn-outline-primary btn-sm btn-block">Continue
                                    Shopping</a>
                            </div>
                        </div>
                    </form>
                @endif
            </div>
        </div>
    </div>
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            function updateTotalPrice(row) {
                let priceElement = row.querySelector('.js-price');
                let quantityInput = row.querySelector('.js-quantity-input');
                let totalElement = row.querySelector('.js-total-price');

                let price = parseFloat(priceElement.dataset.price);
                let quantity = parseInt(quantityInput.value);

                let total = price * quantity;
                let formatter = new Intl.NumberFormat('vi-VN', {
                    style: 'currency',
                    currency: 'VND'
                });

                totalElement.innerText = formatter.format(total);
            }

            document.querySelectorAll('.js-btn-minus').forEach(function(button) {
                button.addEventListener('click', function(e) {
                    let row = e.currentTarget.closest('tr');
                    let quantityInput = row.querySelector('.js-quantity-input');
                    let currentValue = parseInt(quantityInput.value);

                    if (currentValue > 1) {
                        quantityInput.value = currentValue - 1;
                        updateTotalPrice(row);
                    }
                });
            });

            document.querySelectorAll('.js-btn-plus').forEach(function(button) {
                button.addEventListener('click', function(e) {
                    let row = e.currentTarget.closest('tr');
                    let quantityInput = row.querySelector('.js-quantity-input');
                    let currentValue = parseInt(quantityInput.value);

                    quantityInput.value = currentValue + 1;
                    updateTotalPrice(row);
                });
            });

            document.querySelectorAll('.js-quantity-input').forEach(function(input) {
                input.addEventListener('input', function(e) {
                    let currentValue = parseInt(e.currentTarget.value);

                    // Đảm bảo giá trị không nhỏ hơn 1
                    if (isNaN(currentValue) || currentValue < 1) {
                        e.currentTarget.value = 1;
                    } else {
                        updateTotalPrice(e.currentTarget.closest('tr'));
                    }
                });
            });
        });
    </script>
@endsection
