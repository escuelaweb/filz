<html>
<head>
	<title>Login</title>
</head/>
<body>
	<h1>Login</h1>

	@if( Session::has('message') )
		<p>{{Session::get('message')}}</p>
	@endif

	{{Form::open(array('url' => '/authenticate', 'method' => 'post'))}}

	<fieldset>
		{{Form::label('email', 'Email: ')}}

		@if($errors->has('email'))
		{{Form::label('email', $errors->first('email'))}}
		@endif

		{{Form::text('email', Input::old('email'))}}
	</fieldset>

	<fieldset>
		{{Form::label('password', 'Contrasena: ')}}
		
		@if($errors->has('password'))
		{{Form::label('password', $errors->first('password'))}}
		@endif

		{{Form::password('password')}}
	</fieldset>

	{{Form::submit('Iniciar Sesion')}}

	{{Form::close()}}
</body>
</html>