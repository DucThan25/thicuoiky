<?php

namespace App\Http\Services\LopMonHoc;
use App\Models\LopMonHoc;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

class LopMonHocService
{
    public function create($request){
        try {
            //
            LopMonHoc::create([
                'malop'=>(string)$request->input('malop'),
                'tenlop'=>(string)$request->input('tenlop'),
                'mota'=>(string)$request->input('mota'),
                'soluongsv'=>(string)$request->input('soluongsv'),
            ]);
            Session()->flash('success','Thêm mới lớp học thành công');
        }
        //xử lý exception, nếu có exception thì lấy ra message và hiển thị ra màn hình.
        catch (\Exception $ex){
            Session()->flash('error',$ex->getMessage());
            return false;
        }
        return true;
    }
    public function getAll(){
        return LopMonHoc::paginate(3);
    }
    public function delete($request){
        $lop = LopMonHoc::where('id', $request->input('id'));
        if($lop){
            return $lop->delete();
        }
    }
    
    public function update($request, $lop): bool
    {

        $lop->MaLop=(string)$request->input('malop');
        $lop->TenLop=(string)$request->input('tenlop');
        $lop->MoTa=(string)$request->input('mota');
        $lop->SoLuongSV=(string)$request->input('soluongsv');
        $lop->save();

        Session::flash('success', 'Cập nhật thành công lớp:'.$lop->TenLop);
        return true;
    }
//     public function edit($id,$request){
// //       $lop->MaLop=(string)$request->input('malop');
// //       $lop->TenLop=(string)$request->input('tenlop');
// //       $lop->MoTa=(string)$request->input('mota');
// //       $lop->SoLuongSV=(string)$request->input('soluongsv');
// //       $lop->save();
//         //dd($lop);
//         try {
//             $lop = DB::update(
//                 'update lop_mon_hocs set MaLop = :MaLop,
//             TenLop=:TenLop,
//             MoTa=:MoTa,
//             SoLuongSV=:SoLuongSV

//             where id = :id',
//                 [
//                     'MaLop'=>(string)$request->input('malop'),
//                     'TenLop'=>(string)$request->input('tenlop'),
//                     'MoTa'=>(string)$request->input('mota'),
//                     'SoLuongSV'=>(string)$request->input('soluongsv'),
//                     'id'=> $id
//                 ]
//             );
//             Session()->flash('success','Cập nhật thông tin lớp học thành công');
//         }
//         catch (\Exception $ex){
//             Session()->flash('error',$ex->getMessage());
//             return false;
//         }
//         return true;

//     }
}
