<?php
Route::get('/', 'PostsController@index');
Route::resource('posts', 'PostsController');

Route::get('/login', function() {
    return View::make('user.login');
});

Route::post('/login', function() {
    $validator = Validator::make(
        Input::all(),
        [
            'email' => 'required',
            'password' => 'required',
        ]
    );

    if($validator->fails()){
        return Redirect::to('/login')->withErrors($validator);
    }

    if(Auth::attempt(['email'=>Input::get('email'), 'password'=>Input::get('password')], true)){
        return Redirect::intended('/');
    }

    return Redirect::to('/login')->withInput(Input::except('password'))->withErrors(['authenticated'=>'Incorrect email or password']);
});