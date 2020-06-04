@extends('layouts.atllayout', ['title' => 'Register User', 'menukey' => 'userManager'])
@section('content')

@if(isset($susscessMessage))
<div class="alert alert-success" role="alert">
    {{$susscessMessage}}
</div>
@endif
<div class="card">
    <div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">

                <div class="panel-body">
                    <form class="form-horizontal" method="POST" action="{{ route('user-management/edit') }}">
                        {{ csrf_field() }}

                        <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                            <label for="username" class="col-md-4 control-label">User Name</label>

                            <div class="col-md-6">
                                <input id="id" type="hidden" class="form-control" name="id" value="{{ $user->id }}" required autofocus>
                                <input id="username" type="text" class="form-control" name="username" value="{{ $user->username }}" required autofocus>

                                @if ($errors->has('username'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('username') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                            <label for="email" class="col-md-4 control-label">E-Mail Address</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control" name="email" value="{{ $user->email }}" required>

                                @if ($errors->has('email'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                            <label for="password" class="col-md-4 control-label">Password</label>

                            <div class="col-md-6">
                                <input id="password" type="text" class="form-control" name="password" autocomplete="new-password" >

                                @if ($errors->has('password'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="is_admin" class="col-md-4 control-label">User role</label>

                            <div class="col-md-6" style="text-align: left">
                                <select class="form-control"  name="is_admin" value="{{$user->is_admin}}">
                                    <option value="0" {{$user->is_admin == "0" ? "selected" : ""}}>user</option>
                                    <option value="1" {{$user->is_admin == "1" ? "selected" : ""}}>admin</option>
                                    <option value="2" {{$user->is_admin == "2" ? "selected" : ""}}>moderator</option>
                                </select>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <button type="submit" class="btn btn-primary">
                                    Edit submit
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div
        </div>
    </div>
</div>
</div>
<script>
    $('#countryCode option[value={{$user->country_code}}]').attr('selected','selected');
</script>
@endsection
