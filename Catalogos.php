<?php
require_once( "helper.php" );
require_once( "Persona.php" );

class Catalogos {

	public static function nom_pais( $idpais ) {
		$mysqli = conectar();
		$sql = "SELECT * FROM paises WHERE idpais = '$idpais'";
		$rs = $mysqli->query( $sql );
		$row = $rs->fetch_assoc();
		extract( $row );
		return $nompais;
	}

	public static function nom_estado( $idpais, $idedo ) {
		$mysqli = conectar();
		$sql = "SELECT * FROM estados WHERE idpais = '$idpais' AND idedo = '$idedo'";
		$rs = $mysqli->query( $sql );
		$row = $rs->fetch_assoc();
		extract( $row );
		return $nomestado;
	}

	public static function nom_municipio( $idpais, $idedo, $idmpio ) {
		$mysqli = conectar();
		$sql = "SELECT * FROM municipios 
				  WHERE idpais = '$idpais' AND idedo = '$idedo' AND idmpio = '$idmpio'";
		$rs = $mysqli->query( $sql );
		$row = $rs->fetch_assoc();
		extract( $row );
		return $nommpio;
	}

	public static function personas() {
		$mysqli = conectar();
		$sql = "SELECT idpersona FROM personas";
		$rs = $mysqli->query( $sql );
		
		// Crea arreglo vacío
		$personas = array();
		while ( $row = $rs->fetch_assoc() ) {
			$personas[] = new Persona( $row["idpersona"] ); 
		}
		
		// Regresa arreglo de objetos Persona
		return $personas;
	}

}
?>