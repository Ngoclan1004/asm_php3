@extends('admin.layouts.master')
@section('title')
    <h2>Phần nội dung</h2>
@endsection
@section('head')
    <h1 class="h2">Danh mục sản phẩm</h1>
@endsection
@section('main')
<div class="table-responsive">   
    <a href="{{route('danhmuc.create')}}" class="btn btn-success">Thêm mới</a>
    <table class="table table-striped table-sm">
        <thead>
            <tr>
                <th>ID</th>
                <th>Tên danh mục</th>
                <th>Hành động</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($category as $value)

            <tr>
                <td>{{$value->id_dm}}</td>
                <td>{{$value->name}}</td>
                <td>
                    <a href="{{route('danhmuc.edit', $value->id_dm)}}" class="btn btn-primary">Sửa</a>
    
                    <form action="{{route('danhmuc.destroy', $value->id_dm)}}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger" onclick="return confirm('bạn có muốn xóa không ?')">Xóa</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection