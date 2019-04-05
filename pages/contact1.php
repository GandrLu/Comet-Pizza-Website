<?
$showform = true;
if(isset($_SESSION['userId'])){
    $showform = false;
    include ('pages/contact2.php');
}
if($showform){?>
    <div class="greeter-message"><h1>Kontakt</h1></div>
    <br>

    <form class="form-horizontal" action="?p=contact2" method="post">
    <div class="form-group">
        <label for="inputEmail3" class="col-sm-2 control-label">Deine Email</label>
        <div class="col-sm-10">
        <input style="width:50%" type="email" class="form-control" id="inputEmail3" name="email" placeholder="Email" required>
        </div>
    </div>
    <div class="form-group">
        <label for="inputName3" class="col-sm-2 control-label">Dein Name</label>
        <div class="col-sm-10">
        <input style="width:50%" type="text" class="form-control" id="inputName3" name="name" placeholder="Name" required>
        </div>
    </div>
    <div class="form-group">
        <div class="col-sm-offset-2 col-sm-10">
        <button type="submit" class="button2" value="Abschicken">Weiter</button>
        </div>
    </div>
    </form>
<?
}
?>