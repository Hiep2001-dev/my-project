<?php
namespace App\Exports;

use App\Models\ProductVariation;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class ProductVariationsExport implements FromCollection, WithHeadings
{
    protected $productId;

    public function __construct($productId)
    {
        $this->productId = $productId;
    }

    public function collection()
    {
        return ProductVariation::with('product')
            ->where('san_pham_id', $this->productId)
            ->get()
            ->map(function ($item) {
                return [
                    'ID'         => $item->id,
                    'Tên sản phẩm' => $item->product->ten ?? '',
                    'Màu sắc'    => $item->mau_sac,
                    'Size EU'    => $item->size_eu,
                    'Giá bán'    => $item->gia_ban,
                    'Số lượng'   => $item->so_luong,
                ];
            });
    }

    public function headings(): array
    {
        return [
            'ID',
            'Tên sản phẩm',
            'Màu sắc',
            'Size EU',
            'Giá bán',
            'Số lượng',
        ];
    }
}