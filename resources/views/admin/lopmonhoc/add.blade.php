@extends('admin.main')
@section('head')
    <script src="/ckeditor/ckeditor.js"></script>
@endsection
@section('content')

<form action="" method="post">
    {{-- @include('admin.alert') --}}
    <div class="card-body">
        <div class="form-group">
            <label>Mã lớp học nhé</label>
            <input type="text" name="malop" class="form-control" id="malop" placeholder="Nhập mã lớp học">
        </div>
        <div class="form-group">
            <label>Tên lớp học nhé</label>
            <input type="text" name="tenlop" class="form-control" id="tenlop" placeholder="Nhập tên lớp học">
        </div>
        <div class="form-group">
            <label>Mô Tả </label>
            <textarea name="mota" id="mota" class="form-control"></textarea>
        </div>
        {{-- <div class="form-group">
            <label for="exampleInputPassword1">Mô tả</label>
            <textarea name="mota" id="mota" rows="10" cols="80">
            This is my textarea to be replaced with CKEditor 4.
            </textarea>
            <script>
                // Replace the <textarea id="editor1"> with a CKEditor 4
                // instance, using default configuration.
                CKEDITOR.replace( 'mota' );
            </script>
        </div> --}}
    
        <div class="form-group">
            <label >Số lượng sinh viên</label>
            <input type="number" name="soluongsv" class="form-control" id="soluongsv"
                   placeholder="Nhập số lượng sinh viên">
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