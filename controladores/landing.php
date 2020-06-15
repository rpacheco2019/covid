<?php
session_start();
/* Se esta posteando, recogemos todo y analizamos los checkbox */
if ($_POST) {

    /* Llamamos los modelos SQL */
    require("../modelos/modelos.php");

    $nombre = $_POST['key'];
    $puesto = $_POST['puesto'];
    $depto = $_POST['depto'];
    $empresa  = $_POST['empresa'];

    /* FIEBRE */
   if (isset($_POST['fiebre'])) {
       $fiebre = "Tiene Fiebre";
   } else{
       $fiebre = "No tiene fiebre";
   }
   /* TOS */
    if (isset($_POST['tos'])) {
        $tos = "Tiene Tos";
    } else{
        $tos = "No tiene Tos";
    }
    /* ESTORNUDOS */
    if (isset($_POST['estornudos'])) {
        $estornudos ="Tiene estornudos";
    } else{
        $estornudos ="No tiene estornudos";
    }
    /* DOLOR DE CABEZA */
    if (isset($_POST['dcabeza'])) {
        $dcabeza ="Le duele la cabeza";
    } else{
        $dcabeza ="No le duele la cabeza";
    }
    /* DIARREA */
    if (isset($_POST['diarrea'])) {
        $diarrea ="Tiene diarrea";
    } else{
        $diarrea ="No tiene diarrea";
    }
    /* VOMITO */
    if (isset($_POST['vomito'])) {
        $vomito ="Tiene vomito";
    } else{
        $vomito ="No tiene vomito";
    }
    /* CALOSFRIOS */
    if (isset($_POST['calosfrios'])) {
        $calosfrios ="Tiene calosfrios";
    } else{
        $calosfrios ="No tiene calosfrios";
    }
    /* DOLOR ABDOMINAL*/
    if (isset($_POST['dabdominal'])) {
        $dabdominal ="Tiene dolor abdominal";
    } else{
        $dabdominal ="No tiene dolor abdominal";
    }
    /* MALESTAR GENERAL*/
    if (isset($_POST['mgeneral'])) {
        $mgeneral ="Tiene malestar geneal";
    } else{
        $mgeneral ="No tiene malestar general";
    }
    /* DIFICULTAD PARA RESPIRAR*/
    if (isset($_POST['drespirar'])) {
        $drespirar ="Tiene dificultad para respirar";
    } else{
        $drespirar ="No tiene dificultad para respirar";
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
        saveNormal($nombre,$puesto,$depto,$empresa,$fiebre,$tos,$estornudos,$dcabeza,$diarrea,$vomito,$calosfrios,$dabdominal,$mgeneral,$drespirar,$diabetes,$palta,$ecorazon,$erenal,$epulmonar,$cancer,$inmuno,$vih);
        /* Redireccionamos al mensaje de noCovid */
        header('Location:nocovid.php');
    }
  
/* No se esta posteando, mandamos el formulario para rellenar */   
}else{
    require("../vistas/landing.view.html");
}



?>