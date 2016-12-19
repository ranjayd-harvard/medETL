@extends('layouts.app')

@section('title')
    Edit member for Charity
@stop

@section('content')

    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">Editing member ( {{ $member->member_name }} ) Charity : <strong>{{ $charity->charity_name }}</strong></div>
                    <div class="panel-body">
                      <form class="form-horizontal" method='POST' action='/charitys/{{ $charity->id }}/member/{{ $member->id }}'>
                          {{ method_field('PUT') }}

                          {{ csrf_field() }}

                          <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                              <label for="name" class="col-md-4 control-label">member Name</label>

                              <div class="col-md-6">
                                  <input id="name" type="text" class="form-control" name="name" value="{{ old('name',$member->member_name) }}" required autofocus>

                                  @if ($errors->has('name'))
                                      <span class="help-block">
                                          <strong>{{ $errors->first('name') }}</strong>
                                      </span>
                                  @endif
                              </div>
                          </div>

                          <div class="form-group{{ $errors->has('description') ? ' has-error' : '' }}">
                              <label for="password" class="col-md-4 control-label">member Description</label>

                              <div class="col-md-6">
                                  <textarea id="description" name="description" rows="5" class="form-control">{{$member->profile_desc}}</textarea>

                                  @if ($errors->has('description'))
                                      <span class="help-block">
                                          <strong>{{ $errors->first('description') }}</strong>
                                      </span>
                                  @endif
                              </div>
                          </div>


                        <div class="form-group">
                                <div class="col-md-8 col-md-offset-4">
                                    <button type="submit" class="btn btn-primary">
                                        Save
                                    </button>

                                    <a class='btn btn-danger' href='/charitys/{{$charity->id}}'>Cancel</a>

                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>


@stop
