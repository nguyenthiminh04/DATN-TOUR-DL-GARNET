<nav>
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <ul id="nav" class="nav container">
                    <li class="nav-item"><a class="nav-link" href="gioi-thieu.html">Giới thiệu</a></li>
                    @foreach ($categoryes as $category)
                        <li class="nav-item {{ $category->children->isNotEmpty() ? 'has-mega' : '' }}">
                            <a class="nav-link" href="{{ url($category->slug) }}">
                                {{ $category->name }}
                                @if ($category->children->isNotEmpty())
                                    <i class="fa fa-angle-right"></i>
                                @endif
                            </a>

                            @if ($category->children->isNotEmpty())
                                <div class="mega-content">
                                    <div class="level0-wrapper2">
                                        <div class="nav-block nav-block-center">
                                            <ul class="level0">
                                                @foreach ($category->children as $child)
                                                    <li class="level1 parent item">
                                                        <h2 class="h4">
                                                            <a href="{{ url($child->slug) }}">
                                                                <span>{{ $child->name }}</span>
                                                            </a>
                                                        </h2>
                                                        @if ($child->children->isNotEmpty())
                                                            <ul class="level1">
                                                                @foreach ($child->children as $subChild)
                                                                    <li class="level2">
                                                                        <a href="{{ url($subChild->slug) }}">
                                                                            <span>{{ $subChild->name }}</span>
                                                                        </a>
                                                                    </li>
                                                                @endforeach
                                                            </ul>
                                                        @endif
                                                    </li>
                                                @endforeach
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            @endif
                        </li>
                    @endforeach

                    <!-- Các menu tĩnh -->
                    <li class="nav-item"><a class="nav-link" href="gioi-thieu.html">Giới thiệu</a></li>
                    <li class="nav-item"><a class="nav-link" href="dich-vu-tour.html">Dịch vụ tour</a></li>
                    <li class="nav-item"><a class="nav-link" href="cam-nang-du-lich.html">Cẩm nang du
                            lịch</a></li>

                    <li class="nav-item"><a class="nav-link" href="lien-he.html">Liên hệ</a></li>
                    <li class="nav-item"><a class="nav-link" href="{{ route('favorite.index') }}">Yêu
                            Thích</a></li>
                </ul>

            </div>
        </div>
    </div>
</nav>