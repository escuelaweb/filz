<html>
<head>
	<title>Sube un archivo</title>
	<link rel="stylesheet" href="{{asset('css/style.css')}}">
</head>
<body>

	<img src="{{asset('img/1.png')}}" alt="1 png">

	@if(Session::has('message'))
	<p>{{Session::get('message')}}</p>
	@endif

	{{Form::open(array('route' => 'file.store', 'files' => true, 'method' => 'POST'))}}

	{{Form::label('file', 'Sube tu archivo: ')}}

	@if($errors->has('file'))
	{{Form::label('file', $errors->first('file'))}}
	@endif

	{{Form::file('file')}}

	<br>

	{{Form::submit()}}

	{{Form::close()}}
</body>
</html>