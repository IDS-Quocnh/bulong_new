@extends('layouts.atllayout', ['title' => isset($item) ? 'Edit Poll' : 'Add Poll' ])

@section('content')
<div class="card">
    @if(isset($susscessMessage))
    <div class="alert alert-success" role="alert">
        {{$susscessMessage}}
    </div>
    @endif
    @if(isset($dangerMessage))
    <div class="alert alert-danger" role="alert">
        {{$dangerMessage}}
    </div>
    @endif
    @if(isset($warningMessage))
    <div class="alert alert-warning" role="alert">
        {{$warningMessage}}
    </div>
    @endif

    <div class="top-card-button-wrapper">
        <a href="{{route('poll-management')}}" type="button" class="btn btn-primary btn-sm">back</a>
    </div>

    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-body">
                    <form class="form-horizontal" method="POST" {{ isset($item) ? 'action=' . route('poll/edit') :'action=' . route('poll/add')  }}  enctype="multipart/form-data" >
                        {{ csrf_field() }}


                        <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                            <label for="name" class="col-md-4 control-label">Poll question</label>

                            <div class="col-md-6">
                                <input id="id" type="hidden" class="form-control" name="id" value="{{isset($item) ? $item->id : ''}}" required autofocus>
                                <input id="name" type="text" class="form-control" name="name" value="{{isset($item) ? $item->name : ''}}" required autofocus>

                                @if ($errors->has('name'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('poll1') ? ' has-error' : '' }}">
                            <label for="poll1" class="col-md-4 control-label">Poll  choice 1</label>

                            <div class="col-md-6">
                                <input id="pol11" type="text" class="form-control" name="poll1" value="{{isset($item) ? $item->poll1 : ''}}" required>

                                @if ($errors->has('poll1'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('poll1') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('poll2') ? ' has-error' : '' }}">
                            <label for="poll2" class="col-md-4 control-label">Poll  choice 2</label>

                            <div class="col-md-6">
                                <input id="poll2" type="text" class="form-control" name="poll2" value="{{isset($item) ? $item->poll2 : ''}}" required>

                                @if ($errors->has('poll2'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('poll2') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('poll3') ? ' has-error' : '' }}">
                            <label for="name" class="col-md-4 control-label">Poll  choice 3 (optional)</label>

                            <div class="col-md-6">
                                <input id="poll3" type="text" class="form-control" name="poll3" value="{{isset($item) ? $item->poll3 : ''}}">

                                @if ($errors->has('poll3'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('poll3') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('poll4') ? ' has-error' : '' }}">
                            <label for="name" class="col-md-4 control-label">Poll  choice 4 (optional)</label>

                            <div class="col-md-6">
                                <input id="poll4" type="text" class="form-control" name="poll4" value="{{isset($item) ? $item->poll4 : ''}}">

                                @if ($errors->has('poll4'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('poll4') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('poll5') ? ' has-error' : '' }}">
                            <label for="name" class="col-md-4 control-label">Poll  choice 5 (optional)</label>

                            <div class="col-md-6">
                                <input id="poll5" type="text" class="form-control" name="poll5" value="{{isset($item) ? $item->poll5 : ''}}">

                                @if ($errors->has('poll5'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('poll5') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('poll6') ? ' has-error' : '' }}">
                            <label for="name" class="col-md-4 control-label">Poll  choice 6 (optional)</label>

                            <div class="col-md-6">
                                <input id="poll6" type="text" class="form-control" name="poll6" value="{{isset($item) ? $item->poll6 : ''}}">

                                @if ($errors->has('poll6'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('poll6') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('active') ? ' has-error' : '' }}">
                            <label for="active" class="col-md-4 control-label">Active</label>

                            <div class="col-md-6">
                                <select name="active" class="form-control" id="countryCode"  value="{{isset($item) ? $item->active : ''}}" style="width: 150px" >
                                    <option value="1" {{isset($item) && $item->active == 1 ? 'selected' : ''}} {{!isset($item) ? 'selected' : ''}} >active</option>
                                    <option value="0"  {{isset($item) && $item->active == 0 ? 'selected' : ''}}>disable</option>
                                </select>
                                @if ($errors->has('active'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('active') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>



                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <button type="submit" class="btn btn-primary btn-sm">
                                    {{isset($item) ? 'Edit submit' : 'Add'}}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
