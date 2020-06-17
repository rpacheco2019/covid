<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css" integrity="sha384-GJzZqFGwb1QTTN6wy59ffF1BuGJpLSa9DkKMp0DgiMDm4iYMj70gZWKYbI706tWS" crossorigin="anonymous">
    <title>Detalle Registro</title>
</head>
<body>

<div class="container border">
    <h3 class="text-center mt-3">Detalle de encuesta con ID: <?php echo $resultado['id'] ?></h3>
    <p class="text-center">Fecha de encuesta: <?php echo $resultado['stamp'] ?></p>
    <!-- PHP para rotar color de la Caja de estatus -->
    <?php
            if($resultado['estatus'] == "NORMAL"){
            echo "<p class='col-lg btn-success text-center py-3'>Estatus: ".$resultado['estatus']."</p>";
            }
            if($resultado['estatus'] == "ENFERMO"){
            echo "<p class='col-lg btn-info text-center py-3'>Estatus: ".$resultado['estatus']."</p>";
            }
            if($resultado['estatus'] == "RIESGO"){
            echo "<p class='col-lg btn-danger text-center py-3'>Estatus: ".$resultado['estatus']."</p>";
            }    
        ?>

    <div class="row text-center mt-3">
        <div class="col-lg mx-3">Nombre: <?php echo $resultado['empleado'] ?></div>
        <div class="col-lg mx-3">Departamento: <?php echo $resultado['depto'] ?></div>
        <div class="col-lg mx-3">Puesto: <?php echo $resultado['puesto'] ?></div>
    </div>

    <p class="text-center mt-5 py-3 btn-primary w-100">Síntomas:</p>
    
    <div class="row mt-3">
        <div class="col-lg mx-3">Fiebre:</div>
        <div class="col-lg mx-3"><?php echo $resultado['fiebre'] ?></div>
        <div class="col-lg mx-3">Tos:</div>
        <div class="col-lg mx-3"><?php echo $resultado['tos'] ?></div>
    </div>
    <div class="row mt-3">
        <div class="col-lg mx-3">Estornudos:</div>
        <div class="col-lg mx-3"><?php echo $resultado['estornudos'] ?></div>
        <div class="col-lg mx-3">Dolor de cabeza:</div>
        <div class="col-lg mx-3"><?php echo $resultado['dcabeza'] ?></div>
    </div>
    <div class="row mt-3">
        <div class="col-lg mx-3">Diarrea:</div>
        <div class="col-lg mx-3"><?php echo $resultado['diarrea'] ?></div>
        <div class="col-lg mx-3">Vomito:</div>
        <div class="col-lg mx-3"><?php echo $resultado['vomito'] ?></div>
    </div>
    <div class="row mt-3">
        <div class="col-lg mx-3">Calosfrios:</div>
        <div class="col-lg mx-3"><?php echo $resultado['calosfrios'] ?></div>
        <div class="col-lg mx-3">Dolor abdominal:</div>
        <div class="col-lg mx-3"><?php echo $resultado['dabdominal'] ?></div>
    </div>
    <div class="row mt-3">
        <div class="col-lg mx-3">Malestar general:</div>
        <div class="col-lg mx-3"><?php echo $resultado['mgeneral'] ?></div>
        <div class="col-lg mx-3">Dif. para espirar:</div>
        <div class="col-lg mx-3"><?php echo $resultado['drespirar'] ?></div>
    </div>
    <p class="text-center mt-5 py-3 btn-primary w-100">Factores de riesgo:</p>
    <div class="row mt-3">
        <div class="col-lg mx-3">Diabetes:</div>
        <div class="col-lg mx-3"><?php echo $resultado['diabetes'] ?></div>
        <div class="col-lg mx-3">Presion Alta:</div>
        <div class="col-lg mx-3"><?php echo $resultado['palta'] ?></div>
    </div>
    <div class="row mt-3">
        <div class="col-lg mx-3">Enf. Corazon:</div>
        <div class="col-lg mx-3"><?php echo $resultado['ecorazon'] ?></div>
        <div class="col-lg mx-3">Enf. Renal:</div>
        <div class="col-lg mx-3"><?php echo $resultado['erenal'] ?></div>
    </div>
    <div class="row mt-3">
        <div class="col-lg mx-3">Enf. Pulmonar cronica:</div>
        <div class="col-lg mx-3"><?php echo $resultado['epulmonar'] ?></div>
        <div class="col-lg mx-3">Cancer:</div>
        <div class="col-lg mx-3"><?php echo $resultado['cancer'] ?></div>
    </div>
    <div class="row mt-3">
        <div class="col-lg mx-3">Inmunocompromiso:</div>
        <div class="col-lg mx-3"><?php echo $resultado['inmuno'] ?></div>
        <div class="col-lg mx-3">VIH:</div>
        <div class="col-lg mx-3"><?php echo $resultado['vih'] ?></div>
    </div>

    <div class="text-center mt-3 mb-2">
        <a class="btn btn-primary mt-4 w-25 " href="../controladores/report.php">Regresar</a>
    </div>
    
    
</div>
    
</body>
</html>