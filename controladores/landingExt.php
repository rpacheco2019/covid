<?php
session_start();
/* Se esta posteando, recogemos todo y analizamos los checkbox */
if ($_POST) {
    
    /* Ciclamos el FORM si vienen campos vacios */
    if (empty($_POST['key'])) {
        header('Location:landingExt.php');
        die();
    } 

    /* Llamamos los modelos SQL correspondientes a los Externos */
    require("../modelos/modelosExt.php");

    $_SESSION['nombre'] = $_POST['key'];
    $_SESSION['tipoExterno'] = $_POST['tipoExterno'];
    $_SESSION['deptoVisitado'] = $_POST['deptoVisitado'];

    /* FIEBRE */
   if (isset($_POST['fiebre'])) {
       $_SESSION['fiebre'] = "SI";
   } else{
       $_SESSION['fiebre'] = "NO";
   }
   /* TOS */
    if (isset($_POST['tos'])) {
        $_SESSION['tos'] = "SI";
    } else{
        $_SESSION['tos'] = "NO";
    }
    /* ESTORNUDOS */
    if (isset($_POST['estornudos'])) {
        $_SESSION['estornudos'] ="SI";
    } else{
        $_SESSION['estornudos'] ="NO";
    }
    /* DOLOR DE CABEZA */
    if (isset($_POST['dcabeza'])) {
        $_SESSION['dcabeza'] ="SI";
    } else{
        $_SESSION['dcabeza'] ="NO";
    }
    /* DIARREA */
    if (isset($_POST['diarrea'])) {
        $_SESSION['diarrea'] ="SI";
    } else{
        $_SESSION['diarrea'] ="NO";
    }
    /* VOMITO */
    if (isset($_POST['vomito'])) {
        $_SESSION['vomito'] ="SI";
    } else{
        $_SESSION['vomito'] ="NO";
    }
    /* CALOSFRIOS */
    if (isset($_POST['calosfrios'])) {
        $_SESSION['calosfrios'] ="SI";
    } else{
        $_SESSION['calosfrios'] ="NO";
    }
    /* DOLOR ABDOMINAL*/
    if (isset($_POST['dabdominal'])) {
        $_SESSION['dabdominal'] ="SI";
    } else{
        $_SESSION['dabdominal'] ="NO";
    }
    /* MALESTAR GENERAL*/
    if (isset($_POST['mgeneral'])) {
        $_SESSION['mgeneral'] ="SI";
    } else{
        $_SESSION['mgeneral'] ="NO";
    }
    /* DIFICULTAD PARA RESPIRAR*/
    if (isset($_POST['drespirar'])) {
        $_SESSION['drespirar'] ="SI";
    } else{
        $_SESSION['drespirar'] ="NO";
    }

    /* Si se seleccionan las 4 enfermedades graves o mas , guardamos en la BD y mandamos mensaje informativo */
    if(isset($_POST['fiebre']) && isset($_POST['tos']) && isset($_POST['dcabeza']) && isset($_POST['drespirar'])){
        $estatus = "RIESGO";
        save($_SESSION['nombre'],$_SESSION['tipoExterno'],$_SESSION['deptoVisitado'],$_SESSION['fiebre'],$_SESSION['tos'],$_SESSION['estornudos'],$_SESSION['dcabeza'],$_SESSION['diarrea'],$_SESSION['vomito'],$_SESSION['calosfrios'],$_SESSION['dabdominal'],$_SESSION['mgeneral'],$_SESSION['drespirar'],$estatus);
        header('Location:covidExt.php');
    }else{
        /* Si no tiene las 4 enfermedades, lo mandamos al mensaje No Covid */
        /* Evaluamos si esta sano o enfermo sin riesgo */
        if ($_SESSION['fiebre'] == "SI" || $_SESSION['tos'] == "SI" || $_SESSION['estornudos'] == "SI" || $_SESSION['dcabeza'] == "SI" || $_SESSION['diarrea'] == "SI" || $_SESSION['vomito'] == "SI" || $_SESSION['calosfrios'] == "SI" || $_SESSION['dabdominal'] == "SI" || $_SESSION['mgeneral'] == "SI" || $_SESSION['drespirar'] == "SI") {
            $estatus = "ENFERMO";
        }else{
            $estatus = "NORMAL";
        }
        
        /* Llamamos la funcion save() del archivo modelos.php, y le pasamos todos los valores del formulario */
        save($_SESSION['nombre'],$_SESSION['tipoExterno'],$_SESSION['deptoVisitado'],$_SESSION['fiebre'],$_SESSION['tos'],$_SESSION['estornudos'],$_SESSION['dcabeza'],$_SESSION['diarrea'],$_SESSION['vomito'],$_SESSION['calosfrios'],$_SESSION['dabdominal'],$_SESSION['mgeneral'],$_SESSION['drespirar'],$estatus);
        /* Redireccionamos al mensaje de noCovid */
        header('Location:nocovidExt.php');
    }
  
/* No se esta posteando, mandamos el formulario para rellenar */   
}else{
    require("../vistas/landingExt.view.html");
}

?>