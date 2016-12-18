@extends('layouts.app')

@section('head')
    <link href='/css/p4.css' rel='stylesheet'>
@endsection

@section('title')
    View all Charities
@endsection

@section('content')

<div class="container">
    <div class="row">
      <div class="col-md-12">
        <h1>Your search results : {{ sizeof($charitys)}} charities</h1>
        <h5>PS: ( Images are random and will change with every refresh. Later the functionality to upload the images will be added. ) </h5>
        <hr>

        @if(sizeof($charitys) == 0)
            <h4>You have not added any Charities yet, please <a class='btn btn-success' href='/charitys/create'>Add a Charity</a> now to get started</a></h4>
            <br><br><br>
        @else
            <div id='charities' class='cf'>
                @foreach($charitys as $charity)

                <div class="row">
                    <div class="col-md-4 colPadding">
                      <img height="200px" width="300px" class="charityImg" " src="https://source.unsplash.com/random/{{ $charity->id }}"/>
                    </div>
                    <div class="col-md-8 colPadding">
                      <section class='charity'>

                          <a href='/charitys/{{ $charity->id }}'><h3 class='truncate'>{{ $charity->charity_name }}</h3></a>
                          {{ $charity->charity_desc }}
                          <br><br>
                          <a class='btn btn-info' href='/charitys/{{ $charity->id }}'><i class='fa fa-eye'></i> View Charity</a>
                          &nbsp;&nbsp;
                          @if(Auth::check())
                          <a class='btn btn-primary' href='/charitys/{{ $charity->id }}/edit'><i class='fa fa-pencil'></i> Edit Charity</a>
                          &nbsp;&nbsp;
                          <a class='btn btn-danger' href='/charitys/{{ $charity->id }}/delete'><i class='fa fa-trash'></i> Delete Charity</a>
                          @endif
                      </section>
                  </div>
                </div>

                <hr>
                @endforeach
            </div>
        @endif
    </div>
  </div>
</div>



@endsection
