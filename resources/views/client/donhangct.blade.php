@extends('client.layouts.master')

@section('content')
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Chi tiết đơn hàng</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #f8f9fa;
        }
        .order-details {
            background: #fff;
            border-radius: 10px;
            box-shadow: 0 0 15px rgba(0, 0, 0, 0.1);
            padding: 30px;
            margin-top: 50px;
        }
        .order-header {
            border-bottom: 1px solid #dee2e6;
            padding-bottom: 20px;
            margin-bottom: 20px;
        }
        .order-header h2 {
            color: #007bff;
            font-weight: bold;
        }
        .order-item {
            margin-bottom: 20px;
        }
        .order-item h5 {
            color: #6c757d;
        }
        .order-item p {
            margin: 0;
        }
        .order-summary {
            background: #f1f1f1;
            padding: 20px;
            border-radius: 10px;
        }
        .order-summary h5 {
            color: #007bff;
        }
        .total {
            font-weight: bold;
            font-size: 1.2em;
            color: #dc3545;
        }
        .btn-primary {
            background-color: #007bff;
            border-color: #007bff;
            margin-top: 20px;
        }
        .product-image {
            width: 100px;
            height: 100px;
            object-fit: cover;
            border-radius: 10px;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="order-details">
            <div class="order-header text-center">
                <h2>Chi tiết đơn hàng</h2>
                <p>Mã đơn hàng: <strong>#{{ $model->ma_don_hang }}</strong></p>
                <p>Ngày đặt hàng: <strong>{{ $model->created_at }}</strong></p>
            </div>
            <div class="order-body">
                @foreach($orderDetails as $item)
                <div class="row">
                    <div class="col-md-4 order-item">
                        <h5>Sản phẩm</h5>
                        <img src="{{ Storage::url($item->Product->img) }}" alt="Product Image" class="product-image">
                    </div>
                    <div class="col-md-8 order-item">
                        <p>Tên sản phẩm: <strong>{{ $item->Product->name }}</strong></p>
                        <p>Số lượng: <strong>{{ $item->so_luong }}</strong></p>
                        <p>Giá: <strong>{{ $item->don_gia }} VND</strong></p>
                    </div>
                </div>
                @endforeach
                <div class="row">
                    <div class="col-md-6 order-item">

                        
                        
                        <h5>Thông tin khách hàng</h5>
                        <p>Tên khách hàng: <strong>{{ $model->ten_nguoi_nhan }}</strong></p>
                        <p>Địa chỉ: <strong>{{ $model->dia_chi_nguoi_nhan }}</strong></p>
                        <p>Số điện thoại: <strong>{{ $model->sdt_nguoi_nhan }}</strong></p>
                       
                    </div>
                    <div class="col-md-6 order-item">
                        <h5>Phương thức thanh toán</h5>
                        <p><strong>Thanh toán khi nhận hàng (COD)</strong></p>
                        <h5>Trạng thái đơn hàng</h5>
                        <p><strong>{{ $model->trang_thai_don_hang }}</strong></p>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12 order-item">
                        <div class="order-summary text-center">
                            <h5>Tổng tiền</h5>
                            <p class="total">{{ $model->tong_tien }} VND</p>
                        </div>
                    </div>
                </div>
                
                <div class="row text-center">
                    <div class="col-md-12">
                        <a href="{{ route('profile') }}"><button class="btn btn-primary">Quay lại</button></a>
                    </div>
                </div>
            </div>
        </div>
    </div>

</body>
</html>


@endsection
