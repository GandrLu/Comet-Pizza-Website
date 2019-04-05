<?
require './config/database.php';

$products = new Product();
$result = $products->category($page);

$sql = "SELECT tagwerte.bezeichnung FROM tagwerte JOIN tags ON tagwerte.id = tags.tagwerteID JOIN produkte ON tags.produkteID = produkte.id WHERE kategorieID = '".$result[0][0][9]."' GROUP BY tagwerte.bezeichnung";
$resultTagsCat = mysqli_query($conn,$sql);
$rows = mysqli_fetch_all($resultTagsCat);
?>
<div id="base"></div>

<div class="greeter-message"><h1><?echo $page?> Speisekarte</h1></div>
<br>
Nach Tags filtern:
<div id="tagContainer" class="tag-container">
    <button class="tag-button active" onclick="filterSelection('all')">alle...<i class="fas fa-tag"></i></button>
    <?  
    foreach($rows as $value)
    {
        ?>
        <button class="tag-button" onclick="filterSelection('<?echo $value[0];?>')">
            <?echo $value[0].'...';?><i class="fas fa-tag"></i>
        </button>
        <?
    }
    ?>
</div>

<div class="product-grid">

<?
foreach($result[0] as $value)
{
    if(!empty($value[5])) {$priceSmall = $value[5];}
    else $priceSmall = $value[6];

    $sql_2 = "SELECT tagwerte.bezeichnung FROM tagwerte JOIN tags ON tagwerte.id = tags.tagwerteID WHERE produkteID = '".$value[0]."'";
    $resultTagsProduct = mysqli_query($conn,$sql_2);
    $rows_2 = mysqli_fetch_all($resultTagsProduct);

?>
    <div class="product-card<?foreach($rows_2 as $value_2) echo " ".$value_2[0];?>">
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
?>

</div>

<!-- functions for managing content shown on page according to the chosen tags -->
<script>
filterSelection("all")

function filterSelection(c) {
  var x, i;
  x = document.getElementsByClassName("product-card");
  if (c == "all") c = "";
  for (i = 0; i < x.length; i++) {
    RemoveClass(x[i], "show");
    console.log(x[i]);
    if (x[i].className.indexOf(c) > -1) AddClass(x[i], "show");
  }
}

function AddClass(element, name) {
  var i, arr1, arr2;
  arr1 = element.className.split(" ");
  arr2 = name.split(" ");
  for (i = 0; i < arr2.length; i++) {
    if (arr1.indexOf(arr2[i]) == -1) {element.className += " " + arr2[i];}
  }
}

function RemoveClass(element, name) {
  var i, arr1, arr2;
  arr1 = element.className.split(" ");
  arr2 = name.split(" ");
  for (i = 0; i < arr2.length; i++) {
    while (arr1.indexOf(arr2[i]) > -1) {
      arr1.splice(arr1.indexOf(arr2[i]), 1);     
    }
  }
  element.className = arr1.join(" ");
}

// Add active class to the current button (highlight it)
var btnContainer = document.getElementById("tagContainer");
var btns = btnContainer.getElementsByClassName("tag-button");
for (var i = 0; i < btns.length; i++) {
  btns[i].addEventListener("click", function(){
    var current = document.getElementsByClassName("active");
    current[0].className = current[0].className.replace(" active", "");
    this.className += " active";
  });
}
</script>
