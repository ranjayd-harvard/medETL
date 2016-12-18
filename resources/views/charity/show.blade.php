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
        <h5>PS: ( Images are random and will change with every refresh. Later the functionality to upload the images will be added. ) </h5>
        <a class='btn btn-success' href='/charitys'>&larr; Return to all charitys</a>
      <hr>
          <h1 class='truncate'>{{ $charity->charity_name }}</h1>

          <p class='truncate'>{{ $charity->charity_desc}} </p>

          <img height="400px" class="charityImg" src="https://source.unsplash.com/random/{{$charity->id}}"/>

          <h2>Feature for the charity:
          <a class='btn btn-success' href='/charitys/create'>Add Feature</a></h2>
          @foreach($charity->features()->get() as $feature)
            <div class="row">
              <div class="col-md-1"></div>
              <div class="col-md-11">
              <h4> {{ $feature->name }}</h4>
              <p>{{ $feature->description }}</p>
              @if(Auth::check())
              <a class='btn btn-primary' href='/charitys/{{ $charity->id }}/edit'><i class='fa fa-pencil'></i> Edit Feature</a>
              &nbsp;&nbsp;
              <a class='btn btn-danger' href='/charitys/{{ $charity->id }}/delete'><i class='fa fa-trash'></i> Delete Feature</a>
              @endif
              </div>
            </div>
          @endforeach

          <br>

          <h2>Members for the charity:
          <a class='btn btn-success' href='/charitys/create'>Add Member</a></h2>
          @foreach($charity->members()->get() as $member)
          <div class="row">
            <div class="col-md-1"></div>
            <div class="col-md-11">

              <h3> {{ $member->member_name }}</h3>
              <p>{{ $member->profile_desc }}</p>
              @if(Auth::check())
              <a class='btn btn-primary' href='/charitys/{{ $charity->id }}/edit'><i class='fa fa-pencil'></i> Edit Member</a>
              &nbsp;&nbsp;
              <a class='btn btn-danger' href='/charitys/{{ $charity->id }}/delete'><i class='fa fa-trash'></i> Delete Member</a>
              @endif
            </div>
          </div>
          @endforeach

          <br>

          @if(Auth::check())
          <h2>Management Links:</h2>
          <a class='btn btn-primary' href='/charitys/{{ $charity->id }}/edit'><i class='fa fa-pencil'></i> Edit Charity</a>
          <a class='btn btn-danger' href='/charitys/{{ $charity->id }}/delete'><i class='fa fa-trash'></i> Delete Charity</a>
          @endif

          <br><br>

      </div>
    </div>
</div>
@endsection
