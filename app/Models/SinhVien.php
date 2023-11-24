<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SinhVien extends Model
{
    use HasFactory;

    protected $fillable = [
        'masv',
        'hoten',
        'ngaysinh',
        'gioitinh',
        'diachi',
        'sodt',
        'lop_id',
    ];

    public function lop()
    {
        return $this->hasOne(LopMonHoc::class, 'id', 'lop_id')
            ->withDefault(['tenlop' => '']);
    }
}
