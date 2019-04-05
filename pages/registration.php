<?php

require 'config/database.php';

$showFormular = true;

$firstname = "";
$lastname = "";
$zip = "";
$city = "";
$streetHnr = "";
$floor = "";
$gender = "";
$telNr = "";
$company = "";

if(isset($_GET['register'])) {
    $error = false;

    $firstname =    ucfirst(mb_strtolower($_POST['vorname'], 'UTF-8'));
    $lastname =     ucfirst(mb_strtolower($_POST['nachname'], 'UTF-8'));
    $zip =          $_POST['plz'];
    $city =         ucfirst(mb_strtolower($_POST['ort'], 'UTF-8'));
    $streetHnr =    ucfirst(mb_strtolower($_POST['strasseHnr'], 'UTF-8'));
    $floor =        $_POST['etage'];
    $gender =       $_POST['geschlecht'];
    $telNr =        $_POST['rufnummer'];
    $company =      ucfirst(mb_strtolower($_POST['firma'], 'UTF-8'));

    $email =        $_POST['email'];
    $password =     $_POST['password'];
    $password2 =    $_POST['password2'];

    if(!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        echo '<div class="alert alert-warning" style="text-align:center" role="alert">
        Bitte eine gültige Email eingeben!</div><br>';
        $error = true;
    }
    if(strlen($password) == 0) {
        echo '<div class="alert alert-warning" style="text-align:center" role="alert">
        Bitte ein Passwort angeben!</div><br>';
        $error = true;
    }
    if($password != $password2) {
        echo '<div class="alert alert-warning" style="text-align:center" role="alert">
        Die Passwörter müssen übereinstimmen!</div><br>';
        $error = true;
    }
    if( empty($firstname) || empty($lastname) || empty($city) || empty($streetHnr) || empty($zip) || empty($telNr)) {  
        echo '<div class="alert alert-warning" style="text-align:center" role="alert">
        Bitte alle Felder ausfüllen.</div><br>';
        $error = true;
    }

    //Überprüfe ob E-Mail noch nicht registriert ist
    if(!$error) { 
        $sql = 'SELECT * FROM kunden WHERE email = ' . "'$email'";
        $result = $conn->query($sql);
        $user = $result->fetch_all();
   
        if(!empty($user)) {
            echo '<div class="alert alert-warning" style="text-align:center" role="alert">
            Diese E-Mail-Adresse ist bereits vergeben!</div><br>';
            $error = true;
        }    
    }

    //Kein Fehler, Kunde kann registriert werden
    if(!$error) {
        $password_hash = password_hash($password, PASSWORD_DEFAULT);
        
        $sql = "INSERT INTO kunden (vorname, nachname, plz, ort, strasseHnr, etage, geschlecht, email, password, rufnummer, firma) 
                VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
        $statement = $conn->prepare($sql);
        $statement->bind_param("sssssssssss", $firstname, $lastname, $zip, $city, $streetHnr, $floor, $gender, $email, $password_hash, 
                                                $telNr, $company);
        $result = $statement->execute();
        if($result) {        
            echo '<div class="alert alert-success" style="text-align:center" role="alert">
            Du wurdest erfolgreich registriert. <a href="index.php?p=login" class="alert-link">Anmelden</a></div>';
            $showFormular = false;
        } else {
            echo '<div class="alert alert-warning" style="text-align:center" role="alert">
            Beim Abspeichern ist leider ein Fehler aufgetreten<br></div>';
        }
    }
}
if($showFormular) {
    ?>
    <div class="greeter-message"><h1>Registrierung</h1></div>
    <br>
    <p>Pflichtfelder sind mit * gekennzeichnet</p>
    <form class="form-horizontal" action="?p=registration&register=1" method="post">
        <div class="form-group">
            <label for="email" class="col-sm-2 control-label">Email *</label>
                <div class="col-sm-10">
                    <input style="width:50%" class="form-control" type="email" name="email" required>
                </div>
        </div>
        <div class="form-group">
            <label for="password" class="col-sm-2 control-label">Passwort *</label>
                <div class="col-sm-10">
                    <input style="width:50%" class="form-control" type="password" name="password" required>
                </div>
        </div>
        <div class="form-group">
            <label for="password2" class="col-sm-2 control-label">Passwort wiederholen *</label>
                <div class="col-sm-10">
                    <input type="password" style="width:50%" class="form-control" name="password2" required>
                </div>
        </div>
        <div class="form-check form-check-inline">
            <div class="col-sm-offset-2 col-sm-10">
                <label class="form-check-label" for="geschlecht">Geschlecht *</label>
                    <select name="geschlecht">
                        <option value="m">Herr</option>
                        <option value="w">Frau</option>
                        <option value="o">Anderes</option>
                    </select>
            </div>
        </div><br><br>
        <div class="form-group">
            <label for="vorname" class="col-sm-2 control-label">Vorname *</label>
                <div class="col-sm-10">
                    <input type="text" style="width:50%" class="form-control" name="vorname" required value="<?echo $firstname;?>">
                </div>
        </div>
        <div class="form-group">
            <label for="nachname" class="col-sm-2 control-label">Nachname *</label>
                <div class="col-sm-10">
                    <input type="text" style="width:50%" class="form-control" name="nachname" required value="<?echo $lastname;?>">
                </div>
        </div>
        <div class="form-group">
            <label for="firma" class="col-sm-2 control-label">Firmenname</label>
                <div class="col-sm-10">
                    <input type="text" style="width:50%" class="form-control" name="firma" value="<?echo $company;?>">
                </div>
        </div>
        <div class="form-group">
            <label for="strasseHnr" class="col-sm-2 control-label">Straße und Hausnummer *</label>
                <div class="col-sm-10">
                    <input type="text" style="width:50%" class="form-control" name="strasseHnr" required value="<?echo $streetHnr;?>">
                </div>
        </div>
        <div class="form-group">
            <label for="etage" class="col-sm-2 control-label">Etage</label>
                <div class="col-sm-10">
                    <input type="text" style="width:50%" class="form-control" name="etage" value="<?echo $floor;?>">
                </div>
        </div>
        <div class="form-group">
            <label for="plz" class="col-sm-2 control-label">Postleitzahl *</label>
                <div class="col-sm-10">
                    <input type="text" style="width:50%" class="form-control" name="plz" required value="<?echo $zip;?>">
                </div>
        </div>
        <div class="form-group">
            <label for="ort" class="col-sm-2 control-label">Ort *</label>
                <div class="col-sm-10">
                    <input type="text" style="width:50%" class="form-control" name="ort" required value="<?echo $city;?>">
                </div>
        </div>
        <div class="form-group">
            <label for="rufnummer" class="col-sm-2 control-label">Telefonnummer *</label>
                <div class="col-sm-10">
                    <input type="text" style="width:50%" class="form-control" name="rufnummer" required value="<?echo $telNr;?>">
                </div>
        </div>
        <div class="form-group">
           <div class="col-sm-offset-2 col-sm-10">
                <button type="submit" class="button2" value="Abschicken">Registrieren</button>
            </div>
        </div>
    </form>
     
    <?php
    } //Ende von if($showFormular)
?>