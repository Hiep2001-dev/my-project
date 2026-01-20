<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Discount;
use Illuminate\Http\Request;

class DiscountController extends Controller
{
    public function index() {
        $discounts = Discount::orderByDesc('id')->paginate(10);
        return view('admin.discount.index', compact('discounts'));
    }

    public function create() {
        return view('admin.discount.create');
    }

    public function store(Request $request) {
        $request->validate([
            'ma_code' => 'required|unique:ma_giam_gia,ma_code',
            'loai' => 'required|in:phan_tram,tien_mat',
            'gia_tri' => 'required|numeric|min:1',
            'ngay_bat_dau' => 'required|date',
            'ngay_ket_thuc' => 'required|date|after_or_equal:ngay_bat_dau',
        ]);
        Discount::create($request->all());
        return redirect()->route('admin.discount.index')->with('success', 'Thêm mã giảm giá thành công!');
    }

    public function edit($id) {
        $discount = Discount::findOrFail($id);
        return view('admin.discount.edit', compact('discount'));
    }

    public function update(Request $request, $id) {
        $discount = Discount::findOrFail($id);
        $request->validate([
            'ma_code' => 'required|unique:ma_giam_gia,ma_code,'.$id,
            'loai' => 'required|in:phan_tram,tien_mat',
            'gia_tri' => 'required|numeric|min:1',
            'ngay_bat_dau' => 'required|date',
            'ngay_ket_thuc' => 'required|date|after_or_equal:ngay_bat_dau',
        ]);
        $discount->update($request->all());
        return redirect()->route('admin.discount.index')->with('success', 'Cập nhật thành công!');
    }

    public function destroy($id) {
        Discount::destroy($id);
        return back()->with('success', 'Đã xóa mã giảm giá!');
    }
}