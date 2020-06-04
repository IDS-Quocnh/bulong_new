@extends('layouts.atllayout', ['title' => 'Report Center', 'menukey' => 'dataCenter'])

@section('content')
<nav aria-label="breadcrumb" class="pt-2">
    <ol class="breadcrumb bg-light">
        Report Confession Management
    </ol>
</nav>

<div class="card">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-body">
                    @foreach($list as $item)
                    <div style="background-color: #f1f1f1; border-radius: 3px; margin-top: 10px;width: 600px ; position: relative" class="report-div" >
                        <div style="display: flex; margin-left: 15px; padding: 15px 5px">
                            <img src="/{{$item->avatar}}" style="width: 50px; height: 50px; border-radius: 500px" alt="">
                            <div>
                                <div style="margin-left: 15px">
                                    <div style="display: flex; " >
                                        <div style="font-weight: bold; color: #429cb1">{{$item->username}}</div>
                                        <div style="position: absolute; right:25px">
                                            <a href="/post/{{$item->confession_id}}" target="_blank"><button style=" padding: 2px 10px" class="btn btn-primary"> view</button></a>
                                            <button report-id="{{$item->id}}" style="margin-left:5px; padding: 2px 10px" class="btn btn-success inorge"> Ignore</button>
                                            <button report-id="{{$item->id}}" confession-id="{{$item->confession_id}}" style="margin-left:5px; padding: 2px 10px" class="btn btn-danger delete"> Delete</button>
                                        </div>
                                    </div>
                                    <div>
                                        <b>report by</b> : <span style="color: #429cb1">{{$item->report_user_name}}</span>
                                        <br><br>
                                        <b>Category</b> : <span style="color: #429cb1">{{$item->reason}}</span>
                                        <br><br>
                                        <b>Details</b> : <span style="color: #429cb1">{{$item->details}}</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>
{{ csrf_field() }}
<script>
    $(".inorge").click(function(){
        var token = $("[name='_token']").first().val();
        var id = $(this).attr("report-id");
        var sefl = $(this);
        $.post("/report/delete",
        {
            _token: token,
            id: id,
        },
        function(data, status){
            sefl.closest(".report-div").remove();
        });
    })

    $(".delete").click(function(){
        var token = $("[name='_token']").first().val();
        var id = $(this).attr("confession-id");
        var sefl = $(this);
        $.post("/confessions/delete",
            {
                _token: token,
                confession_id: id,
            },
            function(data, status){
                sefl.closest(".report-div").remove();
            });
    });


</script>
@endsection
