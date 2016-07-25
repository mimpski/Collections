@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading">Create Collection</div>

                <div class="panel-body">
                  {!! Form::open(['route' => 'save_collection']) !!}

                    {!! Form::hidden('user_id', $user) !!}

                    <div class="form-group">
                      {!! Form::label('name', 'Name your collection:') !!}&nbsp;&nbsp;
                      <small>Don't worry, you can change this later!</small>
                      {!! Form::text('name', 'awesome collection', ['class' => 'form-control']) !!}
                    </div>

                    <div class="form-group">
                      {!! Form::submit('Start adding to your collection!', ['class' => 'btn btn-primary']) !!}
                    </div>

                  {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
