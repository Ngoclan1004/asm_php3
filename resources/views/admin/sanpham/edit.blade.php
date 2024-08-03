@extends('admin.layouts.master')
@section('title')
    <h2>Trang cập nhật</h2>
@endsection
@section('main')
    <form action="{{ route('sanpham.update', $model->id) }}" method="post" enctype="multipart/form-data">
        @csrf
        @method('put')
        <label for="ten">Tên</label>
        <input type="text" class="form-control" value="{{ $model->name }}" name="name"><br>
        <label for="ten">Anh:</label>
        <input type="file" class="form-control" name="img"><br>
        <img src="{{ Storage::url($model->img) }}" width="150px" alt=""><br>
        <label for="ten">Gia:</label>
        <input type="text" class="form-control" value="{{ $model->price }}" name="price"><br>
        <label for="ten">Số lượng:</label>
        <input type="text" class="form-control"  value="{{ $model->quantity }}" name="quantity"><br>
        {{-- Danh mục:
        <input type="text" name="id_dm"><br> --}}
        <select name="id_dm" id="id_dm" class="form-control">
            <option value="" >Chọn danh mục</option>
            @foreach ($danhmuc as $category)
                <option value="{{ $category->id_dm }}" {{ $category->id_dm == $model->iddm ? 'selected' : '' }}>
                    {{ $category->name }}
                </option>
            @endforeach
        </select><br>
        <label for="ten">Mô tả:</label>
        <input type="text" class="form-control" value="{{ $model->describe }}" name="describe"><br>

        <button type="submit" class="btn btn-primary">Cập nhật</button>
    </form>
@endsection
