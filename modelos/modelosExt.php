<?php

function save($nombre,$tipoExterno,$deptoVisitado,$fiebre,$tos,$estornudos,$dcabeza,$diarrea,$vomito,$calosfrios,$dabdominal,$mgeneral,$drespirar,$estatus){

    try {
        /* DB Info */
        $conn = new PDO('mysql:host=localhost;dbname=covid','root','');
        
        /* SQL Qry */
		$statement = $conn->prepare("INSERT INTO registrosext (nombre,tipo,dvisitado,fiebre,tos,estornudos,dcabeza,diarrea,vomito,calosfrios,dabdominal,mgeneral,drespirar,estatus)
        VALUES('$nombre','$tipoExterno','$deptoVisitado','$fiebre','$tos','$estornudos','$dcabeza','$diarrea','$vomito','$calosfrios','$dabdominal','$mgeneral','$drespirar','$estatus')");
        
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
		$statement = $conn->prepare("SELECT * FROM registrosext");

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
		$statement = $conn->prepare("SELECT * FROM registrosext WHERE id=$idRegistro");
        
        /* Execute */
        $statement->execute();
        $datos = $statement->fetch();
        return $datos;
        
	} catch (PDOException $e) {
		echo "Error Try Mysql: ".$e->getMessage();
	}
}

?>