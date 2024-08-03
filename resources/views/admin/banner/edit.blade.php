@extends('admin.layouts.master')
@section('title')
    <h2>Phần nội dung</h2>
@endsection
@section('head')
    <h1 class="h2">Sửa banner</h1>
@endsection
@section('main')
    <form action="{{ route('banner.update', $model->id) }}" method="POST"  enctype="multipart/form-data">
        @csrf
        @method('PUT') 

        <div class="form-group">
            <label for="ten">Banner</label>
            <input type="file" class="form-control" name="img"><br>
            <img src="{{ Storage::url($model->img) }}" width="150px" alt=""><br>
        </div>
        <button type="submit" class="btn btn-primary">Cập nhật</button>
        <a href="{{ route('banner.list') }}" class="btn btn-secondary ml-3">Quay lại</a>
    </form>
    </div>
@endsection
