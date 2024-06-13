<?php
    $conex = new mysqli("localhost", "Administrador","admin", "farmacia_dlaos");
    $conex->set_charset("utf8");

    if ($conex->connect_errno) {
        die("Conexion fallida" . $conex->connect_errno);
    }
?>