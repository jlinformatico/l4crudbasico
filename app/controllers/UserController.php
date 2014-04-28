<?php

class UserController extends BaseController {


	/*
	|--------------------------------------------------------------------------
	| Controlador de la autenticación de usuarios
	|--------------------------------------------------------------------------
	*/

	public function panel_admin()
	{
		return View::make('admin.panel');
	}

	/**
	 * Muestra el formulario para login.
	 */
	public function get_login()
	{
		// Verificamos que el usuario no esté autenticado
		if (Auth::check())
		{
		    // Si está autenticado lo mandamos a su panel de usuario donde estara el mensaje de bienvenida.
		    return Redirect::to('/paneladmin');
		}
		else
		// Mostramos la vista login.blade.php (Recordemos que .blade.php se omite.)
		return View::make('usuarios.login');
	}

	/**
	 * Valida los datos del usuario.
	 */
	public function post_login()
	{
		$Input = Input::all();

		$rules = array(
			'Usuario' => 'required|exists:Usuario,Username',
			'password' => 'required',
		);
		
		//Guardamos en un arreglo los datos del usuario.
		$userdata = array(
            'Usuario' => Input::get('username'),
            'password'=> Input::get('password')
        );
        
		/*
		$validator = Validator::make($Input, $rules);

		if($validator->fails())
		{
			return Redirect::back()->withErrors($validator);
		}
		else
		{
			$credentials = array('PK_Usuario' => $Input['username'], 'password' => $Input['password']);

			if(Auth::attempt($credentials))
			{

				return Redirect::to('/paneladmin');
				//return Redirect::intended('/paneladmin');

			} else {

				return Redirect::to('/login');
			}
			/**
			//Guardamos datos del usuario
			$username = Input::get('username');
			$password = Input::get('password');

			if($user = Usuario::where('PK_Usuario', '=', $username)->first())
			{
				if(Hash::check($password, $user->password))
				{
					
					Session::put('user_id', $user->id);
					Session::put('user_PKUsuario', $user->PK_Usuario);
					Session::put('user_FK_TipoUsuario', $user->FK_TipoUsuario);
					
					return Redirect::intended('/paneladmin');
					return Redirect::to('/paneladmin');
				}
				else
				{
					return Redirect::to('/login');
				}
			}
			else
			{
				return Redirect::to('/login')
					->with('mensaje_sesion', 'Tus datos son incorrectos')
				    ->withInput();;
			}
			
		}
		*/
		// Validamos los datos y además mandamos como un segundo parámetro la opción de recordar el usuario.
        if(Auth::attempt($userdata, Input::get('remember-me', 0)))
        {
        	// De ser datos válidos nos mandara a la bienvenida
        	return Redirect::to('/paneladmin');
        }
        // En caso de que la autenticación haya fallado manda un mensaje al formulario de login y también regresamos los valores enviados con withInput().
        return Redirect::to('/login')
					->with('mensaje_sesion', 'Tus datos son incorrectos')
				    ->withInput();
		
	}

	/**
	 * Muestra el formulario de login mostrando un mensaje de que cerro sesión.
	 */
	public function logout()
	{
				Session::flush();
		return Redirect::to('/');
		/**
		//si queremos que en el mismo login muestre mensaje de haber cerrado sesion
		Auth::logout();
		return Redirect::to('/login')
					->with('mensaje_sesion', 'Tu sesión ha sido cerrada.');
		*/
	}
	
	/*
	|------------------------------------------------------------------------------
	| Controlador de la gestion de usuarios del sistema por parte del administrador
	|-------------------------------------------------------------------------------
	*/
	
public function index()
	{
		// get usuarios
		//$users = Usuario::all();
		//$users=Persona::all();
		
		//return View::make('admin.usuarios.index', array('personas' => $personas, 'users'=> $users));
		//return View::make('admin.usuarios.index')->with('users', $users);
			// Con la funcion with() podemos traer todos los vendedores
		// con sus respectivos productos. Esta funcion recibe como parametro
		// alguna relacion que tenga el modelo al que se este llamando y
		// la incluye en los resultados que devuelve el get()
		$users = Usuario::with('publicacion')->get();
		//return View::make('admin.usuarios.index', array('users'=> $users));
		//Solo me lista administradores
		//$users=Usuario::where('FK_TipoUsuario','=','1')->get();
		return View::make('admin.usuarios.index')->with('users', $users);
		
		//$query=Usuario::with();
   
	}
	
	public function create()
	{
		// load the create form (app/views/admin/usuarios/create.blade.php)
		$tipousuarios = TipoUsuario::all()->lists('TipoUsuNombre', 'id');
		return View::make('admin.usuarios.create')->with('tipousuarios', $tipousuarios);
	}
	
	public function store()
	{
		// para crear usuarios
		// read more on validation at http://laravel.com/docs/validation
		$rules = array(
			'username'       => 'required',
			'email'      => 'required|email',
			'name' => 'required'
		);
		$validator = Validator::make(Input::all(), $rules);

		// process the login
		if ($validator->fails()) {
			return Redirect::to('usuarios/create')
				->withErrors($validator)
				->withInput(Input::except('password'));
		} else {
			// store
			$user = new Usuario;
			$user->username = Input::get('username');
			$user->email = Input::get('email');
			$user->name = Input::get('name');
			$user->save();

			// redirect
			Session::flash('message', 'Usuario ha sido registrado!');
			return Redirect::to('/usuarios');
		}
	}

	/**
	 */

	public function show($id)
	{
		// get the nerd
		$user = Usuario::find($id);

		// show the view and pass the nerd to it
		return View::make('admin.usuarios.show')
			->with('user', $user);
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		// get the nerd
		$user = Usuario::find($id);

		// show the edit form and pass the nerd
		return View::make('admin.usuarios.editar')
			->with('user', $user);
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		// validate
		// read more on validation at http://laravel.com/docs/validation
		$rules = array(
			'username'       => 'required',
			'email'      => 'required|email',
			'name' => 'required'
		);
		$validator = Validator::make(Input::all(), $rules);

		// process the login
		if ($validator->fails()) {
			return Redirect::to('usuarios/' . $id . '/edit')
				->withErrors($validator)
				->withInput(Input::except('password'));
		} else {
			// store
			$user = Usuario::find($id);
			$user->username       = Input::get('username');
			$user->email      = Input::get('email');
			$user->name = Input::get('name');
			$user->save();

			// redirect
			Session::flash('message', 'Usuario editado satisfactoriamente!');
			return Redirect::to('usuarios');
		}
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		// delete
		$user = Usuario::find($id);
		$user->delete();

		// redirect
		Session::flash('message', 'Usuario eliminado satisfactoriamente!');
		return Redirect::to('usuarios');
	}
	
}
