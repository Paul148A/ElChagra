<?php

require 'token.php';
require 'conexiondata.php';

//funcion para extraer el id del producto que se quiera eliminar del carrito
if (isset($_POST['action'])){
    $action = $_POST['action'];
    $id = isset($_POST['id']) ? $_POST['id'] : 0;

    if($action == 'eliminar'){
        $datos['ok'] = eliminar($id);
    }
}

//funcion para eliminar un producto del carrito
function eliminar($id){
    if($id > 0){
        if(isset($_SESSION['carrito']['productos'][$id])){
            unset($_SESSION['carrito']['productos'][$id]);
            return true;
        }
    }
}
?>
