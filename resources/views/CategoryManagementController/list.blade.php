@extends('layouts.atllayout', ['title' => 'Data Center', 'menukey' => 'dataCenter'])

@section('content')
<div class="card">
    @if(Auth::user()->is_admin == 1)
        <div class="top-card-button-wrapper">
            <a href="{{route('category/add')}}" type="button" class="btn btn-success btn-sm">Add New</a>
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
    <table class="table datatable-button-html5-basic">
       <thead>
          <tr class="bg-primary border border-secondary text-white">
             <th scope="col">Name</th>
             <th scope="col">Image</th>
             <th scope="col">Slug</th>
             <th scope="col"></th>
          </tr>
       </thead>
       <tbody class="table-bordered">
       @foreach ($list as $item)
          <tr>
             <td class="align-middle"><a href="{{route('category/edit',['id' => $item->id])}}">{{$item->name}}</a></td>
             <td class="align-middle"><img src="/{{$item->image}}" style="height: 30px"/> </td>
             <td class="align-middle">{{$item->slug}}</td>
             <td class="align-middle text-center">
             @if(Auth::user()->is_admin == 1)
                  <a href="{{route('category/edit',['id' => $item->id])}}" class="btn btn-sm btn-primary">Edit</a>
                  <form method="POST" action="{{ route('category/delete') }}" style="display: inline-block">
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
@endsection
