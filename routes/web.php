<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of the routes that are handled
| by your application. Just tell Laravel the URIs it should respond
| to using a Closure or controller method. Build something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

/**
* Charity resource
*/
# Index page to show all the charitys
Route::get('/charitys', 'CharityController@index')->name('charitys.index');
#->middleware('auth');
# Show a form to create a new book
Route::get('/charitys/create', 'CharityController@create')->name('charitys.create');
#->middleware('auth');
# Process the form to create a new charitys
Route::post('/charitys', 'CharityController@store')->name('charitys.store');
# Show an individual charity
Route::get('/charitys/{title}', 'CharityController@show')->name('charitys.show');
# Show form to edit a charitys
Route::get('/charitys/{id}/edit', 'CharityController@edit')->name('charitys.edit');
# Process form to edit a book
Route::put('/charitys/{id}', 'CharityController@update')->name('charitys.update');
# Get route to confirm deletion of book
Route::get('/charitys/{id}/delete', 'CharityController@delete')->name('charitys.destroy');
# Delete route to actually destroy the book
Route::delete('/charitys/{id}', 'CharityController@destroy')->name('charitys.destroy');




Route::get('/debug', function() {

    echo '<pre>';

    echo '<h1>Environment</h1>';
    echo App::environment().'</h1>';

    echo '<h1>Debugging?</h1>';
    if(config('app.debug')) echo "Yes"; else echo "No";

    echo '<h1>Database Config</h1>';
    /*
    The following line will output your MySQL credentials.
    Uncomment it only if you're having a hard time connecting to the database and you
    need to confirm your credentials.
    When you're done debugging, comment it back out so you don't accidentally leave it
    running on your live server, making your credentials public.
    */
    //print_r(config('database.connections.mysql'));

    echo '<h1>Test Database Connection</h1>';
    try {
        $results = DB::select('SHOW DATABASES;');
        echo '<strong style="background-color:green; padding:5px;">Connection confirmed</strong>';
        echo "<br><br>Your Databases:<br><br>";
        print_r($results);
    }
    catch (Exception $e) {
        echo '<strong style="background-color:crimson; padding:5px;">Caught exception: ', $e->getMessage(), "</strong>\n";
    }

    echo '</pre>';

});

Auth::routes();

Route::get('/home', 'HomeController@index');

Auth::routes();

Route::get('/home', 'HomeController@index');
