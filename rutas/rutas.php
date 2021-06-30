<?php

$arrayRutas = explode("/", $_SERVER['REQUEST_URI']);

if (isset($_GET["page"]) && is_numeric($_GET["page"])) {
	
	$usuarios = new ControladorUsuarios();
	$usuarios -> index($_GET["page"]);

}else{

	if (count(array_filter($arrayRutas)) == 0) {

		/*============================================
		Cuando no se hace ninguna petición a la API
		============================================*/

		$json = array(
			"detalle" => "no encontrado 1" 
		);

		echo json_encode($json, true);
		return;
	}else{
		/*============================================
		Cuando pasamos solo un índice en el array $arrayRutas
		============================================*/

		if (count(array_filter($arrayRutas)) == 1) {

			/*============================================
			Cuando se hace peticiones desde usuario
			============================================*/

			if (array_filter($arrayRutas)[1] == "usuarios") {
				
				/*============================================
				Peticiones GET
				============================================*/

				if (isset($_SERVER["REQUEST_METHOD"]) && $_SERVER["REQUEST_METHOD"] == "GET") {
					
					$usuarios = new ControladorUsuarios();
					$usuarios -> index(null);
				}
				/*============================================
				Peticiones POST
				============================================*/

				else if (isset($_SERVER["REQUEST_METHOD"]) && $_SERVER["REQUEST_METHOD"] == "POST") {

					/*============================================
					Capturar datos
					============================================*/

					$datos = array( "USUARIO"=>$_POST["USUARIO"],
									"NOMBRE"=>$_POST["NOMBRE"],
									"APELLIDO_PATERNO"=>$_POST["APELLIDO_PATERNO"],
									"APELLIDO_MATERNO"=>$_POST["APELLIDO_MATERNO"],
									"PASS"=>$_POST["PASS"],
									"ESTADO"=>$_POST["ESTADO"]);

					$crearUsuario = new ControladorUsuarios();
					$crearUsuario -> create($datos);

				}else{
					$json = array(
						"detalle" => "no encontrado" 
					);

					echo json_encode($json, true);
					return;
				}
			}else{
				$json = array(
					"detalle" => "no encontrado" 
				);

				echo json_encode($json, true);
				return;
			}	
		}else{#

			/*============================================
			Cuando se hace peticiones desde un solo usuario
			============================================*/

			if (array_filter($arrayRutas)[1] == "usuarios" && is_numeric(array_filter($arrayRutas)[2])) {

				/*============================================
				Peticiones GET
				============================================*/

				if (isset($_SERVER["REQUEST_METHOD"]) && $_SERVER["REQUEST_METHOD"] == "GET") {
					
					$usuario = new ControladorUsuarios();
					$usuario -> show(array_filter($arrayRutas)[2]);
				}
				/*============================================
				Peticiones PUT
				============================================*/

				else if (isset($_SERVER["REQUEST_METHOD"]) && $_SERVER["REQUEST_METHOD"] == "PUT") {

					/*============================================
					Capturar datos
					============================================*/

					$datos = array();
					
					parse_str(file_get_contents('php://input'), $datos);

					$editarUsuario = new ControladorUsuarios();
					$editarUsuario -> update(array_filter($arrayRutas)[2], $datos);
				}
				/*============================================
				Peticiones DELETE
				============================================*/

				else if (isset($_SERVER["REQUEST_METHOD"]) && $_SERVER["REQUEST_METHOD"] == "DELETE") {
					
					$borrarUsuario = new ControladorUsuarios();
					$borrarUsuario -> delete(array_filter($arrayRutas)[2]);
				}else{
					$json = array(
						"detalle" => "no encontrado" 
					);

					echo json_encode($json, true);
					return;
				}
			}else{
				$json = array(
					"detalle" => "no encontrado" 
				);

				echo json_encode($json, true);
				return;
			}
		}
	}
}