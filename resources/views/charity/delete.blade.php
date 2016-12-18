@extends('layouts.app')

@section('title')
    Confirm deletion: {{ $charity->charity_name }}
@endsection

@section('content')

<div class="container">
  <div class="row">
      <div class="col-md-8 col-md-offset-2">
          <div class="panel panel-default">
            <div class="panel-heading">Delete Charity : <strong>{{ $charity->charity_name }}</strong></div>
              <div class="panel-body">
                <form method='POST' action='/charitys/{{ $charity->id }}'>

                    {{ method_field('DELETE') }}

                    {{ csrf_field() }}

                    <h4>Are you sure you want to delete <strong>{{ $charity->charity_name }}</strong>?</h4>

                    <input type='submit' value='Delete' class="btn btn-danger">

                    <a class='btn btn-info' href='/charitys'>Cancel</a>

                </form>
          </div>
        </div>
      </div>
    </div>
</div>

@endsection
