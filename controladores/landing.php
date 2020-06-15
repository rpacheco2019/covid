<?php
session_start();
/* Se esta posteando, recogemos todo y analizamos los checkbox */
if ($_POST) {

    /* Llamamos los modelos SQL */
    require("../modelos/modelos.php");

    $_SESSION['nombre'] = $_POST['key'];
    $_SESSION['puesto'] = $_POST['puesto'];
    $_SESSION['depto'] = $_POST['depto'];
    $_SESSION['empresa'] = $_POST['empresa'];

    /* FIEBRE */
   if (isset($_POST['fiebre'])) {
       $_SESSION['fiebre'] = "Tiene Fiebre";
   } else{
       $_SESSION['fiebre'] = "No tiene fiebre";
   }
   /* TOS */
    if (isset($_POST['tos'])) {
        $_SESSION['tos'] = "Tiene Tos";
    } else{
        $_SESSION['tos'] = "No tiene Tos";
    }
    /* ESTORNUDOS */
    if (isset($_POST['estornudos'])) {
        $_SESSION['estornudos'] ="Tiene estornudos";
    } else{
        $_SESSION['estornudos'] ="No tiene estornudos";
    }
    /* DOLOR DE CABEZA */
    if (isset($_POST['dcabeza'])) {
        $_SESSION['dcabeza'] ="Le duele la cabeza";
    } else{
        $_SESSION['dcabeza'] ="No le duele la cabeza";
    }
    /* DIARREA */
    if (isset($_POST['diarrea'])) {
        $_SESSION['diarrea'] ="Tiene diarrea";
    } else{
        $_SESSION['diarrea'] ="No tiene diarrea";
    }
    /* VOMITO */
    if (isset($_POST['vomito'])) {
        $_SESSION['vomito'] ="Tiene vomito";
    } else{
        $_SESSION['vomito'] ="No tiene vomito";
    }
    /* CALOSFRIOS */
    if (isset($_POST['calosfrios'])) {
        $_SESSION['calosfrios'] ="Tiene calosfrios";
    } else{
        $_SESSION['calosfrios'] ="No tiene calosfrios";
    }
    /* DOLOR ABDOMINAL*/
    if (isset($_POST['dabdominal'])) {
        $_SESSION['dabdominal'] ="Tiene dolor abdominal";
    } else{
        $_SESSION['dabdominal'] ="No tiene dolor abdominal";
    }
    /* MALESTAR GENERAL*/
    if (isset($_POST['mgeneral'])) {
        $_SESSION['mgeneral'] ="Tiene malestar geneal";
    } else{
        $_SESSION['mgeneral'] ="No tiene malestar general";
    }
    /* DIFICULTAD PARA RESPIRAR*/
    if (isset($_POST['drespirar'])) {
        $_SESSION['drespirar'] ="Tiene dificultad para respirar";
    } else{
        $_SESSION['drespirar'] ="No tiene dificultad para respirar";
    }

    /* Si se seleccionan las 4 enfermedades graves o mas , mandamos al form de factores de riesgo. */
    if(isset($_POST['fiebre']) && isset($_POST['tos']) && isset($_POST['dcabeza']) && isset($_POST['drespirar'])){
        header('Location:factores.php');
    }else{/* Si no tiene las 4 enfermedades, lo mandamos al mensaje No Covid */

        /* Al no se necesarias los factores de riesgo puesto que no tiene las 4 enfermedades, las ponemos como no requeridas */
        $diabetes = "No requerido";
        $palta = "No requerido";
        $ecorazon = "No requerido";
        $erenal = "No requerido";
        $epulmonar = "No requerido";
        $cancer = "No requerido";
        $inmuno = "No requerido";
        $vih = "No requerido";
        
        /* Llamamos la funcion saveNormal() del archivo modelos.php, y le pasamos todos los valores del formulario */
        saveNormal($_SESSION['nombre'],$_SESSION['puesto'],$_SESSION['depto'],$_SESSION['empresa'],$_SESSION['fiebre'],$_SESSION['tos'],$_SESSION['estornudos'],$_SESSION['dcabeza'],$_SESSION['diarrea'],$_SESSION['vomito'],$_SESSION['calosfrios'],$_SESSION['dabdominal'],$_SESSION['mgeneral'],$_SESSION['drespirar'],$diabetes,$palta,$ecorazon,$erenal,$epulmonar,$cancer,$inmuno,$vih);
        /* Redireccionamos al mensaje de noCovid */
        header('Location:nocovid.php');
    }
  
/* No se esta posteando, mandamos el formulario para rellenar */   
}else{
    require("../vistas/landing.view.html");
}



?>