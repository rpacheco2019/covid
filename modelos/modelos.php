<?php

function saveNormal($empleado,$depto,$puesto,$empresa,$fiebre,$tos,$estornudos,$dcabeza,$diarrea,$vomito,$calosfrios,$dabdominal,$mgeneral,$drespirar,$diabetes,$palta,$ecorazon,$erenal,$epulmonar,$cancer,$inmuno,$vih){

    try {

		/* $user = $_SESSION['ses_user']; */
         
        /* DB Info */
        $conn = new PDO('mysql:host=localhost;dbname=covid','root','');
        
        /* SQL Qry */
		$statement = $conn->prepare("INSERT INTO registros (empleado,depto,puesto,empresa,fiebre,tos,estornudos,dcabeza,diarrea,vomito,calosfrios,dabdominal,mgeneral,drespirar,diabetes,palta,ecorazon,erenal,epulmonar,cancer,inmuno,vih)
        VALUES('$empleado','$depto','$puesto','$empresa','$fiebre','$tos','$estornudos','$dcabeza','$diarrea','$vomito','$calosfrios','$dabdominal','$mgeneral','$drespirar','$diabetes','$palta','$ecorazon','$erenal','$epulmonar','$cancer','$inmuno','$vih')");
        
        /* Execute */
		$statement->execute();
		
	} catch (PDOException $e) {
		echo "Error Try Mysql: ".$e->getMessage();
	}
}

?>