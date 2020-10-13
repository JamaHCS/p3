<?php
require_once("helper.php");
require_once("Catalogos.php");

class Persona
{
    public $idpersona;
    public $nombre;
    public $apellidos;
    public $correo;
    public $idpais;
    public $idedo;
    public $idmpio;

    public function __construct($id)
    {
        $this->idpersona = $id;
        $mysqli = conectar();
        $sql = "SELECT * from personas WHERE idpersona = '$id'";
        $rs = $mysqli->query($sql);
        $row = $rs->fetch_assoc();
        extract($row);
        $this->nombre    = $nombre;
        $this->apellidos = $apellidos;
        $this->correo    = $correo;
        $this->idpais    = $idpais;
        $this->idedo     = $idedo;
        $this->idmpio    = $idmpio;
    }

    public function get_idpersona()
    {
        return $this->idpersona;
    }
    public function get_nombre()
    {
        return $this->nombre;
    }
    public function get_apellidos()
    {
        return $this->apellidos;
    }
    public function get_correo()
    {
        return $this->correo;
    }
    public function get_idpais()
    {
        return $this->idpais;
    }
    public function get_idedo()
    {
        return $this->idedo;
    }
    public function get_idmpio()
    {
        return $this->idmpio;
    }

    public function get_nom_pais()
    {
        return Catalogos::nom_pais($this->idpais);
    }
    public function get_nom_edo()
    {
        return Catalogos::nom_estado($this->idpais, $this->idedo);
    }
    public function get_nom_mpio()
    {
        return Catalogos::nom_municipio($this->idpais, $this->idedo, $this->idmpio);
    }

    public function imprimir()
    {
        echo '<div class="card" style="width: 18rem; margin: 10px;">
				<div class="card-header bg-info">
					<h5 class="text-white">'.
                    $this->get_nombre().' '.$this->get_apellidos().
                    '</h5>
				</div>
				<div class="card-body">
					<strong>ID:</strong> '.$this->idpersona.'
					<br />
					<strong>CORREO:</strong> '.$this->get_correo().'
					<br />
					<strong>PAÍS:</strong> '.$this->get_nom_pais().'
					<br />
					<strong>ESTADO / PROVINCIA:</strong> '.$this->get_nom_edo().'
					<br />
					<strong>MUNICIPIO / CONDADO:</strong> '.$this->get_nom_mpio().'
				</div>
			</div>';
    }
}
