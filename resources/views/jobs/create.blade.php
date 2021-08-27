@extends('welcome')

@section('body')

<h3>Create</h3>
<br>
<form action="{{ route('jobs.store') }}" method="post">
  @csrf
  <div class="row">
    <div class="col-xl-7">
      <h6>Title</h6>
      <div class="mb-3">
        <input type="text" class="form-control" name="title">
      </div>
    </div>
    <div class="col-xl-7">
      <h6>Seasons</h6>
      <div class="mb-3">
        @foreach($seasons as $season)
          
          <input class="checkbox" type="checkbox" name="seasons[]" value="{{ $season->id }}">
          {{ $season->description }}

        @endforeach
      </div>
    </div>
    <div class="col-xl-7">
      <h6>Description</h6>
      <div class="mb-3">
        <textarea id="editor" name="description"></textarea>
      </div>
    </div>
    <div class="col-xl-7">
      <h6>Demand</h6>
      <div class="mb-3">
        <textarea id="editor2" name="demand"></textarea>
      </div>
    </div> 
    <div class="col-xl-7">
      <div class="mb-3">
        <button type="submit" class="btn btn-success btn-sm btn-block">
          send
        </button>
      </div>
    </div>
  </div>
</form>

@endsection