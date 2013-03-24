<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Simply tell Laravel the HTTP verbs and URIs it should respond to. It is a
| breeze to setup your application using Laravel's RESTful routing and it
| is perfectly suited for building large applications and simple APIs.
|
| Let's respond to a simple GET request to http://example.com/hello:
|
|		Route::get('hello', function()
|		{
|			return 'Hello World!';
|		});
|
| You can even respond to more than one URI:
|
|		Route::post(array('hello', 'world'), function()
|		{
|			return 'Hello World!';
|		});
|
| It's easy to allow URI wildcards using (:num) or (:any):
|
|		Route::put('hello/(:any)', function($name)
|		{
|			return "Welcome, $name.";
|		});
|
*/

// SHOW Home page
Route::get('/', function()
{
	return View::make('home.index');
});

Route::post('replace', function()
{
	// If you had a database you could easily fetch the content from the database here...
	$data = array(
		"html" => '<div id="hero-content"><h1>NEW shiny content from AJAX</h1><p>This content was loaded dynamically from a route "replace" </p></div>'
	);
	
	return Response::json($data);
});

Route::post('fragments', function()
{
	// If you had a database you could easily fetch the content from the database here...
	$data = array(
		"fragments" => array(
			".votecount" => '<p class="votecount lead">14 Votes</p>'
		),
		"append-fragments" => array(
			"#hero-content" => '<div id="hero-content"><h1>NEW shiny content appended from AJAX fragment.</h1><p>This content was loaded dynamically from a route "fragments" </p></div>'
		),
		"inner-fragments" => array(
			"#hero-content" => '<div id="hero-content"><h1>NEW shiny content from AJAX fragment.</h1><p>This content was loaded dynamically from a route "fragments" </p></div>'
		)
	);
	
	return Response::json($data);
});

Route::get('votes', function()
{
	// Lets say you have "vote" model, in that case you could be able to do something like 
	// $votecount = Vote::all()->count(); and output that instead of the fixed number I have here
	$data = array(
		"html" => '<p class="votecount lead">13 Votes</p>'
	);
	
	return Response::json($data);
});

Route::post('vote', function()
{
	// Lets say you have "vote" model, in that case you could be able to do something like
	// $vote = new Vote()
	// $vote->user_id = Auth::user()->id; 
	// $vote->save();

	$data = array(
		"html" => '<a href="#" class="btn disabled"><i class="icon icon-thumbs-up"></i> Voted!</a>'
	);
	
	return Response::json($data);
});

Route::post('redirect', function()
{
	// the user will be redirected to wherever the location variable in the JSON response is set
	$data = array(
		"location" => 'someredirectroute'
	);
	
	return Response::json($data);
});

Route::get('someredirectroute', function()
{
	echo('Awesome! You have been redirected! Go '.HTML::link(URL::home(), 'HOME'));
});

Route::post('submit', function()
{
	// When the form is submitted, we can do some DB queries and let the user know that the form was submitted.

	$name = e(Input::get('name'));
	$checker = e(Input::get('checker'));

	$data = array(
		"html" => '
		<a href="#" class="btn btn-large btn-success disabled"><i class="icon icon-thumbs-up"></i>Form Submitted! Thanks</a>
		<h4>You have provided following values: </h4>
		<p>Name : '.$name.'</p>
		<p>Checker : '.($checker ? 'true' : 'false').'</p>

		'
	);
	
	return Response::json($data);
});

/*
|--------------------------------------------------------------------------
| Application 404 & 500 Error Handlers
|--------------------------------------------------------------------------
|
| To centralize and simplify 404 handling, Laravel uses an awesome event
| system to retrieve the response. Feel free to modify this function to
| your tastes and the needs of your application.
|
| Similarly, we use an event to handle the display of 500 level errors
| within the application. These errors are fired when there is an
| uncaught exception thrown in the application.
|
*/

Event::listen('404', function()
{
	return Response::error('404');
});

Event::listen('500', function()
{
	return Response::error('500');
});

/*
|--------------------------------------------------------------------------
| Route Filters
|--------------------------------------------------------------------------
|
| Filters provide a convenient method for attaching functionality to your
| routes. The built-in before and after filters are called before and
| after every request to your application, and you may even create
| other filters that can be attached to individual routes.
|
| Let's walk through an example...
|
| First, define a filter:
|
|		Route::filter('filter', function()
|		{
|			return 'Filtered!';
|		});
|
| Next, attach the filter to a route:
|
|		Router::register('GET /', array('before' => 'filter', function()
|		{
|			return 'Hello World!';
|		}));
|
*/

Route::filter('before', function()
{
	// Do stuff before every request to your application...
});

Route::filter('after', function($response)
{
	// Do stuff after every request to your application...
});

Route::filter('csrf', function()
{
	if (Request::forged()) return Response::error('500');
});

Route::filter('auth', function()
{
	if (Auth::guest()){

		// this code ensures that even when the request is AJAX, the user will be redirected to the login page. Neat!
		if (Request::ajax()) {
			$data = array(
					"location" => '../login'
				);

			return Response::json($data);
		}

		return Redirect::to('login');
	}
});
