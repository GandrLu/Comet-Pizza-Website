<?
echo '<div class="alert alert-success" style="text-align:center" role="alert">
Nachricht erfolgreich versendet!</div>';
// this code should work, but I have no local mailserver...
/*$_SESSION['post']['message'] = $_POST['message'];

$to =       "Luzius.Koelling@fh-erfurt.de";
$subject =  "Nachricht von " . $_SESSION['post']['name'];
$msg =      $_SESSION['post']['message'];
$headers =  "From: {$_SESSION['post']['email']}";

ini_set('SMTP', 'webmail.fh-erfurt.de');
ini_set('smtp_port', '587');

if(mail($to, $subject, $msg, $headers)){
    echo '<div class="alert alert-success" style="text-align:center" role="alert">
    Nachricht erfolgreich versendet!</div>';
} else {
    echo '<div class="alert alert-warning" style="text-align:center" role="alert">
    Leider ist ein Fahler bei der Übermittlung aufgetreten.</div>';
}*/
?>