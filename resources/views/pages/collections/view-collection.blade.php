@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading">Collection View</div>

                <div class="panel-body">
                  <div class="collection_item_listing">
                    {{ $collection->name }}

                    @if($items)
                      @foreach($items as $item)
                        <div class="{{ $item->type }} collection_item_card">
                            <p class="item_name">{{ $item->identifier }}</p>
                            <!-- <img src="/images/items/{{ $item->image }}.jpg" alt="Image of {{ $item->identifier }}" class="item_image"/> -->
                        </div>
                      @endforeach
                    @else
                      <p>Nothing in this collection</a></p>
                    @endif

                  </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
