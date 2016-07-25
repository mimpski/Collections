@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading">Collection View</div>

                <div class="panel-body">
                  @foreach($collections as $collection)
                  <ul>
                    <li><a href="/edit-collection/{{$collection->id}}">{{ $collection->name }}</a></li>
                  </ul>
                  @endforeach
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
