<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width='device-width', initial-scale=1.0">
    <link rel="stylesheet" href="/farmaciaDLAOS/css/login.css">
    <title>LoginFarmacia</title>
</head>
<body>
    <div class="contenedor_login">

        <form action="" method="post">

            <?php
                if (isset($_POST["btnIngresar"])) {
                    
                    if ($_POST["user"] == "Administrador" && $_POST["pass"] == "admin") {
                        include("conexionAdmin.php");
                        header("Location: FrmAdmin.php");
                    }elseif ($_POST["user"] == "Almacenista" && $_POST["pass"] == "almacen") {
                        include("conexionAlmacen.php");
                        header("Location: FrmAlmacen.php");
                        exit();
                    }elseif ($_POST["user"] == "Vendedor" && $_POST["pass"] == "ventas"){
                        include("conexionVendedor.php");
                        header("Location: FrmVendedor.php");
                        exit();
                    }
                    elseif ($_POST["user"] == "" || $_POST["pass"] == "") {
                       echo "Rellene todos los campos";
                    }else {
                        echo "Usuario o Contraseña Incorrectos" ;
                    }
                }

            ?>

            <div class="contenedor_logo">
                <img id="faramaciaIcon" src="/farmaciaDLAOS/assets/icons/farmacia.png" alt="">
                <h2 id="farmacia">Farmacia</h2>
                <h2 id="dlaos">D'LAOS</h2>
            </div>

            <div class="contenedor_user">
                <img src="/farmaciaDLAOS/assets/icons/avatar.png" >
                <input type="text" name="user" id="user" placeholder="Usuario">
            </div>

            <div class="contenedor_pass">
                <img src="/farmaciaDLAOS/assets/icons/password.png">
                <input type="password" name="pass" id="pass" placeholder="Contraseña">
            </div>

            <div class="contenedor_boton">
                <br><br>
                <button id="btnIngresar" name="btnIngresar">Iniciar Sesion</button>
            </div>
        </form>

        
    </div>
</body>
</html>