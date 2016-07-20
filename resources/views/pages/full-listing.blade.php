@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading">Item Listing</div>

                <div class="panel-body">
                  <ul>
                    @foreach($items as $item)
                      <li>{{ $item->id }} - <a href="add-to-collections/{{ $item->id }}">Add to collection</a></li>
                    @endforeach
                  </ul>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
