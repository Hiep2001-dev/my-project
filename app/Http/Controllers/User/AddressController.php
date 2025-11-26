<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Address;
use Illuminate\Support\Facades\Auth;

class AddressController extends Controller
{
    public function create()
    {
        return view('shoe.address.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'dia_chi_1' => 'required|string|max:255',
            'xa_phuong' => 'required|string|max:150',
            'quan_huyen' => 'required|string|max:150',
            'tinh_thanh' => 'required|string|max:150',
            'so_dien_thoai' => 'required|string|max:30',
        ]);

        Address::create([
            'nguoi_dung_id' => Auth::id(),
            'loai_dia_chi' => $request->loai_dia_chi ?? 'nha_rieng',
            'ho_ten' => $request->ho_ten ?? Auth::user()->ho_ten,
            'so_dien_thoai' => $request->so_dien_thoai,
            'dia_chi_1' => $request->dia_chi_1,
            'dia_chi_2' => $request->dia_chi_2,
            'xa_phuong' => $request->xa_phuong,
            'quan_huyen' => $request->quan_huyen,
            'tinh_thanh' => $request->tinh_thanh,
            'quoc_gia' => $request->quoc_gia ?? 'VN',
            'ma_buu_dien' => $request->ma_buu_dien,
            'ghi_chu' => $request->ghi_chu,
            'mac_dinh' => $request->mac_dinh ? 1 : 0,
        ]);

        return redirect()->route('shoe.profile')->with('success', 'Thêm địa chỉ thành công!');
    }
    public function edit($id)
{
    $address = Auth::user()->diaChis()->findOrFail($id);
    return view('shoe.address.edit', compact('address'));
}

    public function update(Request $request, $id)
    {
        $address = Auth::user()->diaChis()->findOrFail($id);

        $request->validate([
            'dia_chi_1' => 'required|string|max:255',
            'xa_phuong' => 'required|string|max:255',
            'quan_huyen' => 'required|string|max:255',
            'tinh_thanh' => 'required|string|max:255',
        ]);

        // Nếu chọn làm mặc định thì bỏ mặc định các địa chỉ khác
        if ($request->has('mac_dinh')) {
            Auth::user()->diaChis()->update(['mac_dinh' => 0]);
            $address->mac_dinh = 1;
        } else {
            $address->mac_dinh = 0;
        }

        $address->update([
            'dia_chi_1' => $request->dia_chi_1,
            'xa_phuong' => $request->xa_phuong,
            'quan_huyen' => $request->quan_huyen,
            'tinh_thanh' => $request->tinh_thanh,
            'mac_dinh' => $address->mac_dinh,
        ]);

        return redirect()->route('shoe.profile')->with('success', 'Cập nhật địa chỉ thành công!');
    }
   
}