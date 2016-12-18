@extends('layouts.app')

@section('title')
    Confirm Member deletion
@endsection

@section('content')

<div class="container">
  <div class="row">
      <div class="col-md-8 col-md-offset-2">
          <div class="panel panel-default">
            <div class="panel-heading">Delete member <strong>{{ $member->member_name }}</strong> for <strong>{{ $charity->charity_name }}</strong></div>
              <div class="panel-body">
                <form method='POST' action='/charitys/{{ $charity->id }}/member/{{ $member->id }}'>

                    {{ method_field('DELETE') }}

                    {{ csrf_field() }}

                    <h4>Are you sure you want to delete member ( <strong>{{ $member->member_name }}</strong> ) for <strong>{{ $charity->charity_name }}</strong>?</h4>

                    <input type='submit' value='Delete' class="btn btn-primary">

                    <a class='btn btn-danger' href='/charitys/{{$charity->id}}'>Cancel</a>

                </form>
          </div>
        </div>
      </div>
    </div>
</div>

@endsection
