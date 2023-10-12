<?php
require_once("utils.php");
require_once("estructura.phtml");
headerhtml("Modificar peliculas");


if(isset($_GET["id"])){

    $conn = connectdb();
    $st = mysqli_prepare($conn, "SELECT * FROM peliculas where id=?");
        if (!$st)
            exit("Error en el prepare " . mysqli_error($conn));
        if (!mysqli_stmt_bind_param($st,"i",$_GET["id"]))
            exit("Error en el bind " . mysqli_stmt_error($st));
        if (!mysqli_stmt_execute($st))
            exit("Error en el execute " . mysqli_stmt_error($st));
            // header("Location:ListaPeliculas.php");
    $result=mysqli_stmt_get_result($st);
    $row=mysqli_fetch_assoc($result);
}

if(isset($_POST["guardar"])){

    $conn = connectdb();
    $st = mysqli_prepare($conn, "UPDATE peliculas SET Titulo=?,Director=?,Puntuación=? where ID=?");
    if (!$st)
            exit("Error en el prepare " . mysqli_error($conn));
        if (!mysqli_stmt_bind_param($st, "sssi",$_POST["titulo"], $_POST["director"], $_POST["puntuacion"],$_POST["id"]))
            exit("Error en el bind " . mysqli_stmt_error($st));
        if (!mysqli_stmt_execute($st))
            exit("Error en el execute " . mysqli_stmt_error($st));
        echo "Se han modificado ".mysqli_stmt_affected_rows($st)." fila/s";
    header("Location:ListaPeliculas.php");

}


if(isset($_POST["eliminar"])){

    $conn = connectdb();
    $st = mysqli_prepare($conn, "DELETE FROM peliculas where ID=?");
    if (!$st)
            exit("Error en el prepare " . mysqli_error($conn));
        if (!mysqli_stmt_bind_param($st, "i",$_POST["id"]))
            exit("Error en el bind " . mysqli_stmt_error($st));
        if (!mysqli_stmt_execute($st))
            exit("Error en el execute " . mysqli_stmt_error($st));
        echo "Se han modificado ".mysqli_stmt_affected_rows($st)." fila/s";
    header("Location:ListaPeliculas.php");

}


?>

<!-- Es el footer pero adaptado -->
<footer id="footer">
    <div class="inner">
        <section>
            <h2>Introduce los datos del registro</h2>
            <form action="modPelicula.php" method="POST">
                <div class="fields">
                    <div class="field half">
                        <input type="text" name="titulo" value="<?php echo $row["Titulo"]?>" />
                    </div>
                    <div class="field half">
                        <input type="text" name="director" value="<?php echo $row["Director"]?>" />
                    </div>
                    <div class="field half">
                        <input type="text" name="puntuacion" value="<?php echo $row["Puntuación"]?>" />
                    </div>
                    <input type="hidden" name="id" value="<?php echo $row["ID"]?>" />
                </div>
                <ul class="actions">
                    <li><input type="submit" name="guardar" value="Modificar"></li>
                </ul>
            </form>
            <form action="modPelicula.php" method="POST"> 
                <ul class="actions">
                    <li><input type="submit" name="eliminar" value="Eliminar Pelicula"></li>
                </ul>
                <input type="hidden" name="id" value="<?php echo $row["ID"]?>" />
            </form>
        </section>
    </div>
</footer>
</div>

