<?
//require_once 'config/database.php';

foreach(glob('models/*.php') as $modelclass)
{
    require_once $modelclass;
}
$page = isset($_GET['p']) ? $_GET['p'] : '';
$id = isset($_GET['id']) ? $_GET['id'] : '';
?>

<!DOCTYPE html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="assets/style.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href="https://fonts.googleapis.com/css?family=Oleo+Script+Swash+Caps|Sarina" rel="stylesheet">
    <link rel="icon" type="image/vnd.microsoft.icon" href="/favicon.png">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script defer src="https://use.fontawesome.com/releases/v5.0.6/js/all.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
</head>

<body>
<? 
include "header.php";

?>
<div class="content">
<?php 
switch ($page) {
    case 'Pizza':
    case 'Burger':
    case 'Burritos':
    case 'Pasta':
    case 'Salat':
    case 'Getränke':
        include ('pages/shopview.php');
        break;
    case 'login':
        include ('pages/login.php');
        break;
    case 'produkt':
        include ('pages/productview.php');
        break;
    case 'registration':
        include ('pages/registration.php');
        break;
    case 'secure':
        include ('pages/secure.php');
        break;
    case 'userpage':
        include ('pages/userpage.php');
        break;
    case 'cart':
        include ('pages/shoppingcart.php');
        break;
    case 'logout':
        include ('pages/logout.php');
        break;
    case 'checkout':
        include ('pages/checkout.php');
        break;
    case 'franchise':
        include ('pages/franchise.php');
        break;
    case 'jobs':
        include ('pages/jobs.php');
        break;
    case 'impressum':
        include ('pages/impressum.php');
        break;
    case 'contact1':
        include ('pages/contact1.php');
        break;
    case 'contact2':
        include ('pages/contact2.php');
        break;
    case 'contactInsert':
        include ('pages/contactInsert.php');
        break;
    case 'searchpage':
        include ('pages/searchpage.php');
        break;
    default:
        include ('pages/startpage.php');
        break;
}
?>
</div>
<?
include "footer.php" 
?>
</body>
</html>