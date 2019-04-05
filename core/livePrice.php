<?
require '../config/database.php';

$id = $_GET["id"];
$size = $_GET["s"];
$amount = $_GET["a"];
$newPrice = 0;

$sql = "SELECT * FROM produkte WHERE id = '".$id."'";
$result = mysqli_query($conn,$sql);
$row = mysqli_fetch_array($result);

switch ($size){
    case 's':
    $newPrice = $row[5];
    break;
    case 'm':
    $newPrice = $row[6];
    break;
    case 'l':
    $newPrice = $row[7];
    break;
}
echo number_format($newPrice*$amount, 2), '€';
?>