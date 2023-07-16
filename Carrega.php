<?php

include "conexion.php";
$user = new DBconexion();

$fp = fopen("Pedidos.csv", "r");

$linea = false;
while ($data = fgetcsv($fp, 1000, ",")) {
    if (!$linea) {
        $linea = true;
        continue; 
    }

    $pedido = isset($data[0]) ? $data[0] : ''; // 
    if (empty($pedido)) {
        continue; 
    }

    $documento = isset($data[1]) ? $data[1] : '';
    $dataEntrega = isset($data[2]) ? date('Y-m-d', strtotime(str_replace('/', '-', $data[2]))) : '';
    $dataVenda = isset($data[3]) ? date('Y-m-d', strtotime(str_replace('/', '-', $data[3]))) : '';
    $valorVenda = isset($data[4]) ? $data[4] : '';
    $idProduto = isset($data[5]) ? $data[5] : '';
    $quantidade = isset($data[6]) ? $data[6] : '';
    $obs = isset($data[7]) ? $data[7] : '';

    $u = $user->insert("Clientes", "'$pedido','$documento','$dataEntrega','$dataVenda','$valorVenda',$idProduto,$quantidade,'$obs'");
}

fclose($fp);

$user = null;

?>
