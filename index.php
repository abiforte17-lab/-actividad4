
<?php

require_once "conexion.php";

$mensaje = "";

// Registrar estudiante
if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $nombre = trim($_POST["nombre"]);
    $apellido = trim($_POST["apellido"]);
    $correo = trim($_POST["correo"]);

    if ($nombre == "" || $apellido == "") {
        $mensaje = "El nombre y apellido son obligatorios.";
    } else {

        try {
            $sql = "INSERT INTO Estudiante
                    (Nombre, Apellido, Correo)
                    VALUES (:nombre, :apellido, :correo)";

            $consulta = $conexion->prepare($sql);

            $consulta->execute([
                ":nombre" => $nombre,
                ":apellido" => $apellido,
                ":correo" => $correo == "" ? null : $correo
            ]);

            $mensaje = "Estudiante registrado correctamente.";

        } catch (PDOException $e) {
            $mensaje = "Error al registrar: " . $e->getMessage();
        }
    }
}

// Consultar estudiantes
$sql = "SELECT ID_Estudiante, Nombre, Apellido, Correo
        FROM Estudiante";

$estudiantes = $conexion->query($sql)->fetchAll(PDO::FETCH_ASSOC);

?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <title>Gestion Escolar</title>

    <style>
        body {
            font-family: Arial;
            background: #eef2f7;
            margin: 40px;
        }

        .contenedor {
            background: white;
            padding: 25px;
            max-width: 850px;
            margin: auto;
            border-radius: 10px;
        }

        h1, h2 {
            text-align: center;
            color: #243b60;
        }

        label {
            display: block;
            margin-top: 15px;
        }

        input {
            width: 100%;
            padding: 10px;
            margin-top: 5px;
            box-sizing: border-box;
        }

        button {
            margin-top: 20px;
            padding: 12px 20px;
            background: #187a55;
            color: white;
            border: none;
            cursor: pointer;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 25px;
        }

        th, td {
            border: 1px solid #ccc;
            padding: 10px;
            text-align: left;
        }

        th {
            background: #243b60;
            color: white;
        }

        .mensaje {
            text-align: center;
            color: green;
            margin-top: 15px;
        }
    </style>
</head>

<body>

<div class="contenedor">

    <h1>Gestion Escolar</h1>
    <h2>Registro de estudiantes</h2>

    <form method="POST">

        <label>Nombre:</label>
        <input type="text" name="nombre" required maxlength="50">

        <label>Apellido:</label>
        <input type="text" name="apellido" required maxlength="50">

        <label>Correo:</label>
        <input type="email" name="correo" maxlength="100">

        <button type="submit">Guardar estudiante</button>

    </form>

    <p class="mensaje">
        <?= htmlspecialchars($mensaje, ENT_QUOTES, 'UTF-8') ?>
    </p>

    <h2>Estudiantes registrados</h2>

    <table>
        <tr>
            <th>ID</th>
            <th>Nombre</th>
            <th>Apellido</th>
            <th>Correo</th>
        </tr>

        <?php foreach ($estudiantes as $estudiante): ?>

        <tr>
            <td><?= htmlspecialchars((string)$estudiante["ID_Estudiante"]) ?></td>
            <td><?= htmlspecialchars($estudiante["Nombre"]) ?></td>
            <td><?= htmlspecialchars($estudiante["Apellido"]) ?></td>
            <td><?= htmlspecialchars($estudiante["Correo"] ?? "") ?></td>
        </tr>

        <?php endforeach; ?>

    </table>

</div>

</body>
</html>
