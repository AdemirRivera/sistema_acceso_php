<?php
class Herramienta{
	private $conexion;

	function __construct(){
		require_once("conexion_privada.php");
		$this->conexion = new conexion();
		$this->conexion->conectar();
	}

	public function ingresar_datos($rfid_php){
		$sql = "INSERT INTO registros (Nombre, Apellido, DUI, Telefono, UID, FechaDeRegistro) VALUES ('Prueba', 'Acosta', '04578361-8', '74569832', '$rfid_php', now())";
		$stmt = $this->conexion->conexion->prepare($sql);

		$stmt->bindValue(1, $rfid_php);

		if($stmt->execute()){
			echo "Ingreso Exitoso";
		}else{
			echo "No se pudo registrar datos";
		}
	}
}
?>
