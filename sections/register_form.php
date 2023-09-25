<div class="register_back">
        <form method="post" class="register_form col-sm-8 col-md-5">
            <h2>Zarejestruj się:</h2>
            <label for="login_reg">Login:</label>
            <input class="form-control" type="text" placeholder="Podaj login" name="login_reg" required><br>
            <label for="login_reg">E-mail:</label>
            <input class="form-control" type="email" placeholder="Podaj e-mail" name="mail_reg" required><br>
            <label for="psw_reg">Hasło:</label>
            <input class="form-control" type="password" placeholder="Podaj hasło" name="psw_reg" required> <br>
            <label for="psw_regRep">Powtórz hasło:</label>
            <input class="form-control" type="password" placeholder="Podaj hasło" name="psw_regRep" required><br>
            <div class="confirm-box">   
            <div class="g-recaptcha" data-sitekey="6LeVTNQUAAAAAAtj0S9La_x32O9Yg4b2_BjgF3Ct"></div>  
            </div><br>
            <button type="submit" class="btn btn-primary btn-lg btn-block">Zarejestruj się</button><br>
      
            <button type="button" class="close_form btn btn-outline-light">Zamknij</button>
        </form> 
  </div>
  <?php
    //CHECK THAT INPUTS NOT EMPTY
    if(!empty($_POST['login_reg'])&&!empty($_POST['mail_reg'])&&!empty($_POST['psw_reg'])&&!empty($_POST['psw_regRep'])){

        require_once('connect.php');
        $login_reg=$_POST['login_reg'];
        $mail_reg=trim($_POST['mail_reg']);
    //MAIL SANITIZATION  
        $mail_reg_correct=filter_var($mail_reg,FILTER_SANITIZE_EMAIL);

        $sql_reg_login_check="SELECT id FROM users WHERE BINARY login='$login_reg'";
        $sql_reg_mail_check="SELECT id FROM users WHERE BINARY mail='$mail_reg'";
    //CHECK IF THERE IS NO USER WITH THE SAME LOGIN AND MAIL
        if($register_result=@$connect->query($sql_reg_login_check)){
            $number_of_logins=$register_result->num_rows;
            if($number_of_logins>0){
                echo '<script> alert("Nazwa użytkownika zajęta");</script>';
            }else if($register_result2=@$connect->query($sql_reg_mail_check)){
                $number_of_mails=$register_result2->num_rows;
                if($number_of_mails>0){
                    echo '<script> alert("Ten mail jest zajęty");</script>';
                }else{
        //CHECK THAT RECPATCHA HAS BEEN VERIFIED
                        $captcha_secret='6LeVTNQUAAAAADP7_Kv6NO8w2FWmFE6qR3FlRBWz';
                        $check_captcha=file_get_contents('https://google.com/recaptcha/api/siteverify?secret='.$captcha_secret.'&response='.$_POST['g-recaptcha-response']);
                        $response_captcha=json_decode($check_captcha);
                        if($response_captcha->success==true){
                            $password1=$_POST['psw_reg'];
                            $password2=$_POST['psw_regRep'];
            //CHECK PASSWORD
                            if(strlen($password1)>7&&strlen($password1)<30){
                                if($password1==$password2){
                                    $password_hash=password_hash($password1,PASSWORD_DEFAULT);   //SET PASSWORD HASH
                                    $created_at=date("Y-m-d H:i:s");  //DATE OF ACCOUNT CREATION
                                    $mail_code=rand(1000,9999);       //RANDOM NUMBER TO ACTIVATE ACCOUNT
                //ADD NEW USER
                                    $sql_reg_add="INSERT INTO users (id,login,mail,mail_code,password,created_at,id_status) VALUES(NULL,'$login_reg','$mail_reg','$mail_code','$password_hash','$created_at','1')";
                                    /*ACTIVATE MAIL potwierdzenie rejestracji nie działa na localhoscie, dlatego użytkownik odrazu uzyskuje status "aktywny" (działające potwierdznie rejestracji można znaleźć na stronie "fiszunie.pl")
                                    mail("$mail_reg","Potwierdzenie rejestracji - ","Aby aktywować konto należy wejść w link: http://thelastofthem.pl/activate_account.php , oraz wpisać podany wcześniej login: $login_reg, a także kod:$mail_code.","W razie problemów proszę kontaktować się na e-mail: bartek.musial@hotmail.com");*/
                                    if ($connect->query($sql_reg_add) === TRUE) {
echo <<<NOTICE
<script>alert("Dodano użytkownika $login_reg.");</script>
NOTICE;
                                    } else {
                                    echo "Błąd: " . $sql_reg_add . "<br>" . $connect->error;
                                    }
                                mysqli_close($connect);
            //IF PASSWORD OR LOGIN ARE DIFFERENT
                                }else{
                                echo '<script>alert("Hasła są rożne");</script>';
                                }
                            }else{
                            echo '<script>alert("Hasło jest nieodpowiedniej długości");</script>';
                            }    
                        }else{
                        echo '<script>alert("Weryfikacja reCAPTCHA niepomyślna");</script>';
                        }
                }
            }   
        }
    }
  ?>