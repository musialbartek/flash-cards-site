<section id="filter_display" class="filter">

  <form name="filter">
      Przedmioty: <br><br>
      <div class="filter2">Systemy operacyjne <input type="checkbox" id="sys" name="sys_op"><label for="sys"></label></div>
      <div class="filter2">Sieci komputerowe <input type="checkbox" id="sieci" name="sieci_ko"><label for="sieci"></label></div>
      <div class="filter2">Witryny i aplikacje <input type="checkbox" id="wit" name="wit_ap"><label for="wit"></label></div>
      <div class="filter2">UTK <input type="checkbox" id="utki" name="ut_k"><label for="utki"></label></div>
      <input type="button" class="btn btn-warning" value="Filtruj" onclick="filtr()">
  </form>
</section>
<?php
require('connect.php');
  if(isset($_SESSION['zalogowany'])){
    echo '<div class="subtitle_right"><span><a href="#">Twoje zestawy</a></span></div>';
    echo '<section id="kit_filter" class="flash-cards">';

    $sql_select_user_kitsID1="SELECT * FROM kits WHERE id_subject=1 AND BINARY created_by='{$_SESSION['user']}'";
    $result_select_user_kitsID1=mysqli_query($connect,$sql_select_user_kitsID1);
    $sql_select_user_kitsID2="SELECT * FROM kits WHERE id_subject=2 AND BINARY created_by='{$_SESSION['user']}'";
    $result_select_user_kitsID2=mysqli_query($connect,$sql_select_user_kitsID2);
    $sql_select_user_kitsID3="SELECT * FROM kits WHERE id_subject=3 AND BINARY created_by='{$_SESSION['user']}'";
    $result_select_user_kitsID3=mysqli_query($connect,$sql_select_user_kitsID3);
    $sql_select_user_kitsID4="SELECT * FROM kits WHERE id_subject=4 AND BINARY created_by='{$_SESSION['user']}'";
    $result_select_user_kitsID4=mysqli_query($connect,$sql_select_user_kitsID4);
    if($user_kitsID1_result=@$connect->query($sql_select_user_kitsID1)){
      $number_of_rows=$user_kitsID1_result->num_rows;
      if($number_of_rows>0){
        echo '<div id="syst"><div class="subtitle_left"><span>Systemy operacyjne: </span></div>';
        while($row=mysqli_fetch_assoc($result_select_user_kitsID1)){
          echo '<a class="" href="flash_cards.php?nazwa_zestawu='.$row["name"].'"><div class="kit col-sm-6 col-md-12">'.$row["name"].'</div></a>';
        }
        echo "<hr></div>";
      }
    }else{
      //
    }
    if($user_kitsID2_result=@$connect->query($sql_select_user_kitsID2)){
      $number_of_rows=$user_kitsID2_result->num_rows;
      if($number_of_rows>0){
        echo '<div id="siec"><div class="subtitle_left"><span> Sieci komputerowe:</span></div>';
        while($row2=mysqli_fetch_assoc($result_select_user_kitsID2)){
          echo '<a class="" href="flash_cards.php?nazwa_zestawu='.$row2["name"].'"><div class="kit col-sm-6 col-md-12">'.$row2["name"].'</div></a>';
        }
        echo "<hr></div>";
      }
    }else{
      //
    }
    if($user_kitsID3_result=@$connect->query($sql_select_user_kitsID3)){
      $number_of_rows=$user_kitsID3_result->num_rows;
      if($number_of_rows>0){
        echo '<div id="witr"><div class="subtitle_left"><span> Witryny i aplikacje:</span></div>';
        while($row3=mysqli_fetch_assoc($result_select_user_kitsID3)){
          echo '<a class="" href="flash_cards.php?nazwa_zestawu='.$row3["name"].'"><div class="kit col-sm-6 col-md-12">'.$row3["name"].'</div></a>';
        }
        echo "<hr></div>";
      }
    }else{
      //
    }
    if($user_kitsID4_result=@$connect->query($sql_select_user_kitsID4)){
      $number_of_rows=$user_kitsID4_result->num_rows;
      if($number_of_rows>0){
        echo '<div id="utk"><div class="subtitle_left"><span> Urządzenia techniki komputerowej:</span></div>';
        while($row4=mysqli_fetch_assoc($result_select_user_kitsID4)){
          echo '<a class="" href="flash_cards.php?nazwa_zestawu='.$row4["name"].'"><div class="kit col-sm-6 col-md-12">'.$row4["name"].'</div></a>';
        }
        echo "<hr></div>";
      }
    }else{
      //
    }
    echo '</section>';
    if(!isset($_SESSION['alreadyRefreshed'])){
      header('Refresh:0');
      $_SESSION['alreadyRefreshed']=true;
    }
  }else {
    echo '<section id="kit_filter" class="flash-cards">';
    $sql_select_user_kitsID1="SELECT * FROM kits WHERE id_subject=1";
    $result_select_user_kitsID1=mysqli_query($connect,$sql_select_user_kitsID1);
    $sql_select_user_kitsID2="SELECT * FROM kits WHERE id_subject=2";
    $result_select_user_kitsID2=mysqli_query($connect,$sql_select_user_kitsID2);
    $sql_select_user_kitsID3="SELECT * FROM kits WHERE id_subject=3";
    $result_select_user_kitsID3=mysqli_query($connect,$sql_select_user_kitsID3);
    $sql_select_user_kitsID4="SELECT * FROM kits WHERE id_subject=4";
    $result_select_user_kitsID4=mysqli_query($connect,$sql_select_user_kitsID4);
    if($user_kitsID1_result=@$connect->query($sql_select_user_kitsID1)){
      $number_of_rows=$user_kitsID1_result->num_rows;
      if($number_of_rows>0){
        echo '<div id="syst"><div class="subtitle_left"><span>Systemy operacyjne: </span></div>';
        while($row=mysqli_fetch_assoc($result_select_user_kitsID1)){
          echo '<a class="" href="flash_cards.php?nazwa_zestawu='.$row["name"].'"><div class="kit col-sm-6 col-md-12">'.$row["name"].'</div></a>';
        }
        echo "<hr></div>";
      }
    }
    if($user_kitsID2_result=@$connect->query($sql_select_user_kitsID2)){
      $number_of_rows=$user_kitsID2_result->num_rows;
      if($number_of_rows>0){
        echo '<div id="siec"><div class="subtitle_left"><span> Sieci komputerowe:</span></div>';
        while($row2=mysqli_fetch_assoc($result_select_user_kitsID2)){
          echo '<a class="" href="flash_cards.php?nazwa_zestawu='.$row2["name"].'"><div class="kit col-sm-6 col-md-12">'.$row2["name"].'</div></a>';
        }
        echo "<hr></div>";
      }
    }
    if($user_kitsID3_result=@$connect->query($sql_select_user_kitsID3)){
      $number_of_rows=$user_kitsID3_result->num_rows;
      if($number_of_rows>0){
        echo '<div id="witr"><div class="subtitle_left"><span> Witryny i aplikacje:</span></div>';
        while($row3=mysqli_fetch_assoc($result_select_user_kitsID3)){
          echo '<a class="" href="flash_cards.php?nazwa_zestawu='.$row3["name"].'"><div class="kit col-sm-6 col-md-12">'.$row3["name"].'</div></a>';
        }
        echo "<hr></div>";
      }
    }
    if($user_kitsID4_result=@$connect->query($sql_select_user_kitsID4)){
      $number_of_rows=$user_kitsID4_result->num_rows;
      if($number_of_rows>0){
        echo '<div id="utk"><div class="subtitle_left"><span> Urządzenia techniki komputerowej:</span></div>';
        while($row4=mysqli_fetch_assoc($result_select_user_kitsID4)){
          echo '<a class="" href="flash_cards.php?nazwa_zestawu='.$row4["name"].'"><div class="kit col-sm-6 col-md-12">'.$row4["name"].'</div></a>';
        }
        echo "<hr></div>";
      }
      echo '</section>';
    }
  }
mysqli_close($connect);
?>
<div class="show_filter show_filterHover">
  <i class="fas fa-filter"></i>
</div>
<div class="add_kitButton" onclick="showAddkit()">
  <i class="fas fa-plus"></i>
</div>

<div class="add_kitForm col-sm-8 col-md-6 filter">

  <form method="post">
    <div id="formScroll">
      <h2>Dodaj Zestaw</h2>
      <label for="nameKit">Nazwa zestawu:</label>
      <input type="text" name="kit_name" class="form-control"><br>
      <section class="add_cards">
        <div id="choiceTopic">
          <label for="subjectKit">Przedmioty: </label>
          <select name="choice_topic">
            <option value="" disabled selected>Wybierz kategorie:</option>
            <option value="syst_op">Systemy operacyjne</option>
            <option value="sieci_kom">Sieci komputerowe</option>
            <option value="witr_ap">Witryny i aplikacje</option>
            <option value="utk">Urządzenia techniki komputerowej</option>
          </select> 
        </div><br>
        <div id="sectionTranslaction">
            <div class="card_name">
              <div class="translaction">
                <label for="polishcardName">1. Polskie tłumaczenie:</label>
                <input name="polishtrans[]" type="text" class="form-control">
              </div>
              <div class="translaction">
                <label for="englishcardName">Angielskie tłumaczenie:</label>
                <input name="englishtrans[]" type="text" class="form-control">
              </div>
          </div><br>
        </div>
      </section>
    </div>
    <hr>
    <div id="addSection">
      <div id="DivnumberOfcards">
        <label for="numberOfcads">Liczba fiszek:</label>
        <div id="numberOfcards">1</div>
      </div>
      <div id="addButton">
        <label for="polishcardName">Kolejna fiszka:</label>
        <div class="add_kitButton" onclick="new_card()"><i class="fas fa-plus"></i></div>
      </div>
    </div>
    <section id="kitButtons">
      <button type="submit" class="btn btn-primary btn-lg btn-block">Dodaj</button><br>
      <button type="button" class="close_form btn btn-outline-light" onclick="hideAddkit()">Zamknij</button>
    </section>
  </form>
</div>
<div id="syst"></div>
<div id="siec"></div>
<div id="witr"></div>
<div id="utk"></div>

<?php
  if(!empty($_POST['polishtrans'])&&!empty($_POST['englishtrans'])&&!empty($_POST['kit_name'])&&!empty($_POST['choice_topic'])){
    if(isset($_SESSION['zalogowany'])){
    require('connect.php');

    $kit_name=$_POST['kit_name']." - ".$_SESSION['user'];
    $topic_choice=$_POST['choice_topic'];

    $sql_kit_name="SELECT name FROM kits WHERE BINARY name='$kit_name'";
    //CHECK IF THERE IS NO KITS WITH THE SAME NAME
    if($kit_result=@$connect->query($sql_kit_name)){
      $number_of_kits=$kit_result->num_rows;
      if($number_of_kits>0){
        echo '<script> alert("Zestaw o takiej nazwie istnieje!");</script>';
      }else{

        if($topic_choice=="syst_op"){
          $topic_choice=1;
        }else if($topic_choice=="sieci_kom"){
          $topic_choice=2;
        }else if($topic_choice=="witr_ap"){
          $topic_choice=3;
        }else if($topic_choice=="utk"){
          $topic_choice=4;
        }
        $sql_add_kit = "INSERT INTO kits VALUES(NULL,'$kit_name','$topic_choice','{$_SESSION['user']}')";
        if ($connect->query($sql_add_kit) === TRUE) {
          $polishtrans = $_POST['polishtrans'];
          $englishtrans = $_POST['englishtrans'];
          foreach($polishtrans as $key => $n ) {
              $a=$englishtrans[$key];
              $sql_flashcard_add="INSERT INTO words VALUES(NULL,'$kit_name','$n','$a')";
              if ($connect->query($sql_flashcard_add) === TRUE) {
                //Dodano fiszki
              }
          }
          echo "<script> alert('Dodano zestaw o nazwie: $kit_name'); </script>";
        }else{
          echo "<script> alert('Błąd nie dodano zestawu'); </script>";
        }
      }
    }
    mysqli_close($connect);
  }else{
    echo "<script> alert('W celu stworzenia zestawu należy się zalogować!'); </script>";
  }
}
?>

