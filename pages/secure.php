<?php
//session_start();
require './config/database.php';
require './core/functions.php';

//Überprüfe auf den 'Angemeldet bleiben'-Cookie
if(!isset($_SESSION['userId']) && isset($_COOKIE['identifier']) && isset($_COOKIE['securitytoken'])) {
    $identifier = $_COOKIE['identifier'];
    $securitytoken = $_COOKIE['securitytoken'];
    
    $sql = "SELECT * FROM securitytokens WHERE identifier = ?";
    $statement = $conn->prepare($sql);
    $statement->bind_param("s", $identifier);
    $statement->execute();
    $result = $statement->get_result();
    $securitytoken_row = $result->fetch_assoc();

    //Logge den Benutzer ein
    $_SESSION['userId'] = $securitytoken_row['userId'];
    $statement = $conn->prepare("SELECT * FROM kunden WHERE id = ?");
    $statement->bind_param("s", $_SESSION['userId']);
    $statement->execute();
    $result = $statement->get_result();
    $user = $result->fetch_assoc();

    $_SESSION['username'] = $user['vorname'];
    $_SESSION['useremail'] = $user['email'];
    $_SESSION['paymentMethodsId'] = $user['paymentMethods_id'];
   }
?>