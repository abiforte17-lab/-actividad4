
<?php

$servidor = "localhost";
$baseDatos = "GestionEscolar";

try {
    $conexion = new PDO(
        "sqlsrv:Server=$servidor;Database=$baseDatos;Encrypt=Optional;TrustServerCertificate=1"
    );

    $conexion->setAttribute(
        PDO::ATTR_ERRMODE,
        PDO::ERRMODE_EXCEPTION
    );

} catch (PDOException $e) {
    die("Error de conexion: " . $e->getMessage());
}

?>
