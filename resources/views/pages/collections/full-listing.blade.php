@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading">Add items to {{ $collectionDetails->name }} - ({{ $collectionDetails->id }})</div>
                <div class="panel-heading preview-form">

                    {!! Form::open(['route' => 'view_collection']) !!}
                      {!! Form::hidden('collection_id', $collectionDetails->id) !!}
                      <div class="final-list">
                      </div>
                      {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
                    {!! Form::close() !!}

                </div>
                <div class="panel-body">
                  <ul>
                    @foreach($items as $item)
                      <li class="item" id="{{ $item->id }}">{{ $item->id }}</li>
                    @endforeach
                    <li class="button submit">Preview</li>
                    <li class="button clear">Clear</li>
                    <li class="button save">Save</li>
                  </ul>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
<style>
.preview-form{
  display: none;
}
  .item, .button {
    display: inline-block;
    margin: 10px;
    padding: 10px;
    border: solid 1px black;
    color: black;
  }

  .item.active {
    border: solid 1px red;
    color: red;
    background-color: #eee;
  }
  .button{
    background-color: yellow;
    cursor: pointer;
  }
  .clear{
    background-color: red;
  }
  .save{
    background-color: green;
  }
</style>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
<script>
$(document).ready(function(){

var limit = 3;
var teamArray = [];
var collectionID = 'Collection id is {{ $collectionDetails->id }}';

console.log (collectionID);
$(".item").on("click", function(e){

  if($("ul li.active").length >= limit) {
    $("#message").slideDown();
    if($(this).hasClass("active")){
      $(this).toggleClass("active");
      $("#message").slideUp();
    }
  }else{
   $("#message").slideUp();
   $(this).toggleClass("active");
  }
});
$(".submit").on("click", function(e){
  $('.active').each( function(i,e) {
      teamArray.push($(e).attr('id'));
  });
  $.each(teamArray, function(i,v){
    $('.final-list').append(v);
  });
  console.log(teamArray);
});
$(".clear").on("click", function(){
  teamArray = [];
  $('.final-list').empty();
  $('.final-list').append(teamArray);
});

$(".save").on("click", function(){
  for (var i=0; i<teamArray.length; i++) {
      $('<input>').attr('type','hidden').attr('value',teamArray[i]).attr('name','item' + [i]).appendTo('.final-list');
    }
  $('.preview-form').toggle('display','block');
});


});
</script>
