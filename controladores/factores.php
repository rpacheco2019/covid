<?php

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

    $nombre = "";
    $puesto = "";
    $depto = "";
    $empresa = "";
    $fiebre = "";
    $tos = "";
    $estornudos = "";
    $dcabeza = "";
    $diarrea = "";
    $vomito = "";
    $calosfrios = "";
    $dabdominal = "";
    $mgeneral = "";
    $drespirar = "";

    saveNormal($nombre,$puesto,$depto,$empresa,$fiebre,$tos,$estornudos,$dcabeza,$diarrea,$vomito,$calosfrios,$dabdominal,$mgeneral,$drespirar,$diabetes,$palta,$ecorazon,$erenal,$epulmonar,$cancer,$inmuno,$vih);
    header('Location:covid.php');

}else{
        /* Si no es POST mostramos el formulario */
        require("../vistas/factores.view.html");
    }

?>