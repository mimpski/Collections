@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading">Collection View</div>

                <div class="panel-body">
                  <ul>
                    {{ $collection->name }}

                    @if($items)
                      @foreach($items as $item)
                        <li>{{ $item->identifier }}</li>
                      @endforeach
                    @else
                      <p>Nothing in this collection</a></p>
                    @endif
                  </ul>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
