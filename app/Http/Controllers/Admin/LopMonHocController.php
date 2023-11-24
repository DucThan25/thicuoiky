<?php

namespace App\Http\Controllers\Admin;
use App\Http\Requests\LopMonHoc\CreateFormRequest;
use App\Http\Services\LopMonHoc\LopMonHocService;
use App\Http\Controllers\Controller;
use App\Models\LopMonHoc;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;

class LopMonHocController extends Controller
{
    //
    protected $lopmonhocService;

    public function __construct(LopMonHocService $lopmonhocService)
    {
        $this->lopmonhocService = $lopmonhocService;
    }

    public function create(){
        return view('admin.lopmonhoc.add',[
            'title'=>'Thêm mới lớp môn học'
        ]);
    }
    public function store(CreateFormRequest $request){
        $result = $this->lopmonhocService->create($request);
        return redirect()->back();
    }
    public function index(){
        return view('admin.lopmonhoc.list',[
            'title'=>'Danh sách lớp môn học',
            'lopmonhocs' => $this->lopmonhocService->getAll()
        ]);
    }

    public function delete(Request $request){
        //xử lý xóa
        $result = $this->lopmonhocService->delete($request);
        if ($result){
            return response()->json([
                'error' => 'false',
                'message'=> "xóa lớp học thành công"
            ]);
        }
        return response()->json([
            'error'=>'true'
        ]);
    }
    
    public function show(LopMonHoc $lop)
    {
        return view('admin.lopmonhoc.edit', [
            'title' => 'Chỉnh Sửa lớp môn học có id: ' . $lop->id,
            'lop' => $lop,
            'brands' => $this->lopmonhocService->getAll()
        ]);
    }

    public function update(LopMonHoc $lop, CreateFormRequest $request)
    {
        $this->lopmonhocService->update($request, $lop);

        return redirect('/admin/lopmh/list');
    }
}
