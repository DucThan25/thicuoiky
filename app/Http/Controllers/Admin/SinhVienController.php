<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Services\SinhVien\SinhVienService;
use App\Http\Requests\SinhVien\CreateFormRequest;
use App\Models\SinhVien;

class SinhVienController extends Controller
{
    //
    protected $sinhvienService;

    public function __construct(SinhVienService $sinhvienService)
    {
        $this->sinhvienService = $sinhvienService;
    }
    
    public function create()
    {
        return view('admin.sinhvien.add', [
            'title' => 'Thêm mới sinh vien',
            'lops' => $this->sinhvienService->getLopMH(),
        
        ]);
        
    }
    
    public function store(CreateFormRequest $request)
    {
        $this->sinhvienService->insert($request);

        return redirect()->back();
    }

    public function index()
    {
        return view('admin.sinhvien.list', [
            'title' => 'Danh Sách sinh viên',
            'sinhviens' => $this->sinhvienService->getAll(),
        ]);
    }
    public function show(SinhVien $sv)
    {
        return view('admin.sinhvien.edit', [
            'title' => 'Chỉnh Sửa sinh viên',
            'sv' => $sv,
            'lops' => $this->sinhvienService->getLopMH(),
        ]);
    }
    public function update(Request $request, SinhVien $sv)
    {
        $result = $this->sinhvienService->update($request, $sv);
        if ($result) {
            return redirect('/admin/sinhvien/list');
        }

        return redirect()->back();
    }
    public function delete(Request $request){
        //xử lý xóa
        $result = $this->sinhvienService->delete($request);
        if ($result){
            return response()->json([
                'error' => 'false',
                'message'=> "xóa sinh viên thành công"
            ]);
        }
        return response()->json([
            'error'=>'true'
        ]);
    }
}
