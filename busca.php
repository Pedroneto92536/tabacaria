<?php
include("Connections/conexao.php");
	
	//Recuperar o valor da palavra
	$pesquisa = $_POST['palavra'];
	
	//Pesquisar no banco de dados nome do curso referente a palavra digitada pelo usuário
	$rg = "SELECT * FROM tbclientes WHERE rg LIKE '%$pesquisa%'";
	$result = mysqli_query($conn, $rg);
	
	if(mysqli_num_rows($result) <= 0){
		echo "Nenhum curso encontrado...";
	}else{
		while($rows = mysqli_fetch_assoc($result)){
			echo "<li>".$rows['rg']."</li>";
		}
	}
?>