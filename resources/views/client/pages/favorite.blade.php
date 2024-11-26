@extends('client.layouts.app')
@section('content')
    <div class="container white collections-container margin-bottom-20">
        <div class="white-background">
            <div class="row">
                <div class="col-md-12">
                    <div class="shopping-cart">
                        <div class="visible-md visible-lg">
                            <div class="shopping-cart-table">
                                <div class="row">
                                    <div class="col-md-12">
                                        <h1 class="lbl-shopping-cart lbl-shopping-cart-gio-hang">Giỏ hàng <span>(<span
                                                    class="count_item_pr">0</span> tour)</span></h1>
                                    </div>
                                </div>
                                <div class="row">

                                    <div class="col-md-6 col-md-offset-3">
                                        <div class="cart-empty">
                                            <img src="{{ url('client/bizweb.dktcdn.net/100/299/077/themes/642224/assets/empty-bags6d1d.jpg?1705894518705')}}"
                                                class="img-responsive center-block" alt="Giỏ hàng trống" />
                                            <div class="btn-cart-empty">
                                                <a class="btn btn-default" href="{{route('home')}}" title="Tiếp tục mua sắm">Tiếp
                                                    tục mua sắm</a>
                                            </div>
                                        </div>
                                    </div>

                                    <table>
                                        <thead>
                                            <th>STT</th>
                                            <th>Tên Tour</th>
                                            <th>Ảnh</th>
                                            <th>Giá người lớn</th>
                                            <th>Giá trẻ em</th>
                                            <th>Giá sale</th>
                                            <th>Hành động</th>
                                        </thead>
                                        <tbody>
                                            @foreach ($favotite_tour as $item)
                                                <td>{{$item->name}}</td>
                                            @endforeach
                                        </tbody>
                                    </table>

                                </div>
                            </div>
                        </div>
                        
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
