<?php
  session_start();
  ob_start();
?>
<!DOCTYPE html>
<html lang="pl-PL">
  <head>
    <!-- Global site tag (gtag.js) - Google Analytics -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=UA-158176323-1"></script>
    <script>
    window.dataLayer = window.dataLayer || [];
    function gtag(){dataLayer.push(arguments);}
    gtag('js', new Date());

    gtag('config', 'UA-158176323-1');
    </script>
    <meta charset="utf-8" />
    <title>Fiszunie - strona główna</title>
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" type="text/css" href="style.css" />
    <link rel="stylesheet" type="text/css" href="css/fontawesome/all.css"/>
    <link rel="icon" href="data:;base64,iVBORw0KGgo=">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    <script src="https://www.google.com/recaptcha/api.js" async defer></script>
   
<style>
  .navbar__container{
    color: white !important;

  }
  .navbar__container a{
  color: white !important;
  }
  .sticky{
    background: white !important;
  }
  .sticky .navbar__container a{
    color: #201c29 !important; 
  }
  .sticky_mobile{
    background: rgba(255, 255, 255, .01);
    color: white !important;
  }
  .btn-light{
    color: white !important;
  }
  .hamburger div, .hamburger:after, .hamburger:before {
    background-color: white;
    border-radius: 3px;
    content: '';
    display: block;
    height: 5px;
    margin: 7px 0;
    transition: all .2s ease-in-out;
}
</style>  
</head>
  <body onload="cookies()">
    <?php
        require_once('logowanie.php');
        require_once('sections/preloader.html');
        require_once('sections/nav.php');
        require_once('sections/sign_in_form.php');
        require_once('sections/sign_in_form_2.php');
        require_once('sections/register_form.php');
        require_once('sections/slider.html');
    ?>
       
        
    <main>
         
     <?php
     if(!isset($_SESSION['zalogowany'])){
      echo '<script type="text/javascript" src="sign_in_form_2.js"></script>';
     }
        require_once('sections/tiles.php');
     ?>
<p>Strona ta ma sprawić, aby nauka języka angielskiego stała się dla Ciebie bardziej przystępna, a zatem bardziej przyjemna. Kto przecież powiedział, że nauka nie może być czymś przyjemnym i satysfakcjonującym?<br><br><i class="fas fa-user-graduate"></i></p>
<p>Na stronie znajdziesz fiszki ze słówkami z róznych dziedzin, które będziesz mógł po zalogowaniu sam dodać, lub skorzystać z tych stworzonych przez pozostałych użytkowników.<br><br><i class="fas fa-award"></i></p>
<p>Poza standardową nauką nowych zwrotów za pomocą zestawów fiszek, strona oferuję, również możliwość zagrania w gry, edukacyjne, dzięki którym, także będziesz szybciej zapamiętywał nowo poznane słówka.<br><br><i class="fas fa-chess-bishop"></i></p>

<p>Życzymy miłego korzystania z serwisu <i class="far fa-smile-beam"></i>.</p>

      <div id="pop_up" value="1" days="7" class="cookie_invisible row">
        <div class="cookie_rules col-md-8">Cookies
          <button onClick="pop_up_fun('pop_up',1,7)" class="btn btn-primary" type="button">Wyrażam zgodę</button>
        </div>
      </div>
    </main>
    <footer>
      <?php
        require_once('sections/footer.html');
     ?>
    </footer>
    <script type="text/javascript" src="main.js"></script>
  </body>
</html>
