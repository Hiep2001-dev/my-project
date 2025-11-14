 <div class="menu-blog">
                        <div class="group-menu">
                            <div class="sidebarblog-title title_block">
                                <h2>Danh mục blog<span class="fa fa-angle-down"></span></h2>
                            </div>
                            <div class="layered-category">
                                <ul class="menuList-links">
                                    <li><a href="{{ route('shoe.index') }}" title="Trang chủ"><span>Trang chủ</span></a>
                                    </li>
                                    @foreach($categories as $cat)
                                        <li>
                                            <a href="{{ route('blog.category', $cat->id) }}" title="{{ $cat->ten }}">
                                                <span>{{ $cat->ten }}</span>
                                            </a>
                                        </li>
                                    @endforeach
                                    <li><a href="{{ route('shoe.contact') }}" title="Liên hệ"><span>Liên hệ</span></a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>