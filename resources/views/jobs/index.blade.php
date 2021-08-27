@extends('welcome')

@section('body')

  <h3>List jobs</h3>
  
  <div class="row">
    <div class="col-xl-6">
      <ul class="list-group">
    
        @foreach($jobs as $job)
          <li class="list-group-item text-secondary">
    
            <a href="{{ route('jobs.edit', $job->id) }}">{{ $job->title }}</a> ->
    
            @foreach($job->seasons as $season)
              {{ $season->description }} |
            @endforeach
    
            <button
              class="btn btn-sm btn-warning js-btn-see-job" 
              data-seasons="{{ $job->seasons->pluck('description') }}"
              {{-- data-title="{{ $job->title }}"
              data-html="{{ $job->description }}" --}}
              data-job="{{ $job }}"
            >Ver</button>

            {{-- {{ $job->description }} --}}
               
          </li>
        @endforeach
    
      </ul>
    </div>
    <div class="col-xl-6">
      <h6>Detail Seasons</h6>
      <div class="card">
        <div class="card-header">
          <span class="js-job-title"></span>
        </div>
        <div class="card-body">
          <ul class="js-job-seasons list-unstyled"></ul>

          <hr>
          <button class="casilla btn btn-sm btn-secondary" data-casilla="1">Description</button>
          <button class="casilla btn btn-sm btn-warning" data-casilla="2">Demand</button>

          <div class="js-job-content"></div>

        </div>
      </div>
    </div>
  </div>

@endsection