<?php
if ((time() - $_SESSION['last_time']) > 3000) {
header("location:sair.php");
}

?>