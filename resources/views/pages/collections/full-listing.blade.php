@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading">Add items to {{ $collectionDetails->name }} - ({{ $collectionDetails->id }})</div>
                <div class="panel-body">
                  {!! Form::open(['route' => 'view_collection']) !!}
                    {!! Form::hidden('collection_id', $collectionDetails->id) !!}
                    @foreach($items as $item)
                    <div style="display: inline-block; padding: 10px 20px;" class="item-selection">

                        <input type="checkbox" class="item" name="item[]" value="{{ $item->id }}">

                      {{ $item->id }}

                    </div>
                    @endforeach
                    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
                  {!! Form::close() !!}
                </div>

            </div>
        </div>
    </div>
</div>
@endsection

@section('footer-scripts')
<script>
  $(document).ready(function() {

      var sites = {!! json_encode($selectedItems->toArray()) !!};

      sites.forEach(function(value) {
          $(".item[value='" + value.item +"']").prop("checked",true);
          console.log(value.item);
      });

  });
</script>
@endsection
