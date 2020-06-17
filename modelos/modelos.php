<?php

function saveNormal($empleado,$depto,$puesto,$empresa,$fiebre,$tos,$estornudos,$dcabeza,$diarrea,$vomito,$calosfrios,$dabdominal,$mgeneral,$drespirar,$diabetes,$palta,$ecorazon,$erenal,$epulmonar,$cancer,$inmuno,$vih,$estatus){

    try {

         
        /* DB Info */
        $conn = new PDO('mysql:host=localhost;dbname=covid','root','');
        
        /* SQL Qry */
		$statement = $conn->prepare("INSERT INTO registros (empleado,depto,puesto,empresa,fiebre,tos,estornudos,dcabeza,diarrea,vomito,calosfrios,dabdominal,mgeneral,drespirar,diabetes,palta,ecorazon,erenal,epulmonar,cancer,inmuno,vih,estatus)
        VALUES('$empleado','$depto','$puesto','$empresa','$fiebre','$tos','$estornudos','$dcabeza','$diarrea','$vomito','$calosfrios','$dabdominal','$mgeneral','$drespirar','$diabetes','$palta','$ecorazon','$erenal','$epulmonar','$cancer','$inmuno','$vih','$estatus')");
        
        /* Execute */
		$statement->execute();
		
	} catch (PDOException $e) {
		echo "Error Try Mysql: ".$e->getMessage();
	}
}

function getReport(){
    try {
        
         /* DB Info */
        $conn = new PDO('mysql:host=localhost;dbname=covid','root','');

         /* SQL Qry */
		$statement = $conn->prepare("SELECT * FROM registros");

        /* Execute */
        $statement->execute();
        $datos = $statement->fetchAll();
        return $datos;
        
    } catch (PDOException $e) {
        
    }
}

function getRegistro($idRegistro){

    try {

         
        /* DB Info */
        $conn = new PDO('mysql:host=localhost;dbname=covid','root','');
        
        /* SQL Qry */
		$statement = $conn->prepare("SELECT * FROM registros WHERE id=$idRegistro");
        
        /* Execute */
        $statement->execute();
        $datos = $statement->fetch();
        return $datos;
        
	} catch (PDOException $e) {
		echo "Error Try Mysql: ".$e->getMessage();
	}
}

?>