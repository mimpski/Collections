@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
            <div class="card">
                <div class="card-header">Edit Collection</div>

                <div class="card-block">
                  {!! Form::open(['route' => 'update_collection']) !!}

                    {!! Form::hidden('id', $collection->id) !!}

                    <div class="form-group">
                      {!! Form::label('name', 'Name your collection:') !!}&nbsp;&nbsp;
                      {!! Form::text('name', $collection->name, ['class' => 'form-control']) !!}
                    </div>

                    <div class="form-group">
                      {!! Form::submit('Save changes!', ['class' => 'btn btn-primary']) !!}
                    </div>

                  {!! Form::close() !!}

                </div>
              </div>
              <div class="card">

                <div class="card-header">Featured in this collection</div>

                <div class="card-block">
                  @if($items)
                  <div class="collection_item_listing">
                    @foreach($items as $item)
                    <div class="{{ $item->type }} collection_item_card">
                        <p class="collection_item_name">{{ $item->identifier }}</p>
                        <!-- <img src="/images/items/{{ $item->image }}.jpg" alt="Image of {{ $item->identifier }}" class="item_image"/> -->
                    </div>
                    @endforeach
                  </div>
                    <a href="/update-listing/{{$collection->id}}">Change these items</a>
                  @else
                    <p>Nothing in this collection - <a href="/update-listing/{{$collection->id}}">Why not add something?</a></p>
                  @endif
                </div>

            </div>
    </div>
</div>
@endsection
