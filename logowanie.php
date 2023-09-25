<?php
//CHECK THAT INPUTS NOT EMPTY
if(!empty($_POST['login'])&&!empty($_POST["psw"])){
  $login=trim($_POST['login']);
  $password=trim($_POST['psw']);
  require_once('connect.php');
  $sql="SELECT * FROM users WHERE BINARY login='$login'";

    if($login_result=@$connect->query($sql)){
      $ilu_userow=$login_result->num_rows;
      if($ilu_userow>0){
        $row=$login_result->fetch_assoc();
        if($row['id_status']==3){
          echo '<script>alert("Konto zablokowane! Wszelkie pytania prosimy kierować na adres bartek.musial@hotmail.com");</script>';
        }else if($row['id_status']==1){
  //CHECK IF THE PASSWORD HAS THE SAME VALUE AS HASH-PASSWORD        
          if(password_verify($password,$row['password'])){
            $_SESSION['zalogowany']=true;
            $_SESSION['user']=$row['login'];
            $last_activity=date("Y-m-d H:i:s"); 
            $sql_last_activity="UPDATE users SET last_activity='$last_activity' WHERE BINARY login='{$_SESSION['user']}'";
              if ($connect->query($sql_last_activity) === TRUE) {
                //ACTIVITY CHANGED
              }
//FORWARD TO DIFFERENT FILES DEPEND OF BUTTON AND USER
            if(isset($_POST['log_1'])){

            }else if($_SESSION['user']=="admin"){
            header('Location:adminpanel.php');
            }else{
            header('Location:userpanel.php');
            }
            $login_result->close();
//IF PASSWORD OR LOGIN ARE WRONG
            }else{
            echo '<script>alert("Niepoprawne dane logowania!");</script>';
            }
          }else{
          echo '<script>alert("Konto nieaktywowane! Wszelkie pytania prosimy kierować na adres bartek.musial@hotmail.com");</script>';
          }
        }else{
          echo '<script>alert("Niepoprawne dane logowania!");</script>';
        }
      }
    mysqli_close($connect);
  }

?>