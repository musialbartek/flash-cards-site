<!DOCTYPE html>
<html lang="pl-PL">
  <head>
  <meta charset="utf-8" />
        <title>Site name</title>
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <link rel="stylesheet" type="text/css" href="style.css" />
        <link rel="stylesheet" type="text/css" href="css/fontawesome/all.css"/>
        <link rel="stylesheet" type="text/css" href="css/admin_panel.css"/>
        <link rel="script" type="text/javascript" href="main.js"/>
        <link rel="icon" href="data:;base64,iVBORw0KGgo=">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
        <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
        <style>
            label{
                display: flex !important;
                justify-content: center !important;
            }
        </style>
</head>
<body class="splash">
<main>
    <form class="user_panel col-sm-8 col-md-8" method="post">
        <h2>Aktywuj konto:</h2>
        <div class="panel_section"> 
            <div class="center_Panel">
                <div class="center_Panel">
                    <legend class="paragraph">Login:</legend>
                    <label class="space_betweenPanel">
                        <input type="text" name="login" size="30" placeholder="Podaj login podany w rejestracji">
                    </label>
                    
                    <legend class="paragraph">Kod:</legend>
                    <label class="space_betweenPanel">
                        <input type="text" name="mail_code" size="30" placeholder="Podaj kod podany w mailu">
                    </label>
                </div>
                    <label for="zatwierdz_user" class="space_betweenPanel">
                        <input type="submit" class="btn btn-success" value="Zatwierdź">
                    </label>
                
                </div>
            </div>
        </div>
    </form>
<?php
    if(!empty($_POST['login'])&&!empty($_POST['mail_code'])){
        $login_activate=$_POST['login'];
        $mail_code=$_POST['mail_code'];
        require_once('connect.php');

        $sql="SELECT * FROM users WHERE BINARY login='$login_activate' AND BINARY mail_code='$mail_code'";
    
        if($activate_result=@$connect->query($sql)){
            $ilu_userow=$activate_result->num_rows;
            if($ilu_userow>0){
              $row=$activate_result->fetch_assoc();
              $sql_status_active="UPDATE users SET id_status='1' WHERE login='$login_activate'";
              echo "<div style='position: absolute; font-size: 30px; margin-top: 20px;'>Konto zostało pomyślnie aktywowane</div>";
              if ($connect->query($sql_status_active) === TRUE) {
                } else {
                echo "Błąd: " . $sql_status_active . "<br>" . $connect->error;
                }
            }else{
                echo "<div style='position: absolute; font-size: 30px; margin-top: 20px;'>Niepoprawne dane</div>";
            }
        }
        mysqli_close($connect);
    }
?>
</main>
</body>
</html>