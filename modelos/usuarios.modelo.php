<?php

require_once "conexion.php";

class ModeloUsuarios{

	/*============================================
	Mostrar todos los usuarios
	============================================*/

	static public function index($tabla, $cantidad, $desde){

		if ($cantidad != null) {
			
			$stmt = Conexion::conectar()->prepare("SELECT $tabla.ID_USUARIO, $tabla.USUARIO, $tabla.NOMBRE, $tabla.APELLIDO_PATERNO, $tabla.APELLIDO_MATERNO, $tabla.PASS, $tabla.ESTADO FROM $tabla LIMIT $desde, $cantidad");

		}
		else{

			$stmt = Conexion::conectar()->prepare("SELECT $tabla.ID_USUARIO, $tabla.USUARIO, $tabla.NOMBRE, $tabla.APELLIDO_PATERNO, $tabla.APELLIDO_MATERNO, $tabla.PASS, $tabla.ESTADO FROM $tabla");

		}

		$stmt -> execute();
		return $stmt -> fetchAll(PDO::FETCH_CLASS);
		$stmt -> close();
		$stmt = null;
	}

	/*============================================
	Creacion de un usuario
	============================================*/

	static public function create($tabla, $datos){

		$stmt = Conexion::conectar()->prepare("INSERT INTO $tabla(USUARIO, NOMBRE, APELLIDO_PATERNO, APELLIDO_MATERNO, PASS, ESTADO) VALUES (:USUARIO, :NOMBRE, :APELLIDO_PATERNO, :APELLIDO_MATERNO, :PASS, :ESTADO)");

		$stmt -> bindParam(":USUARIO", $datos["USUARIO"], PDO::PARAM_STR);
		$stmt -> bindParam(":NOMBRE", $datos["NOMBRE"], PDO::PARAM_STR);
		$stmt -> bindParam(":APELLIDO_PATERNO", $datos["APELLIDO_PATERNO"], PDO::PARAM_STR);
		$stmt -> bindParam(":APELLIDO_MATERNO", $datos["APELLIDO_MATERNO"], PDO::PARAM_STR);
		$stmt -> bindParam(":PASS", $datos["PASS"], PDO::PARAM_STR);
		$stmt -> bindParam(":ESTADO", $datos["ESTADO"], PDO::PARAM_STR);
		
		if ($stmt -> execute()) {
			
			return "ok";

		}else{

			print_r(Conexion::conectar()->errorInfo());

		}

		$stmt-> close();
		$stmt= null;

	}
	/*============================================
	Mostrar un solo usuario
	============================================*/

	static public function show($tabla, $id){

		//$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE id=:id");
		$stmt = Conexion::conectar()->prepare("SELECT $tabla.ID_USUARIO, $tabla.USUARIO, $tabla.NOMBRE, $tabla.APELLIDO_PATERNO, $tabla.APELLIDO_MATERNO, $tabla.PASS, $tabla.ESTADO FROM $tabla WHERE $tabla.ID_USUARIO =:ID_USUARIO");
		
		$stmt -> bindParam(":ID_USUARIO", $id, PDO::PARAM_INT);

		$stmt -> execute();
		return $stmt -> fetchAll(PDO::FETCH_CLASS);
		$stmt -> close();
		$stmt = null;
	}

	/*============================================
	Actualizacion de un usuario
	============================================*/

	static public function update($tabla, $datos){

		$stmt = Conexion::conectar()->prepare("UPDATE $tabla SET USUARIO=:USUARIO,NOMBRE=:NOMBRE,APELLIDO_PATERNO=:APELLIDO_PATERNO,APELLIDO_MATERNO=:APELLIDO_MATERNO,PASS=:PASS, ESTADO=:ESTADO WHERE ID_USUARIO = :ID_USUARIO");

		$stmt -> bindParam(":ID_USUARIO", $datos["ID_USUARIO"], PDO::PARAM_INT);
		$stmt -> bindParam(":USUARIO", $datos["USUARIO"], PDO::PARAM_STR);
		$stmt -> bindParam(":NOMBRE", $datos["NOMBRE"], PDO::PARAM_STR);
		$stmt -> bindParam(":APELLIDO_PATERNO", $datos["APELLIDO_PATERNO"], PDO::PARAM_STR);
		$stmt -> bindParam(":APELLIDO_MATERNO", $datos["APELLIDO_MATERNO"], PDO::PARAM_INT);
		$stmt -> bindParam(":PASS", $datos["PASS"], PDO::PARAM_INT);
		$stmt -> bindParam(":ESTADO", $datos["ESTADO"], PDO::PARAM_INT);
		
		if ($stmt -> execute()) {
			
			return "ok";

		}else{

			print_r(Conexion::conectar()->errorInfo());

		}

		$stmt-> close();
		$stmt= null;

	}
	/*============================================
	Borrar usuario
	============================================*/

	static public function delete($tabla, $id){

		$stmt = Conexion::conectar()->prepare("DELETE FROM $tabla WHERE ID_USUARIO = :ID_USUARIO");

		$stmt -> bindParam(":ID_USUARIO", $id, PDO::PARAM_INT);

		if ($stmt -> execute()) {
			
			return "ok";

		}else{

			print_r(Conexion::conectar()->errorInfo());

		}

		$stmt-> close();
		$stmt= null;

	}
}