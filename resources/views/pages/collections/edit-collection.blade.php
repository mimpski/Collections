@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading">Edit Collection</div>

                <div class="panel-body">
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

                <div class="panel-heading">Featured in this collection</div>

                <div class="panel-body">
                  @if($items)
                  <ul class="collection_item_listing">
                    @foreach($items as $item)
                      <li class="{{ $item->type }}">
                          <p class="item_name">{{ $item->identifier }}</p>
                          <img src="/images/items/{{ $item->image }}.jpg" alt="Image of {{ $item->identifier }}" class="item_image"/>
                      </li>
                    @endforeach
                    </ul>
                    <a href="/update-listing/{{$collection->id}}">Change these items</a>
                  @else
                    <p>Nothing in this collection - <a href="/update-listing/{{$collection->id}}">Why not add something?</a></p>
                  @endif
                </div>

            </div>
        </div>
    </div>
</div>
@endsection
