<?php

include("Connections/conexao.php");

 if(isset($_POST["rg"]))  

 $rg = $_POST["rg"];
 {  
      $output = '';  
      $query = "SELECT * FROM tbclientes WHERE rg LIKE '".$rg."%' limit 5 ";  
      $result = mysqli_query($conexao, $query);  
      $output = '<ul class="rhu list-unstyled">';  
      if(mysqli_num_rows($result) > 0)  
      {  
           while($row = mysqli_fetch_array($result))  
           {  
                $output .= '<li class="listin">'.$row["rg"].'</li>';  
           }  
      }  
      else  
      {  
           $output .= '<li class="listin">RG não encontrado!</li>';  
      }  
      $output .= '</ul>';  
      echo $output;  
 }
