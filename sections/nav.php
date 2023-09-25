<header onscroll="myfunction()" class="navbar">
   
    <div class="navbar__container">
        <!-- img class="navbar__logo" src="home.png" alt="logo"> --><a href="index.php"><img src="png/logo.png"></a>
        <?php
            if(isset($_SESSION['zalogowany'])){
            if($_SESSION['user']=="admin"){
                echo "Miło Cię znowu widzieć szefu!";
              }else{
                echo "Miło Cię znowu widzieć ".$_SESSION['user']."!";
              }
            }
        ?>
<!--NORMAL NAV------------------------------------------------------------------>        
        <div class="navbar__buttons">   
            <button class="btn btn-light register_click" type="button">Rejestracja</button>
            <?php
                require_once('connect.php');
                if(!isset($_SESSION['zalogowany'])){
echo  <<<BUTTONLOG
<input type="button" class="btn btn-success sign_in_click" name="logbtn" value="Zaloguj się">
BUTTONLOG;
                }else{
echo  <<<BUTTONLOG
<form method="post">
<input class="btn btn-success" type="submit" name="logout-btn" value="Wyloguj się">
</form>
BUTTONLOG;
                    if(isset($_POST['logout-btn'])){
    //LOGOUT AND CHANGE USER ACTIVITY
                    $last_activity=date("Y-m-d H:i:s");
                    $sql_last_activity="UPDATE users SET last_activity='$last_activity' WHERE BINARY login='{$_SESSION['user']}'";
                    if ($connect->query($sql_last_activity) === TRUE) {
                        header('Location:logout.php');
                        }
                    }
                }
            ?>
            <div onclick="mobile_display()" class="hamburger"><div></div></div>
        </div>
    </div>
<!--MOBILE NAV----------------------------------------------------------------->
    <div id="none" class="navbar__mobile">
            <button class="btn btn-light register_click" type="button">Rejestracja</button>
            <?php 
                if(!isset($_SESSION['zalogowany'])){
echo  <<<BUTTONLOG
<input type="button" class="btn btn-success sign_in_click" name="logbtn" value="Zaloguj się">
BUTTONLOG;
                }else{
echo  <<<BUTTONLOG
<form method="post">
<input class="btn btn-success" type="submit" name="logout-btn" value="Wyloguj się">
</form>
BUTTONLOG;
                    if(isset($_POST['logout-btn'])){
    //LOGOUT AND CHANGE USER ACTIVITY
                    $last_activity=date("Y-m-d H:i:s"); 
                    $sql_last_activity="UPDATE users SET last_activity='$last_activity' WHERE BINARY login='{$_SESSION['user']}'";
                    if ($connect->query($sql_last_activity) === TRUE) {
                        header('Location:logout.php');
                        }
                    }
                }              
            ?>
    </div>   
</header>

<?php  mysqli_close($connect); ?>