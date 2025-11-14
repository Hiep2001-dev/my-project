@extends('shoe.layouts.master')

<body>
    @include('shoe.layouts.header')
    {{-- Navbar --}}
    @include('shoe.layouts.sidebar')
    {{-- Banner --}}
    <div>
        <div>
            <img src="{{ asset('images/collection_banner.jpg') }}" alt="Products">
        </div>
    </div>
    <div class="breadcrumb-shop">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 pd5">
                    <ol class="breadcrumb breadcrumb-arrows">
                        <li>
                            <a href="{{ route('shoe.index') }}">
                                <span>Trang chủ</span>
                            </a>
                        </li>
                        <li>
                            <span><span style="color: #777777">Tin tức</span></span>
                        </li>
                    </ol>
                </div>
            </div>
        </div>
    </div>
    <div class="container">
        <div class="row">
            {{-- Sidebar bài viết mới nhất --}}
            <div class="col-md-3 d-none d-sm-block d-sm-none d-md-block">
                <div class="sidebar-blog">
                    <div class="news-latest">
                        <div class="sidebarblog-title title_block">
                            <h2>Bài viết mới nhất</h2>
                        </div>
                        <div class="list-news-latest layered">
                            @foreach($latestPosts as $post)
                                <div class="item-article clearfix">
                                    <div class="post-image">
                                        <a href="{{ route('blog.show', $post->id) }}">
                                            <img src="{{ $post->hinh_anh_dai_dien ? asset('storage/' . $post->hinh_anh_dai_dien) : asset('images/no-image.png') }}"
                                                alt="{{ $post->tieu_de }}">
                                        </a>
                                    </div>
                                    <div class="post-content">
                                        <h3>
                                            <a href="{{ route('blog.show', $post->id) }}">{{ $post->tieu_de }}</a>
                                        </h3>
                                        <span class="author">
                                            <a href="#">{{ $post->tacGia->ten ?? 'Ẩn danh' }}</a>
                                        </span>
                                        <span class="date">
                                            {{ \Carbon\Carbon::parse($post->ngay_xuat_ban ?? $post->ngay_tao)->format('d.m.Y') }}
                                        </span>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                    {{-- Danh mục blog --}}
                   @include('shoe.layouts.sidebar-blog')
            {{-- Nội dung blog --}}
            <div class="col-md-9 col-sm-12 col-xs-12">
                <div class="heading-page clearfix">
                    <h1>Tin tức</h1>
                </div>
                <div class="blog-content">
                    <div class="list-article-content blog-posts">
                        @foreach($posts as $post)
                            <article class="blog-loop">
                                <div class="blog-post row">
                                    <div class="col-md-4 col-xs-12 col-sm-12">
                                        <a href="{{ route('blog.show', $post->id) }}" class="blog-post-thumbnail"
                                            title="{{ $post->tieu_de }}">
                                            <img src="{{ $post->hinh_anh_dai_dien ? asset('storage/' . $post->hinh_anh_dai_dien) : asset('images/no-image.png') }}"
                                                alt="{{ $post->tieu_de }}">
                                        </a>
                                    </div>
                                    <div class="col-md-8 col-xs-12 col-sm-12">
                                        <h3 class="blog-post-title">
                                            <a href="{{ route('blog.show', $post->id) }}"
                                                title="{{ $post->tieu_de }}">{{ $post->tieu_de }}</a>
                                        </h3>
                                        <div class="blog-post-meta">
                                            <span class="author vcard">Người viết:
                                                {{ $post->tacGia->ten ?? 'Ẩn danh' }}</span>
                                            <span class="date">
                                                <time pubdate="" datetime="{{ $post->ngay_xuat_ban ?? $post->ngay_tao }}">
                                                    {{ \Carbon\Carbon::parse($post->ngay_xuat_ban ?? $post->ngay_tao)->format('d.m.Y') }}
                                                </time>
                                            </span>
                                        </div>
                                        <p class="entry-content">{{ $post->tom_tat }}</p>
                                    </div>
                                </div>
                            </article>
                        @endforeach
                    </div>
                    <div class="sortpagibar pagi clearfix text-center">
                        <div id="pagination" class="clearfix">
                            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                {{ $posts->links('pagination::bootstrap-5') }}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    {{-- Gallery và footer giữ nguyên --}}
    @include('shoe.layouts.footer')
</body>