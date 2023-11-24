@extends('admin.main')
@section('head')
    <script src="/ckeditor/ckeditor.js"></script>
@endsection
@section('content')

<form action="" method="post">
    {{-- @include('admin.alert') --}}
    <div class="card-body">
        <div class="form-group">
            <label for="exampleInputEmail1">Mã số sinh viên</label>
            <input type="text" name="masv" class="form-control" id="masv" placeholder="Nhập mã số sinh viên">
        </div>
        <div class="form-group">
            <label for="exampleInputPassword1">Họ và tên</label>
            <input type="text" name="hoten" class="form-control" id="hoten" placeholder="Nhập họ và tên">
        </div>
        <div class="form-group">
            <label for="exampleInputPassword1">Ngày sinh</label>
            <input type="date" name="ngaysinh" class="form-control" id="ngaysinh" placeholder="Nhập ngày sinh">
        </div>
        <div class="form-group">
            <label for="exampleInputPassword1">Giới tính</label>
            <input type="text" name="gioitinh" class="form-control" id="gioitinh" placeholder="Nhập giới tính">
        </div>
        <div class="form-group">
            <label for="exampleInputPassword1">Địa chỉ</label>
            <input type="text" name="diachi" class="form-control" id="diachi" placeholder="Nhập địa chỉ">
        </div>
        <div class="form-group">
            <label for="exampleInputPassword1">Số điện thoại</label>
            <input type="text" name="sodt" class="form-control" id="sodt" placeholder="Nhập số điện thoại">
        </div>
        <div class="form-group">
            <label>Lớp môn học</label>
            <select class="form-control" name="lop_id">
                @foreach($lops as $lop)
                    <option value="{{ $lop->id }}">{{$lop->TenLop}}</option>
                @endforeach
            </select>
        </div>
    </div>
    <!-- /.card-body -->

    <div class="card-footer">
        <button type="submit" class="btn btn-primary">Thêm mới</button>
    </div>
    @csrf
</form>
@endsection
@section('footer')
    <script>
        CKEDITOR.replace('mota');
    </script>
@endsection