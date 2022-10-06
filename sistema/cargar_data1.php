<?php
include('../conexiondata.php');
include "../conexion.php";


$fileContacts = $_FILES['fileContacts'];
$fileContacts = file_get_contents($fileContacts['tmp_name']);

$fileContacts = explode("\n", $fileContacts);
$fileContacts = array_filter($fileContacts);

foreach ($fileContacts as $contact) {
	$contactList[] = explode(",", $contact);
}
foreach ($contactList as $contactData) {
	$prov = mysqli_query($conexion, "SELECT * FROM proveedor WHERE proveedor = '$contactData[2]' ");
	$prov_data = mysqli_fetch_assoc($prov);

	$cat = mysqli_query($conexion, "SELECT * FROM categoria WHERE nombre = '$contactData[6]' ");
	$cat_data = mysqli_fetch_assoc($cat);

	$est = mysqli_query($conexion, "SELECT * FROM estado WHERE nombre = '$contactData[7]' ");
	$est_data = mysqli_fetch_assoc($est);


	$conexion1->query("INSERT INTO producto 
						(nombre_producto,
						 detalles,
						 proveedor,
						 precio,
						 precio_iva,
						 stock,
						 codigobar,
						 categoria,
						 estado
						 )
						 VALUES
						 ('{$contactData[0]}',
						  '{$contactData[1]}', 
						  '{$prov_data['codproveedor']}',
						  '{$contactData[3]}',
						  '{$contactData[4]}',
						  '{$contactData[5]}',
						  '{$contactData[8]}',
						  '{$cat_data['id']}',
						  '{$est_data['id']}'						  
						   )

						 ");
	$conexion1->query("DELETE FROM producto WHERE nombre_producto = 'Nombre' ");
}
