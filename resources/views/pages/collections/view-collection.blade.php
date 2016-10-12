@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading">Collection View</div>

                <div class="panel-body">
                  <ul class="collection_item_listing">
                    {{ $collection->name }}

                    @if($items)
                      @foreach($items as $item)
                        <li class="{{ $item->type }}">
                            <p class="item_name">{{ $item->identifier }}</p>
                            <img src="/images/items/{{ $item->image }}.jpg" alt="Image of {{ $item->identifier }}" class="item_image"/>
                        </li>
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
