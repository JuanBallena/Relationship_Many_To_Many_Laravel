@extends('welcome')

@section('body')

<h3>Edit job</h3>
<form action="{{ route('jobs.update', $job->id) }}" method="post" id="js-form-update-job">
  <ul class="errors"></ul>
  @csrf
  {!! method_field('PUT') !!}
  <div class="row">
    <div class="col-xl-7">
      <div class="mb-3">
        <input type="text" class="form-control" name="title" value="{{ $job->title }}">
        <span class="text-danger error-title"></span>
      </div>
    </div>
    <div class="col-xl-7">
      <div class="mb-3">
        @foreach($seasons as $season)

        <input 
          class="form-check-input" 
          type="checkbox"
          name="seasons[]"
          value="{{ $season->id }}"
          {{ $job->seasons->pluck('id')->contains($season->id) ? 'checked' : '' }}  
        >
          {{ $season->description }}
        @endforeach
      </div>
    </div>
    <div class="col-xl-7">
      <div class="mb-3">
        <textarea id="editor" name="description">{{ $job->description }}</textarea>
        <span class="text-danger error-description"></span>
      </div>
    </div>
    <div class="col-xl-7">
      <div class="mb-3">
        <textarea id="editor2" name="demand">{{ $job->demand }}</textarea>
        <span class="text-danger error-demand"></span>
      </div>
    </div>
    <div class="col-xl-7">
      <button type="submit" class="btn btn-success btn-sm">
        send
      </button>
    </div>
  </div>
</form>

@endsection