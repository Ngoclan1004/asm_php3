@extends('admin.layouts.master')
@section('title')
    <h2>Trang cập nhật</h2>
@endsection
@section('main')
    <form action="{{ route('sanpham.update', $model->id) }}" method="post" enctype="multipart/form-data">
        @csrf
        @method('put')
        Tên:
        <input type="text" value="{{ $model->name }}" name="name"><br>
        Ảnh:
        <input type="file" name="img"><br>
        <img src="{{ Storage::url($model->img) }}" width="150px" alt="">
        Giá:
        <input type="text" value="{{ $model->price }}" name="price"><br>
        Số lượng:
        <input type="text" value="{{ $model->quantity }}" name="quantity"><br>
        {{-- Danh mục:
        <input type="text" name="id_dm"><br> --}}
        <select name="id_dm" id="id_dm">
            <option value="">Chọn danh mục</option>
            @foreach ($danhmuc as $category)
                <option value="{{ $category->id_dm }}" {{ $category->id_dm == $model->iddm ? 'selected' : '' }}>
                    {{ $category->name }}
                </option>
            @endforeach
        </select><br>
        Mô tả:
        <input type="text" value="{{ $model->describe }}" name="describe"><br>

        <button type="submit">Cập nhật</button>
    </form>
@endsection
