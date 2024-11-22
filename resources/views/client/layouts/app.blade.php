<!DOCTYPE html>
<html lang="vi">

<meta http-equiv="content-type" content="text/html;charset=utf-8" />

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <title>
       @yield('title')
    </title>

    <meta name="keywords" content="Liên hệ, Ant Du lịch, ant-du-lich.mysapo.net" />
    <link rel="canonical" href="lien-he.html" />
    <link rel="dns-prefetch" href="index.html">
    <link rel="dns-prefetch" href="http://bizweb.dktcdn.net/">
    <link rel="dns-prefetch" href="http://www.google-analytics.com/">
    <link rel="dns-prefetch" href="http://www.googletagmanager.com/">


    <link rel="icon" href="{{ url('client/bizweb.dktcdn.net/100/299/077/themes/642224/assets/favicon6d1d.png?1705894518705')}}"
        type="image/x-icon" />


    <link rel="preload" as="style" type="text/css"
        href="{{ url('client/bizweb.dktcdn.net/100/299/077/themes/642224/assets/bootstrap.scss6d1d.css')}}"
        onload="this.rel='stylesheet'" />
    <link href="{{ url('client/bizweb.dktcdn.net/100/299/077/themes/642224/assets/bootstrap.scss6d1d.css')}}" rel="stylesheet"
        type="text/css" media="all" />
    <link rel="preload" as="style" type="text/css"
        href="{{ url('client/bizweb.dktcdn.net/100/299/077/themes/642224/assets/base.scss6d1d.css')}}"
        onload="this.rel='stylesheet'" />
    <link href="{{ url('client/bizweb.dktcdn.net/100/299/077/themes/642224/assets/base.scss6d1d.css')}}" rel="stylesheet"
        type="text/css" media="all" />

    <link rel="preload" as="style" type="text/css"
        href="{{ url('client/bizweb.dktcdn.net/100/299/077/themes/642224/assets/ant-du-lich.scss6d1d.css')}}"
        onload="this.rel='stylesheet'" />
    <link href="{{ url('client/bizweb.dktcdn.net/100/299/077/themes/642224/assets/ant-du-lich.scss6d1d.css')}}" rel="stylesheet"
        type="text/css" media="all" />

    <link rel="preload" as="script"
        href="{{ url('client/bizweb.dktcdn.net/100/299/077/themes/642224/assets/jquery-2.2.3.min6d1d.js')}}" />
    <script src="{{ url('client/bizweb.dktcdn.net/100/299/077/themes/642224/assets/jquery-2.2.3.min6d1d.js')}}" type="text/javascript">
    </script>

    <script>
        var Bizweb = Bizweb || {};
        Bizweb.store = 'ant-du-lich.mysapo.net';
        Bizweb.id = 299077;
        Bizweb.theme = {
            "id": 642224,
            "name": "Ant Du lịch",
            "role": "main"
        };
        Bizweb.template = 'page.contact';
        if (!Bizweb.fbEventId) Bizweb.fbEventId = 'xxxxxxxx-xxxx-4xxx-yxxx-xxxxxxxxxxxx'.replace(/[xy]/g, function(c) {
            var r = Math.random() * 16 | 0,
                v = c == 'x' ? r : (r & 0x3 | 0x8);
            return v.toString(16);
        });
    </script>
    <script>
        (function() {
            function asyncLoad() {
                var urls = [
                    "https://google-shopping.sapoapps.vn/conversion-tracker/global-tag/3163.js?store=ant-du-lich.mysapo.net",
                    "https://google-shopping.sapoapps.vn/conversion-tracker/event-tag/3163.js?store=ant-du-lich.mysapo.net"
                ];
                for (var i = 0; i < urls.length; i++) {
                    var s = document.createElement('script');
                    s.type = 'text/javascript';
                    s.async = true;
                    s.src = urls[i];
                    var x = document.getElementsByTagName('script')[0];
                    x.parentNode.insertBefore(s, x);
                }
            };
            window.attachEvent ? window.attachEvent('onload', asyncLoad) : window.addEventListener('load', asyncLoad,
                false);
        })();
    </script>

    <script>
        window.BizwebAnalytics = window.BizwebAnalytics || {};
        window.BizwebAnalytics.meta = window.BizwebAnalytics.meta || {};
        window.BizwebAnalytics.meta.currency = 'VND';
        window.BizwebAnalytics.tracking_url = 's.html';

        var meta = {};


        for (var attr in meta) {
            window.BizwebAnalytics.meta[attr] = meta[attr];
        }
    </script>

    <script src="dist/js/stats.minbadf.js?v=96f2ff2"></script>

</head>

<body>

    @include('client.partials.header')

    @yield('content')

    @include('client.partials.footer')
    </div>

</body>

</html>