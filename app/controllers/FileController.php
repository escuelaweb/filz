<?php

class FileController extends \BaseController {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		//
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		return View::make('files.create');
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		if(Input::hasFile('file'))
		{
			try
			{
				//Moviendo el archivo
				$destination	= public_path() . '/files/';
				$name 			= Auth::user()->name . Input::file('file')->getClientOriginalName();
				$name 			= md5($name) . '.' . Input::file('file')->guessExtension();
				$file 			= Input::file('file')->move($destination, $name);
			
				//Guardando en BDD el registro de archivo
				$fileRecord 			= new Filz\File();
				$fileRecord->basedir 	= 'files/';
				$fileRecord->filename 	= $name;
				$fileRecord->size 		= $file->getSize();
				$fileRecord->mime_type 	= $file->getMimeType();

				$fileRecord->save();

				return Redirect::route('file.show', $fileRecord->id);
			}
			catch(Exception $e)
			{
				return Redirect::route('file.create')->with('message', $e->getMessage());
			}
		}
		else
		{
			return Redirect::route('file.create')->with('message', 'Debes subir un archivo');
		}
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		$file = Filz\File::find($id);

		if($file != null)
		{
			echo '<a href="' . asset($file->basedir . $file->filename) . '">Ver Archivo</a>';
		}
		else
		{
			echo 'El archivo no existe';
		}
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		//
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		//
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		//
	}

}