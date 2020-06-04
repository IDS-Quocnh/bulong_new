@extends('layouts.atllayout', ['title' => 'Poll', 'menukey' => 'dataCenter'])

@section('content')
<div class="card">
    @if(Auth::user()->is_admin == 1)
        <div class="top-card-button-wrapper">
            <a href="{{route('poll/add')}}" type="button" class="btn btn-success btn-sm">Add New</a>
        </div>
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
    <div style="width: 100%;overflow: scroll">
        <table class="table datatable-button-html5-basic">
           <thead>
              <tr class="bg-primary border border-secondary text-white">
                  <th scope="col" style="width: 150px"></th>
                  <th scope="col" style="width: 100px">Active</th>
                 <th scope="col">Poll Question</th>
                 <th scope="col">Poll 1</th>
                 <th scope="col" style="width: 150px">Poll 1 count</th>
                 <th scope="col">Poll 2</th>
                 <th scope="col" style="width: 150px">Poll 2 count</th>
                {{-- <th scope="col">Poll 3</th>
                 <th scope="col" style="width: 150px">Poll 3 count</th>
                 <th scope="col">Poll 4</th>
                 <th scope="col" style="width: 150px">Poll 4 count</th>
                 <th scope="col">Poll 5</th>
                 <th scope="col" style="width: 150px">Poll 5 count</th>
                 <th scope="col">Poll 6</th>
                  <th scope="col" style="width: 150px">Poll 6 count</th>--}}
              </tr>
           </thead>
           <tbody class="table-bordered">
           @foreach ($list as $item)
              <tr>
                  <td class="align-middle text-center " style="width: 150px">
                      @if(Auth::user()->is_admin == 1)
                          <a href="{{route('poll/edit',['id' => $item->id])}}" class="btn btn-sm btn-primary">Edit</a>
                          <form method="POST" action="{{ route('poll/delete') }}" style="display: inline-block">
                              {{ csrf_field() }}
                              <input type="hidden" name="id" value="{{$item->id}}" />
                              <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                          </form>
                      @endif
                  </td>
                  <td class="align-middle">{{$item->active == 1 ? 'active' : 'disable'}}</td>
                  <td class="align-middle"><a href="{{route('poll/edit',['id' => $item->id])}}">{{$item->name}}</a></td>
                  <td class="align-middle">{{$item->poll1}}</td>
                  <td class="align-middle" style="width: 150px"><span>{{$item->poll1_count}}</span> ( {{$item->total == 0 ? 0 : round($item->poll1_count / $item->total , 2 ) * 100 }} % ) </td>
                  <td class="align-middle">{{$item->poll2}}</td>
                  <td class="align-middle" style="width: 150px"><span>{{$item->poll2_count}}</span> ( {{$item->total == 0 ? 0 : round($item->poll2_count / $item->total , 2 ) * 100 }} % ) </td>
                  {{--<td class="align-middle">{{$item->poll3}}</td>
                  <td class="align-middle" style="width: 150px"><span>{{$item->poll3_count}}</span> ( {{$item->total == 0 ? 0 : round($item->poll3_count / $item->total , 2 ) * 100 }} % ) </td>
                  <td class="align-middle">{{$item->poll4}}</td>
                  <td class="align-middle" style="width: 150px"><span>{{$item->poll4_count}}</span> ( {{$item->total == 0 ? 0 : round($item->poll4_count / $item->total , 2 ) * 100 }} % ) </td>
                  <td class="align-middle">{{$item->poll5}}</td>
                  <td class="align-middle" style="width: 150px"><span>{{$item->poll5_count}}</span> ( {{$item->total == 0 ? 0 : round($item->poll5_count / $item->total , 2 ) * 100 }} % ) </td>
                  <td class="align-middle">{{$item->poll6}}</td>
                  <td class="align-middle" style="width: 150px"><span>{{$item->poll6_count}}</span> ( {{$item->total == 0 ? 0 : round($item->poll6_count / $item->total , 2 ) * 100 }} % ) </td>--}}
              </tr>
           @endforeach
           </tbody>
        </table>
    </div>
</div>
@endsection
