<?php
  session_start();
  ob_start();
?>
<!DOCTYPE html>
<html lang="pl-Pl">
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
    <title>Fiszunie - fiszki</title>
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" type="text/css" href="style.css" />
    <link rel="stylesheet" type="text/css" href="css/fontawesome/all.css"/>
    <link rel="stylesheet" type="text/css" href="css/flash_cards.css"/>
    <link rel="script" type="text/javascript" href="main.js"/>
    <link rel="icon" href="data:;base64,iVBORw0KGgo=">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    <script src="https://www.google.com/recaptcha/api.js" async defer></script>
  </head>
  <?php
        require_once('sections/preloader.html');
  ?>
  <body class="splash" onload="cookies()">
  <?php
        require_once('logowanie.php');
        require_once('sections/nav.php');
        require_once('sections/sign_in_form.php');
        require_once('sections/register_form.php');
    ?>
       
        
        <main>
         
     <?php
        require_once('sections/flash_cards.php');
     ?>
          
           

          <div id="pop_up" value="1" days="7" class="cookie_invisible row"><div class="cookie_rules col-md-8">Cookies<button onClick="pop_up_fun('pop_up',1,7)" class="btn btn-primary" type="button">Wyrażam zgodę</button></div></div>
        </main>
        <footer>
        <?php
        require_once('sections/footer.html');
     ?>
     </footer>
     <script type="text/javascript" src="main.js"></script>
     <script type="text/javascript" src="kits.js"></script>
  </body>
</html>
