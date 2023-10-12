<?php
require_once("utils.php");
require_once("estructura.phtml");
headerhtmlLogin("Login");

if (isset($_POST["guardar"])) {
    // print_r($_POST);
    if (empty($_POST["nombre"]) and empty($_POST["contraseña"])) {
        echo '<h1>Los campos estan vacíos</h1>';
    }else{
        $Nombre = $_POST["nombre"];
        $Contraseña = $_POST["contraseña"];
    
        $conn = connectdb();
    
        $sql = "SELECT * FROM usuarios WHERE Usuario = '$Nombre' and Contraseña = '$Contraseña'";
        $result = sendquery($conn, $sql);
        if($datos=$result->fetch_object()){
            header("Location:ListaPeliculas.php");
            ?>
                <meta http-equiv="refresh" content="2">
            <?php
        }else{
            echo '<h1>Usuario o contraseña incorrectos</h1>';
        }
    }



}

?>

<!-- Es el footer pero adaptado -->
            <footer id="footer">
                <div class="inner">
                    <section>
                        <h2>Introduce las credenciales</h2>
                        <form action="index.php" method="POST">
                            <div class="fields">
                                <div class="field half">
                                <input type="text" name="nombre" value="" placeholder="Usuario" />
                                </div>
                                <div class="field half">
                                <input type="password" name="contraseña" value="" placeholder="Contraseña" />
                                </div>
                            </div>
                            <ul class="actions">
                                <li><input type="submit" name="guardar" value="Registrar"></li>
                            </ul>
                        </form>
                    </section>
                </div>
            </footer>
        </div>