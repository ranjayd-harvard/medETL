<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>CharityDB</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">

        <!-- Styles -->
        <link rel="stylesheet" href="/css/p4.css">
        <link rel="stylesheet" href="/css/grid.css">
    </head>
    <body>
        <div id="app" class="flex-center position-ref full-height">

            @if(Auth::check())
              <div class="top-right links">
                  <a href='/'>Welcome {{ Auth::user()->name }} !</a>
                  <a href='/charitys/create'>Add a Charity</a>
                  <a href='/charitys'>My Charities</a>
                  <a href='/logout'>Log out</a>
              </div>
            @else
              <div class="top-right links">
                <a href='/'>Home</a>
                <a href='/register'>Register</a>
                <a href='/login'>Log in</a>
              </div>
            @endif

            <div class="content">
              <div class="row">
                <div class="col-md-12">
                  <div class="title m-b-md">
                      {{-- load<span style="font-weight:900;">I2B2</span><br> --}}
                      load<span style="font-weight:900;">TM</span>
                  </div>
                  <br>
                  <div style="width:800px;">{!! lorem(1) !!}</div>
                  <hr>
                  <br>
                  <div class="form-group">
                      <div class="mainlinks">
                            <a class="btn btn-primary" href="/search">Start Load...</a>
                      </div>
                  </div>
              </div>
            </div>
          </div>
        </div>

        <footer class="footer">
                     <div class="container">
                       <div class="row">
                           <div class="col-md-12 links">
                             ranjayd.me &nbsp;&copy; {{ date('Y') }} &nbsp;&nbsp;
                             <a href='https://github.com/ranjayd-harvard/p4' target='_blank'><i class='fa fa-github'></i> View on Github</a> &nbsp;&nbsp;
                             <a href='http://p4.ranjayd.me/' target='_blank'><i class='fa fa-link'></i> View Live</a>
                           </div>
                         </div>
                    </div>
        </footer>
    </body>
</html>
