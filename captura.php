<?php
//Captura y escalación del array que se registra al comprar productos con el boton de paypal
require "conexiondata.php";
require "token.php";

$json = file_get_contents('php://input');
$datos = json_decode($json, true);




if(is_array($datos)){
    $id_transaccion = $datos['detalles']['id'];
    $cliente = $datos['detalles']['purchase_units'][0]['shipping']['name']['full_name'];
    $total = $datos['detalles']['purchase_units'][0]['amount']['value'];
    $status = $datos['detalles']['status'];
    $fecha = $datos['detalles']['update_time'];
    $fecha_nueva = date('Y-m-d H:i:s', strtotime($fecha));
    $email = $datos['detalles']['payer']['email_address'];
    $id_cliente = $datos['detalles']['payer']['payer_id'];

    $sql = $conexion1->prepare("INSERT INTO compra (id_transaccion, cliente,  fecha, status, email, id_cliente, total) VALUES (?,?,?,?,?,?,?)");
    $sql->execute([$id_transaccion, $cliente, $fecha_nueva, $status, $email, $id_cliente, $total]);
    $id = $conexion1->lastInsertId();
}else{
    echo 'error';
}


?>
   





