@extends('admin.layouts.master')
@section('title')
    <h2>Phần nội dung</h2>
@endsection
@section('head')
    <h1 class="h2">Danh sach banner</h1>
@endsection
@section('main')
<div class="table-responsive">   
    <a href="{{route('banner.create')}}" class="btn btn-success">Thêm mới</a>
    <table class="table table-striped table-sm">
        <thead>
            <tr>
                <th>ID</th>
                <th>Banner</th>
                <th>Hành động</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($banner as $value)

            <tr>
                <td>{{$value->id}}</td>
                <td><img src="{{Storage::url($value->img)}}" width="150px" alt=""></td>
                <td>
                    <a href="{{route('banner.edit', $value->id)}}" class="btn btn-primary">Sửa</a>
    
                    <form action="{{route('banner.destroy', $value->id)}}" method="POST">
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