<?php

namespace App\Http\Services\SinhVien;

use App\Models\LopMonHoc;
use App\Models\SinhVien;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Session;

class SinhVienService
{
    public function getLopMH()
    {
        return LopMonHoc::get();
    }
    
    public function insert($request)
    {
        try {
            $request->except('_token');
            SinhVien::create($request->all());

            Session::flash('success', 'Thêm Sinh viên thành thành công');
        } catch (\Exception $err) {
            Session::flash('error', 'Thêm sinh viên lỗi');
            Log::info($err->getMessage());
            return  false;
        }

        return  true;
    }

    // public function delete($request)
    // {
    //     $sv = SinhVien::where('id', $request->input('id'))->first();
    //     if ($sv) {
    //         $sv->delete();
    //         return true;
    //     }

    //     return false;
    // }

    public function update($request, $sv)
    {
        try {
            $sv->fill($request->input());
            $sv->save();
            Session::flash('success', 'Cập nhật thành công');
        } catch (\Exception $err) {
            Session::flash('error', 'Có lỗi vui lòng thử lại');
            Log::info($err->getMessage());
            return false;
        }
        return true;
    }
    public function delete($request){
        $sv = SinhVien::where('id', $request->input('id'));
        if($sv){
            return $sv->delete();
        }
    }
    public function getAll(){
        // return SinhVien::with('lop')->orderByDesc('id')->paginate(15);
        return SinhVien::with('lop')->paginate(6);
    }
   
}
