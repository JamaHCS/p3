<?php
/* FUNCIONES COMUNES QUE "AYUDAN" A TODA LA APLICACIÓN */
function conectar()
{
    $server   = 'localhost:3306';
    $user     = 'jamahcs';
    $password = 'acceso.jama';
    $bd       = 'bd_awos_t193';


    $mysqli = mysqli_connect($server, $user, $password, $bd);

    if (!$mysqli) {
        die("Error de conexión: ".mysql_connect_error());
        return null;
    }
    return $mysqli;
}

function desconectar()
{
    global $mysqli;
    mysqli_close($mysqli);
}

//Regresa verdadero si existe el correo con esa contraseñia en la bd
function acceso($correo, $contrasenia)
{
    global $mysqli;

    $sql = "SELECT * FROM personas WHERE correo = '$correo' AND contrasenia = md5('$contrasenia')";
    $rs = $mysqli->query($sql);
    return $rs->num_rows == 1;
}

// Verifica si la sesión esta activa
function verifica_sesion($correo, $sesion)
{
    return
        isset($_SESSION[ "correo" ])&&
        isset($_SESSION[ "sesion" ])&&
        $_SESSION[ "sesion" ] == $sesion&&
        $_SESSION[ "sesion_iniciada" ] == "si";
}
