@extends('layouts.atllayout', ['title' => 'Data Center', 'menukey' => 'dataCenter'])

@section('content')
<nav aria-label="breadcrumb" class="pt-2">
    <ol class="breadcrumb bg-light">
        Data Center List
    </ol>
</nav>
@if(Auth::user()->is_admin == 1)
@endif
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
<link href="{{ asset('assets/blacktheme/atom.css') }}" rel="stylesheet">
<link href="{{ asset('assets/blacktheme/led_lights.css') }}" rel="stylesheet">
<div class="row" style="margin-bottom: 15px">
    <div class="col-12">
        <div class="card shadow-sm">
            abcs
        </div>
    </div>
</div>

@endsection
