@extends('shoe.layouts.master')
@section('title', 'Đánh giá sản phẩm')
@section('content')

@include('shoe.layouts.header')
@include('shoe.layouts.sidebar')
<div class="container py-4">
    <h4>Đánh giá sản phẩm: {{ $product->ten }}</h4>
    <form action="{{ route('review.store', [$product->id, $variation ? $variation->id : null]) }}" method="POST">
        @csrf
        <div class="mb-3">
            <label class="form-label">Tiêu đề</label>
            <input type="text" name="tieu_de" class="form-control" value="{{ old('tieu_de') }}">
        </div>
        <div class="mb-3">
            <label class="form-label">Nội dung</label>
            <textarea name="noi_dung" class="form-control" required>{{ old('noi_dung') }}</textarea>
        </div>
        <div class="mb-3">
            <label class="form-label">Số sao</label>
            <select name="diem" class="form-select" required>
                @for($i=5;$i>=1;$i--)
                    <option value="{{ $i }}">{{ $i }} sao</option>
                @endfor
            </select>
        </div>
        <button type="submit" class="btn btn-primary">Gửi đánh giá</button>
    </form>
</div>
@include('shoe.layouts.footer')
@endsection