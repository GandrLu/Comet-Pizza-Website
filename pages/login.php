<?php
//session_start();
require './config/database.php';
//require './core/functions.php';
if(isset($_GET['login'])) {
  $email = $_POST['email'];
  $password = $_POST['password'];
  
  $statement = $conn->prepare("SELECT * FROM kunden WHERE email = ?");
    $statement->bind_param("s", $email);
    $statement->execute();
    $result = $statement->get_result();
    $user = $result->fetch_assoc();

      //Überprüfung des Passworts
      if (!empty($user) && password_verify($password, $user['password'])) {
        $_SESSION['userId']   = $user['id'];
        $_SESSION['username'] = $user['vorname'];
        $_SESSION['useremail'] = $user['email'];
        $_SESSION['paymentMethodsId'] = $user['paymentMethods_id'];

        //Möchte der Nutzer angemeldet bleiben?
        if(isset($_POST['staySignedIn'])) {

          //Check if the user has already an securitytoken entry
          $sql = "SELECT * FROM securitytokens WHERE userId = ?";
          $statement = $conn->prepare($sql);
          $statement->bind_param("i", $user['id']);
          $statement->execute();
          $result = $statement->get_result();
          $securityData = $result->fetch_assoc();

          if(isset($securityData['id'])) {  //if he/she has, identifier and token are taken from there
            $identifier = $securityData['identifier'];
            $securitytoken = $securityData['securitytoken'];
          } else {                          // else he/she gets a new entry

            $identifier = random_string();
            $securitytoken = random_string();
        
            $sql = "INSERT INTO securitytokens (userId, identifier, securitytoken) VALUES (?, ?, ?)";
            $statement = $conn->prepare($sql);
            $tmpSecToken = sha1($securitytoken);
            $statement->bind_param("iss", $user['id'], $identifier, $tmpSecToken);
            $statement->execute();
          }

        setcookie("identifier",$identifier,time()+(3600*24*365)); //1 Jahr Gültigkeit
        setcookie("securitytoken",$securitytoken,time()+(3600*24*365)); //1 Jahr Gültigkeit
        }

        die('<div class="alert alert-success" style="text-align:center" role="alert">Login erfolgreich. 
        Weiter <a class="alert-link" href="?p=Pizza">zu leckerer Pizza!</a></div>');
      } else {
        $errorMessage = '<div class="alert alert-warning" style="text-align:center" role="alert">E-Mail 
                        oder Passwort war ungültig</div>';
      }
    }
 
if(isset($errorMessage)) {
    echo $errorMessage;
}
?>
<div class="greeter-message"><h1>Anmeldung</h1></div>
<br>

<form class="form-horizontal" action="?p=login&login=1" method="post">
  <div class="form-group">
    <label for="inputEmail3" class="col-sm-2 control-label">Email</label>
    <div class="col-sm-10">
      <input style="width:50%" type="email" class="form-control" id="inputEmail3" name="email" placeholder="Email">
    </div>
  </div>
  <div class="form-group">
    <label for="inputPassword3" class="col-sm-2 control-label">Password</label>
    <div class="col-sm-10">
      <input style="width:50%" type="password" class="form-control" id="inputPassword3" name="password" placeholder="Password">
    </div>
  </div>
  <div class="form-group">
    <div class="col-sm-offset-2 col-sm-10">
      <div class="checkbox">
        <label>
          <input type="checkbox" name="staySignedIn" value="1"> Angemeldet bleiben
        </label>
      </div>
    </div>
  </div>
  <div class="form-group">
    <div class="col-sm-offset-2 col-sm-10">
      <button type="submit" class="button2" value="Abschicken">Anmelden</button>
    </div>
  </div>
</form>

<form class="form-horizontal" action="?p=registration" method="post"><!-- Vlt selbst style definieren anstatt form kram zu nutzen? Für Reg. button. -->
  <div class="form-group">
    <div class="col-sm-offset-2 col-sm-10">
      <h4>Noch kein Konto?</h4>
      <button type="submit" class="button2">Registrieren</button>
    </div>
  </div>
</form>