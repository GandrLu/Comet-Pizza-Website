<?
require './config/database.php';

// Selecting the choosen product from db
$products = new Product();

$result = $products->find("id=$id");
// Check if product was taken into shopping cart and user is logged in
if(isset($_GET['order'])&&isset($_SESSION['userId'])) {
    ?>
    <div class="alert alert-success" style="text-align:center" role="alert">
        Ihre Auswahl wurde dem <a class="alert-link" href="?p=cart">Warenkorb</a> hinzugefügt.
    </div>
    <?
}
// Selection of tags to be shown
$sql = "SELECT tagwerte.bezeichnung FROM tagwerte JOIN tags ON tagwerte.id = tags.tagwerteID WHERE produkteID = '".$id."'";
$resultTagsProduct = mysqli_query($conn,$sql);
$rows = mysqli_fetch_all($resultTagsProduct);

?>
<div class="product-name">
    <h1><?echo $result['bezeichnung']?></h1>
</div>
<hr>
<!-- Print the product info -->
<div class="product-container">
    <div class="product-page-pic">
        <img src="assets/images/<?echo$result['bild']?>" alt="<?echo $result['bild']?>">
    </div>
    <div class="product-description">
        <h3>Produktbeschreibung</h3>
        <br>
        <p><?echo $result['beschreibung']?></p>
        <div id="tagContainer" class="tag-container">
            <?  
            foreach($rows as $value)
            {
                ?>
                <div class="tag-button description">
                    <?echo $value[0].'...';?><i class="fas fa-tag"></i>
                </div>
                <?
            }
            ?>
        </div>

        <!-- Form for order -->
        <form action="<?echo $_SERVER['PHP_SELF'];?>?<?echo $_SERVER['QUERY_STRING'];?>&order=1" method="post">
            <div>
                <label for="size" style="width:80px">Größe</label>
                <!-- Get different prices for selection -->
                    <select id="sizeSelection" name="size" onchange="updatePrice(<?echo $result['id']?>)">
                        <? if(!empty($result['preisKlein'])) :?>    <option value="s">Klein</option> <? endif; ?>
                        <? if(!empty($result['preisNormal'])) :?>    <option value="m">Normal</option> <? endif; ?>
                        <? if(!empty($result['preisGroß'])) :?>    <option value="l">Groß</option>  <? endif; ?>
                    </select>
                <br>
                <label for="amount" style="width:80px">Anzahl</label>
                    <input id="amountInput" type="number" name="amount" min="1" max="10" value="1" style="margin-right: 30px" onchange="updatePrice(<?echo $result['id']?>)">
                    <br><br>
                <p id="productPrice">
                    <?
                    if(!empty($result['preisKlein']))
                    {echo $result['preisKlein'];}
                    else
                    {echo $result['preisNormal'];}?>€
                </p>
                <button type="submit"<?if(!isset($_SESSION['userId'])) echo ' class="button2 disabled" disabled'; else echo 'class="button2"';?>
                    style="width:250px" value="Abschicken">In den Warenkorb
                </button>
            </div>
        </form>
    </div>
</div>

<?
// Checks for sign in
if(empty($_SESSION['userId'])) { ?>
    <div class="alert alert-warning" style="text-align:center" role="alert">
        Bitte erst anmelden oder registrieren. Weiter zur <a class="alert-link" href="?p=login">Anmeldung.</a>
        </div>'
<?}
// If product is takin into the shopping cart, a new "warenkorb" entry will be created and connected to an order
elseif(isset($_GET['order'])) {
    $size = $_POST['size'];
    $amount = $_POST['amount'];
    $userId = $_SESSION['userId'];

    // Checks for uncompleted orders of the customer
    $sql = "SELECT * FROM bestellungen WHERE kundenID = ? AND timeReady IS NULL";
    $statement = $conn->prepare($sql);
    $statement->bind_param("i", $userId);
    $statement->execute();
    $result = $statement->get_result();
    $order = $result->fetch_assoc();

    // If the customer has not started an order yet, a new one will be created
    if(empty($order['id'])) {        
        $sql = "INSERT INTO bestellungen (kundenID) VALUES (?)";
        $statement = $conn->prepare($sql);
        $statement->bind_param("i", $userId);
        $statement->execute();

        // Selection of the new uncompleted order
        $sql = "SELECT * FROM bestellungen WHERE kundenID = ? AND timeReady IS NULL";
        $statement = $conn->prepare($sql);
        $statement->bind_param("i", $userId);
        $statement->execute();
        $result = $statement->get_result();
        $order = $result->fetch_assoc();
    }
    // If selection of order was successful, a new "warenkorb" entry is added in connection to the order
    if(isset($order['id'])) {
        $orderId = $order['id'];
        $productId = $_GET['id'];

        for ($i=0; $i < $amount; $i++) { 
        $sql = "INSERT INTO warenkorb (grösse, bestellungenID, produkteID) VALUES (?, ?, ?)";
        $statement = $conn->prepare($sql);
        $statement->bind_param("sii", $size, $orderId, $productId);
        $statement->execute();
        }
    }
}
?>
<!-- Skript for the price adjustment to the current choosen size and amount -->
<script>
var currentPrice;
var currentAmount = 1;

function updatePrice(id) {
    var xhttp;
    var size = document.getElementById("sizeSelection").value;
    updateAmount();

    if (size == "") {
        document.getElementById("productPrice").innerHTML = "";
        return;
    }
    xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
        document.getElementById("productPrice").innerHTML = this.responseText;
        }
    };
    xhttp.open("GET", "core/livePrice.php?id="+id+"&s="+size+"&a="+currentAmount, true);
    xhttp.send();
}

function updateAmount() {
    currentAmount = document.getElementById("amountInput").value;
}
</script>

