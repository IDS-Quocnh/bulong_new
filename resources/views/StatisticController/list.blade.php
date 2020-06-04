@extends('layouts.atllayout', ['title' => 'Data Center', 'menukey' => 'dataCenter'])

@section('content')
<div class="card">
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
    <table class="table datatable-button-html5-basic">
       <thead>
          <tr class="bg-primary border border-secondary text-white">
             <th scope="col">Date</th>
             <th scope="col">online</th>
             <th scope="col">Post on day</th>
             <th scope="col">Comment on day</th>
             <th scope="col">Feel on day</th>
             <th scope="col">Replies on day</th>
             <th scope="col">share on day</th>
             <th scope="col">Report on day</th>
          </tr>
       </thead>
       <tbody class="table-bordered">
       @foreach ($list as $item)
          <tr>
             <td class="align-middle">{{$item->date}}</td>
             <td class="align-middle">{{$item->online}}</td>
             <td class="align-middle">{{$item->post_today}}</td>
             <td class="align-middle">{{$item->comment_today}}</td>
              <td class="align-middle">{{$item->feel_today}}</td>
              <td class="align-middle">{{$item->replies_today}}</td>
              <td class="align-middle">{{$item->share_today}}</td>
              <td class="align-middle">{{$item->report_today}}</td>
          </tr>
       @endforeach
       </tbody>
    </table>
</div>
@endsection
