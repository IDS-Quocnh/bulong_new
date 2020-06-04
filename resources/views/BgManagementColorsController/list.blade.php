@extends('layouts.atllayout', ['title' => 'Background Colors Management', 'menukey' => 'dataCenter'])

@section('content')
<div class="card">
    @if(Auth::user()->is_admin == 1)
        <div class="top-card-button-wrapper">
            <a href="{{route('bg-management-colors/add')}}" type="button" class="btn btn-success btn-sm">Add New</a>
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
    <div style="width: 100%;">
        <table class="table datatable-button-html5-basic">
           <thead>
              <tr class="bg-primary border border-secondary text-white">
                 <th scope="col">Name</th>
                 <th scope="col">Image</th>
                 <th scope="col">Tag</th>
                 <th scope="col" style="width: 150px"></th>
              </tr>
           </thead>
           <tbody class="table-bordered">
           @foreach ($list as $item)
              <tr>

                  <td class="align-middle" style="width: 250px"><a href="{{route('bg-management-colors/edit',['id' => $item->id])}}">{{$item->name}}</a></td>
                  <td class="align-middle" style="width: 250px"><a href="{{route('bg-management-colors/edit',['id' => $item->id])}}"><img src="/{{$item->image}}" style="width: 60px; height: 60px" /></a></td>
                  <td class="align-middle">{{$item->tag}}</td>
                  <td class="align-middle text-center " style="width: 150px">
                      @if(Auth::user()->is_admin == 1)
                          <a href="{{route('bg-management-colors/edit',['id' => $item->id])}}" class="btn btn-sm btn-primary">Edit</a>
                          <form method="POST" action="{{ route('bg-management-colors/delete') }}" style="display: inline-block">
                              {{ csrf_field() }}
                              <input type="hidden" name="id" value="{{$item->id}}" />
                              <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                          </form>
                      @endif
                  </td>
              </tr>
           @endforeach
           </tbody>
        </table>
    </div>
</div>
@endsection
