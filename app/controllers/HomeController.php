<?php

class HomeController extends BaseController {
	/*
	|--------------------------------------------------------------------------
	| Default Home Controller
	|--------------------------------------------------------------------------
	|
	| You may wish to use controllers instead of, or in addition to, Closure
	| based routes. That's great! Here is an example controller method to
	| get you started. To route to this controller, just add the route:
	|
	|	Route::get('/', 'HomeController@showWelcome');
	|
	*/

	public function showWelcome()
	{
		return View::make('hello');
	}

	public function olakease()
	{
		return View::make('olakease');

	}

	public function login()
	{
		return View::make('home.login');
	}

	public function logout()
	{
		Auth::logout();
		return Redirect::to('/login')->with('message', 'Ola k ase? Cierra sesion o k ase?');
	}

	public function authenticate()
	{
		$rules = array(
			'email' => 'required|email',
			'password' => 'required|min:8'
		);

		$validator = Validator::make(Input::all(), $rules);

		if(! $validator->fails())
		{
			$user = array('email' => Input::get('email'), 'password' => Input::get('password'));
			if( Auth::attempt($user) )
			{
				return Redirect::to('/main');
			}
			else
			{
				return Redirect::to('/login')->with('message', 'Error en email o clave');
			}
		}
		else
		{
			return Redirect::to('/login')->withInput()->withErrors($validator);
		}
	}

	public function main()
	{
		echo 'Hola' . Auth::user()->name . ' ' . Auth::user()->last_name;
		echo '<br>';
		echo '<a href="' . URL::to('/logout') .'">Cerrar Sesion</a>';
		echo '<br>';
		echo '<a href="' . URL::route('file.create') .'">Subir archivo</a>';

	}

}