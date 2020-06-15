<?php

require("../modelos/modelos.php");
$resultados = getReport();
require("../vistas/report.view.php");

?>