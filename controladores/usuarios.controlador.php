<?php

class ControladorUsuarios{

	/*============================================
	Mostrar todos los registros
	============================================*/

	public function index($page){


		if ($page != null) {
			
			/*============================================
			Mostrar usuarios con paginación
			============================================*/

			$cantidad = 10;
			$desde = ($page-1)*$cantidad;

			$usuarios = ModeloUsuarios::index("usuarios", $cantidad, $desde);

		}else{

			/*============================================
			Mostrar todos los usuarios
			============================================*/

			$usuarios = ModeloUsuarios::index("usuarios", null, null);

		}

		
		if (!empty($usuarios)) {
			

			$json = array(
				"status"=>200,
				"total_registros"=>count($usuarios),
				"detalle"=> $usuarios
			);

			echo json_encode($json, true);
			return;
		}else{

			$json = array(
				"status"=>200,
				"total_registros"=>0,
				"detalle"=> "No hay ningún usuario registrado"
			);

			echo json_encode($json, true);
			return;

		}

	}
	/*============================================
	Crear un usuario
	============================================*/

	public function create($datos){
		
		/*============================================
		Validar datos
		============================================*/

		foreach ($datos as $key => $valueDatos) {
	
			if (isset($ValueDatos) && !preg_match('/^[(\\)\\=\\&\\$\\;\\-\\_\\*\\"\\<\\>\\?\\¿\\!\\¡\\:\\,\\.\\0-9a-zA-ZáéíóúÁÉÍÓÚñÑ ]+$/', $ValueDatos)) {

				$json = array(
					"status"=>404,
					"detalle"=>"Error en el campo nombre".$key
				);

				echo json_encode($json, true);
				return;
			}
		}

		/*============================================
		Validar que el Usuario no este repetido
		============================================*/

		$usuarios = ModeloUsuarios::index("usuarios", null, null);
		foreach ($usuarios as $key => $value) {
			
			if ($value->USUARIO == $datos["USUARIO"]) {

				$json = array(
					"status"=>404,
					"detalle"=>"El usuario ya existe en la base de datos"
				);

				echo json_encode($json, true);
				return;
			}
		}

		/*============================================
		Llevar datos al modelo
		============================================*/

		$datos = array( "USUARIO"=>$datos["USUARIO"],
						"NOMBRE"=>$datos["NOMBRE"],
						"APELLIDO_PATERNO"=>$datos["APELLIDO_PATERNO"],
						"APELLIDO_MATERNO"=>$datos["APELLIDO_MATERNO"],
						"PASS"=>$datos["PASS"],
						"ESTADO"=>$datos["ESTADO"]);


		$create = ModeloUsuarios::create("usuarios", $datos);
		/*============================================
		Respuesta del modelo
		============================================*/

		if ($create == "ok") {

			$json = array(
				"status"=>200,
				"detalle"=>"Registro exitoso, su usuario ha sido guardado"
			);

			echo json_encode($json, true);
			return;
		}
	}

	/*============================================
	Mostrando un solo usuario
	============================================*/

	public function show($id){
			
		/*============================================
		Mostrar todos los usuarios
		============================================*/

		$usuario = ModeloUsuarios::show("usuarios", $id);

		if (!empty($usuario)) {
			
			$json = array(
				"status"=>200,
				"detalle"=> $usuario
			);

			echo json_encode($json, true);
			return;

		}
		else{

			$json = array(
				"status"=>200,
				"total_registros"=>0,
				"detalle"=> "No hay ningún usuario registrado"
			);

			echo json_encode($json, true);
			return;

		}

	}
	/*============================================
	Editar un usuario
	============================================*/

	public function update($id, $datos){

		/*============================================
		Validar datos
		============================================*/

		foreach ($datos as $key => $valueDatos) {
	
			if (isset($ValueDatos) && !preg_match('/^[(\\)\\=\\&\\$\\;\\-\\_\\*\\"\\<\\>\\?\\¿\\!\\¡\\:\\,\\.\\0-9a-zA-ZáéíóúÁÉÍÓÚñÑ ]+$/', $ValueDatos)) {

				$json = array(
					"status"=>404,
					"detalle"=>"Error en el campo nombre".$key
				);

				echo json_encode($json, true);
				return;
			}

			/*============================================
			Llevar datos al modelo
			============================================*/

			$datos = array( "ID_USUARIO"=>$id,
							"USUARIO"=>$datos["USUARIO"],
							"NOMBRE"=>$datos["NOMBRE"],
							"APELLIDO_PATERNO"=>$datos["APELLIDO_PATERNO"],
							"APELLIDO_MATERNO"=>$datos["APELLIDO_MATERNO"],
							"PASS"=>$datos["PASS"],
							"ESTADO"=>$datos["ESTADO"]);

			$update = ModeloUsuarios::update("usuarios", $datos);
			/*============================================
			Respuesta del modelo
			============================================*/

			if ($update == "ok") {

				$json = array(
					"status"=>200,
					"detalle"=>"Registro exitoso, su usuario ha sido actualizado"
				);

				echo json_encode($json, true);
				return;
			}
		}
	}
	/*============================================
	Borrar usuario
	============================================*/

	public function delete($id){

		/*============================================
		Llevar datos al modelo
		============================================*/

		$delete = ModeloUsuarios::delete("usuarios", $id);
		/*============================================
		Respuesta del modelo
		============================================*/

		if ($delete == "ok") {

			$json = array(
				"status"=>200,
				"detalle"=>"Se ha borrado su usuario con éxito"
			);

			echo json_encode($json, true);
			return;
		}
	}
}