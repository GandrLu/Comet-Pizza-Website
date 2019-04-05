<?
require './config/database.php';

if(isset($_SESSION['userId']))
{
$userID = $_SESSION['userId'];
$cart = new Cart();
$products = $cart->shoppingcart("$userID")[0];
$fullPrice = 0;
}

if($products!='n')
{
    $sql = "SELECT * FROM paymentmethods";
    $result = mysqli_query($conn,$sql);
    $row = mysqli_fetch_array($result);

    $sql2 = "SELECT * FROM kunden WHERE id = '".$userID."'";
    $result2 = mysqli_query($conn,$sql2);
    $row2 = mysqli_fetch_array($result2);

    for($i=0; $i<count($products); $i++)
    {
        switch ($products[$i][3]) {
            case 's':
                $price = $products[$i][21];
                break;
            case 'm':
                $price = $products[$i][22];
                break;
            case 'l':
                $price = $products[$i][23];
                break;
            default:
                $price = $products[$i][22];
        }
        $fullPrice = $fullPrice + $price;
    }

    if(isset($_GET['delivery']))
    { 
        $currentTime = date('Y-m-d H:i:s');
        $pId = $_POST['payment'];
        $notes = $_POST['note'];

        $sql = "UPDATE bestellungen SET updatedAt = '".$currentTime."', timeReady = '".$currentTime."', paymentMethodsID = '".$pId."', bemerkung = '".$notes."' WHERE kundenID = $userID AND timeReady IS NULL";
        $statement = $conn->prepare($sql);
        $statement->execute();
        echo '<div class="alert alert-success" style="text-align:center" role="alert">Vielen Dank für Deine Bestellung ', $_SESSION['username'], '!</div>';
    }
    else
    {
        ?>
        <div class="greeter-message"><h1>Bestellen</h1></div>
        <br>
        <div class="checkout-container">
            <div class="checkout-overview">
                <h4>Übersicht</h4>
                Sie bestellen <?echo count($products); if(count($products)>1){echo ' Produkte';} else{echo ' Produkt';}?> für insgesamt <?echo number_format($fullPrice, 2)?>€
                <?
                for($i=0; $i<count($products); $i++)
                {
                    ?>
                    <hr>
                    <div class="checkout-item">
                    <p style="width: 40%"><?echo $products[$i][19]?></p>
                    <img src="assets/images/<?echo $products[$i][24]?>" alt="Es geht">
                    <p>Größe: <?echo $products[$i][3]?></p>
                    </div>
                    <?
                }
                ?>
            </div>
            <div class="checkout-control">
                <form id="checkoutForm" action="<?echo $_SERVER['PHP_SELF'];?>?<?echo $_SERVER['QUERY_STRING'];?>&delivery=1" method="post">
                    <div class="checkout-control-item">
                        <h4>Zahlungsmöglichkeiten</h4>
                        <input type="radio" name="payment" value="1" checked>   <img src="assets/images/paypal.png" style="max-width:100px"></img><br><br>
                        <input type="radio" name="payment" value="2">   <img src="assets/images/sofortüberweisung.png" style="max-width:100px"></img><br><br>
                        <input type="radio" name="payment" value="3">   <img src="assets/images/creditcard.png" style="max-width:100px"></img>
                    </div>
                    <div class="checkout-control-item">
                        <h4>Ihre Lieferadresse</h4>
                        <?echo $row2[3], ' ', $row2[4]?><br>
                        <?echo $row2[7]?><br>
                        <?echo $row2[5], ' ', $row2[6]?>
                    </div>
                    <div class="checkout-control-item">
                        <h4>Bemerkung</h4>
                        <textarea name="note" cols="30" rows="3" form="checkoutForm"></textarea>
                    </div>
                </form>
            </div>
        </div>
        <input class="button2" type=submit  form="checkoutForm" value="Jetzt Bestellen" style="width:250px">
        <?
    }
}
else
{
    header('Location: .');
}
?>
