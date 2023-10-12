<?php
require_once("utils.php");
require_once("estructura.phtml");
headerhtml("Cerrar sesión");

if (isset($_POST["guardar"])) {
    $conn = connectdb();
    session_unset();
    session_destroy();
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
                        <h2>¿Estás seguro de cerrar sesión?</h2>
                        <form action="logout.php" method="POST">
                            <ul class="actions">
                                <li><input type="submit" name="guardar" value="Cerrar sesión"></li>
                            </ul>
                        </form>
                    </section>
                </div>
            </footer>
        </div>