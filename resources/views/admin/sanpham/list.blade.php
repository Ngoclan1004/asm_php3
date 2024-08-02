@extends('admin.layouts.master')
@section('title')
    <h2>Phần nội dung</h2>
@endsection
@section('head')
    <h1 class="h2">Danh sách sản phẩm</h1>
@endsection
@section('main')
<div class="table-responsive">   
    <a href="{{route('sanpham.create')}}" class="btn btn-success">Thêm mới</a>
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
                <td><img src="{{Storage::url($list->img)}}" width="150px" alt=""></td>
                <td>{{$list->price}}</td>
                <td>{{$list->quantity}}</td>
                <td>{{$list->danhmuc}}</td>
                <td>{{$list->describe}}</td>
                <td>
                    {{-- <button class="btn btn-sm btn-primary">Sửa</button> --}}
                    <a href="{{route('sanpham.edit', $list->id)}}" class="btn btn-primary">Sửa</a>
                    {{-- <button class="btn btn-sm btn-danger">Xóa</button> --}}
                    <form action="{{route('sanpham.destroy', $list->id)}}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger" onclick="return confirm('bạn có muốn xóa không ?')">Xóa</button>
                    </form>
                    <button class="btn btn-sm btn-secondary">Chi tiết</button>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection