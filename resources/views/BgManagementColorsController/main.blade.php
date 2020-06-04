@extends('layouts.atllayout', ['title' => isset($item) ? 'Edit Background Colors' : 'Add Background Colors' ])

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
        <a href="{{route('bg-management-colors')}}" type="button" class="btn btn-primary btn-sm">back</a>
    </div>

    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-body">
                    <form class="form-horizontal" method="POST" {{ isset($item) ? 'action=' . route('bg-management-colors/edit') :'action=' . route('bg-management-colors/add')  }}  enctype="multipart/form-data" >
                        {{ csrf_field() }}


                        <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                            <label for="name" class="col-md-4 control-label">Colors  Name</label>

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

                        <div class="form-group row">
                            <label class="col-form-label ml-2 col-lg-12">Please select image for the background </label>
                            <div class="col-lg-12 ml-2">
                                <input id="file" type="file" name="image" value=""
                                       class="form-control h-auto" {{ isset($item) ? '' : 'required'}}  accept="image/x-png,image/gif,image/jpeg" />

                            </div>
                        </div>

                        <img id="img" class="ml-2 mb-2" src="{{ isset($item) ? "/" . $item->image : ''}}" style="width: 100px; {{ isset($item) ? '' : 'display: none'}}" />

                        <div class="form-group{{ $errors->has('tag') ? ' has-error' : '' }}">
                            <label for="tag" class="col-md-4 control-label">Tag (keyword user search when inputing, separate by space etc "sad bore"</label>

                            <div class="col-md-6">
                                <input id="tag" type="text" class="form-control" name="tag" value="{{isset($item) ? $item->tag : ''}}" autofocus>

                                @if ($errors->has('tag'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('tag') }}</strong>
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
    <script>

        function readURL(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();

                reader.onload = function(e) {
                    $('#img').attr('src', e.target.result);
                }

                reader.readAsDataURL(input.files[0]); // convert to base64 string
            }
        }

        $("#file").change(function(){
            readURL(this);
            //$("#img").attr("src", $(this).val());
            $("#img").show();
        });
    </script>
@endsection
