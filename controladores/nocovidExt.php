<!-- Controlador para el mensaje de NO COVID-19 hacia personal externo -->
<?php
session_start();
session_destroy();

header('Location:../vistas/nocovidExt.view.html');

?>