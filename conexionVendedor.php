<?php
    $conex = new mysqli("localhost", "Vendedor","ventas", "farmacia_dlaos");
    $conex->set_charset("utf8");

    if ($conex->connect_errno) {
        die("Conexion fallida" . $conex->connect_errno);
    }
?>