<?
session_start();

require './pages/secure.php';

if(!empty($_SESSION['username'])) {
$username = $_SESSION['username'];
} else {
    $username = "Gast";
}
?>

<div class='header-container'>
    <div class='header'>
            <a class='logo'href="index.php?p=''"></a>
            <div class="menu">
                <div class="button"><a href="<?=$_SERVER['SCRIPT_NAME']?>?p=Pizza">Pizza</a></div>
                <div class="button"><a href="<?=$_SERVER['SCRIPT_NAME']?>?p=Burger">Burger</a></div>
                <div class="button"><a href="<?=$_SERVER['SCRIPT_NAME']?>?p=Burritos">Burritos</a></div>
                <div class="button"><a href="<?=$_SERVER['SCRIPT_NAME']?>?p=Pasta">Pasta</a></div>
                <div class="button"><a href="<?=$_SERVER['SCRIPT_NAME']?>?p=Salat">Salate</a></div>
                <div class="button"><a href="<?=$_SERVER['SCRIPT_NAME']?>?p=Getränke">Getränke</a></div>
            </div>
            <div class="menu2">
                <div class="dropdown">
                    <button class="dropbtn"><span>Speisekarte</span><i class="fa fa-caret-down"></i></button>
                    <div class="dropdown-content">
                        <a href="<?=$_SERVER['SCRIPT_NAME']?>?p=Pizza">Pizza</a>
                        <a href="<?=$_SERVER['SCRIPT_NAME']?>?p=Burger">Burger</a>
                        <a href="<?=$_SERVER['SCRIPT_NAME']?>?p=Burritos">Burritos</a>
                        <a href="<?=$_SERVER['SCRIPT_NAME']?>?p=Pasta">Pasta</a>
                        <a href="<?=$_SERVER['SCRIPT_NAME']?>?p=Salat">Salate</a>
                        <a href="<?=$_SERVER['SCRIPT_NAME']?>?p=Getränke">Getränke</a>
                    </div>
                </div>
            </div>
            <? if(!empty($_SESSION['username'])):?>
            <div class="login-confirm">
                <p>Willkommen <?echo $username;?></p>
            </div>
            <? endif;?>
            <div class="links">
            <?
            if(!empty($_SESSION['username'])) {
                ?>
                <div class="button"><a href="index.php?p=logout"><i class="fas fa-sign-out-alt"></i></span></a></div>
                <?
            } else {
                ?>
                <div class="button"><a href="index.php?p=login"><i class="fas fa-sign-in-alt"></i></a></div>
                <?
            }
            ?>
            <div class="button"><a href="index.php?p=userpage"><i class="fas fa-user"></i></a></div>
            <div class="button"><a href="index.php?p=cart"><i class="fas fa-shopping-basket"></i></span></a></div>
            </div>
            
    </div>
</div>
<!-- end header -->