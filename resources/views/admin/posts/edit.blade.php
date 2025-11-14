@extends('admin.layouts.master')
@section('content')
<div class="container mt-4">
    <h3>Cập nhật bài viết</h3>
    <form action="{{ route('admin.posts.update', $post->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="mb-3">
            <label for="tieu_de" class="form-label">Tiêu đề <span class="text-danger">*</span></label>
            <input type="text" name="tieu_de" id="tieu_de" class="form-control" value="{{ old('tieu_de', $post->tieu_de) }}" required>
            @error('tieu_de')
                <div class="text-danger small">{{ $message }}</div>
            @enderror
        </div>
        <div class="mb-3">
            <label for="tom_tat" class="form-label">Tóm tắt</label>
            <textarea name="tom_tat" id="tom_tat" class="form-control" rows="2">{{ old('tom_tat', $post->tom_tat) }}</textarea>
            @error('tom_tat')
                <div class="text-danger small">{{ $message }}</div>
            @enderror
        </div>
        <div class="mb-3">
            <label for="noi_dung" class="form-label">Nội dung <span class="text-danger">*</span></label>
            <textarea name="noi_dung" id="noi_dung" class="form-control" rows="6" required>{{ old('noi_dung', $post->noi_dung) }}</textarea>
            @error('noi_dung')
                <div class="text-danger small">{{ $message }}</div>
            @enderror
        </div>
        <div class="mb-3">
            <label for="hinh_anh_dai_dien" class="form-label">Hình ảnh đại diện</label>
            <input type="file" name="hinh_anh_dai_dien" id="hinh_anh_dai_dien" class="form-control" accept="image/*">
            @if($post->hinh_anh_dai_dien)
                <div class="mt-2">
                    <img src="{{ asset($post->hinh_anh_dai_dien) }}" alt="Hình đại diện" style="max-width:120px;">
                </div>
            @endif
            @error('hinh_anh_dai_dien')
                <div class="text-danger small">{{ $message }}</div>
            @enderror
        </div>
        <div class="mb-3">
            <label for="chuyen_muc_id" class="form-label">Chuyên mục</label>
            <select name="chuyen_muc_id" id="chuyen_muc_id" class="form-control">
                <option value="">-- Chọn chuyên mục --</option>
                @foreach($categories as $cat)
                    <option value="{{ $cat->id }}" {{ old('chuyen_muc_id', $post->chuyen_muc_id) == $cat->id ? 'selected' : '' }}>
                        {{ $cat->ten }}
                    </option>
                @endforeach
            </select>
            @error('chuyen_muc_id')
                <div class="text-danger small">{{ $message }}</div>
            @enderror
        </div>
        <div class="mb-3">
            <label for="tac_gia_id" class="form-label">Tác giả</label>
            <select name="tac_gia_id" id="tac_gia_id" class="form-control">
                <option value="">-- Chọn tác giả --</option>
                @foreach($authors as $author)
                    <option value="{{ $author->id }}" {{ old('tac_gia_id', $post->tac_gia_id) == $author->id ? 'selected' : '' }}>
                        {{ $author->ten }}
                    </option>
                @endforeach
            </select>
            @error('tac_gia_id')
                <div class="text-danger small">{{ $message }}</div>
            @enderror
        </div>
        <div class="mb-3">
            <label for="trang_thai" class="form-label">Trạng thái</label>
            <select name="trang_thai" id="trang_thai" class="form-control">
                <option value="nhap" {{ old('trang_thai', $post->trang_thai) == 'nhap' ? 'selected' : '' }}>Nháp</option>
                <option value="xuat_ban" {{ old('trang_thai', $post->trang_thai) == 'xuat_ban' ? 'selected' : '' }}>Xuất bản</option>
                <option value="luu_tru" {{ old('trang_thai', $post->trang_thai) == 'luu_tru' ? 'selected' : '' }}>Lưu trữ</option>
            </select>
            @error('trang_thai')
                <div class="text-danger small">{{ $message }}</div>
            @enderror
        </div>
        <div class="mb-3">
            <label for="ngay_xuat_ban" class="form-label">Ngày xuất bản</label>
            <input type="date" name="ngay_xuat_ban" id="ngay_xuat_ban" class="form-control" value="{{ old('ngay_xuat_ban', $post->ngay_xuat_ban) }}">
            @error('ngay_xuat_ban')
                <div class="text-danger small">{{ $message }}</div>
            @enderror
        </div>
        <button type="submit" class="btn btn-primary">Cập nhật</button>
        <a href="{{ route('admin.posts.index') }}" class="btn btn-secondary">Quay lại</a>
    </form>
</div>
@endsection