@extends('layouts.single')
@section('content')
    <div class="pt-2">
        <div class="jccenter " style="width: 1000px;">
            <form method="POST" action="{{ route('user-edit/edit') }}"  enctype="multipart/form-data">
                {{ csrf_field() }}
            <main class="feed mt-1 mr-auto">
                <div class="flex flex-col justify-center items-center ">
                    <div style="width: 100%">
                        <div>
                           <div class="fs15 font-bold text-gray-700" style="text-align: center">
                               Your Notifications
                           </div>
                            <div class="full-width">
                                <div class="line mr-auto" style="text-align: center; display: block; width: 600px"></div>
                            </div>
                        </div>
                        <input type="hidden" name="id" value="{{$item->id}}"/>

                        <div class="mt-3 mr-auto" style="width: 542px">
                            <img src="{{$item->avatar}}" id="avarta-img" class="rounded-full mr-auto" style="width: 80px; height: 80px" />
                            <div class="text-green-2 mt-2" style="text-align: center">
                                <span onclick="$('#avarta-input').click()" style="cursor: pointer"> Change photo</span> <span>| </span>
                                <span onclick=" $('#avarta-img').attr('src', '/public/allimage/profile.jpg'); $('#is_delete').val('yes') ;document.getElementById('avarta-input').value = '';" style="cursor: pointer"> delete photo</span>
                                <input type="hidden" name="is_delete" id="is_delete"  >
                                <input id="avarta-input" type="file" name="avarta-input" value="" style="display: none"
                                       class="form-control h-auto hidden"  accept="image/x-png,image/gif,image/jpeg" />
                                <script>
                                    document.addEventListener("DOMContentLoaded", function(event) {
                                            function readURL(input) {
                                                if (input.files && input.files[0]) {
                                                    var reader = new FileReader();

                                                    reader.onload = function (e) {
                                                        $('#avarta-img').attr('src', e.target.result);
                                                    }

                                                    reader.readAsDataURL(input.files[0]); // convert to base64 string
                                                }
                                            }

                                            $("#avarta-input").change(function () {
                                                readURL(this);
                                                $('#is_delete').val('no');
                                            });
                                    });
                                </script>
                            </div>
                            <div class="mr-auto mt-3" style="width: 240px">
                                <div class="rounded" style="border: solid 1.5px #d4d4d4">
                                    <div class="px-2 py-2">
                                        <span class="text-gray-700">Tagline</span>
                                        <span class="text-gray-500 fs11">(will appear on your profile page)</span>
                                    </div>
                                    <div class="rounded" style="border-top: solid 1.5px #d4d4d4;">
                                        <div class="py-2 px-2 full-width">
                                            <textarea name="tagline" id = "tagline" class="my-input fs12 " maxlength="150" style="width: 100%; height: 120px; background-color: transparent; font-weight: normal" placeholder="“share your bio / status here”">{{$item->think}} </textarea>
                                            <div style="float:right" class="mt-3 fs12"> <span id="count_tagline">0</span>/150</div>
                                        </div>
                                    </div>
                                </div>

                                <div class="rounded mt-12" style="border: solid 1.5px #d4d4d4">
                                    <div class="px-2 py-2">
                                        <div><span class="text-gray-400">Username</span></div>
                                        <span class="text-gray-700 fs15">{{$item->username}}</span>
                                    </div>
                                </div>

                                <div class="rounded mt-2" style="border: solid 1.5px #d4d4d4">
                                    <div class="px-2 py-2 position-relative">
                                        <div><span class="text-gray-400">Birthday</span></div>
                                        <span class="text-gray-700 fs15">{{$item->dob}}</span>
                                        <div class="tooltip-main" data-toggle="tooltip" data-placement="top" title="“Why are you asking for my birthday?” Use of the Bulong website/service is only for people age 18+ so we need this to verify your age" style="right: -110px; top: 25px; position:absolute">
                                            <span class="tooltip-qm">?</span>
                                        </div>
                                    </div>
                                </div>

                                <div class="rounded mt-2 form-group{{ $errors->has('email') ? ' has-error' : '' }}" style="border: solid 1.5px #d4d4d4 ;margin-bottom: 5px">
                                    <div class="px-2 py-2 position-relative">

                                        <div><span class="text-gray-400">Email</span></div>

                                        <input style="background-color: #F3F3F3;height: 38px" type="email" id="email_draf" class="text-gray-700 fs15" value="{{$errors->has('email') ? old('email') : $item->email}}" disabled/>
                                        <input style="background-color: #F3F3F3;height: 38px" type="hidden" id="email" name="email" class="text-gray-700 fs15" value="{{$errors->has('email') ? old('email') : $item->email}}"/>

                                        @if ($errors->has('email'))
                                            <br>
                                            <span class="help-block fs11 text-red-600" >
                                        <strong>{{ $errors->first('email') }}</strong>
                                            </span>
                                        @endif

                                        <div class="tooltip-main" data-toggle="tooltip" data-placement="top" title="“Why are you asking for my birthday?” Use of the Bulong website/service is only for people age 18+ so we need this to verify your age" style="right: -110px; top: 38px; position:absolute">
                                            <span class="tooltip-qm">?</span>
                                        </div>
                                    </div>
                                </div>
                                <div style="float:right; cursor: pointer" class="text-green-2" onclick="changeEmail()"> (change)</div>
                                <script>
                                    function changeEmail(){
                                        $("#email_draf").prop("disabled", false);
                                        $("#email_draf").focus();
                                        $("#email_draf").css('background-color', 'white');
                                    }
                                </script>
                                <div class="rounded"  style="border: solid 1.5px #d4d4d4; margin-top: 30px">
                                    <div class="px-2 py-2 position-relative">
                                        <div><span class="text-gray-400">password</span></div>
                                        <div class=" flex flex-col mt-2">
                                            <div class="input-group input-group-merge">
                                                <input type="text" id="password" name="password" class="mb-3 p-2 border-2 rounded"  placeholder="Password" style="width:180px" disabled>
                                                <div class="input-group-append"    data-password="false" id="password-eye-wrapper" style="height:41px;"  >
                                                    <div class="input-group-text" class="eye-eye" onclick="showPassword()">
                                                        <span class="password-eye" ></span>
                                                    </div>
                                                    <script>
                                                        function showPassword() {
                                                            if ($("#password").attr("type") === 'password') {
                                                                $("#password").attr("type", "text");
                                                                $("#password-eye-wrapper .input-group-text").addClass('show-password');
                                                            } else {
                                                                $("#password").attr("type", "password");
                                                                $("#password-eye-wrapper .input-group-text").removeClass('show-password');
                                                            }
                                                        }
                                                    </script>


                                                </div>
                                                @if ($errors->has('password'))
                                                    <div>
                                                        <span class="help-block fs11 text-red-600" >
                                                    <strong>{{ $errors->first('password') }}</strong>
                                                        </span>
                                                    </div>
                                                @endif
                                            </div>
                                            <has-error field="password"></has-error>
                                        </div>
                                    </div>
                                </div>
                                <div style="float:right;cursor: pointer" class="text-green-2" onclick="changePassword()"> (change)</div>
                                <script>
                                    function changePassword(){
                                        $("#password").prop("disabled", false);
                                    }
                                </script>

                                <div class="mt-16" style="text-align: center;">
                                    <button class="bg-green-1 text-white rounded px-4" type="submit" style="padding-bottom: 3px"> Save Changes</button>
                                </div>
                            </div>
                            <div class="mt-10 mb-16">
                                <div>
                                    <span class="text-green-2 font-bold">Delete my account</span>
                                </div>

                                <div class="bg-white px-3 py-2 mt-3">
                                    If you click "Delete My Account" it will initiate an irreversible delete
                                    sequence of all account information. Your posts will be removed from
                                    public view (we will keep an internal copy for compliance purposes) and
                                    your username will be removed from your comments. You will no longer
                                    be able to access or edit your posts or comments.
                                </div>
                            </div>
                        </div>
                    </div>
            </main>
            </form>
        </div>
    </div>
@endsection
