@extends('admin.layouts.master')
@section('title')
    <h2>Trang thêm mới</h2>
@endsection
@section('main')
    <form action="{{ route('sanpham.store') }}" method="post" enctype="multipart/form-data">
        @csrf
        <label for="ten">Tên sản phẩm</label>
        <input type="text" class="form-control" name="name" required><br>
        <label for="ten">Ảnh</label>
        <input type="file" class="form-control" name="img" required><br>
        <label for="ten">Giá</label>
        <input type="text" class="form-control" name="price" required><br>
       <label for="ten"> Số lượng</label>
        <input type="text" class="form-control" name="quantity" required><br>
        {{-- Danh mục:
        <input type="text" name="id_dm"><br> --}}
        <select name="id_dm" id="" class="form-control">
            <option value="">Chọn danh mục</option>
            @foreach ($danhmuc as $value)
                <option value="{{ $value->id_dm }}">
                    {{ $value->name }}
                </option>
            @endforeach
        </select><br>
        Mô tả:
        <input type="text" class="form-control" name="describe" ><br>

        <button type="submit" class="btn btn-primary">Thêm mới</button>
    </form>
@endsection
