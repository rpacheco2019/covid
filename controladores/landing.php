<?php
session_start();
/* Se esta posteando, recogemos todo y analizamos los checkbox */
if ($_POST) {
    
    /* Ciclamos el FORM si vienen campos vacios */
    if (empty($_POST['key']) || empty($_POST['puesto']) || empty($_POST['depto']) || empty($_POST['empresa'])) {
        header('Location:landing.php');
        die();
    } 

    /* Llamamos los modelos SQL */
    require("../modelos/modelos.php");

    $_SESSION['nombre'] = $_POST['key'];
    $_SESSION['puesto'] = $_POST['puesto'];
    $_SESSION['depto'] = $_POST['depto'];
    $_SESSION['empresa'] = $_POST['empresa'];

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

    /* Si se seleccionan las 4 enfermedades graves o mas , mandamos al form de factores de riesgo. */
    if(isset($_POST['fiebre']) && isset($_POST['tos']) && isset($_POST['dcabeza']) && isset($_POST['drespirar'])){
        header('Location:factores.php');
    }else{/* Si no tiene las 4 enfermedades, lo mandamos al mensaje No Covid */

        /* Al no se necesarias los factores de riesgo puesto que no tiene las 4 enfermedades, las ponemos como no requeridas */
        $diabetes = "No aplica";
        $palta = "No aplica";
        $ecorazon = "No aplica";
        $erenal = "No aplica";
        $epulmonar = "No aplica";
        $cancer = "No aplica";
        $inmuno = "No aplica";
        $vih = "No aplica";

        /* Evaluamos si esta sano o enfermo sin riesgo */
        if ($_SESSION['fiebre'] == "SI" || $_SESSION['tos'] == "SI" || $_SESSION['estornudos'] == "SI" || $_SESSION['dcabeza'] == "SI" || $_SESSION['diarrea'] == "SI" || $_SESSION['vomito'] == "SI" || $_SESSION['calosfrios'] == "SI" || $_SESSION['dabdominal'] == "SI" || $_SESSION['mgeneral'] == "SI" || $_SESSION['drespirar'] == "SI") {
            $estatus = "ENFERMO";
        }else{
            $estatus = "NORMAL";
        }
        
        /* Llamamos la funcion saveNormal() del archivo modelos.php, y le pasamos todos los valores del formulario */
        saveNormal($_SESSION['nombre'],$_SESSION['puesto'],$_SESSION['depto'],$_SESSION['empresa'],$_SESSION['fiebre'],$_SESSION['tos'],$_SESSION['estornudos'],$_SESSION['dcabeza'],$_SESSION['diarrea'],$_SESSION['vomito'],$_SESSION['calosfrios'],$_SESSION['dabdominal'],$_SESSION['mgeneral'],$_SESSION['drespirar'],$diabetes,$palta,$ecorazon,$erenal,$epulmonar,$cancer,$inmuno,$vih,$estatus);
        /* Redireccionamos al mensaje de noCovid */
        header('Location:nocovid.php');
    }
  
/* No se esta posteando, mandamos el formulario para rellenar */   
}else{
    require("../vistas/landing.view.html");
}



?>