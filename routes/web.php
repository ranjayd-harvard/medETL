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

# Index page to show all the charitys
Route::get('/search', 'SearchController@index')->name('search.index');

/**
* Charity resource
*/
# Index page to show all the charitys
Route::get('/charitys', 'CharityController@index')->name('charitys.index');
# Show a form to create a new charity
Route::get('/charitys/create', 'CharityController@create')->name('charitys.create')->middleware('auth');
# Process the form to create a new charity
Route::post('/charitys', 'CharityController@store')->name('charitys.store')->middleware('auth');
# Show an individual charity
Route::get('/charitys/{title}', 'CharityController@show')->name('charitys.show');
# Show form to edit a charity
Route::get('/charitys/{id}/edit', 'CharityController@edit')->name('charitys.edit')->middleware('auth');
# Process form to edit a charity
Route::put('/charitys/{id}', 'CharityController@update')->name('charitys.update')->middleware('auth');
# Get route to confirm deletion of charity
Route::get('/charitys/{id}/delete', 'CharityController@delete')->name('charitys.destroy')->middleware('auth');
# Delete route to actually destroy the charity
Route::delete('/charitys/{id}', 'CharityController@destroy')->name('charitys.destroy')->middleware('auth');


/**
* Feature resource
*/
# Show a form to create a new feature charity
Route::get('/charitys/{charity_id}/feature/create', 'FeatureController@create')->name('features.create')->middleware('auth');
# Process the form to create a new charity
Route::post('/charitys/{charity_id}/feature', 'FeatureController@store')->name('features.store')->middleware('auth');
# Show form to edit feature for charity
Route::get('/charitys/{charity_id}/feature/{id}/edit', 'FeatureController@edit')->name('features.edit')->middleware('auth');
# Process form to edit a feature for charity
Route::put('/charitys/{charity_id}/feature/{id}', 'FeatureController@update')->name('features.update')->middleware('auth');
# Get route to confirm deletion of feature
Route::get('/charitys/{charity_id}/feature/{id}/delete', 'FeatureController@delete')->name('features.destroy')->middleware('auth');
# Delete route to actually destroy the feature
Route::delete('/charitys/{charity_id}/feature/{id}', 'FeatureController@destroy')->name('features.destroy')->middleware('auth');


/**
* Member resource
*/
# Show a form to create a new member charity
Route::get('/charitys/{charity_id}/member/create', 'MemberController@create')->name('members.create')->middleware('auth');
# Process the form to create a new member to charity
Route::post('/charitys/{charity_id}/member', 'MemberController@store')->name('members.store')->middleware('auth');
# Show form to edit member for charity
Route::get('/charitys/{charity_id}/member/{id}/edit', 'MemberController@edit')->name('members.edit')->middleware('auth');
# Process form to edit a member for charity
Route::put('/charitys/{charity_id}/member/{id}', 'MemberController@update')->name('members.update')->middleware('auth');
# Get route to confirm deletion of member
Route::get('/charitys/{charity_id}/member/{id}/delete', 'MemberController@delete')->name('members.destroy')->middleware('auth');
# Delete route to actually destroy the member
Route::delete('/charitys/{charity_id}/member/{id}', 'MemberController@destroy')->name('members.destroy')->middleware('auth');


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
Route::get('/logout','Auth\LoginController@logout')->name('logout');


Route::get('/home', 'HomeController@index');
