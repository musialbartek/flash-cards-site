<section class="tiles">
  <div class="row justify-content-between">
    <a class="col-sm-6 col-md-4" href="kits.php">
      <div class="tile col-sm-6 col-md-12">
        <div class="up_tile col-sm-6 col-md-12">
          <i class="fas fa-brain"></i>
        </div>
        <div class="bottom_tile col-sm-6 col-md-12">Fiszki</div>
      </div>
    </a>
    <?php
      if(isset($_SESSION['zalogowany'])&&$_SESSION['zalogowany']==true&&$_SESSION['user']=='admin'){
echo <<<TILE
<a class="col-sm-6 col-md-4" href="adminpanel.php">
<div class="tile col-sm-6 col-md-12">
<div class="up_tile col-sm-6 col-md-12">
<i class="far fa-id-card"></i>
</div>
<div class="bottom_tile col-sm-6 col-md-12">Panel administratora</div>
</div>
</a>
TILE;
      }else if(isset($_SESSION['zalogowany'])&&$_SESSION['zalogowany']==true&&$_SESSION['user']!='admin'){
echo <<<TILE
<a class="col-sm-6 col-md-4" href="userpanel.php">
<div class="tile col-sm-6 col-md-12">
<div class="up_tile col-sm-6 col-md-12">
<i class="far fa-id-card"></i>
</div>
<div class="bottom_tile col-sm-6 col-md-12">Panel użytkownika</div>
</div>
</a>
TILE;
      }else{
echo <<<TILE
<a class="col-sm-6 col-md-4 sign_in_click_2">
<div class="tile col-sm-6 col-md-12">
<div class="up_tile col-sm-6 col-md-12">
<i class="far fa-id-card"></i>
</div>
<div class="bottom_tile col-sm-6 col-md-12">Panel użytkownika</div>
</div>
</a>
TILE;
      }
    ?>
    <a class="col-sm-6 col-md-4" href="#" id="gierki">
      <div class="tile col-sm-6 col-md-12">
        <div class="up_tile col-sm-6 col-md-12">
        <i class="fas fa-gamepad"></i>
        </div>
        <div class="bottom_tile col-sm-6 col-md-12">Gierki</div>
      </div>
    </a>
  </div>
  </section>  