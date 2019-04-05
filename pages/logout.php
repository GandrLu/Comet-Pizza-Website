<?php
//session_start();
session_destroy();

//Cookies entfernen
setcookie("identifier","",time()-(3600*24*365)); 
setcookie("securitytoken","",time()-(3600*24*365));

echo '<div class="alert alert-success" style="text-align:center" role="alert">Logout erfolgreich</div>';
?>