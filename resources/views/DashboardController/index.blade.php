@extends('layouts.atllayout', ['title' => 'Dashboard', 'menukey' => ''])

@section('content')


<div class="row" style="margin-bottom : 15px;justify-content: center;">
        <div class="col-sm-6 col-lg-3 col-6" style="width: 100%">
            <div class="card shadow-sm" style="min-height: 130px; width: 100%">
                <h5 class="card-header bg-primary text-white">
                    <div class="row">
                        <div class="col">Today Stats</div>
                    </div>
                </h5>
                <div class="card-body width-full" style="width: 100%">
                    <center>
                        @php
                            $stas = App\Model\Stat::query()->whereRaw( DB::raw('DATE(created_at) = curdate()'))->first();
                        @endphp
                        <div>
                            <table class="table table-hover m-0">
                                <tbody>
                                <tr>
                                    <th scope="row">Online Users </th>
                                    <td class="text-right">{{$stas->online}}</td>
                                </tr>
                                <tr>
                                    <th scope="row">Confession posts today</th>
                                    <td class="text-right">{{$stas->post_today}}</td>
                                </tr>

                                <tr>
                                    <th scope="row">Replies today</th>
                                    <td class="text-right">{{$stas->replies_today}}</td>
                                </tr>

                                <tr>
                                    <th scope="row">Like today</th>
                                    <td class="text-right">{{$stas->feel_today}}</td>
                                </tr>

                                <tr>
                                    <th scope="row">Comment today</th>
                                    <td class="text-right">{{$stas->comment_today}}</td>
                                </tr>

                                <tr>
                                    <th scope="row">Shares today</th>
                                    <td class="text-right">{{$stas->share_today}}</td>
                                </tr>

                                <tr>
                                    <th scope="row">reported confessions</th>
                                    <td class="text-right">{{$stas->report_today}}</td>
                                </tr>


                                </tbody>
                            </table>
                        </div>
                    </center>
                </div>
            </div>
        </div>

</div>






@endsection
