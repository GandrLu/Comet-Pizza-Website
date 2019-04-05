<?
$where = $_POST['searchText'];

if(isset($_POST['how'])){
$how   = $_POST['how'];

$searchquery = new Product;
$result = $searchquery->search($where,$how);
} else {
    $searchquery = new Product;
    $result = $searchquery->search($where);
}

?>
    <form class="form-horizontal" action="?p=searchpage&search=1" method="post">
        <label for="inputSearch" class="col-sm-2 control-label">Erweiterte Suche</label>
            <div class="input-group mb-3" style="margin-left:15px;width:50%;">    
                <input class="form-control" style="width:50%" name="searchText" id="inputSearch" type="text" placeholder="Produkt suchen..." required>
                <div class="input-group-append">
                    <select name="how">
                            <option value="or">Eins der Worte [oder]</option>
                            <option value="and">Alle Worte [und]</option>
                    </select>
                    <button class ="button2" type="submit">Suchen</button>
                </div>
            </div>
    </form>
<?
if(isset($_GET['search'])){?>
   
    <div class="product-grid">

<?
if(is_array($result)){
    foreach($result[0] as $value)
    {
        if(!empty($value[5])) {$priceSmall = $value[5];}
        else $priceSmall = $value[6];

/*         $sql_2 = "SELECT tagwerte.bezeichnung FROM tagwerte JOIN tags ON tagwerte.id = tags.tagwerteID WHERE produkteID = '".$value[0]."'";
        $resultTagsProduct = mysqli_query($conn,$sql_2);
        $rows_2 = mysqli_fetch_all($resultTagsProduct);
 */
    ?>
        <div class="product-card show<?/*foreach($rows_2 as $value_2) echo " ".$value_2[0];*/?>">
            <a href="index.php?p=produkt&id=<?echo $value[0]?>">
                <div class="product-pic">
                    <img src="assets/images/<?echo $value[8]?>"/>
                </div>
                <div class="product-info">
                    <span style="font-weight:bold"><?echo $value[3]?></span>
                    <br>
                    <span style="font-size:80%">ab <?echo $priceSmall?>€</span>
                </div>
            </a>
        </div>
    <?
    }
} else {
    echo "Es wurden keine Produkte gefunden die '$where' entsprechen.";
}
?></div><?
}
?>
