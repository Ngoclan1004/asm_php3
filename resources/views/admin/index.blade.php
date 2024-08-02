@extends('admin.layouts.master')
@section('title')
    <h2>Phần nội dung</h2>
@endsection
@section('head')
    <h1 class="h2">Danh sách</h1>
@endsection
@section('main')
<div class="table-responsive">
    <button class="btn btn-sm btn-primary">Thêm mới</button>
    <table class="table table-striped table-sm">
        <thead>
            <tr>
                <th>ID</th>
                <th>Tên sản phẩm</th>
                <th>Ảnh</th>
                <th>Giá</th>
                <th>Số lượng</th>
                <th>Danh mục</th>
                <th>Mô tả</th>
                <th>Hành động</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($data as $list)

            <tr>
                <td>{{$list->id}}</td>
                <td>{{$list->name}}</td>
                <td>Ảnh</td>
                <td>{{$list->price}}</td>
                <td>{{$list->quantity}}</td>
                <td>{{$list->id_dm}}</td>
                <td>{{$list->describe}}</td>
                <td>
                    <button class="btn btn-sm btn-primary">Sửa</button>
                    <button class="btn btn-sm btn-danger">Xóa</button>
                    <button class="btn btn-sm btn-secondary">Chi tiết</button>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection