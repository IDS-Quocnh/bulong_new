@extends('layouts.atllayout', ['title' => isset($item) ? 'Edit Popup Message' : 'Add Popup Message' ])

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
        <a href="{{route('popup-message')}}" type="button" class="btn btn-primary btn-sm">back</a>
    </div>

    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-body">
                    <form class="form-horizontal" method="POST" {{ isset($item) ? 'action=' . route('popup-message/edit') :'action=' . route('popup-message/add')  }}  enctype="multipart/form-data" >
                        {{ csrf_field() }}


                        <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                            <label for="name" class="col-md-4 control-label">Popup Message Name</label>

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

                        <div class="form-group{{ $errors->has('message') ? ' has-error' : '' }}">
                            <label for="message" class="col-md-4 control-label">Message Content</label>

                            <div class="col-md-6">
                                <textarea style="width: 400px ; height: 300px" id="message" type="text" class="form-control" name="message"  required> {{isset($item) ? $item->message : ''}} </textarea>

                                @if ($errors->has('message'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('message') }}</strong>
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

                        <div class="form-group{{ $errors->has('is_bigsize') ? ' has-error' : '' }}">
                            <label for="is_bigsize" class="col-md-4 control-label">Is BigSize Popup</label>

                            <div class="col-md-6">
                                <select name="is_bigsize" class="form-control" id="countryCode"  value="{{isset($item) ? $item->is_bigsize : ''}}" style="width: 150px" >
                                    <option value="0" {{isset($item) && $item->is_bigsize == 0 ? 'selected' : ''}} {{!isset($item) ? 'selected' : ''}} >Small size</option>
                                    <option value="1"  {{isset($item) && $item->is_bigsize == 1 ? 'selected' : ''}}>Big size</option>
                                </select>
                                @if ($errors->has('is_bigsize'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('is_bigsize') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        {{--<div class="form-group{{ $errors->has('to_date') ? ' has-error' : '' }}">
                            <label for="to_date" class="col-md-4 control-label">From Now to Date</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control datepicker" id="sandbox-container" placeholder="mm/dd/yyyy" style="width:150px" data-provide="datepicker" name="name" value="{{isset($item) ? $item->name : ''}}" required autofocus>
                                @if ($errors->has('to_date'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('to_date') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>--}}



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
