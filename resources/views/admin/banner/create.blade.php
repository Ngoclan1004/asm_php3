@extends('admin.layouts.master')
@section('title')
    <h2>Phần nội dung</h2>
@endsection
@section('head')
    <h1 class="h2">Thêm Banner</h1>
@endsection
@section('main')
    <form action="{{ route('banner.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <label for="ten">Banner</label>
        <input type="file" class="form-control" value="" name="img" placeholder="Nhập banner" required><br>
        
        <button type="submit" class="btn btn-primary">Thêm mới</button>
        <a href="{{ route('banner.list') }}" class="btn btn-secondary ml-3">Quay lại</a>

    </form>
@endsection
