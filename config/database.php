<?
$servername = "localhost";
$username = "root";
$password = "";
$database = "mydeliveryservice";

//Create connection
$conn = new mysqli($servername, $username, $password, $database);
//Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
mysqli_query($conn, "SET NAMES 'utf8'");
//echo "Connection successful <br>";

//$conn->close();
?>