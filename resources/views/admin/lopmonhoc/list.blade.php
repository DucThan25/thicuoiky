@extends('admin.main')
@section('content')
    <table class="table table-striped">
        <thead>
            <tr>
                <th>ID</th>
                <th>Mã lớp</th>
                <th>Tên lớp</th>
                <th>Mô tả</th>
                <th>Số lượng SV</th>
                <th>Thao tác</th>
            </tr>
        </thead>

        <tbody>
            @foreach($lopmonhocs as $lopmonhoc)
                <tr>
                    <td>{{$lopmonhoc->id}}</td>
                    <td>{{$lopmonhoc->MaLop}}</td>
                    <td>{{$lopmonhoc->TenLop}}</td>
                    <td>{!! $lopmonhoc->MoTa !!}</td>
                    <td>{{$lopmonhoc->SoLuongSV}}</td>
                    <td>
                        <a class="btn btn-primary" href="/admin/lopmh/edit/{{$lopmonhoc->id}}">
                            <i class = "fas fa-edit"> </i>
                        </a>
                        <a onclick="removeRow({{$lopmonhoc->id}},'/admin/lopmh/delete')" class="btn btn-danger" href="#">
                            <i class = "fas fa-trash"> </i>
                        </a>
                    </td>

                </tr>
            @endforeach
        </tbody>
    </table>
    {{ $lopmonhocs->links() }}
@endsection
