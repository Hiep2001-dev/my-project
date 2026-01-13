<?php
namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\OrderDetail;
use App\Models\ProductVariation;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Product;
use App\Models\Order;
use App\Models\Post;
class DashboardController extends Controller
{
    public function index()
    {
        $productCount = Product::count();
        $userCount = User::count();
        $orderCount = Order::count();
        $postCount = Post::count();
        $total= Order::where('trang_thai_tt', 'da_tt')->sum('tong_tien');
        $admins = User::where('vai_tro', 'super_admin')->get();
        $nhanviens = User::where('vai_tro', 'nhan_vien')->get();
        $profits = OrderDetail::join('bien_the_san_pham', 'chi_tiet_don_hang.bien_the_id', '=', 'bien_the_san_pham.id')
        ->join('don_hang', 'chi_tiet_don_hang.don_hang_id', '=', 'don_hang.id')
        ->where('don_hang.trang_thai_tt', 'da_tt')
        ->selectRaw('SUM((chi_tiet_don_hang.don_gia - bien_the_san_pham.gia_nhap) * chi_tiet_don_hang.so_luong) as profit')
        ->value('profit');
        $warnings= ProductVariation::where('so_luong', '<=', 10)->get();
        $sidebarItems = [
            [
                'name' => 'Dashboard',
                'url' => route('admin.dashboard'),
                'icon' => 'grid-fill',
                'isTitle' => false,
                'key' => 'dashboard',
            ],
            [
                'name' => 'Components',
                'isTitle' => true,
            ],

        ];

        $filename = 'dashboard';

        return view('admin.index', [
            'sidebarItems' => $sidebarItems,
            'filename' => $filename,
            'title' => 'Dashboard',
            'web_title' => 'Admin',
            'admins' => $admins,
            'nhanviens' => $nhanviens,
            'productCount' => $productCount,
            'userCount' => $userCount,
            'orderCount' => $orderCount,
            'postCount' => $postCount,
            'total' => $total,
            'profits' => $profits,
            'warnings' => $warnings,
        ]);
    }
}