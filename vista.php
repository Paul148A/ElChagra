<!--Vista individual de cada producto-->

<?php

include "conexion.php";
include "token.php";

//creacion y validacion del token y el id para extraer y reflejar los
// datos del producto seleccionado
$id = isset($_GET['id']) ? $_GET['id'] : '';
$token = isset($_GET['token']) ? $_GET['token'] : '';

if ($id == '' || $token == '') {
    echo 'Error al cargar informacion';
    exit;
} else {
    $token_tmp = hash_hmac('sha1', $id, KEY_TOKEN);

    if ($token == $token_tmp) {
        $sql = mysqli_query($conexion, "SELECT count(codproducto) FROM producto WHERE codproducto='$id'");

        if ($data = mysqli_num_rows($sql) > 0) {
            $sql = mysqli_query($conexion, "SELECT * FROM producto WHERE codproducto='$id' LIMIT 1");
            $row = mysqli_fetch_assoc($sql);
            $nombre = $row['nombre_producto'];
            $categoria = $row['categoria'];
            $precio = $row['precio'];
            $detalles = $row['detalles'];
            $imagen = $row['imagen'];
            $stock = $row['stock'];
        }
    }
}
?>

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>El Chagra</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">
    <link rel="stylesheet" href="sistema/css/styles24.css">
    <link rel="stylesheet" href="sistema/css/fontawesome.min.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Dancing+Script&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />
</head>

<body>
<!--nav-->
<?php include "sistema/includes/nav.php"?>
 <!--fin nav-->
<br>
 <!--boton del carrito-->

    <div class="col-lg-11 col-9" align="end">
        <a href="checkout.php"><button class="buttoncarrito">Mi carrito <br><span class="material-symbols-outlined iconcart">add_shopping_cart</span><br><span id="num_cart"><?php echo $num_cart; ?></span></button></a>
    </div><br>
 <!--fin boton del carrito-->

 <!--Tarjeta del producto seleccionado-->

    <div class=" vistap container-lg card">
        <div class="row">
            <div class="col-lg-5 col-12 bgim" style="display: flex;">
                <img src="sistema/imagenes/<?php echo $imagen ?>" class="img-fluid mx-auto d-block" width="400">
            </div>
            <div class="col-lg-5 mx-auto card cardin"><br><br>
                <div class="hr1"></div><br>
                <h2 style="color: blue;"><?php echo $nombre ?></h2>
                <h4><?php echo $detalles ?></h4>
                <h3 style="color: red;"><?php echo $precio ?>$</h3><br>
                <h4>Cantidad disponible: <?php echo $stock ?></h4>
                <div class="hr2"></div><br><br>
                <div class="container">
                    <div class="row" align="center">
                        <div class="col-lg-3 col-12">
                            <button id="menos" class="bcont">
                                <span class="material-symbols-outlined">
                                    remove
                                </span>
                            </button>
                        </div>
                        <div class="col-lg-2 col-12">
                            <h4 id="cant" name="cant" class="text-center">1</h4>
                        </div>
                        <div class="col-lg-3 col-12">
                            <button id="mas" class="bcont">
                                <span class="material-symbols-outlined">
                                    add
                                </span>
                            </button>
                        </div>
                    </div>
                </div>
                <hr>
                <div class="row">
                    <div class="col-lg-5 col-12 mx-auto" align="center">
                        <button class="carrito" onclick="addProducto(<?php echo $id; ?>, '<?php echo $token_tmp; ?>', cant)">Agregar al carrito <span class="material-symbols-outlined">add_shopping_cart</span></button>
                    </div>
                    <div class="col-lg-5 d-none d-sm-none d-md-none d-xl-block">
                        <a href="productos.php"><button class="back"><span class="material-symbols-outlined">arrow_back</span></button></a>
                    </div>
                </div>
            </div>
        </div><br><br>
        <!--Informacion agergada de los metodos de pago-->
        <div class="row">
            <div class="col-6 d-none d-sm-none d-md-none d-xl-block"></div>
            <div class="col-lg-6 col-11" align="center">
                <div>
                    <h6>'El precio marcado en los productos radica en dolares Americanos'</h6>
                </div>
                <div>
                    <h3 style="color: red;">Metodo de pago</h3>
                </div>
                <div>
                    <div class="hr1"></div><br>
                </div>
                <div>
                    <h5>Difiere hasta 12 meses sin intereses con las siguientes tarjetas.</h5>
                </div>
                <div class="row">
                    <div class="col-2 mx-auto">
                        <img src="sistema/img/mastercard.png" class="tarjeta">
                    </div>
                    <div class="col-2 mx-auto">
                        <img src="sistema/img/amex.png" class="tarjeta">
                    </div>
                    <div class="col-2 mx-auto">
                        <img src="sistema/img/dinnersClub.png" class="tarjeta">
                    </div>
                    <div class="col-2 mx-auto">
                        <img src="sistema/img/visa.png" class="tarjeta ">
                    </div>
                    <div class="col-2 mx-auto">
                        <img src="sistema/img/alia.png" class="tarjeta">
                    </div>
                </div><br>
            </div>
        </div>
        <!--fin Informacion agergada de los metodos de pago-->
    </div><br>
 <!--fin Tarjeta del producto seleccionado-->

</body>
<?php include "sistema/includes/pie.php" ?>
<script src="https://unpkg.com/feather-icons"></script>
<script>
    feather.replace({
        class: 'foo bar',
        'stroke-width': 2,
        'width': 18
    })
</script>
<script>
    const cant = document.getElementById("cant");
    const sumar = document.getElementById("mas");
    const menos = document.getElementById("menos");
    const stock = <?php echo $stock; ?>;

    let numero = 1;

    sumar.addEventListener("click", () => {
        if (numero < stock && numero < 9) {
            numero++;
            cant.innerHTML = numero;
        } else {

        }
    });

    menos.addEventListener("click", () => {
        if (numero == 1) {

        } else {
            numero--;
            cant.innerHTML = numero;
        }
    });

    function addProducto(id, token, cant) {
        let url = 'carrito.php';
        let formData = new FormData();
        formData.append('id', id)
        formData.append('token', token)
        formData.append('cant', numero)

        fetch(url, {
            method: 'POST',
            body: formData,
            mode: 'cors'
        }).then(response => response.json()).then(data => {
            if (data.ok) {
                swal({
                    icon: "success",
                    title: "Producto agregado al carrito correctamente!"
                });
                let elemento = document.getElementById("num_cart")
                elemento.innerHTML = data.numero
            }
        })
    }
</script>
<script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
<script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
<!-- JavaScript Bundle with Popper -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-u1OknCvxWvY5kfmNBILK2hRnQC3Pr17a+RTT6rIHI7NnikvbZlHgTPOOmMi466C8" crossorigin="anonymous"></script>
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>