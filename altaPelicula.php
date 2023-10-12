<?php
require_once("utils.php");
require_once("estructura.phtml");
headerhtml("Dar de alta una pelicula");

if (isset($_POST["guardar"])) {
    // print_r($_POST);
    if (empty($_POST["titulo"]) and empty($_POST["director"]) and empty($_POST["puntuacion"])) {
        echo '<h1>Los campos estan vacíos</h1>';
    } else {
        $conn = connectdb();
        $st = mysqli_prepare($conn, "INSERT INTO peliculas (ID,Titulo,Director,Puntuación) VALUES (?,?,?,?)");
        $id = NULL;
        if (!$st)
            exit("Error en el prepare " . mysqli_error($conn));
        if (!mysqli_stmt_bind_param($st, "isss", $id, $_POST["titulo"], $_POST["director"], $_POST["puntuacion"]))
            exit("Error en el bind " . mysqli_stmt_error($st));
        if (!mysqli_stmt_execute($st))
            exit("Error en el execute " . mysqli_stmt_error($st));
            header("Location:ListaPeliculas.php");
        ?>
            <meta http-equiv="refresh" content="2">
        <?php
    }
}

?>

<!-- Es el footer pero adaptado -->
<footer id="footer">
    <div class="inner">
        <section>
            <h2>Introduce los datos del registro</h2>
            <form action="altaPelicula.php" method="POST">
                <div class="fields">
                    <div class="field half">
                        <input type="text" name="titulo" value="" placeholder="Titulo Pelicula" />
                    </div>
                    <div class="field half">
                        <input type="text" name="director" value="" placeholder="Director" />
                    </div>
                    <div class="field half">
                        <input type="text" name="puntuacion" value="" placeholder="Puntuación" />
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