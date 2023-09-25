
<?php
    $zestaw=$_GET['nazwa_zestawu'];
    echo '<section class="flash-cards">';

    $sql_select_words = "SELECT * FROM words WHERE BINARY kit_name='$zestaw'";
    $result_sql_select_words=mysqli_query($connect,$sql_select_words);

        echo '<div id="siec"><div class="subtitle_left"><span>'.$zestaw.'</span></div>';
        echo '<div class="row justify-content-between">';
        while($row=mysqli_fetch_assoc($result_sql_select_words)){
          echo '<div class="flip-card col-sm-6 col-md-3"><div class="flip-card-inner"><div class="flip-card-front">'.$row['polish_word'].'</div><div class="flip-card-back">'.$row['english_word'].'</div></div></div>';
        }
        echo '</div>';
        echo "<hr></div>";
    echo '</section>';
?>
