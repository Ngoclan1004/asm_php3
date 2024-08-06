@extends('admin.layouts.master')
@section('title')
    <h2>Phần nội dung</h2>
@endsection
@section('head')
    <h1 class="h2">Sửa đơn hàng</h1>
@endsection
@section('main')
    <form action="{{ route('donhang.update', $model->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="form-group">
            <label for="ten">Tên người nhận</label>
            <input type="text" class="form-control" name="name" value="{{ $model->ten_nguoi_nhan }}" disabled>
        </div>
        <div class="form-group">
            <label for="ten">Số điện thoại</label>
            <input type="text" class="form-control" name="name" value="{{ $model->sdt_nguoi_nhan }}" disabled>
        </div>
        <div class="form-group">
            <label for="ten" >Trạng thái đơn hàng</label>
            <select name="trang_thai_don_hang" id="" class="form-control">
                <option value="cho_xac_nhan">Chờ xác nhận</option>
                <option value="da_xac_nhan">Đã xác nhận</option>
                <option value="dang_chuan_bi">Đang chuẩn bị</option>
                <option value="dang_van_chuyen">Đang vận chuyển</option>
                <option value="da_giao_hang">Đã giao hàng</option>
                <option value="huy_dơn_hang">Hủy đơn hàng</option>
            </select>
            {{-- <input type="text" class="form-control" name="name" value="{{$model->trang_thai_don_hang}}" placeholder="Nhập tên" required> --}}
        </div>
        <div class="form-group">
            <label for="ten">Trạng thái thanh toán</label>
            <label for="ten">Trạng thái đơn hàng</label>
            <select name="trang_thai_thanh_toan" id="" class="form-control">
                <option value="chua_thanh_toan">Chưa thanh toán</option>
                <option value="da_thanh_toan">Đã thanh toán</option>
            </select>
            {{-- <input type="text" class="form-control" name="name" value="{{$model->trang_thai_thanh_toan}}" placeholder="Nhập tên" required> --}}
        </div>
        <div class="form-group">
            <label for="ten">Sản phẩm</label>
            <input type="text" class="form-control" name="name" value="{{ $model->ma_don_hang }}" disabled>
        </div>
        <div class="form-group">
            <label for="ten">Tổng tiền</label>
            <input type="text" class="form-control" name="name" value="{{ $model->tong_tien }}" disabled>
        </div>
        <button type="submit" class="btn btn-primary">Cập nhật</button>
        <a href="{{ route('donhang.list') }}" class="btn btn-secondary ml-3">Quay lại</a>
    </form>
    </div>
@endsection
