<?
require './config/database.php';

if(empty($_SESSION['userId'])) {
    die('<div class="alert alert-warning" style="text-align:center" role="alert">
        Bitte erst anmelden oder registrieren. Weiter zur <a class="alert-link" href="?p=login">Anmeldung.</a>
        </div>');

} elseif(isset($_GET['change'])) {
    $error = false;
    $password2   = $_POST['password2'];

    $data = [
        "id"        => $_SESSION['userId'],
        "vorname"   => $_POST['vorname'],
        "nachname"  => $_POST['nachname'],
        "plz"       => $_POST['plz'],
        "ort"       => $_POST['ort'],
        "strasseHnr"=> $_POST['strasseHnr'],
        "etage"     => $_POST['etage'],
        "geschlecht"=> $_POST['geschlecht'],
        "email"     => $_POST['email'],
        "password"  => $_POST['password'],
        "rufnummer" => $_POST['rufnummer']   
    ];
    if (!empty($_POST['firma'])) {
        $data = ["firma"     => $_POST['firma']];
    }
    
    if(!empty($data['email']) && !filter_var($data['email'], FILTER_VALIDATE_EMAIL)) {
        echo '<div class="alert alert-warning" style="text-align:center" role="alert">
        Bitte eine gültige Email eingeben!</div><br>';
        $error = true;
        //Überprüfe ob E-Mail noch nicht registriert ist falls es eine neue ist
    } elseif(!empty($data['email'])) {
        $user = new Customer();
        $userData = $user->find("id = {$_SESSION['userId']}");
    
        if(!$error && $userData['email'] != $data['email']) { 
            $sql = 'SELECT * FROM kunden WHERE email = ' . "'{$data['email']}'";
            $result = $conn->query($sql);
            $user = $result->fetch_all();
            

            if($user) {
                echo '<div class="alert alert-warning" style="text-align:center" role="alert">
                Diese E-Mail-Adresse ist bereits vergeben!</div><br>';
                $error = true;
            }    
        } elseif($userData['email'] == ($data['email'])) {
        $data['email'] = null;
        }
    }
    if(isset($data['password']) && $data['password'] != $password2) {
        echo '<div class="alert alert-warning" style="text-align:center" role="alert">
        Die Passwörter müssen übereinstimmen!</div><br>';
        $error = true;
    }

    //Kein Fehler, Daten können geändert werden
    if(!$error) {

        if (!empty($data['password'])){
        $password_hash = password_hash($data['password'], PASSWORD_DEFAULT);
        $data['password'] = $password_hash;
        }

        $sql = 'UPDATE kunden SET ';

        foreach ($data as $key => $value) {

            if (!empty($value)) {
                $sql .= $key . ' = ' . "'" . $value . "'";
                $sql .= ',';
            }
        }
        $sql  = trim($sql, ',');
        $sql .= ' WHERE id = ' . $data['id'];
        
        $result = $conn->query($sql);
        
        if($result) {        
            echo '<div class="alert alert-success" style="text-align:center" role="alert">
            Deine Daten wurden erfolgreich geändert.</div>';
            $showFormular = false;
            $_SESSION['username'] = $data['vorname'];
        } else {
            echo '<div class="alert alert-warning" style="text-align:center" role="alert">
            Beim Abspeichern ist leider ein Fehler aufgetreten<br></div>';
        }
    }    
}

    $user = new Customer();
    $userData = $user->find("id = {$_SESSION['userId']}");


    $email      = $userData['email'];
    
    $gender     = $userData['geschlecht'];
    $firstname  = $userData['vorname'];
    $lastname   = $userData['nachname'];
    $company    = $userData['firma'];
    $streetHnr  = $userData['strasseHnr'];
    $floor      = $userData['etage'];
    $zip        = $userData['plz'];
    $city       = $userData['ort'];
    $telNr      = $userData['rufnummer'];

    $password   = $userData['password'];

?>
<div class="greeter-message"><h3>Hallo <?echo $_SESSION['username'];?></h3></div>
<br>
<p>Hier kannst Du deine Kundendaten einsehen und ändern.</p>
<br>
<form class="form-horizontal" action="?p=userpage&change=1" method="post">
        <div class="form-group">
            <label for="email" class="col-sm-2 control-label">Email</label>
                <div class="col-sm-10">
                    <input style="width:50%" class="form-control" type="email" name="email" value="<?echo $email?>">
                </div>
        </div>
        <div class="form-group">
            <label for="password" class="col-sm-2 control-label">Neues Passwort</label>
                <div class="col-sm-10">
                    <input style="width:50%" class="form-control" type="password" name="password">
                </div>
        </div>
        <div class="form-group">
            <label for="password2" class="col-sm-2 control-label">Passwort wiederholen</label>
                <div class="col-sm-10">
                    <input type="password" style="width:50%" class="form-control" name="password2">
                </div>
        </div>
        <?
        switch ($gender) {
            case 'm':
                $setGenderM = 'selected="selected"';
                $setGenderW = "";
                $setGenderO = "";
                break;
            case 'w':
                $setGenderW = 'selected="selected"';
                $setGenderM = "";
                $setGenderO = "";
                break;
            case 'o':
                $setGenderO = 'selected="selected"';
                $setGenderW = "";
                $setGenderM = "";
                break;
            default:
                $setGenderO = 'selected="selected"';
                $setGenderW = "";
                $setGenderM = "";
            break;
        }
        ?>
        <div class="form-check form-check-inline" style="width:70%">
            <div class="col-sm-offset-2 col-sm-10">
                <label class="form-check-label" for="geschlecht">Geschlecht</label><br>
                    <select name="geschlecht">
                        <option value="m" <?echo $setGenderM;?>>Herr</option>
                        <option value="w" <?echo $setGenderW;?>>Frau</option>
                        <option value="o" <?echo $setGenderO;?>>Anderes</option>
                    </select>
            </div>
        </div>
        <br><br>
        <div class="form-group">
            <label for="vorname" class="col-sm-2 control-label">Vorname</label>
                <div class="col-sm-10">
                    <input type="text" style="width:50%" class="form-control" name="vorname" value="<?echo $firstname?>">
                </div>
        </div>
        <div class="form-group">
            <label for="nachname" class="col-sm-2 control-label">Nachname</label>
                <div class="col-sm-10">
                    <input type="text" style="width:50%" class="form-control" name="nachname" value="<?echo $lastname?>">
                </div>
        </div>
        <div class="form-group">
            <label for="firma" class="col-sm-2 control-label">Firmenname</label>
                <div class="col-sm-10">
                    <input type="text" style="width:50%" class="form-control" name="firma" value="<?echo $company?>">
                </div>
        </div>
        <div class="form-group">
            <label for="strasseHnr" class="col-sm-2 control-label">Straße und Hausnummer</label>
                <div class="col-sm-10">
                    <input type="text" style="width:50%" class="form-control" name="strasseHnr" value="<?echo $streetHnr?>">
                </div>
        </div>
        <div class="form-group">
            <label for="etage" class="col-sm-2 control-label">Etage</label>
                <div class="col-sm-10">
                    <input type="text" style="width:50%" class="form-control" name="etage" value="<?echo $floor?>">
                </div>
        </div>
        <div class="form-group">
            <label for="plz" class="col-sm-2 control-label">Postleitzahl</label>
                <div class="col-sm-10">
                    <input type="text" style="width:50%" class="form-control" name="plz" value="<?echo $zip?>">
                </div>
        </div>
        <div class="form-group">
            <label for="ort" class="col-sm-2 control-label">Ort</label>
                <div class="col-sm-10">
                    <input type="text" style="width:50%" class="form-control" name="ort" value="<?echo $city?>">
                </div>
        </div>
        <div class="form-group">
            <label for="rufnummer" class="col-sm-2 control-label">Telefonnummer</label>
                <div class="col-sm-10">
                    <input type="text" style="width:50%" class="form-control" name="rufnummer" value="<?echo $telNr?>">
                </div>
        </div>
        <div class="form-group">
           <div class="col-sm-offset-2 col-sm-10">
                <button type="submit" class="button2" value="Abschicken">Ändern</button>
            </div>
        </div>
    </form>
    <br>
    <p>Möchtest du Dein Konto löschen?
    <form class="form-horizontal" action="?p=userpage&delete=1" method="post">
        <div class="form-group">
           <div class="col-sm-offset-2 col-sm-10">
                <button type="submit" class="button-delete"  style="width:200px" value="Abschicken">Konto löschen</button>
            </div>
        </div>
    </form>