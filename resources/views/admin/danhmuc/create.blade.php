@extends('admin.layouts.master')
@section('title')
    <h2>Phần nội dung</h2>
@endsection
@section('head')
    <h1 class="h2">Thêm danh mục</h1>
@endsection
@section('main')
    <form action="{{ route('danhmuc.store') }}" method="POST">
        @csrf
        <label for="ten">Tên danh mục</label>
        <input type="text" class="form-control" value="" name="name" placeholder="Nhập tên" required><br>
        
        <button type="submit" class="btn btn-primary">Thêm mới</button>
        <a href="{{ route('danhmuc.list') }}" class="btn btn-secondary ml-3">Quay lại</a>

    </form>
@endsection
