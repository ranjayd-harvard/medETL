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

          <img src="https://source.unsplash.com/random/{{$charity->id}}"/>
          <br><br>
          <a class='btn btn-primary' href='/charitys/{{ $charity->id }}/edit'><i class='fa fa-pencil'></i> Edit</a>
          <a class='btn btn-danger' href='/charitys/{{ $charity->id }}/delete'><i class='fa fa-trash'></i> Delete</a>

          <br><br>

      </div>
    </div>
</div>
@endsection
