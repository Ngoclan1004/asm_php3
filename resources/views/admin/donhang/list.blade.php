@extends('admin.layouts.master')
@section('title')
    <h2>Phần nội dung</h2>
@endsection
@section('head')
    <h1 class="h2">Đơn Hàng</h1>
@endsection
@section('main')
<div class="table-responsive">   
    
    <table class="table table-striped table-sm">
        <thead>
            <tr>
                <th>ID</th>
                <th>Người đặt hàng</th>
            
                <th>Số điện thoại</th>
                <th>Trạng thái đơn hàng</th>
                <th>Trạng thái thanh toán</th>
                <th>Sản phẩm</th>
                <th>Tổng tiền</th>
               
            </tr>
        </thead>
        <tbody>
            @foreach ($oder as $value)

            <tr>
                <td>{{$value->id}}</td>
                <td>{{$value->ten_nguoi_nhan}}</td>
                <td>{{$value->sdt_nguoi_nhan}}</td>
                <td>
                    {{$value->trang_thai_don_hang}}</td>
                <td>{{$value->trang_thai_thanh_toan}}</td>
                <td>{{$value->ma_don_hang}}</td>
                <td>{{$value->tong_tien}}</td>
                <td>
                    <a href="{{route('donhang.edit', $value->id)}}" class="btn btn-primary">Sửa</a>
                </td>
                
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection