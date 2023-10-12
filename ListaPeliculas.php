<?php
require_once("utils.php");
require_once("estructura.phtml");

$conn = connectdb();

$query = "SELECT * FROM peliculas";
$result = sendquery($conn, $query);

$arr_usuarios = array();
while ($row = mysqli_fetch_assoc($result))
    $arr_usuarios[] = $row;


headerhtml("Lista de peliculas");
// print_r($arr_usuarios);

?>

<table>
    <tr>
        <th>ID</th>
        <th>Tirulo</th>
        <th>Director</th>
        <th>Puntuación</th>
    </tr>
<?php
    foreach($arr_usuarios as $user)
        echo "<tr><td>".$user['ID']."<td><a href='modPelicula.php?id=".$user['ID']."'>".$user['Titulo']."<td>".$user['Director']."<td>".$user['Puntuación'];
?>
</table>