<?php
session_start();

if($_POST){

    require("../modelos/modelos.php");

    /* DIABETES */
    if (isset($_POST['diabetes'])) {
        $diabetes = "Tiene diabetes";
    } else{
        $diabetes = "No tiene diabetes";
    }

    /* PRESION ALTA */
    if (isset($_POST['palta'])) {
        $palta = "Tiene presion Alta";
    } else{
        $palta = "No tiene presion Alta";
    }

    /* ENFERMEDAD DEL CORAZON */
    if (isset($_POST['ecorazon'])) {
        $ecorazon = "Tiene enfermedad de corazon";
    } else{
        $ecorazon = "No tiene enfermedad de corazon";
    }

    /* ENFERMEDAD RENAL */
    if (isset($_POST['erenal'])) {
        $erenal = "Tiene enfermedad renal";
    } else{
        $erenal = "No tiene enfermedad renal";
    }

    /* ENFERMEDAD PULMONAR */
    if (isset($_POST['epulmonar'])) {
        $epulmonar = "Tiene enfermedad pulmonar";
    } else{
        $epulmonar = "No tiene enfermedad pulmonar";
    }

    /* CANCER */
    if (isset($_POST['cancer'])) {
        $cancer = "Tiene cancer";
    } else{
        $cancer = "No tiene cancer";
    }

    /* Inmunocompromiso */
    if (isset($_POST['inmuno'])) {
        $inmuno = "Tiene inmunocompromiso";
    } else{
        $inmuno = "No tiene inmunocompromiso";
    }

    /* VIH */
    if (isset($_POST['vih'])) {
        $vih = "Tiene VIH";
    } else{
        $vih = "No tiene VIH";
    }

    saveNormal($_SESSION['nombre'],$_SESSION['puesto'],$_SESSION['depto'],$_SESSION['empresa'],$_SESSION['fiebre'],$_SESSION['tos'],$_SESSION['estornudos'],$_SESSION['dcabeza'],$_SESSION['diarrea'],$_SESSION['vomito'],$_SESSION['calosfrios'],$_SESSION['dabdominal'],$_SESSION['mgeneral'],$_SESSION['drespirar'],$diabetes,$palta,$ecorazon,$erenal,$epulmonar,$cancer,$inmuno,$vih);
    header('Location:covid.php');

}else{
        /* Si no es POST mostramos el formulario */
        require("../vistas/factores.view.html");
    }

?>