<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);



include "conexion.php";
$user = new DBconexion();

$conexion = new mysqli("localhost", "root", "", "Almancenador") or die("not connected" . mysqli_connect_error());

$sql = "SELECT * FROM `Clientes`";

$result = mysqli_query($conexion, $sql);

$pedidos = array();
while ($fila = mysqli_fetch_array($result)) {
    $pedidos[] = $fila;
}

mysqli_free_result($result);
mysqli_close($conexion);

?>

<!DOCTYPE html>
<html>
<head>
    <title>Consulta Total: Pedidos</title>
    <style>
        table {
            border-collapse: collapse;
            width: 100%;
        }

        th, td {
            border: 1px solid black;
            padding: 8px;
        }

        th {
            background-color: #f2f2f2;
        }
    </style>
</head>
<body>
    <h1>Consulta de Pedidos</h1>
    <table>
        <tr>
            <th>Pedido</th>
           
        </tr>
        <?php foreach ($pedidos as $pedido) : ?>
            <tr>
                <td><?php echo $pedido['Pedido']; ?></td>
          
            </tr>
        <?php endforeach; ?>
    </table>
</body>
</html>
