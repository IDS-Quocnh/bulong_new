<!DOCTYPE html>
<html>

<head>
    <title>login</title>
    <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="{{asset('public/css/main.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('public/css/icons.min.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('public/css/styles.min.css')}}">
    <link rel="stylesheet" href="https://code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
</head>

<body>
{{ csrf_field() }}
<div style="height: 100vh">
    <div class="guest-sign-viewport-wrapper flex">
            <div class="guest-sign-wrapper" id="app" >
            <div class="flex jccenter">
                @yield('content')
                <div class="guest-right-panel-wrapper bg-cover inline-block" style="background-image:url('images/background1.png')">
                    <div class="flex jccenter">
                        <div class='line'> </div>
                        <h3 class="text-gray-700" style="font-size: 13px; font-weight: bold; color: rgba(0, 0, 0, 0.5)">Trending Confessions Right Now </h3>
                        <div class='line'> </div>
                    </div>
                <div class="pr-6 h-screen scroll-wrapper">
                    <div class="guest-confession-wrapper">
                        @foreach($trendingConfessions as $confession)
                            <confession :confession="{{ $confession }}" :confession_height="'360px'"></confession>
                        @endforeach
                    </div>
                </div>
        {{--        <footer class="mt-6">--}}
        {{--            <p class="text-white">--}}
        {{--                <a href="/login" class="border-b-2">Login</a> or <a href="/signup" class="border-b-2">Sign Up</a> to view more Confession--}}
        {{--            </p>--}}
        {{--        </footer>--}}
            </div>
            </div>
        </div>
    </div>
</div>
<style>
    .ss-wrapper {
        overflow : hidden;
        height   : 100%;
        position : relative;
        z-index  : 1;
        float: left;
    }

    .ss-content {
        height          : 100%;
        width           : 100%;
        padding         : 0 32px 0 0;
        position        : relative;
        right           : -25px;
        overflow        : auto;
        -moz-box-sizing : border-box;
        box-sizing      : border-box;
    }

    .ss-scroll {
        position            : relative;
        background          : rgba(0, 0, 0, .1);
        width               : 9px;
        border-radius       : 4px;
        top                 : 0;
        z-index             : 2;
        cursor              : pointer;
        opacity: 0;
        transition: opacity 0.25s linear;
    }

    .ss-container:hover .ss-scroll {
        opacity: 1;
    }
    .ss-container{
        max-height: 550px;
    }
    .ss-grabbed {
        user-select: none;
        -o-user-select: none;
        -moz-user-select: none;
        -khtml-user-select: none;
        -webkit-user-select: none;
    }
    body{
        background-image: linear-gradient(270deg, transparent, hsla(0, 0%, 100%, 0.71) 15%, #fff 52%, hsla(0, 0%, 100%, 0.69) 85%, transparent), url(/public/allimage/WallpaperLayer1.jpg);
        background-position: 0px 0px, 0px 0px;
        background-size: auto, cover;
    }
</style>

<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.0/jquery.min.js"></script>

<script type="text/javascript" src="{{ asset('public/js/app.js') }}"></script>
<script type="text/javascript" src="https://s3-us-west-2.amazonaws.com/s.cdpn.io/3/simple-scrollbar.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/js/bootstrap-datepicker.min.js"></script>
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
<script>
    let scrollDiv = document.querySelector(".scroll-wrapper");
    SimpleScrollbar.initEl(scrollDiv);
    $(function() {
        $( document ).tooltip();
        $('.datepicker').datepicker();
        var token = $( 'input[name="_token"]' ).first().val();
        $( '#token' ).val(token);
    })

    function showPassword() {
        if ($("#password").attr("type") === 'password') {
            $("#password").attr("type", "text");
            $("#password-eye-wrapper .input-group-text").addClass('show-password');
        } else {
            $("#password").attr("type", "password");
            $("#password-eye-wrapper .input-group-text").removeClass('show-password');
        }

        if ($("#confirmPassword").attr("type") === 'password') {
            $("#confirmPassword").attr("type", "text");
            $("#confirm-password-eye-wrapper .input-group-text").addClass('show-password');
        } else {
            $("#confirmPassword").attr("type", "password");
            $("#confirm-password-eye-wrapper .input-group-text").removeClass('show-password');
        }
    }

</script>

</body>

</html>
