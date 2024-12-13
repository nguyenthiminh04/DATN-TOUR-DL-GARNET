@if ($tours->isEmpty())
    <p style="text-align: center; font-size: 20px; font-weight: bold;">Không có tour nào phù hợp.</p>
@else
    @foreach ($tours as $tour)
        <div class="col-100 col-xs-6 col-sm-4 col-md-3 col-lg-3">
            <div class="product-box">
                <div class="product-thumbnail">
                    <a href="{{ route('detail', $tour->id) }}" title="{{ $tour->title }}">
                        <img src="{{ Storage::url($tour->image) }}" alt="{{ $tour->title }}">
                    </a>
                </div>
                <div class="product-info a-left">
                    <h3 class="product-name">
                        <a href="{{ route('detail', $tour->id) }}" title="{{ $tour->title }}">
                            {{ $tour->name }} [{{ $tour->journeys }}]
                        </a>
                    </h3>
                    <div class="clearfix">
                        <div class="box-prices">
                            <div class="price-box clearfix">
                                <div class="special-price f-left">
                                    <span class="price product-price">
                                        {{ number_format($tour->price_old * (1 - $tour->sale / 100), 0, '', '.') }} VNĐ
                                    </span>
                                </div>
                                <div class="old-price">
                                    <span class="price product-price-old">
                                        {{ number_format($tour->price_old, 0, '', '.') }} VNĐ
                                    </span>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="box-date-tour">
                        <ul class="ct_course_list">
                            <li class="clearfix">
                                <div class="ulimg">
                                    <img src="http://bizweb.dktcdn.net/100/299/077/themes/642224/assets/tag_icon_4.svg"
                                        alt="Khởi hành" />
                                </div>
                                Khởi hành: {{ $tour->start_date }} - {{ $tour->end_date }}
                            </li>
                            <li class="clearfix">
                                <div class="ulimg">
                                    <img src="http://bizweb.dktcdn.net/100/299/077/themes/642224/assets/tag_icon_5.svg"
                                        alt="Thời gian" />
                                </div>
                                Thời gian: {{ $tour->schedule }}
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    @endforeach
@endif
