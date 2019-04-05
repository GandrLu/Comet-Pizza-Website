<?
if(isset($_SESSION['userId'])){
    var_dump($_SESSION);
    $_POST['email'] = $_SESSION['usermail'];
    $_POST['name'] = $_SESSION['username'];
} else {
    foreach($_POST as $key => $value){
        $_SESSION['post'][$key] = $value;
    }
}
?>
<div class="greeter-message"><h1>Kontakt</h1></div>
<br>

<form class="form-horizontal" action="?p=contactInsert" method="post">
  <div class="form-group">
    <label for="textMessage" class="col-sm-2 control-label">Deine Nachricht an uns</label>
    <div class="col-sm-10">
        <textarea id="textMessage" name="message" cols="60" rows="6"></textarea>
    </div>
  </div>
  <div class="form-group">
    <div class="col-sm-offset-2 col-sm-10">
      <button type="submit" class="button2" value="Abschicken">Abschicken</button>
    </div>
  </div>
</form>
