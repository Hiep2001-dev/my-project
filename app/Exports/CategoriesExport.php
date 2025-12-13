<?php
namespace App\Exports;

use App\Models\Category;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class CategoriesExport implements FromCollection, WithHeadings
{
    public function collection()
    {
        return Category::select('id', 'ten', 'mo_ta', 'cha_id', 'ngay_tao', 'ngay_cap_nhat')->get();
    }

    public function headings(): array
    {
        return [
            'ID',
            'Tên danh mục',
            'Mô tả',
            'ID cha',
            'Ngày tạo',
            'Ngày cập nhật',
        ];
    }
}