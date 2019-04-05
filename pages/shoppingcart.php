<?
require './config/database.php';

if(!isset($_SESSION['userId'])) {
    die('<div class="alert alert-warning" style="text-align:center" role="alert">
    Um Produkte in den Warenkorb zu legen bitte 
    <a class="alert-link" href="index.php?p=login">einloggen</a></div>');
}

$userID = $_SESSION['userId'];

if(isset($_GET['item']))
{
    $item = $_GET['item'];
    $sql = "DELETE FROM warenkorb WHERE id = ?";
    $statement = $conn->prepare($sql);
    $statement->bind_param("i", $item);
    $statement->execute();
}

if(isset($_GET['clear']))
{
    $sql = "DELETE warenkorb FROM warenkorb JOIN bestellungen ON warenkorb.bestellungenID = bestellungen.id WHERE bestellungen.kundenId = ?";
    $statement = $conn->prepare($sql);
    $statement->bind_param("i", $userID);
    $statement->execute();
}

$cart = new Cart();
$result = $cart->shoppingcart("$userID")[0];
$fullPrice = 0;
?>
<div class="shoppingcart-container">
    <div class="greeter-message"><h1>Mein Warenkorb</h1></div>
    <br><br>
    <?
    if($result == "n")
    {echo 'Noch nichts im Warenkorb.';}
    else
    {
        for($i=0; $i<count($result); $i++)
        {
            switch ($result[$i][3]) {
                case 's':
                    $price = $result[$i][21];
                    break;
                case 'm':
                    $price = $result[$i][22];
                    break;
                case 'l':
                    $price = $result[$i][23];
                    break;
                default:
                    $price = $result[$i][22];
            }
            ?>
            <div class="shoppingcart-item">
            <p style="font-weight:bold"><?echo $result[$i][19]?></p>
            <img src="assets/images/<?echo $result[$i][24]?>" alt="Es geht">
            <p>Größe: <?echo $result[$i][3]?></p>
            <p><?echo $price?>€</p>
            <form class="delete-button" action="?p=cart&item=<?echo $result[$i][0]?>" method="post">
            <button type="submit" class="button2" style="width:35px" value="Abschicken">x</button>
            </form>
            </div>
            <hr>
            <?
            $fullPrice = $fullPrice + $price;
        }
        ?>
        <form class="delete-button" action="?p=cart&clear=1" method="post">
            <button type="submit" class="button-delete shoppingcart-button" value="Abschicken">Warenkorb leeren</button>
        </form>
        <p style="margin-top:70px">Gesamtpreis: <span style="font-size:30px;font-weight:bold"><?echo number_format($fullPrice, 2);?>€</span><p>
        <a href="<?=$_SERVER['SCRIPT_NAME']?>?p=checkout" class="button2" style="padding-left:30px; padding-right:30px">Zur Kasse gehen</a>
    <?
    }
    ?>
</div>

