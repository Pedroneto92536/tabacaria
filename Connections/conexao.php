<?php

//Conexão com o Banco de Dados



// $serverip = "mysql873.umbler.com";

// $username = "vision";

// $password = "dark289101r";

// $db_name = "visionlounge";

$serverip = "localhost";

$username = "root";

$password = "";

$db_name = "visionlounge";



$conexao = mysqli_connect($serverip, $username, $password, $db_name) or die ('Não foi possível conectar!');

$conexao -> set_charset("utf8");

?>