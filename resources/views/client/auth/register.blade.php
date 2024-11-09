@extends('client.layouts.app')

@section('style')
@endsection

@section('content')
    <section class="bread-crumb margin-bottom-10">
        <div class="container">
            <div class="row">
                <div class="col-xs-12">
                    <ul class="breadcrumb" itemscope itemtype="https://schema.org/BreadcrumbList">
                        <li class="home" itemprop="itemListElement" itemscope itemtype="https://schema.org/ListItem">
                            <a itemprop="item" href="../index.html" title="Trang chủ">
                                <span itemprop="name">Trang chủ</span>
                                <meta itemprop="position" content="1" />
                            </a>
                            <span><i class="fa fa-angle-right"></i></span>
                        </li>

                        <li itemprop="itemListElement" itemscope itemtype="https://schema.org/ListItem">
                            <strong itemprop="name">Đăng ký tài khoản</strong>
                            <meta itemprop="position" content="2" />
                        </li>

                    </ul>
                </div>
            </div>
        </div>
    </section>
    <div class="container mr-bottom-20">
        <h1 class="title-head text-center">Đăng ký tài khoản</h1>
        <div class="row">
            <div class="col-lg-12">
                <div class="page-login">
                    <div id="login">
                        <div class="text-center"><span>Nếu chưa có tài khoản vui lòng đăng ký tại đây</span></div>
                        <div class="social-login text-center margin-bottom-10 margin-top-15">
                            <script>
                                function loginFacebook() {
                                    var a = {
                                            client_id: "947410958642584",
                                            redirect_uri: "https://store.mysapo.net/account/facebook_account_callback",
                                            state: JSON.stringify({
                                                redirect_url: window.location.href
                                            }),
                                            scope: "email",
                                            response_type: "code"
                                        },
                                        b = "https://www.facebook.com/v3.2/dialog/oauth" + encodeURIParams(a, !0);
                                    window.location.href = b
                                }

                                function loginGoogle() {
                                    var a = {
                                            client_id: "997675985899-pu3vhvc2rngfcuqgh5ddgt7mpibgrasr.apps.googleusercontent.com",
                                            redirect_uri: "https://store.mysapo.net/account/google_account_callback",
                                            scope: "email profile https://www.googleapis.com/auth/userinfo.email https://www.googleapis.com/auth/userinfo.profile",
                                            access_type: "online",
                                            state: JSON.stringify({
                                                redirect_url: window.location.href
                                            }),
                                            response_type: "code"
                                        },
                                        b = "https://accounts.google.com/o/oauth2/v2/auth" + encodeURIParams(a, !0);
                                    window.location.href = b
                                }

                                function encodeURIParams(a, b) {
                                    var c = [];
                                    for (var d in a)
                                        if (a.hasOwnProperty(d)) {
                                            var e = a[d];
                                            null != e && c.push(encodeURIComponent(d) + "=" + encodeURIComponent(e))
                                        } return 0 == c.length ? "" : (b ? "?" : "") + c.join("&")
                                }
                            </script>
                            <a href="javascript:void(0)" class="social-login--facebook" onclick="loginFacebook()"><img
                                    width="129px" height="37px" alt="facebook-login-button"
                                    src="http://bizweb.dktcdn.net/assets/admin/images/login/fb-btn.svg"></a>
                            <a href="javascript:void(0)" class="social-login--google" onclick="loginGoogle()"><img
                                    width="129px" height="37px" alt="google-login-button"
                                    src="http://bizweb.dktcdn.net/assets/admin/images/login/gp-btn.svg"></a>
                        </div>
                        <form method="post" action="https://ant-du-lich.mysapo.net/account/register" id="customer_register"
                            accept-charset="UTF-8"><input name="FormType" type="hidden" value="customer_register" /><input
                                name="utf8" type="hidden" value="true" /><input type="hidden"
                                id="Token-22b3be00dbc5450788f2beb6110b1b1f" name="Token" />
                            <script src="../../www.google.com/recaptcha/apif78f.js?render=6Ldtu4IUAAAAAMQzG1gCw3wFlx_GytlZyLrXcsuK"></script>
                            <script>
                                grecaptcha.ready(function() {
                                    grecaptcha.execute("6Ldtu4IUAAAAAMQzG1gCw3wFlx_GytlZyLrXcsuK", {
                                        action: "customer_register"
                                    }).then(function(token) {
                                        document.getElementById("Token-22b3be00dbc5450788f2beb6110b1b1f").value = token
                                    });
                                });
                            </script>
                            <div class="form-signup">

                            </div>
                            <div class="form-signup clearfix">
                                <div class="row">
                                    <div class="col-md-6 col-md-offset-3">
                                        <div class="row">
                                            <div class="col-md-12">
                                                <fieldset class="form-group">
                                                    <label>Họ<span class="required">*</span></label>
                                                    <input type="text" class="form-control form-control-lg"
                                                        value="" name="lastName" id="lastName" placeholder=""
                                                        required data-validation-error-msg="Không được để trống"
                                                        data-validation="required">
                                                </fieldset>
                                            </div>
                                            <div class="col-md-12">
                                                <fieldset class="form-group">
                                                    <label>Tên<span class="required">*</span></label>
                                                    <input type="text" class="form-control form-control-lg"
                                                        value="" name="firstName" id="firstName" placeholder=""
                                                        required data-validation-error-msg="Không được để trống"
                                                        data-validation="required">
                                                </fieldset>
                                            </div>
                                            <div class="col-md-12">
                                                <fieldset class="form-group">
                                                    <label>Email<span class="required">*</span></label>
                                                    <input type="email" class="form-control form-control-lg"
                                                        data-validation="email"
                                                        pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,63}$"
                                                        data-validation-error-msg="Email sai định dạng" value=""
                                                        name="email" id="email" placeholder="" required="" />
                                                </fieldset>
                                            </div>
                                            <div class="col-md-12">
                                                <fieldset class="form-group">
                                                    <label>Mật khẩu<span class="required">*</span></label>
                                                    <input type="password" class="form-control form-control-lg"
                                                        value="" name="password" id="password" placeholder=""
                                                        required data-validation-error-msg="Không được để trống"
                                                        data-validation="required">
                                                </fieldset>
                                            </div>
                                        </div>
                                        <div class="col-xs-12 text-center" style="margin-top:15px; padding: 0">
                                            <button type="submit" value="Đăng ký" class="btn btn-style btn-blues">Đăng
                                                ký</button>
                                            <a href="login.html" class="btn-link-style btn-register"
                                                style="margin-left: 20px;color:#007FF0;text-decoration: underline; ">Đăng
                                                nhập</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('script')
@endsection
