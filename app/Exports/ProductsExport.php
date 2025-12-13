<?php
namespace App\Exports;

use App\Models\Product;
use Maatwebsite\Excel\Concerns\FromCollection;

class ProductsExport implements FromCollection
{
    public function collection()
    {
        return Product::select('id', 'ten', 'ma_sku', 'thuong_hieu_id', 'gioi_tinh', 'ngay_tao', 'ngay_cap_nhat')->get();
    }
}