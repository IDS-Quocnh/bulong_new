@extends('admin.layouts.app')

@section('breadcrumb')
<div class="row page-titles">
    <div class="col-md-5 align-self-center">
        <h4 class="text-themecolor">Settings</h4>
    </div>
    <div class="col-md-7 align-self-center text-right">
        <div class="d-flex justify-content-end align-items-center">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
                <li class="breadcrumb-item active">Settings</li>
            </ol>
            <!-- <button type="button" class="btn btn-info d-none d-lg-block m-l-15"><i class="fa fa-plus-circle"></i> Create New</button> -->
        </div>
    </div>
</div>
@stop

@section('content')

<div class="row">
    <div class="col-md-12">
        @include('layouts.errors-and-messages')

        <div class="card card-body">
            <div class="row">
                <div class="col-sm-12 col-xs-12">
                    <form method="POST" action="{{ route('admin.settings.update') }}" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <label for="exampleInputEmail1">Upload Sponsor Image</label><br>
                            <img src="{{ asset('storage/' . $setting['sponsor_image']) }}" width="200">
                            <input type="file" class="form-control" name="sponsor_image" accept="image/*">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Insert Sponsor Url</label>
                            <input type="text" class="form-control" placeholder="Enter sponsor url" name="sponsor_url" value="{{ $setting['sponsor_url'] }}">
                        </div>
                        <button type="submit" class="btn btn-success waves-effect waves-light m-r-10"><i class ="fa fa-save"></i> Save Changes</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@stop
