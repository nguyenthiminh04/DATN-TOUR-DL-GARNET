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
                        <strong itemprop="name">Đăng nhập tài khoản</strong>
                        <meta itemprop="position" content="2" />
                    </li>

                </ul>
            </div>
        </div>
    </div>
</section>
<div class="container margin-bottom-30">
    <h1 class="title-head"><span>Đăng nhập tài khoản</span></h1>
    <div class="row">
        <div class="col-md-6 col-sm-6">
            <div class="page-login margin-bottom-30">
                <div id="login">
                    <span>
                        Nếu bạn đã có tài khoản, đăng nhập tại đây.
                    </span>
                    <div class="social-login margin-bottom-10 margin-top-15">
                        <script>function loginFacebook() { var a = { client_id: "947410958642584", redirect_uri: "https://store.mysapo.net/account/facebook_account_callback", state: JSON.stringify({ redirect_url: window.location.href }), scope: "email", response_type: "code" }, b = "https://www.facebook.com/v3.2/dialog/oauth" + encodeURIParams(a, !0); window.location.href = b } function loginGoogle() { var a = { client_id: "997675985899-pu3vhvc2rngfcuqgh5ddgt7mpibgrasr.apps.googleusercontent.com", redirect_uri: "https://store.mysapo.net/account/google_account_callback", scope: "email profile https://www.googleapis.com/auth/userinfo.email https://www.googleapis.com/auth/userinfo.profile", access_type: "online", state: JSON.stringify({ redirect_url: window.location.href }), response_type: "code" }, b = "https://accounts.google.com/o/oauth2/v2/auth" + encodeURIParams(a, !0); window.location.href = b } function encodeURIParams(a, b) { var c = []; for (var d in a) if (a.hasOwnProperty(d)) { var e = a[d]; null != e && c.push(encodeURIComponent(d) + "=" + encodeURIComponent(e)) } return 0 == c.length ? "" : (b ? "?" : "") + c.join("&") }</script>
                        <a href="javascript:void(0)" class="social-login--facebook" onclick="loginFacebook()"><img
                                width="129px" height="37px" alt="facebook-login-button"
                                src="http://bizweb.dktcdn.net/assets/admin/images/login/fb-btn.svg"></a>
                        <a href="javascript:void(0)" class="social-login--google" onclick="loginGoogle()"><img
                                width="129px" height="37px" alt="google-login-button"
                                src="http://bizweb.dktcdn.net/assets/admin/images/login/gp-btn.svg"></a>
                    </div>
                    <form method="post" action="https://ant-du-lich.mysapo.net/account/login" id="customer_login"
                        accept-charset="UTF-8"><input name="FormType" type="hidden" value="customer_login" /><input
                            name="utf8" type="hidden" value="true" />
                        <div class="form-signup">

                        </div>
                        <div class="form-signup clearfix">
                            <fieldset class="form-group">
                                <label>Email<span class="required">*</span></label>
                                <input type="email" class="form-control form-control-lg" value="" name="email"
                                    id="customer_email" placeholder="Email" required data-validation="email"
                                    pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,63}$"
                                    data-validation-error-msg="Email sai định dạng" />
                            </fieldset>
                            <fieldset class="form-group">
                                <label>Mật khẩu<span class="required">*</span></label>
                                <input type="password" class="form-control form-control-lg" value="" name="password"
                                    id="customer_password" data-validation-error-msg="Không được để trống"
                                    data-validation="required" placeholder="Mật khẩu" />
                            </fieldset>
                            <div class="pull-xs-left" style="margin-top: 15px;">
                                <input class="btn btn-style btn-blues" type="submit" value="Đăng nhập" />
                                <a href="register.html" class="btn-link-style btn-register"
                                    style="margin-left: 20px;color:#007FF0;text-decoration: underline; ">Đăng ký</a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <div class="col-md-6 col-sm-6">
            <div id="recover-password" class="form-signup">
                <span>
                    Bạn quên mật khẩu? Nhập địa chỉ email để lấy lại mật khẩu qua email.
                </span>
                <form method="post" action="https://ant-du-lich.mysapo.net/account/recover"
                    id="recover_customer_password" accept-charset="UTF-8"><input name="FormType" type="hidden"
                        value="recover_customer_password" /><input name="utf8" type="hidden" value="true" />
                    <div class="form-signup aaaaaaaa">

                    </div>

                    <div class="form-signup clearfix">
                        <fieldset class="form-group">
                            <label>Email<span class="required">*</span></label>
                            <input type="email" class="form-control form-control-lg" value="" name="Email"
                                id="recover-email" placeholder="Email" data-validation="email"
                                pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,63}$"
                                data-validation-error-msg="Email sai định dạng" />
                        </fieldset>
                    </div>
                    <div class="action_bottom">
                        <input class="btn btn-style btn-blues" style="margin-top: 15px;" type="submit"
                            value="Lấy lại mật khẩu" />
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

@endsection

@section('script')
<script type="text/javascript">
    function showRecoverPasswordForm() {
        document.getElementById('recover-password').style.display = 'block';
        document.getElementById('login').style.display = 'none';
    }

    function hideRecoverPasswordForm() {
        document.getElementById('recover-password').style.display = 'none';
        document.getElementById('login').style.display = 'block';
    }


</script>
@endsection