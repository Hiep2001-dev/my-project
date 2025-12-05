<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Banner;
use Illuminate\Http\Request;

class BannerController extends Controller
{
    public function index()
    {
        $banners = Banner::orderByDesc('ngay_tao')->paginate(15);
        return view('admin.banners.index', compact('banners'));
    }

    public function create()
    {
        return view('admin.banners.create');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'tieu_de' => 'nullable|string|max:200',
            'mo_ta' => 'nullable|string',
            'hinh_anh' => 'required|string|max:500',
            'link' => 'nullable|string|max:500',
            'vi_tri' => 'required|in:home_hero,home_section,category_top,khac',
            'thu_tu' => 'nullable|integer',
            'ngay_bat_dau' => 'nullable|date',
            'ngay_ket_thuc' => 'nullable|date',
            'hoat_dong' => 'boolean',
        ]);
        $data['nguoi_tao_id'] = auth()->id();
        Banner::create($data);
        return redirect()->route('admin.banners.index')->with('success', 'Thêm banner thành công!');
    }

    public function edit($id)
    {
        $banner = Banner::findOrFail($id);
        return view('admin.banners.edit', compact('banner'));
    }

    public function update(Request $request, $id)
    {
        $banner = Banner::findOrFail($id);
        $data = $request->validate([
            'tieu_de' => 'nullable|string|max:200',
            'mo_ta' => 'nullable|string',
            'hinh_anh' => 'required|string|max:500',
            'link' => 'nullable|string|max:500',
            'vi_tri' => 'required|in:home_hero,home_section,category_top,khac',
            'thu_tu' => 'nullable|integer',
            'ngay_bat_dau' => 'nullable|date',
            'ngay_ket_thuc' => 'nullable|date',
            'hoat_dong' => 'boolean',
        ]);
        $banner->update($data);
        return redirect()->route('admin.banners.index')->with('success', 'Cập nhật banner thành công!');
    }

    public function destroy($id)
    {
        Banner::destroy($id);
        return redirect()->route('admin.banners.index')->with('success', 'Xóa banner thành công!');
    }
}