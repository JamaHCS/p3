<?php
        require_once("Persona.php");

                $id = $_GET['id'];
                $persona = new Persona($id);
                $persona->pais = $persona->get_nom_pais();
                $persona->estado = $persona->get_nom_edo();
                $persona->municipio = $persona->get_nom_mpio();
        echo json_encode($persona);
