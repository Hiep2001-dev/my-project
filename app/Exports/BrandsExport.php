<?php
namespace App\Exports;

use App\Models\Brand;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class BrandsExport implements FromCollection, WithHeadings
{
    public function collection()
    {
        return Brand::select('id', 'ten', 'mo_ta', 'ngay_tao', 'ngay_cap_nhat')->get();
    }

    public function headings(): array
    {
        return [
            'ID',
            'Tên thương hiệu',
            'Mô tả',
            'Ngày tạo',
            'Ngày cập nhật',
        ];
    }
}