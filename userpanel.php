<?php
    session_start();
    ob_start();
    if(!isset($_SESSION['zalogowany'])){
        header('Location:index.php');
    }
?>
<!DOCTYPE html>
<html lang="pl-PL">
    <head>
        <meta charset="utf-8" />
        <title>Fiszunie - panel użytkownika</title>
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <link rel="stylesheet" type="text/css" href="style.css" />
        <link rel="stylesheet" type="text/css" href="css/fontawesome/all.css"/>
        <link rel="stylesheet" type="text/css" href="css/admin_panel.css"/>
        <link rel="script" type="text/javascript" href="main.js"/>
        <link rel="icon" href="data:;base64,iVBORw0KGgo=">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
        <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    </head>
    <?php
        require_once('sections/preloader.html');
    ?>
<body class="splash" onload="cookies()">
    <div id="userInfo">
        <a href="index.php"><i class="fas fa-home"></i></a>
        <a href="logout.php">
            <div id="userInfoButton">
                <?php
                    echo ucfirst(substr($_SESSION['user'],0,1));
                ?>
            </div>
        </a>
    </div>
<main>      
  <div class="user_panel col-sm-8 col-md-8">
        <h2>Panel użytkownika: <?php echo $_SESSION['user']?></h2>
        <form method="post">
            <div class="panel_section">
                <legend class="paragraph">Usuń zestaw:</legend>
                    <div class="center_Panel">
                        <label for="choose_kToModify" class="space_betweenPanel">
                            Wybierz zestaw: 
                            <select name="choice_to_delete">
                            <option value="" disabled selected>Wybierz zestaw:</option>
                            <?php 
                                require_once("connect.php");
                                $sql_select_kit="SELECT name FROM kits WHERE created_by='{$_SESSION['user']}'";
                                $result_sql_select_kit=mysqli_query($connect,$sql_select_kit);
                                while($row=mysqli_fetch_assoc($result_sql_select_kit)){
                                    echo '<option value="'.$row["name"].'">'.$row["name"].'</option>';
                                }
                                                                     
                            ?>
                            </select>
                        </label>
                    </div>
                    <div class="center_Panel">
                        <input type="submit" name="del_kit" class="btn btn-warning" value="Usuń zestaw">                   
                    </div>
            </div>
        </form>
        <?php
            if(!empty($_POST['choice_to_delete'])){
                if(isset($_POST['del_kit'])){
                    $selected_value=$_POST['choice_to_delete'];
                    $sql_delete_words="DELETE w FROM words w INNER JOIN kits k ON k.name=w.kit_name WHERE BINARY w.kit_name='$selected_value'";
                    if ($connect->query($sql_delete_words) === TRUE) {
                    
                        $sql_delete_kits="DELETE FROM kits WHERE BINARY name='$selected_value'";
                        if ($connect->query($sql_delete_kits) === TRUE) {
                            echo "<script> alert('Usunięto zestaw: $selected_value'); </script>";   
                        }
                    }
                    mysqli_close($connect);
                }
            }
        ?>
        <div class="panel_section">
            <form method="post">
                <legend class="paragraph">Zmień hasło:</legend>
                <div class="center_Panel">
                <label for="log" class="space_betweenPanel">
                        Podaj login: <input type="text" placeholder="Login" name="user_Log">
                    </label>
                    <label for="actual_passw" class="space_betweenPanel">
                        Aktualne hasło: <input type="password" placeholder="Aktualne hasło" name="user_actPassw">
                    </label>
                    
                    <label for="new_passw" class="space_betweenPanel">
                        Nowe hasło: <input type="password" placeholder="Nowe hasło" name="user_newPassw">
                    </label>

                    <label for="new_passwRep" class="space_betweenPanel">
                        Powtórz hasło: <input type="password" placeholder="Powtórz hasło" name="user_newPasswRep">
                    </label>
                    <label for="zatwierdz_user" class="center_Panel">
                        <input type="submit" name="change_pass" class="btn btn-success" value="Zatwierdź">
                    </label> 
                </div>
            </form>
        </div>
        
    </div>
    <?php
        if(!empty($_POST['user_actPassw'])&&!empty($_POST['user_newPassw'])&&!empty($_POST['user_newPasswRep'])&&!empty($_POST['user_Log'])){
            if(isset($_POST['change_pass'])){
                $act_pass=trim($_POST['user_actPassw']);
                $new_pass=trim($_POST['user_newPassw']);
                $new_repPass=trim($_POST['user_newPasswRep']);
                $user_log=trim($_POST['user_Log']);
                require_once('connect.php');
                $sql="SELECT * FROM users WHERE BINARY login='$user_log'";
                if($new_pass==$new_repPass){
                    $password_hash=password_hash($new_pass,PASSWORD_DEFAULT); 
                    if($changePass_result=@$connect->query($sql)){
                        $ilu_userow=$changePass_result->num_rows;
                        $row=$changePass_result->fetch_assoc();
                        if($ilu_userow>0){
                            if(password_verify($act_pass,$row['password'])){
                                $sql_upadate_pass="UPDATE users SET password='$password_hash' WHERE BINARY login='{$_SESSION['user']}'";
                                if ($connect->query($sql_upadate_pass) === TRUE) {
                                    echo "<script> alert('Poprawnie zmieniono hasło'); </script>";
                                }else echo "Error".$row['password'];
                            }else{
                                echo "<script> alert('Błędne hasło użytkownika {$_SESSION['user']}'); </script>";
                            } 
                        }else echo "<script> alert('Błędny login'); </script>";
                    }
                }else{
                    echo "<script> alert('Podane hasła się róznią'); </script>";
                }
                mysqli_close($connect); 
            }      
        }
        
            
    ?>
    <div id="pop_up" value="1" days="7" class="cookie_invisible row"><div class="cookie_rules col-md-8">Policy privacy<button onClick="pop_up_fun('pop_up',1,7)" class="btn btn-primary" type="button">Wyrażam zgodę</button></div></div>
</main>
<script type="text/javascript" src="main.js"></script>
</body>
</html>
