<?php
namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
class DashboardController extends Controller
{
    public function index()
    {
        $admins = User::where('vai_tro', 'quan_li')->get();
        $nhanviens = User::where('vai_tro', 'nhan_vien')->get();
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
        ]);
    }
}