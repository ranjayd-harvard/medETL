@extends('layouts.app')


@section('title')
    Success!
@stop


@section('content')

<div class="container">
  <div class="row">
      <div class="col-md-8 col-md-offset-2">
          <div class="panel panel-default">
              <div class="panel-body">
                <h3>Success! The charity {{ $charity->charity_name }} was added.<h3>

                <a href='/charitys/create'>Add another one...</a>
          </div>
        </div>
      </div>
    </div>
</div>

@stop
