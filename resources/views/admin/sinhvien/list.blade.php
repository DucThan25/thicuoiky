@extends('admin.main')

@section('content')
    <table class="table">
        <thead>
        <tr>
            <th style="width: 50px">ID</th>
            <th>Mã Sinh Viên</th>
            <th>Tên Sinh Viên</th>
            <th>Ngày sinh</th>
            <th>Giới tính</th>
            <th>Địa chỉ</th>
            <th>Số điện thoại</th>
            <th>id lớp </th>
            
            <th style="width: 150px">&nbsp;</th>
        </tr>
        </thead>
        <tbody>
            @foreach($sinhviens as $key => $sv)
            <tr>
                <td>{{ $sv->id }}</td>
                <td>{{$sv->MaSV}}</td>
                <td>{{$sv->HoTen}}</td>
                <td>{{$sv->NgaySinh}}</td>
                <td>{{$sv->GioiTinh}}</td>
                <td>{{$sv->DiaChi}}</td>
                <td>{{$sv->SoDT}}</td>
                <td>{{ $sv->Lop_id }}</td>
                <td>{{ $sv->TenLop }} </td>
                <td>
                    <a class="btn btn-primary btn-sm" href="/admin/sinhvien/edit/{{ $sv->id }}">
                        <i class="fas fa-edit"></i>
                    </a>
                    <a href="#" class="btn btn-danger btn-sm"
                       onclick="removeRow({{ $sv->id }}, '/admin/sinhvien/delete')">
                        <i class="fas fa-trash"></i>
                    </a>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>

    <div class="card-footer clearfix">
        {!! $sinhviens->links() !!}
    </div>
@endsection

