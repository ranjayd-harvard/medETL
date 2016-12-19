@extends('layouts.app')

@section('title')
    {{ $charity->title }}
@endsection

@section('head')
    <link href='/css/p4.css' rel='stylesheet'>
@endsection

@section('content')

<div class="container">
    <div class="row">
      <div class="col-md-12">
        <h5>PS: ( Images are random ( courtesy of https://source.unsplash.com ) and will change with every refresh. Later the functionality to upload the images will be added. ) </h5>
        <a class='btn btn-success' href='/charitys'>&larr; Return to all charitys</a>
      <hr>
          <h1 class='truncate'>{{ $charity->charity_name }}</h1>
          <h5> {{ $charity->address1 }}, {{ $charity->city }} {{ $charity->state }} {{ $charity->zipcode }}</h5>

          <p class='truncate'>{{ $charity->charity_desc}} </p>

          <img height="400px" class="charityImg" src="https://source.unsplash.com/random/{{$charity->id}}"/>
          <hr>
          <h2>Features for the charity:
            @if(Auth::check() and Auth::user()->id == $charity->user_id)
              <a class='btn btn-success' href='/charitys/{{ $charity->id }}/feature/create'>Add Feature</a>
            @endif
          </h2>
          @foreach($charity->features()->get() as $feature)
            <div class="row">
              <div class="col-md-12">
              <h4> {{ $feature->name }}</h4>
              <p>{{ $feature->description }}</p>
              @if(Auth::check() and Auth::user()->id == $charity->user_id)
              <a class='btn btn-primary' href='/charitys/{{ $charity->id }}/feature/{{ $feature->id }}/edit'><i class='fa fa-pencil'></i> Edit Feature</a>
              &nbsp;&nbsp;
              <a class='btn btn-danger' href='/charitys/{{ $charity->id }}/feature/{{ $feature->id }}/delete'><i class='fa fa-trash'></i> Delete Feature</a>
              @endif
              </div>
            </div>
          @endforeach

          <hr>

          <h2>Members for the charity:
            @if(Auth::check() and Auth::user()->id == $charity->user_id)
              <a class='btn btn-success' href='/charitys/{{ $charity->id }}/member/create'>Add Member</a>
            @endif
          </h2>
          @foreach($charity->members()->get() as $member)
          <div class="row">
            <div class="col-md-3">
              <div class="profilePic">
              </div>
            </div>
            <div class="col-md-9">

              <h3> {{ $member->member_name }}</h3>
              <p>{{ $member->profile_desc }}</p>
              @if(Auth::check() and Auth::user()->id == $charity->user_id )
              <a class='btn btn-primary' href='/charitys/{{ $charity->id }}/member/{{ $member->id }}/edit'><i class='fa fa-pencil'></i> Edit Member</a>
              &nbsp;&nbsp;
              <a class='btn btn-danger' href='/charitys/{{ $charity->id }}/member/{{ $member->id }}/delete'><i class='fa fa-trash'></i> Delete Member</a>
              @endif
            </div>
          </div>
          @endforeach

          <br>

          @if(Auth::check() and Auth::user()->id == $charity->user_id )
          <h2>Management Links:</h2>
          <a class='btn btn-primary' href='/charitys/{{ $charity->id }}/edit'><i class='fa fa-pencil'></i> Edit Charity</a>
          <a class='btn btn-danger' href='/charitys/{{ $charity->id }}/delete'><i class='fa fa-trash'></i> Delete Charity</a>
          @endif

          <br><br>

      </div>
    </div>
</div>
@endsection
