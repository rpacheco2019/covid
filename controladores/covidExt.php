<!-- Controlador para el mensaje de COVID-19 hacia personal externo -->
<?php
session_start();
session_destroy();

header('Location:../vistas/warningExt.view.html');

?>