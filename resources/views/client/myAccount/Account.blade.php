@extends('client.layouts.app')

@section('content')
    {{-- @if(session('success'))
        <p>{{ session('success') }}</p>
    @endif

    @if($errors->any())
        <ul>
            @foreach($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    @endif --}}

    <section class="signup page_customer_account">
        <style>
            .hidden {
                display: none;
            }

            .title-info.active {
                font-weight: bold;
                color: #f80000;
            }

            .title-info.active {
                background-color: #007bff;
                color: #fff;
                font-weight: bold;
                border-radius: 4px;
                padding: 5px 10px;
            }
        </style>

        <div class="container">
            <div class="row">
                <!-- Menu bên trái -->
                <div class="col-xs-12 col-sm-12 col-lg-2 col-left-ac">
                    <div class="block-account">
                        <h5 class="title-account">Trang tài khoản</h5>
                        <p>Xin chào, <span style="color:#1ba0e2;">{{ $user->name }}</span>&nbsp;!</p>
                        <ul>
                            <li>
                                <a class="title-info" href="javascript:void(0);" data-target="#account-info">Thông tin tài
                                    khoản</a>
                            </li>
                            <li>
                                <a class="title-info" href="javascript:void(0);" data-target="#orders">Đơn hàng của bạn</a>
                            </li>
                            <li>
                                <a class="title-info" href="javascript:void(0);" data-target="#change-password">Đổi mật
                                    khẩu</a>
                            </li>
                            <li>
                                <a class="title-info" href="javascript:void(0);" data-target="#addresses">Sổ địa chỉ</a>
                            </li>
                        </ul>
                    </div>
                </div>

                <!-- Nội dung chính -->
                <div class="col-xs-12 col-sm-12 col-lg-10 col-right-ac">
                    <!-- Thông tin tài khoản -->
                    <div id="account-info" class="content-section" style="display: none;">
                        <h1 class="title-head">Thông tin tài khoản</h1>
                        <div class="form-signup name-account m992">
                            <table class="table table-cart table-order" id="my-orders-table">
                                <thead class="thead-default">
                                    <tr>
                                        <th>Họ tên</th>
                                        <th>Email</th>
                                        <th>Số điện thoại</th>
                                        <th>Địa chỉ</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>
                                            <p>{{ $user->name }}</p>
                                        </td>
                                        <td>
                                            <p>{{ $user->email }}</p>
                                        </td>
                                        <td>
                                            <p>{{ $user->phone ?? 'Bạn chưa cập nhật số điện thoại' }}</p>
                                        </td>
                                        <td>
                                            <p>{{ $user->address ?? 'Bạn chưa cập nhật địa chỉ' }}</p>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>

                    <div id="orders" class="content-section" style="display: none;">
                        <h1 class="title-head">Đơn hàng của bạn</h1>
                        <div class="my-account">
                            <div class="dashboard">
                                <div class="recent-orders">
                                    <div class="table-responsive tab-all">
                                        <table class="table table-cart table-order" id="my-orders-table">
                                            <thead class="thead-default">
                                                <tr>
                                                    <th>Tour</th>
                                                    <th>Các điểm tours</th>
                                                    <th>Điểm xuất phát</th>
                                                    {{-- <th>Ngày đặt</th> --}}
                                                    <th>Ngày bắt đầu</th>
                                                    <th>TT đơn hàng</th>
                                                    <th>Tổng tiền</th>
                                                    <th>Di chuyển</th>
                                                    <th>Hành động</th>
                                                </tr>
                                            </thead>

                                            <tbody>

                                                <tr>
                                                    @if ($bookTours->isEmpty())
                                                        <td colspan="6">
                                                            <p>Không có đơn hàng nào.</p>
                                                        </td>
                                                    @else
                                                </tr>
                                                @foreach ($bookTours as $bookTour)
                                                    <tr>
                                                        <td>{{$bookTour->tour->name}}</td>
                                                        <td>{{$bookTour->tour->journeys}}</td>
                                                        <td>{{$bookTour->tour->starting_gate}}</td>
                                                        <td>{{$bookTour->start_date}}</td>
                                                        <td>{{$bookTour->status->name ?? 'chưa cập nhật'}}</td>
                                                        <td>{{number_format($bookTour->total_money)}} đ</td>
                                                        <td>{{$bookTour->tour->move_method}}</td>
                                                        <td><a href="" class="btn btn-click btn-success">Xem chi tiết</a></td>
                                                    </tr>
                                                @endforeach
                                                @endif
                                            </tbody>
                                        </table>

                                    </div>
                                    <div
                                        class="paginate-pages pull-right page-account text-right col-xs-12 col-sm-12 col-md-12 col-lg-12">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    @if(session('success'))
                        <div class="alert alert-success alert-dismissible" role="alert">
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                            <strong>Thành công!</strong> {{ session('success') }}
                        </div>
                    @endif

                    @if($errors->any())
                        <div class="alert alert-danger alert-dismissible" role="alert">
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                            <strong>Lỗi!</strong>
                            <ul>
                                @foreach($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    <div id="change-password" class="content-section" style="display: none;">
                        <h1 class="title-head">Đổi mật khẩu</h1>
                        <div class="page-login">
                            <form method="POST" action="{{ route('user.changePassword') }}" id="change_customer_password"
                                accept-charset="UTF-8">
                                @csrf
                                <p>
                                    Để đảm bảo tính bảo mật vui lòng đặt mật khẩu với ít nhất 8 kí tự
                                </p>
                                <div class="form-signup clearfix">
                                    <fieldset class="form-group">
                                        <label for="current_password">Mật khẩu cũ <span class="error">*</span></label>
                                        <input type="password" placeholder="Mật khẩu cũ" name="current_password"
                                             class="form-control form-control-lg">
                                    </fieldset>
                                    <fieldset class="form-group">
                                        <label for="new_password">Mật khẩu mới <span class="error">*</span></label>
                                        <input type="password" placeholder="Mật khẩu mới" name="new_password"
                                             class="form-control form-control-lg">
                                    </fieldset>
                                    <fieldset class="form-group">
                                        <label for="new_password_confirmation">Xác nhận lại mật khẩu <span class="error">*</span></label>
                                        <input type="password" placeholder="Xác nhận lại mật khẩu" name="new_password_confirmation" class="form-control form-control-lg">
                                    </fieldset>
                                    <button type="submit" class="button btn-edit-addr btn btn-blues btn-more margin-top-15"><i
                                            class="hoverButton"></i>Đặt lại mật khẩu</button>
                                </div>
                            </form>
                        </div>
                    </div>

                    <div id="addresses" class="content-section" style="display: none;">
                        <h1 class="title-head">Địa chỉ của bạn</h1>
                        {{-- <p class="btn-row">
                            <button class="btn-edit-addr btn btn-blues btn-more" type="button">Thêm địa chỉ</button>
                        </p>
                        <div id="add_address" class="form-list modal_address modal">
                            <div class="btn-close closed_pop"><i class="fa fa-times"></i></div>
                            <h2 class="title_pop">
                                Thêm địa chỉ mới
                            </h2>
                            <form method="post" action="" id="customer_address" accept-charset="UTF-8"><input
                                    name="FormType" type="hidden" value="customer_address" /><input name="utf8"
                                    type="hidden" value="true" />
                                <div class="pop_bottom">
                                    <div class="form_address">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="field">
                                                    <fieldset class="form-group">
                                                        <label>Họ tên</label>
                                                        <input type="text" placeholder="Họ tên" name="FullName"
                                                            class="form-control" value=""
                                                            autocapitalize="words">
                                                    </fieldset>
                                                    <p class="error-msg"></p>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="field">
                                                    <fieldset class="form-group">
                                                        <label>Số điện thoại</label>
                                                        <input type="number" placeholder="Số điện thoại"
                                                            class="form-control" id="Phone" pattern="\d+"
                                                            name="Phone" maxlength="12" value="">
                                                    </fieldset>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="field">
                                                    <fieldset class="form-group">
                                                        <label>Công ty</label>
                                                        <input type="text" placeholder="Công ty" class="form-control"
                                                            name="Company" value="">
                                                    </fieldset>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="field">
                                                    <fieldset class="form-group">
                                                        <label>Địa chỉ</label>
                                                        <input type="text" placeholder="Địa chỉ" class="form-control"
                                                            name="Address1" value="">
                                                    </fieldset>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="field">
                                            <fieldset class="form-group select-field">
                                                <label>Quốc gia</label>
                                                <select name="Country" class="form-control vn-fix add" id="mySelect1"
                                                    data-default="Việt Nam">
                                                    <option value="Tunisia">Tunisia</option>
                                                    <option value="Turkey">Turkey</option>
                                                    <option value="China">China</option>
                                                    <option value="Turkmenistan">Turkmenistan</option>
                                                    <option value="Tuvalu">Tuvalu</option>
                                                    <option value="Uganda">Uganda</option>
                                                    <option value="Ukraine">Ukraine</option>
                                                    <option value="United Arab Emirates">United Arab Emirates</option>
                                                    <option value="United Kingdom">United Kingdom</option>
                                                    <option value="United States">United States</option>
                                                    <option value="Uruguay">Uruguay</option>
                                                    <option value="Uzbekistan">Uzbekistan</option>
                                                    <option value="Vanuatu">Vanuatu</option>
                                                    <option value="Vatican">Vatican</option>
                                                    <option value="Venezuela">Venezuela</option>
                                                    <option value="Vietnam">Vietnam</option>
                                                    <option value="Wales">Wales</option>
                                                    <option value="Western Sahara">Western Sahara</option>
                                                    <option value="Yemen">Yemen</option>
                                                    <option value="Zambia">Zambia</option>
                                                    <option value="Zimbabwe">Zimbabwe</option>
                                                    <option value="Taiwan">Taiwan</option>
                                                </select>
                                            </fieldset>
                                        </div>
                                        <div class="group-country">
                                            <fieldset class="form-group select-field not-vn">
                                                <label>Tỉnh thành</label>
                                                <select name="Province" value="" class="form-control add"
                                                    id="mySelect2"></select>
                                            </fieldset>
                                            <fieldset class="form-group select-field not-vn">
                                                <label>Quận huyện</label>
                                                <select name="District" class="form-control add" value=""
                                                    id="mySelect3"></select>
                                            </fieldset>
                                            <fieldset class="form-group select-field not-vn">
                                                <label>Phường xã</label>
                                                <select name="Ward" class="form-control add" value=""
                                                    id="mySelect4"></select>
                                            </fieldset>
                                        </div>
                                        <div class="field">
                                            <fieldset class="form-group">
                                                <label>Mã Zip</label>
                                                <input type="text" placeholder="Mã Zip" class="form-control"
                                                    name="Zip" value="">
                                            </fieldset>
                                        </div>
                                    </div>
                                    <div class="checkbox margin-bottom-10">
                                        <label class="c-input c-checkbox" style="padding-left: 20px;">
                                            <input type="checkbox" id="address_default_address_" name="IsDefault"
                                                value="true">
                                            <span class="c-indicator">Đặt là địa chỉ mặc định?</span>
                                        </label>
                                    </div>
                                    <div class="btn-row">
                                        <button class="btn btn-lg btn-dark-address btn-outline article-readmore btn-close"
                                            type="button"><span>Hủy</span></button>
                                        <button class="btn btn-lg btn-submit btn-blues" id="addnew"
                                            type="submit"><span>Thêm địa chỉ</span></button>
                                    </div>
                                </div>
                            </form>
                        </div>
                        end? --}}
                        <button class="btn-edit-addr btn btn-blues btn-more" type="button" data-toggle="modal" data-target="#addAddressModal">
                            Thêm địa chỉ
                        </button>
                        <div id="addAddressModal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="addAddressLabel">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h4 class="modal-title align-items-end justify-content-center" id="addAddressLabel">Thêm địa chỉ mới</h4>
                                    </div>
                                    <div class="modal-body">
                                        <form method="post" action="{{route('user.address')}}" id="customer_address" accept-charset="UTF-8">
                                            @csrf
                                            <input name="FormType" type="hidden" value="customer_address" />
                                            <input name="utf8" type="hidden" value="true" />

                                            <div class="form-group">
                                                <label>Họ tên</label>
                                                <input type="text" placeholder="Họ tên" name="name" class="form-control" value="{{auth()->user()->name}}">
                                                {{-- @error('name')
                                                    <div class="alert alert-danger">{{ $message }}</div>
                                                @enderror --}}
                                            </div>

                                            <div class="form-group">
                                                <label>Số điện thoại</label>
                                                <input type="number" placeholder="Số điện thoại" class="form-control" name="phone" maxlength="12">
                                                {{-- @error('phone')
                                                    <div class="alert alert-danger">{{ $message }}</div>
                                                @enderror --}}
                                            </div>

                                            <div class="form-group">
                                                <label>Địa chỉ</label>
                                                <input type="text" placeholder="Địa chỉ" class="form-control" name="address">
                                            </div>

                                            <div class="form-group">
                                                <label>Mã Zip</label>
                                                <input type="text" placeholder="Mã Zip" class="form-control" name="zip">
                                            </div>

                                            <div class="checkbox">
                                                <label>
                                                    <input type="checkbox" name="IsDefault" value="true"> Đặt là địa chỉ mặc định
                                                </label>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-default" data-dismiss="modal">Hủy</button>
                                                <button type="submit" class="btn btn-primary">Thêm địa chỉ</button>
                                            </div>
                                        </form>
                                    </div>
                                   
                                </div>
                            </div>
                        </div>

                        <div class="row total_address">
                        </div>
                    </div>
                    {{-- end dia chi --}}
                </div>

            </div>
        </div>
        
        <script>

            document.addEventListener("DOMContentLoaded", function() {
                const menuLinks = document.querySelectorAll(".title-info");
                const contentSections = document.querySelectorAll(".content-section");

                menuLinks.forEach(link => {
                    link.addEventListener("click", function() {
                        // alert(this.textContent.trim());
                        contentSections.forEach(section => section.style.display = "none");
                        const targetId = this.getAttribute("data-target");
                        if (targetId) {
                            const targetSection = document.querySelector(targetId);
                            if (targetSection) {
                                targetSection.style.display = "block";
                            }
                        }
                        menuLinks.forEach(menu => menu.classList.remove("active"));
                        this.classList.add("active");
                    });
                });
            });
            //địa chỉ danh sách
            
        </script>
    </section>
@endsection