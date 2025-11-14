<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Post;
use App\Models\PostCategory;
use App\Models\User;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function index()
    {
        $posts = Post::with(['chuyenMuc', 'tacGia'])->orderByDesc('ngay_tao')->paginate(10);
        return view('admin.posts.index', compact('posts'));
    }

    public function create()
    {
        $categories = PostCategory::where('hoat_dong', 1)->get();
        $authors = User::all();
        return view('admin.posts.create', compact('categories', 'authors'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'tieu_de' => 'required|string|max:255',
            'tom_tat' => 'nullable|string',
            'noi_dung' => 'required|string',
            'hinh_anh_dai_dien' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'tac_gia_id' => 'nullable|integer|exists:nguoi_dung,id',
            'chuyen_muc_id' => 'nullable|integer|exists:chuyen_muc,id',
            'trang_thai' => 'required|in:nhap,xuat_ban,luu_tru',
            'ngay_xuat_ban' => 'nullable|date',
        ]);

        $data = $request->only([
            'tieu_de', 'tom_tat', 'noi_dung',
            'tac_gia_id', 'chuyen_muc_id', 'trang_thai', 'ngay_xuat_ban'
        ]);
        if ($request->hasFile('hinh_anh_dai_dien')) {
            $file = $request->file('hinh_anh_dai_dien');
            $path = $file->store('uploads/posts', 'public');
            $data['hinh_anh_dai_dien'] = $path;
        }

        Post::create($data);
        return redirect()->route('admin.posts.index')->with('success', 'Thêm bài viết thành công!');
    }

    public function show($id)
    {
        $post = Post::with(['chuyenMuc', 'tacGia'])->findOrFail($id);
        return view('admin.posts.show', compact('post'));
    }
    public function edit($id)
    {
        $post = Post::findOrFail($id);
        $categories = PostCategory::where('hoat_dong', 1)->get();
        $authors = User::all();
        return view('admin.posts.edit', compact('post', 'categories', 'authors'));
    }

    public function update(Request $request, $id)
    {
        $post = Post::findOrFail($id);
        $request->validate([
            'tieu_de' => 'required|string|max:255',
            'tom_tat' => 'nullable|string',
            'noi_dung' => 'required|string',
            'hinh_anh_dai_dien' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'tac_gia_id' => 'nullable|integer|exists:nguoi_dung,id',
            'chuyen_muc_id' => 'nullable|integer|exists:chuyen_muc,id',
            'trang_thai' => 'required|in:nhap,xuat_ban,luu_tru',
            'ngay_xuat_ban' => 'nullable|date',
        ]);

        $data = $request->only([
            'tieu_de', 'tom_tat', 'noi_dung',
            'tac_gia_id', 'chuyen_muc_id', 'trang_thai', 'ngay_xuat_ban'
        ]);

        if ($request->hasFile('hinh_anh_dai_dien')) {
            $file = $request->file('hinh_anh_dai_dien');
            $path = $file->store('uploads/posts', 'public');
            $data['hinh_anh_dai_dien'] = $path;
        }

        $post->update($data);
        return redirect()->route('admin.posts.index')->with('success', 'Cập nhật bài viết thành công!');
    }

    public function destroy($id)
    {
        $post = Post::findOrFail($id);
        $post->delete();
        return redirect()->route('admin.posts.index')->with('success', 'Xóa bài viết thành công!');
    }
}