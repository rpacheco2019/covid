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

    //librerias
    require '../PHPMailer/PHPMailerAutoload.php';

    //Create a new PHPMailer instance
    $mail = new PHPMailer();
    $mail->IsSMTP();
    
    //Configuracion servidor mail
    $mail->From = "sysalert@planner1events.com"; //remitente
    $mail->FromName = "Alerta Covid"; //remitente Nombre
    $mail->SMTPAuth = true;
    $mail->SMTPSecure = 'SSL'; //seguridad
    $mail->Host = "diablo.websitewelcome.com"; // servidor smtp
    $mail->Port = 587; //puerto
    $mail->Username ='sysalert@planner1events.com'; //nombre usuario
    $mail->Password = 'sysalert.2020'; //contraseña
    
    //Agregar destinatario
    $mail->AddAddress("jsierra@planner1events.com");
    $mail->AddAddress("jesquivel@planner1events.com"); 
    $mail->AddAddress("rpacheco.inbox@gmail.com");
    $mail->Subject = "Se ha detectado una encuesta en Riesgo";
    $mail->Body = "Se ha registrado una encuesta con sintomas de Covid. \n";
    $mail->Body .= "Nombre: ".$_SESSION['nombre']."\n";
    $mail->Body .= "Departamento: ".$_SESSION['depto']."\n";
    $mail->Body .= "Empresa: ".$_SESSION['empresa']."\n \n";
    $mail->Body .= "Revise el sistema de registros para mas info. http://survey.planner1events.com/devops/covid/controladores/report.php";

    //Enviar correo
    $mail->Send();

    //Guardamos en la base de datos
    $estatus = "RIESGO" ;
    saveNormal($_SESSION['nombre'],$_SESSION['puesto'],$_SESSION['depto'],$_SESSION['empresa'],$_SESSION['fiebre'],$_SESSION['tos'],$_SESSION['estornudos'],$_SESSION['dcabeza'],$_SESSION['diarrea'],$_SESSION['vomito'],$_SESSION['calosfrios'],$_SESSION['dabdominal'],$_SESSION['mgeneral'],$_SESSION['drespirar'],$diabetes,$palta,$ecorazon,$erenal,$epulmonar,$cancer,$inmuno,$vih,$estatus);
    header('Location:covid.php');

}else{
        /* Si no es POST mostramos el formulario */
        require("../vistas/factores.view.html");
    }

?>