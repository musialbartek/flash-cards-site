<?php
    session_start();
  
    if(!isset($_SESSION['zalogowany'])){
        header('Location:index.php');
    }
?>
<!DOCTYPE html>
<html lang="pl-PL">
    <head>
        <meta charset="utf-8" />
        <title>Fiszunie - panel administratora</title>
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

<body class="splash">
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
    <div class="admin_panel col-sm-8 col-md-8">
        <form method="post">
            <h2>Panel administratora: </h2>
            <div class="panel_section">
                <legend class="paragraph">Zmień status użytkownika:</legend>
                <div class="center_Panel">
                    <label for="choose_u" class="space_betweenPanel">
                        Podaj login wybranego użytkownika: <input type="text" placeholder="Wprowadź login" name="user_login">
                    </label>

                    <label for="change_st" class="space_betweenPanel">Zmień status wybranego użytkownika: 
                        <select name="choice">
                            <option value="delete">Usuń</option>
                            <option value="blockade">Zablokuj</option>
                            <option value="unblock">Odblokuj</option>
                        </select>
                    </label>
                </div>
            </div>
            <label for="zatwierdz_admin">
                <input type="submit" name="change_user" class="btn btn-warning" value="Zatwierdź">
            </label>
        </form>
        <form method="post">
            <div class="panel_section">
                <legend class="paragraph">Usuń zestawy:</legend>
                <div class="center_Panel">
                    <label for="choose_k" class="space_betweenPanel">
                        Wprowadź nazwę zestawu: <input type="text" placeholder="Nazwa zestawu" name="kit_name">
                    </label>
                    <label for="del_k" class="space_betweenPanel">
                        Usuń wybrany zestaw: <input type="checkbox" name="del_kit_check">
                    </label>
                </div>
            </div>
            
            <label for="zatwierdz_admin">
                <input type="submit" name="del_kit" class="btn btn-warning" value="Zatwierdź">
            </label>
        </form>
        
    </div>
</main>
<?php
    function delChange_user(){
        if(!empty($_POST['user_login'])){
            if(isset($_POST['change_user'])){
                $user_login=trim($_POST['user_login']);
                $choice=$_POST['choice'];
                require_once('connect.php');
                $sql="SELECT * FROM users WHERE BINARY login='$user_login'";
                $sql_number_of_kits="SELECT COUNT(*) FROM kits WHERE BINARY created_by='$user_login'";
                if($delChange_result=@$connect->query($sql)){
                    $ilu_userow=$delChange_result->num_rows;
                    if($ilu_userow>0){
                        if($choice=='delete'){
                            if($numberOfKits_result=@$connect->query($sql_number_of_kits)){
                                $number_kits=$numberOfKits->num_rows;
                                if($number_kits==0){
                                    $sql_upadate_log="DELETE FROM users WHERE BINARY login='$user_login'";
                                    if ($connect->query($sql_upadate_log) === TRUE) {
                                        echo "<script> alert('Usunięto użytkownika: $user_login'); </script>";
                                    }else{
                                        $sql_delete_flashcards="DELETE w FROM words w INNER JOIN kits k ON kit_name=name WHERE created_by='$user_login'";
                                        if ($connect->query($sql_delete_flashcards) === TRUE) {
                                        //FLASHCARDS DELETED
                                            $sql_delete_kits="DELETE FROM kits WHERE created_by='$user_login'";
                                            if ($connect->query($sql_delete_kits) === TRUE) {
                                            //FLASHCARDS KITS
                                            $sql_upadate_log="DELETE FROM users WHERE BINARY login='$user_login'";
                                                if ($connect->query($sql_upadate_log) === TRUE) {
                                                    //DELETED USER
                                                    echo "<script> alert('Usunięto użytkownika: $user_login'); </script>";
                                                }
                                            }
                                        }
                                        
                                    }
                                }
                            }
                        }else if($choice=='blockade'){
                            $sql_upadate_log="UPDATE users SET id_status='3' WHERE BINARY login='$user_login'";
                            if ($connect->query($sql_upadate_log) === TRUE) {
                                echo "<script> alert('Zablokowano użytkownika: $user_login'); </script>";
                            }
                        }else if($choice=='unblock'){
                            $sql_upadate_log="UPDATE users SET id_status='1' WHERE BINARY login='$user_login'";
                            if ($connect->query($sql_upadate_log) === TRUE) {
                                echo "<script> alert('Odblokowano użytkownika: $user_login'); </script>";
                            }
                        }
                    }
                }
                mysqli_close($connect);   
            }
        }
    }
    delChange_user();

    function del_kit(){
        if(!empty($_POST['kit_name'])){
            if(isset($_POST['del_kit'])&&isset($_POST['del_kit_check'])){
                require_once('connect.php');
                $kit_name=$_POST['kit_name'];
                $sql_select_words_delete="DELETE FROM words WHERE kit_name='$kit_name'";
                if ($connect->query($sql_select_words_delete) === TRUE) {
                    $sql_delete_kits="DELETE FROM kits WHERE BINARY name='$kit_name'";
                        if ($connect->query($sql_delete_kits) === TRUE) {
                            echo "<script> alert('Usunięto zestaw: $kit_name'); </script>";   
                        }
                    }
                mysqli_close($connect);   
            }       
        }
    }

    del_kit();
?>
</body>
</html>
