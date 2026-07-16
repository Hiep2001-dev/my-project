@extends('shoe.layouts.master')
@section('title', 'Đánh giá sản phẩm')
@section('content')

@include('shoe.layouts.header')
@include('shoe.layouts.sidebar')

<div class="container py-4">
    <h4>Đánh giá cho sản phẩm: {{ $product->ten }}</h4>
    @forelse($reviews as $review)
        <div class="border rounded p-3 mb-3">
            <div>
                <strong>{{ $review->nguoiDung->ho_ten ?? 'Ẩn danh' }}</strong>
                <span class="text-warning">
                    @for($i=1;$i<=5;$i++)
                        <i class="bi bi-star{{ $i <= $review->diem ? '-fill' : '' }}"></i>
                    @endfor
                </span>
                <span class="text-muted ms-2">{{ $review->ngay_tao }}</span>
            </div>
            @if($review->tieu_de)
                <div class="fw-bold">{{ $review->tieu_de }}</div>
            @endif
            <div>{{ $review->noi_dung }}</div>
        </div>
    @empty
        <div>Chưa có đánh giá nào cho sản phẩm này.</div>
    @endforelse
</div>
@include('shoe.layouts.footer')
@endsection