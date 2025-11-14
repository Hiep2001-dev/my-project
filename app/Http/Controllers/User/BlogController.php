<?php

namespace App\Http\Controllers\User;
use App\Http\Controllers\Controller;
use App\Models\PostCategory;
use Illuminate\Http\Request;
use App\Models\Post;
class BlogController extends Controller
{
    public function index()
    {
        $posts = Post::orderByDesc('ngay_xuat_ban')->paginate(9);
        $latestPosts = Post::orderByDesc('ngay_xuat_ban')->limit(5)->get();
        $categories = PostCategory::where('hoat_dong', 1)->get();
        return view('shoe.blog', compact('posts', 'latestPosts', 'categories'));
    }

    public function show($id)
    {
        $post = Post::with(['chuyenMuc', 'tacGia'])->findOrFail($id);
        $categories = PostCategory::where('hoat_dong', 1)->get();
        $latestPosts = Post::orderByDesc('ngay_xuat_ban')->limit(5)->get();
        return view('shoe.detailblog', compact('post', 'categories', 'latestPosts'));
    }

    public function category($id)
    {
        $category = PostCategory::findOrFail($id);
        $posts = Post::where('chuyen_muc_id', $id)->orderByDesc('ngay_xuat_ban')->paginate(9);
        $categories = PostCategory::where('hoat_dong', 1)->get();
        $latestPosts = Post::orderByDesc('ngay_xuat_ban')->limit(5)->get();
        return view('shoe.blog', compact('posts', 'categories', 'latestPosts', 'category'));
    }
}