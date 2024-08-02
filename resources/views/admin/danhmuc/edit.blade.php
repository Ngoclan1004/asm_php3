@extends('admin.layouts.master')
@section('title')
    <h2>Phần nội dung</h2>
@endsection
@section('head')
    <h1 class="h2">Sửa danh mục</h1>
@endsection
@section('main')
    <form action="{{ route('danhmuc.update', $model->id_dm)}}" method="POST">
        @csrf
        @method('PUT')

        <div class="form-group">
            <label for="ten">Tên danh mục</label>
            <input type="text" class="form-control" name="name" value="{{$model->name}}" placeholder="Nhập tên" required>
        </div>
        <button type="submit" class="btn btn-primary">Cập nhật</button>
        <a href="{{ route('danhmuc.list') }}" class="btn btn-secondary ml-3">Quay lại</a>
    </form>
    </div>
@endsection
