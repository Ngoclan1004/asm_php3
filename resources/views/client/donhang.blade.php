@extends('client.layouts.master')
@section('content')
<div class="container mt-5">
    <div class="table-responsive">
        <table class="table table-striped table-bordered">
            <thead class="thead-dark">
                <tr>
                    <th>ID</th>
                    <th>Mã Đơn Hàng</th>
                    <th>Tên Người Nhận</th>
                    <th>Email Người Nhận</th>
                    <th>SĐT Người Nhận</th>
                    <th>Địa Chỉ Người Nhận</th>
                    <th>Trạng Thái Đơn Hàng</th>
                    <th>Trạng Thái Thanh Toán</th>
                    <th>Tiền Hàng</th>
                    <th>Tiền Ship</th>
                    <th>Tổng Tiền</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($order as $value)
                <tr>
                    <td>{{ $value->id }}</td>
                    <td>{{ $value->ma_don_hang }}</td>
                    <td>{{ $value->ten_nguoi_nhan }}</td>
                    <td>{{ $value->email_nguoi_nhan }}</td>
                    <td>{{ $value->sdt_nguoi_nhan }}</td>
                    <td>{{ $value->dia_chi_nguoi_nhan }}</td>
                    <td>{{ $value->trang_thai_don_hang }}</td>
                    <td>{{ $value->trang_thai_thanh_toan }}</td>
                    <td>{{ $value->tien_hang }}</td>
                    <td>{{ $value->tien_ship }}</td>
                    <td>{{ $value->tong_tien }}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection
