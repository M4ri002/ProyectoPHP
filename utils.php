<?php

function connectdb()
{
    // Datos de conexión a la base de datos
    $host = "localhost"; // El servidor donde se encuentra la base de datos
    $user = "root"; // El usuario de la base de datos
    $password = ""; // La contraseña del usuario de la base de datos
    $dbname = "m2uf4_mariocaravacaortiz"; // El nombre de la base de datos a la que se desea conectar

    // Conexión a la base de datos
    $conn = mysqli_connect($host, $user, $password, $dbname);

    // Verificar la conexión
    if (!$conn) {
        exit("Conexión fallida: " . mysqli_connect_error());
    }
    else
        return $conn;
}


function sendquery($conn,$query)
{
    $result = mysqli_query($conn,$query);
    if(!$result)
        exit("Conexión fallida: " .mysqli_error($conn));
    return $result;
}

?>
