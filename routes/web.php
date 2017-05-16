<?php
Route::get('/','CommonController@index');
Route::post('/register','CommonController@register');
Route::post('/login','CommonController@login');

Route::group(['middleware'=>['user']],function(){
  Route::any('/dashboard','CommonController@dashboard');
  /**
  * Jobs content
  */
  Route::get('/jobs','CommonController@jobs');
  Route::post('load-job','JobsController@loadJob');

  /**
  * Candidates Section
  */
  Route::get('/candidates','CommonController@candidates');

  Route::get('/logout','CommonController@logout');

  /**
  * Clients Section
  */
  Route::get('/clients','CommonController@clients');
  Route::post("/load-clientData",'ClientController@loadClientData');


});
