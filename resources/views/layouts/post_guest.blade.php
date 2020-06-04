<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <title>Bulong</title>
    <link href="/public/allimage/font-awesome.min.css" rel="stylesheet"
          integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="{{asset('public/css/main.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('public/css/icons.min.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('public/css/bootstrap.min.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('public/css/styles.min.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('public/css/jquery.emojipicker.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('public/css/jquery.emojipicker.tw.css')}}">
</head>
<body style="" cz-shortcut-listen="true" class="fs14 bg-main">

<div id="app">
    <header class="bg-white" style="position: fixed;top:0; z-index:999; width: 100%; max-height: 60px">
        <div class="flex justify-between items-center pt-1 lg:px-32 mr-auto" style="max-width :1380px ;margin-top: -10px">
            <div><a href="/"><img src="/public/allimage/logo.png" class="w-32" style="margin-left: -30px"></a></div>
            <div class="flex items-center text-gray-600">
                <div class="mt-1"><a href="/login"><button class="px-5 mr-2 text-sm text-center rounded border-2 border-blue-400">Log in</button></a> <a href="/signup"><button class="px-5 text-sm text-center text-white rounded  border-2 border-blue-400 bg-blue-400">SIGN UP</button></a></div>
            </div>
        </div>
    </header>
    <div style="max-width: 1360px" class="mr-auto">
        <div class="mr-auto" style="width: 1000px;">
            <div style="height: 60px;width: 100%">&nbsp;</div>
            <div class="pt-2">
                @include('front.topad')
                <div class="jccenter " style="width: 1000px;">
                    <main class="feed mt-1 mr-auto">
                        <div class="flex flex-col justify-center items-center ">
                            <div style="width: 100%">
                                <div>
                                    <div class="mt-4 mb-8 bg-white border rounded-lg shadow">
                                        <div class="bg-white flex rounded" style="height: 80px">
                                            <div class="flex justify-between p-4" style="width: 530px">
                                                <div class="flex">
                                                    <div><a href="/user/ram"><img
                                                                src="/public/allimage/profile.jpg"
                                                                class="h-10 w-10 mr-2 rounded-full"></a></div>
                                                    <div>
                                                        <div style="text-align: center"><a href="/user/ram"
                                                                                           class="text-teal-600 font-bold mr-1 text-green-1">ram</a>
                                                        </div>
                                                        <div>
                                                            <button class="px-6 text-sm text-white bg-yellow-600 rounded">
                                                                Follow
                                                            </button>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div>
                                                    <div class="cursor-pointer"><i class="fa fa-ellipsis-h text-gray-600 mt-3"
                                                                                   data-toggle="modal"
                                                                                   data-target="#modalLogin"></i>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="" style="width: 450px;">
                                                <div class="float-right flex" style="margin-top: 50px">
                                                    <img lass="" src="/public/allimage/comment.png" style="width: 28px;" />
                                                    <span class="text-gray-700 mx-2 font-bold mt-1"> 51 comments</span>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="flex">
                                            <div
                                                class="h-135 -z-10 flex justify-center items-center bg-cover bg-center"
                                                style="background-image: url('/public/images/backgrounds/Bed_Couple.png'); width: 530px">
                                                <p class="px-4 text-xl font-extrabold" style="font-family: HelveticaNeue; text-align: center">
                                                    Hi, i am ram and this is my first confession about myself.
                                                </p>
                                            </div>
                                            <div class="bg-gray-1" style="width: 470px; max-height: 540px">
                                                <div class="ml-12 overflow-scroll scroll-wrapper disable-scrollbars" style="height: 530px; margin-right: 5px">
                                                    <div style="width: 340px">
                                                        <div class="comment comment-l1">
                                                            <div class="three-dot dropdown" style="position: absolute; right: -20px; top: -12px">
                                                                <a class="" href="#" data-toggle="dropdown"> <i data-target="#modalLogin" class="fa fa-ellipsis-h text-gray-600 mt-3"></i></a>
                                                                <ul class="dropdown-menu text-green-1 dropdown-menu-center"
                                                                    style="background-color: #F3F3F3; margin-top: -10px">
                                                                    <li class="bg-white fs12 text-green-1"><a
                                                                            href="#"
                                                                            class="rounded-t hover:bg-gray-400 py-2 px-6 block whitespace-no-wrap text-green-1">edit</a>
                                                                    </li>
                                                                    <li class="bg-white fs12 text-green-1"
                                                                        style="margin-top: 1px"><a
                                                                            href="#"
                                                                            class="rounded-t hover:bg-gray-400 py-2 px-6 block whitespace-no-wrap text-green-1">delete</a>
                                                                    </li>
                                                                </ul>
                                                            </div>
                                                            <img class="cmt-avatar rounded-full" src="/public/allimage/profile.jpg" />
                                                            <div class="cmt-content-infor ml-2" style="width: 320px">
                                                                <div class="cmt-content ml-2">
                                                                    <span class="font-bold text-green-1">Supernanay</span>
                                                                    <span class="text-gray-600">❤ Glad you are ok girl</span>
                                                                </div>
                                                                <hr class="ml-2 my-2"/>
                                                                <div class="flex ml-2 text-gray-600">
                                                                    <span> 3h </span>
                                                                    <span class="font-bold ml-10"> Reply </span>
                                                                    <div class="flex ml-24">
                                                                        <span> (3) </span>
                                                                        <a href="#">
                                                                            <img class="cmt-feel ml-2" src="/public/allimage/feel.png" />
                                                                        </a>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="comment comment-l2">
                                                            <div class="three-dot dropdown" style="position: absolute; right: -20px; top: -12px">
                                                                <a class="" href="#" data-toggle="dropdown"> <i data-target="#modalLogin" class="fa fa-ellipsis-h text-gray-600 mt-3"></i></a>
                                                                <ul class="dropdown-menu text-green-1 dropdown-menu-center"
                                                                    style="background-color: #F3F3F3; margin-top: -10px">
                                                                    <li class="bg-white fs12 text-green-1"><a
                                                                            href="#"
                                                                            class="rounded-t hover:bg-gray-400 py-2 px-6 block whitespace-no-wrap text-green-1">edit</a>
                                                                    </li>
                                                                    <li class="bg-white fs12 text-green-1"
                                                                        style="margin-top: 1px"><a
                                                                            href="#"
                                                                            class="rounded-t hover:bg-gray-400 py-2 px-6 block whitespace-no-wrap text-green-1">delete</a>
                                                                    </li>
                                                                </ul>
                                                            </div>
                                                            <img class="cmt-avatar rounded-full" src="/public/allimage/profile.jpg" />
                                                            <div class="cmt-content-infor ml-2" style="width: 270px">
                                                                <div class="cmt-content ml-2">
                                                                    <span class="font-bold text-green-1">Supernanay</span>
                                                                    <span class="text-gray-600">❤ Glad you are ok girl</span>
                                                                </div>
                                                                <hr class="ml-2 my-2"/>
                                                                <div class="flex ml-2 text-gray-600">
                                                                    <span> 3h </span>
                                                                    <span class="font-bold ml-10"> Reply </span>
                                                                    <div class="flex ml-24">
                                                                        <span> (3) </span>
                                                                        <a href="#">
                                                                            <img class="cmt-feel ml-2" src="/public/allimage/feel.png" />
                                                                        </a>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="comment comment-l2">
                                                            <img class="cmt-avatar rounded-full" src="/public/allimage/profile.jpg" />
                                                            <div class="cmt-content-infor ml-2" style="width: 270px">
                                                                <div class="cmt-content ml-2">
                                                                    <span class="font-bold text-green-1">Supernanay</span>
                                                                    <span class="text-gray-600">❤ Glad you are ok girl</span>
                                                                </div>
                                                                <hr class="ml-2 my-2"/>
                                                                <div class="flex ml-2 text-gray-600">
                                                                    <span> 3h </span>
                                                                    <span class="font-bold ml-10"> Reply </span>
                                                                    <div class="flex ml-24">
                                                                        <span> (3) </span>
                                                                        <a href="#">
                                                                            <img class="cmt-feel ml-2" src="/public/allimage/feel.png" />
                                                                        </a>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="comment comment-l1">
                                                            <img class="cmt-avatar rounded-full" src="/public/allimage/profile.jpg" />
                                                            <div class="cmt-content-infor ml-2" style="width: 320px">
                                                                <div class="cmt-content ml-2">
                                                                    <span class="font-bold text-green-1">Supernanay</span>
                                                                    <span class="text-gray-600">❤ Glad you are ok girl</span>
                                                                </div>
                                                                <hr class="ml-2 my-2"/>
                                                                <div class="flex ml-2 text-gray-600">
                                                                    <span> 3h </span>
                                                                    <span class="font-bold ml-10"> Reply </span>
                                                                    <div class="flex ml-24">
                                                                        <span> (3) </span>
                                                                        <a href="#">
                                                                            <img class="cmt-feel ml-2" src="/public/allimage/feel.png" />
                                                                        </a>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="comment comment-l1">
                                                            <img class="cmt-avatar rounded-full" src="/public/allimage/profile.jpg" />
                                                            <div class="cmt-content-infor ml-2" style="width: 320px">
                                                                <div class="cmt-content ml-2">
                                                                    <span class="font-bold text-green-1">Supernanay</span>
                                                                    <span class="text-gray-600">❤ Glad you are ok girl</span>
                                                                </div>
                                                                <hr class="ml-2 my-2"/>
                                                                <div class="flex ml-2 text-gray-600">
                                                                    <span> 3h </span>
                                                                    <span class="font-bold ml-10"> Reply </span>
                                                                    <div class="flex ml-24">
                                                                        <span> (3) </span>
                                                                        <a href="#">
                                                                            <img class="cmt-feel ml-2" src="/public/allimage/feel.png" />
                                                                        </a>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="comment comment-l1">
                                                            <img class="cmt-avatar rounded-full" src="/public/allimage/profile.jpg" />
                                                            <div class="cmt-content-infor ml-2" style="width: 320px">
                                                                <div class="cmt-content ml-2">
                                                                    <span class="font-bold text-green-1">Supernanay</span>
                                                                    <span class="text-gray-600">❤ Glad you are ok girl</span>
                                                                </div>
                                                                <hr class="ml-2 my-2"/>
                                                                <div class="flex ml-2 text-gray-600">
                                                                    <span> 3h </span>
                                                                    <span class="font-bold ml-10"> Reply </span>
                                                                    <div class="flex ml-24">
                                                                        <span> (3) </span>
                                                                        <a href="#">
                                                                            <img class="cmt-feel ml-2" src="/public/allimage/feel.png" />
                                                                        </a>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="comment comment-l2">
                                                            <img class="cmt-avatar rounded-full" src="/public/allimage/profile.jpg" />
                                                            <div class="cmt-content-infor ml-2" style="width: 270px">
                                                                <div class="cmt-content ml-2">
                                                                    <span class="font-bold text-green-1">Supernanay</span>
                                                                    <span class="text-gray-600">❤ Glad you are ok girl</span>
                                                                </div>
                                                                <hr class="ml-2 my-2"/>
                                                                <div class="flex ml-2 text-gray-600">
                                                                    <span> 3h </span>
                                                                    <span class="font-bold ml-10"> Reply </span>
                                                                    <div class="flex ml-24">
                                                                        <span> (3) </span>
                                                                        <a href="#">
                                                                            <img class="cmt-feel ml-2" src="/public/allimage/feel.png" />
                                                                        </a>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="comment comment-l2">
                                                            <img class="cmt-avatar rounded-full" src="/public/allimage/profile.jpg" />
                                                            <div class="cmt-content-infor ml-2" style="width: 270px">
                                                                <div class="cmt-content ml-2">
                                                                    <span class="font-bold text-green-1">Supernanay</span>
                                                                    <span class="text-gray-600">❤ Glad you are ok girl</span>
                                                                </div>
                                                                <hr class="ml-2 my-2"/>
                                                                <div class="flex ml-2 text-gray-600">
                                                                    <span> 3h </span>
                                                                    <span class="font-bold ml-10"> Reply </span>
                                                                    <div class="flex ml-24">
                                                                        <span> (3) </span>
                                                                        <a href="#">
                                                                            <img class="cmt-feel ml-2" src="/public/allimage/feel.png" />
                                                                        </a>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="comment comment-l2">
                                                            <img class="cmt-avatar rounded-full" src="/public/allimage/profile.jpg" />
                                                            <div class="cmt-content-infor ml-2" style="width: 270px">
                                                                <div class="cmt-content ml-2">
                                                                    <span class="font-bold text-green-1">Supernanay</span>
                                                                    <span class="text-gray-600">❤ Glad you are ok girl</span>
                                                                </div>
                                                                <hr class="ml-2 my-2"/>
                                                                <div class="flex ml-2 text-gray-600">
                                                                    <span> 3h </span>
                                                                    <span class="font-bold ml-10"> Reply </span>
                                                                    <div class="flex ml-24">
                                                                        <span> (3) </span>
                                                                        <a href="#">
                                                                            <img class="cmt-feel ml-2" src="/public/allimage/feel.png" />
                                                                        </a>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="text-center">
                                                            <a href="#" class="text-green-1 font-bold fs13">
                                                                See More
                                                            </a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="pb-2 flex">
                                            <div class="flex" style="width: 530px">
                                                <div class=" ml-4 flex flex-col items-center cursor-pointer"><span>3</span> <img
                                                        src="/public/allimage/feel.png" class="cmt-feel"></div>
                                                <div class="mx-4 flex flex-col items-center cursor-pointer"><span>0</span>
                                                    <img
                                                        src="/public/allimage/comment.png" class="cmt-feel"></div>
                                                <div class="flex flex-col justify-end cursor-pointer"><img
                                                        src="/public/allimage/share.png" class="cmt-feel" data-toggle="modal"
                                                        data-target="#modalLogin"></div>
                                                <div style="width:410px">
                                                    <div class="mt-2 text-sm lg:flex lg:justify-end fs12" style="float: right"><span
                                                            class="mr-2 text-gray-600">Posted 3 weeks ago on</span>
                                                        <a href="/category/corporis-sed-sit-rerum-omnis"
                                                           class="mr-4 text-teal-600 font-bold text-green-1">Love and Relationship</a>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="flex mt-3 add-cmt" style="width: 470px">
                                                <div class="ml-5">
                                                    <input placeholder="Add a comment..." style="width : 300px" />
                                                </div>
                                                <span style="color: rgb(120, 194, 255); font-weight: bold; cursor: pointer" class="fs15 ml-12 font-bold">
                                                    Post
                                                </span>
                                                <div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                    </main>
                </div>
            </div>
            <a style="position: relative;" class="flex footer mb-2">
                <span>About Us </span>
                <span>Privacy and Cookie Policy </span>
                <span>Terms of Use </span>
                <span>Contact Us </span>
                <span>Advertise With Us </span>
                <div class="absolute right-0 font-bold ">
                    © 2020 Bulong
                </div>
        </div>

    </div>

</div>


<div class="v--modal-box v--modal" style="top: 348px; left: 835px; width: 250px; height: auto; display: none">
    <div class="p-4 flex justify-center items-center">
        <ul class="text-center">
            <li class="mb-2 hover:text-blue-600"><a href="#">Report Confession</a></li>
            <li class="mb-2 hover:text-blue-600"><a href="#">Go to Post</a></li>
            <li class="mb-2 hover:text-blue-600"><a href="#">Share</a></li>
            <li class="mb-2 hover:text-blue-600"><a href="#">Copy link</a></li> <!----> <!---->
            <li class="mb-2 hover:text-blue-600"><a href="#">Cancel</a></li>
        </ul>
    </div>
</div>

<div class="modal fade mt-72 " id="modalLogin" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" >
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="flex justify-center items-center h-full text-center py-5" width="250" height="auto">
                <div class="flex flex-col items-center"><img src="/public/images/profile.jpg"
                                                             class="w-10 h-10 rounded-full"> <h5 class="mt-5">Login or
                        create an account to continue</h5>
                    <div class="mt-10"><a href="/login">
                            <button class="px-5 mr-2 text-sm text-center rounded border-2 border-blue-400">Log in
                            </button>
                        </a> <a href="/signup">
                            <button
                                class="px-5 text-sm text-center text-white rounded  border-2 border-blue-400 bg-blue-400">
                                SIGN UP
                            </button>
                        </a></div>
                </div>
            </div>
        </div>
    </div>
</div>






<style type="text/css">
    #emojiPickerWrap {margin:10px 0 0 0;}
    .field { padding: 20px 0; }

</style>

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
</style>
<script type="text/javascript" src="{{ asset('public/js/bootstrap.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('public/js/jquery-3.x-git.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('public/js/app.js') }}"></script>
<script type="text/javascript" src="{{ asset('public/js/simple-scrollbar.js') }}"></script>
<script type="text/javascript" src="{{ asset('public/js/jquery.emojipicker.js') }}"></script>
<script type="text/javascript" src="{{ asset('public/js/jquery.emojis.js') }}"></script>
<script type="text/javascript">


    $(".bg-selector img").click(
        function () {
            $('#exampleModalCenter .modal-body').css('background-image', 'url( "' + $(this).attr('src') +'")' );
            $('.bgPicker').hide();
        }
    );
    var firtClick = true;
    function triggerSmiley(){
        $('.emojiPickerIcon').first().click();
        $('.bgPicker').hide();
        setTimeout(function(){
            if($('.emojiPicker').first().css('display') == "none" && firtClick){
                $('.emojiPicker').first().css('display', 'block');
                firtClick=false;
            }
        }, 10);

    }
    $("#uimdbutton").click(function () {
        $('.bgPicker').show();
        setTimeout(function(){
            $('.emojiPicker').hide();
        }, 10);
    });
    $(document).ready(function(e) {
        $('.bgPicker').hide();
        $('#input-default').emojiPicker({
            width: '300px',
            height: '300px',
            position: 'left',
        });

        $("#exampleModalCenter").on("hidden.bs.modal", function () {
            $('.emojiPicker').first().css('display', 'none');
        });

        $('#create').click(function(e) {
            e.preventDefault();
            $('#text-custom-trigger').emojiPicker({
                width: '300px',
                height: '200px',
                button: false
            });
        });

        $('#toggle').click(function(e) {
            e.preventDefault();
            $('#text-custom-trigger').emojiPicker('toggle');
        });

        $('#destroy').click(function(e) {
            e.preventDefault();
            $('#text-custom-trigger').emojiPicker('destroy');
        });
        let scrollDiv = document.querySelector(".scroll-wrapper");
        SimpleScrollbar.initEl(scrollDiv);

        // keyup event is fired
        $(".emojiable-question, .emojiable-option").on("keyup", function () {
            //console.log("emoji added, input val() is: " + $(this).val());
        });

        //var element = $('.emojiPicker').first().detach();
        // $('#postConfession').append(element);
        $("#block-text-area").keydown(function(){
                $(this).val("");
            }
        );
        $("#block-text-area").keyup(function(){
                $(this).val("");
            }
        );
        $("#block-text-area").change(function(){
                $(this).val("");
            }
        );

    });
</script>
</body>
</html>
