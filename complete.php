<?php

include("Connections/conexao.php");

 if(isset($_POST["cpf"]))  

 $cpf = $_POST["cpf"];
 {  
      $output = '';  
      $query = "SELECT * FROM tbclientes WHERE cpf LIKE '".$cpf."%' limit 11 ";  
      $result = mysqli_query($conexao, $query);  
      $output = '<ul class="rhu list-unstyled">';  
      if(mysqli_num_rows($result) > 0)  
      {  
           while($row = mysqli_fetch_array($result))  
           {  
                $output .= '<li class="listin">'.$row["cpf"].'</li>';  
           }  
      }  
      else  
      {  
           $output .= '<li class="listin">CPF não encontrado!</li>';  
      }  
      $output .= '</ul>';  
      echo $output;  
 }
