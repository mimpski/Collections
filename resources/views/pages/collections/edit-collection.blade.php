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
                    @foreach($items as $item)
                    <ul>
                      <li>{{ $item->identifier }}</li>
                    </ul>
                    @endforeach
                  @else
                    <p>Nothing in this collection - <a href="/update-listing/{{$collection->id}}">Why not add something?</a></p>
                  @endif
                </div>

            </div>
        </div>
    </div>
</div>
@endsection
