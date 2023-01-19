<?php
Route::get ('/', function () {
   return view('welcome');});
Route::get('/checkEmployee', function () {
    return view('checkEmployee');
});
Route::get('session/set','SessionController@storeSessionData');
?>