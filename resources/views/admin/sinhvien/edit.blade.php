@extends('admin.main')
@section('head')
    <script src="/ckeditor/ckeditor.js"></script>
@endsection
@section('content')

<form action="" method="post">
    {{-- @include('admin.alert') --}}
    <div class="card-body">
        <div class="form-group">
            <h1>{{ $sv->MaSV }}</h1>
            <label>Mã sinh vien</label>
            <input type="text" name="masv" value="{{ $sv->MaSV }}" class="form-control" id="masv" placeholder="Nhập mã sinh viên">
        </div>
        <div class="form-group">
            <label>Tên sinh viên</label>
            <input type="text" name="hoten" value="{{ $sv->HoTen }}" class="form-control" id="hoten" placeholder="Nhập tên sinh viên">
        </div>
        <div class="form-group">
            <label for="exampleInputPassword1">Ngày sinh</label>
            <input type="date" value="{{$sv->NgaySinh}}" name="ngaysinh" class="form-control" id="NgaySinh" placeholder="Nhập ngày sinh">
        </div>
        <div class="form-group">
            <label for="exampleInputPassword1">Giới tính</label>
            <input type="text" value="{{$sv->GioiTinh}}" name="GioiTinh" class="form-control" id="GioiTinh" placeholder="Nhập giới tính">
        </div>
        <div class="form-group">
            <label for="exampleInputPassword1">Địa chỉ</label>
            <input type="text" value="{{$sv->DiaChi}}" name="diachi" class="form-control" id="DiaChi" placeholder="Nhập địa chỉ">
        </div>
        <div class="form-group">
            <label for="exampleInputPassword1">Số điện thoại</label>
            <input type="text" value="{{$sv->SoDT}}" name="sodt" class="form-control" id="SoDT" placeholder="Nhập số điện thoại">
        </div>
        <div class="form-group">
            <label>Lớp môn học</label>
            <select class="form-control" value="" name="lop_id" >
                @foreach($lops as $lop)
                    <option value="{{ $lop->id }}" {{ $sv->Lop_id == $lop->id ? 'selected' : '' }}>
                        {{$lop->TenLop}}
                    </option>
                @endforeach
            </select>
        </div>
        
    </div>
    <!-- /.card-body -->

    <div class="card-footer">
        <button type="submit" class="btn btn-primary">cập nhật</button>
    </div>
    @csrf
</form>
@endsection
@section('footer')
    <script>
        CKEDITOR.replace('mota');
    </script>
@endsection