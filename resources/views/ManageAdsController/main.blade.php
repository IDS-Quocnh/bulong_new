@extends('layouts.atllayout', ['title' => isset($item) ? 'Edit Category' : 'Add Category' ])

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

    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-body">
                    <form class="form-horizontal" method="POST" {{ isset($item) ? 'action=' . route('manage-ads/edit') :'action=' . route('manage-ads/edit')  }}  enctype="multipart/form-data" >
                        {{ csrf_field() }}


                        <div class="form-group{{ $errors->has('top_ad') ? ' has-error' : '' }}">
                            <label for="top_ad" class="col-md-4 control-label">Top Ad</label>

                            <div class="col-md-6">
                                <textarea style="width: 400px; height: 200px" id="top_ad" type="text" class="form-control" name="top_ad" autofocus>{{isset($item) ? $item->top_ad : ''}}</textarea>
                                @if ($errors->has('top_ad'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('top_ad') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('right_panel_ad') ? ' has-error' : '' }}">
                            <label for="right_panel_ad" class="col-md-4 control-label">Right Panel Ad</label>

                            <div class="col-md-6">
                                <textarea style="width: 400px; height: 200px" id="right_panel_ad" type="text" class="form-control" name="right_panel_ad" >{{isset($item) ? $item->right_panel_ad : ''}}</textarea>

                                @if ($errors->has('right_panel_ad'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('right_panel_ad') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('center_ad') ? ' has-error' : '' }}">
                            <label for="center_ad" class="col-md-4 control-label">Center Ad</label>

                            <div class="col-md-6">
                                <textarea style="width: 400px; height: 200px" id="center_ad" type="text" class="form-control" name="center_ad" >{{isset($item) ? $item->center_ad : ''}}</textarea>

                                @if ($errors->has('center_ad'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('center_ad') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>



                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <button type="submit" class="btn btn-primary btn-sm">
                                    Submit
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
