<?php
/* Llamamos los Modelos SQL */
require("../modelos/modelos.php");

/* Obtenemos el ID de registro por GET ?id= */
$idRegistro = $_GET['id'];

/* Guardamos el resultado de la funcion getRegistro() pasandole $idRegistro */
$resultado = getRegistro($idRegistro);

/* Rellenamos la vista HTML */
require("../vistas/detalleRegistro.view.php");
?>