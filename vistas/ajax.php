<?php

define('DB_SERVER', 'localhost');
define('DB_SERVER_USERNAME', 'root');
define('DB_SERVER_PASSWORD', '');
define('DB_DATABASE', 'covid');

$connexion = new mysqli(DB_SERVER, DB_SERVER_USERNAME, DB_SERVER_PASSWORD, DB_DATABASE);
$connexion->set_charset("utf8");

$html = '';
$key = $_POST['key'];

$result = $connexion->query(
    'SELECT * FROM usuarios 
     WHERE nombre LIKE "%'.strip_tags($key).'%"'
);

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {                
        $html .='<div>
                    <a class="suggest-element" 
                    data="'.$row['nombre'].'" 
                    data2="'.$row['depto'].'"
                    data3="'.$row['puesto'].'"
                    data4="'.$row['empresa'].'" 
                    id="'.$row['id'].'">'.$row['nombre'].'</a>
                </div>';
    }
}
echo $html;

/* asi estaba mostrando caracteres extranos */
/* while ($row = $result->fetch_assoc()) {                
    $html .='<div>
                <a class="suggest-element" 
                data="'.utf8_encode($row['nombre']).'" 
                data2="'.utf8_encode($row['depto']).'"
                data3="'.utf8_encode($row['puesto']).'"
                data4="'.utf8_encode($row['empresa']).'" 
                id="'.$row['id'].'">'.$row['nombre'].'</a>
            </div>';
} */

?>
