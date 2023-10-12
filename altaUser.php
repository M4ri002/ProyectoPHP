<?php
require_once("utils.php");
require_once("estructura.phtml");
headerhtmlLogin("Dar de alta a Usuario");

if (isset($_POST["guardar"])) {
    // print_r($_POST);
    // $Nombre = $_POST["nombre"];
    // $Contraseña = $_POST["contraseña"];

    $conn = connectdb();
    // $query="INSERT INTO usuarios (ID,Usuario,Contraseña) VALUES (NULL,'$Nombre','$Contraseña')";
    // sendquery($conn,$query);

    //LO MISMO QUE LO ANTERIOR PERO MEJOR HECHO
    $st = mysqli_prepare($conn, "INSERT INTO usuarios (ID,Usuario,Contraseña) VALUES (?,?,?)");
    $id = NULL;
    if (!$st)
        exit("Error en el prepare " . mysqli_error($conn));
    if (!mysqli_stmt_bind_param($st, "iss", $id, $_POST["nombre"], $_POST["contraseña"]))
        exit("Error en el bind " . mysqli_stmt_error($st));
    if (!mysqli_stmt_execute($st))
        exit("Error en el execute " . mysqli_stmt_error($st));

    header("Location:index.php");
?>
    <meta http-equiv="refresh" content="2">
<?php
}

?>

<!-- Es el footer pero adaptado -->
            <footer id="footer">
                <div class="inner">
                    <section>
                        <h2>Introduce los datos del registro</h2>
                        <form action="altaUser.php" method="POST">
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