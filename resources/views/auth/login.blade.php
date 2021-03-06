<!DOCTYPE HTML>
<html>
<head> 
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1" />
<title></title>
<link rel="stylesheet" type="text/css" href="{{ asset('/css/login.css') }}"> 
<script src="{{ asset('/js/jquery.min.js') }}" type="text/javascript"></script>
<script src="{{ asset('/js/login.js') }}" type="text/javascript"></script>
<script src="{{ asset('/js/jquery.mousewheel.min.js') }}"  type="text/javascript"></script>
<script type="text/javascript">
</script>  
</head> 
<body>
<div class="top section"></div>
<!-- container -->
<div id="formbackground" style="position:absolute; width:100%; height:100%; z-index:-1">  
<img src="" height="100%" width="100%" class="backgroundimg"/>  
</div>
<section id="section1" class="section section1">
  <article class="sectionWrapper section1Wrapper fadeInDown">
      <div class="container">
    <div class="login">
        <div class="login-first">
            <div class="login-font1">
                <font style="margin-left:10px; color:#232323">
                    <a class="navbar-brand" href="{{url('/')}}">{{ Cache::get('settings:site_name') }}</a>
                    <a class="navbar-brand" href="{{url('/')}}">{{ Cache::get('settings:site_sub_name') }}</a>
                </font>
            </div>
            <div class="login-font">统一身份认证</div>
            @if (count($errors) > 0)
                <div class="alert alert-danger danger-warning">
                    <strong>Whoops!</strong> There were some problems with your input.
                    <ul>
                    @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                    @endforeach
                    </ul>
                </div>
            @endif 
            <div class="login-input">
                <form  role="form" method="POST" action="{{ url('/auth/login') }}">
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                    <div><font class="font">账号:</font>
                        <input type="text" class="userName"  name="username" value="{{ old('username') }}" placeholder="用户名/邮箱/手机" style="margin-top:1.5%;"></div>
                    <div><font class="font">密码:</font>
                        <input type="password" class="password"  name="password" placeholder="密码"></div>
                     @if ($loginFailed)
                        <script src="//captcha.luosimao.com/static/js/api.js"></script>
                        <div class="form-group verification">
                            <label class="col-md-2 control-label font-title">验证:</label>
                            <font class="col-md-10 verification1" style="">
                                <font class="l-captcha" data-site-key="{{ env('CAPTCHA_SITE_KEY') }}" data-width="100%" style="display:inline-block ; border-radius:10px;"></font>
                            </font>
                        </div>
                        @endif
                        <div><input type="checkbox" class="checkbox">
                            <label>
                            <font class="rememberPassword" name="remember">记住密码</font></label></div>
                    <div class="logIn">
                        <button type="submit" class="button">登录</button>
                        <font class="weChat"><a href="{{ url('/auth/register') }}">注册</a></font>
                        <font class="weChat"><a href="{{ url('/password/phone') }}">忘记密码</a></font>
                        <font class="weChat">
                        <img src="{{ asset('/images/icon24_appwx_logo.png') }}"
                                    onclick="javascript:window.location.href='<?php echo
                                    "https://open.weixin.qq.com/connect/qrconnect?appid=" . env('WECHAT_APPID') .
                                    "&redirect_uri=" . urlencode(url('oauth/wechatCallback?goto=/auth/login')) .
                                    "&response_type=code&scope=snsapi_login&state=" . md5(time()) .
                                    "#wechat_redirect"; ?>'">
                        </font>
                    </div>
                </form>
            </div>

        </div>
    </div>
</div>
 <div class="arrow_down"> <a href="#section6"> <img src="/images/arrow_down.png" width="42px" height="24px" alt="arrow_down"> </a> </div>
  </article>
</section>
<section id="section6" class="section section6">
  <article class="sectionWrapper section6Wrapper">
  <div class="">
        <p class="details-title">嘉禄讯汇&nbsp;&nbsp;内部系统</p></div>
<div class="flash4">
    <ul class="ul">
        <li class="first" style="width: 280px; height:405px; overflow: hidden;">
            <div class="imgTop">
                <div style="width:278px;height:405px;" alt="" class="tm"></div>
            </div>
            <div class="imgBot">
                <a href="http://www.szjlxh.com/db"><p class="bt_1">数据库</p><p class="bt_2" ></p></a>
            </div>
            <div class="imgDiv"><a href="http://www.szjlxh.com/db"><img src="/images/mysql.png" class="image"></a></div>
        </li>
        <li style="width: 260px; overflow: hidden; height:350px"">
            <div class="imgTop">
                <div style="width:278px;height:405px;" alt="" class="tm"></div>
            </div>
            <div class="imgBot">
                <a href="http://www.szjlxh.com/wiki"><p class="bt_1">Wiki</p><p class="bt_2"></p></a>
            </div>
            <div class="imgDiv"><a href="http://www.szjlxh.com/wiki"><img src="/images/wiki.png" class="image"></a></div>
        </li>
        <li style="width: 260px; overflow: hidden; height:350px"">
            <div class="imgTop">
                <div style="width:278px;height:405px;" alt="" class="tm"></div>
            </div>
            <div class="imgBot">
                <a href="http://www.szjlxh.com/book "><p class="bt_1">图书馆</p><p class="bt_2"></p></a>
            </div>
            <div class="imgDiv"><a href="http://www.szjlxh.com/book "><img src="/images/wordpress.png" class="image"></a></div>
        </li>
        <li style="width: 260px; overflow: hidden; height:350px"">
            <div class="imgTop">
                <div style="width:278px;height:405px;" alt="" class="tm"></div>
            </div>
            <div class="imgBot">
                <a href="http://www.szjlxh.com/redis"><p class="bt_1">Redis</p><p class="bt_2"></p></a>
            </div>
            <div class="imgDiv"><a href="http://www.szjlxh.com/redis"><img src="/images/redis.png" class="image"></a></div>
        </li>
    </ul>   
</div>
  </article>
</section>

</body>
</html>