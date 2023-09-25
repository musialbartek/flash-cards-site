var kitShow=document.querySelector(".add_kitForm");
function showAddkit(){
  kitShow.classList.add("add_kitFormShow");
}
function hideAddkit(){
     kitShow.classList.remove("add_kitFormShow");
   }
    var timesClicked_filter = 1;
    
    document.getElementsByClassName("flash-cards")[0].style.marginTop="200px";

$(".show_filter").click(function() {
  timesClicked_filter++;
  var filter_display=document.getElementById("filter_display");
  var flashcards_margin=document.getElementById("kit_filter");
if (timesClicked_filter%2==0) {
  filter_display.style.left="0px";
  filter_display.style.visibility="visible"; 
  filter_display.style.transition = "all 0.5s";
  filter_display.style.opacity="1";
  filter_display.style.zIndex="50";
} else {
  filter_display.style.visibility="none"; 
  filter_display.style.opacity="0"; 
  filter_display.style.transition = "all 1s ease-in-out";
  filter_display.style.left="-200px";
  filter_display.style.zIndex="1";
  if(x.matches){
    flashcards_margin.style.paddingTop="0px";
    flashcards_margin.style.transition = "all 3s";
    $(".show_filter").removeClass("show_filterHover");
  }
}
})   



function filtr(){
  var show_syst = document.getElementById("syst");
  var show_siec = document.getElementById("siec");
  var show_wit = document.getElementById("witr");
  var show_utk = document.getElementById("utk");
   if(filter.sys_op.checked){
        show_syst.style.display="block";
        setTimeout(function(){show_syst.style.opacity="1";
        show_syst.style.transition = "all 2s";},250);
   
   }else{
        show_syst.style.opacity="0";
        show_syst.style.transition = "all 0.5s";
        setTimeout(function(){if(show_syst.style.opacity="0")
        show_syst.style.display="none";},750);
   }
    if(filter.sieci_ko.checked){
      show_siec.style.display="block";
        setTimeout(function(){show_siec.style.opacity="1";
        show_siec.style.transition = "all 2s";},250);
   
    }else{
        show_siec.style.opacity="0";
        show_siec.style.transition = "all 0.5s";
        setTimeout(function(){if(show_siec.style.opacity="0")
        show_siec.style.display="none";},750);
    }
    if(filter.wit_ap.checked){
      show_wit.style.display="block";
        setTimeout(function(){show_wit.style.opacity="1";
        show_wit.style.transition = "all 2s";},250); 
    }else{
        show_wit.style.opacity="0";
        show_wit.style.transition = "all 0.5s";
        setTimeout(function(){if(show_wit.style.opacity="0")
        show_wit.style.display="none";},750);
    }
   if(filter.ut_k.checked){
      show_utk.style.display="block";
      setTimeout(function(){show_utk.style.opacity="1";
      show_utk.style.transition = "all 2s";},250);
    }else{
      show_utk.style.opacity="0";
      show_utk.style.transition = "all 0.5s";
      setTimeout(function(){if(show_utk.style.opacity="0")
      show_utk.style.display="none";},750);
    }
  }
  var flashcards_number=1;
  function new_card(){
    flashcards_number++;
    document.querySelector("#numberOfcards").innerHTML=parseInt(flashcards_number);
    document.querySelector("#sectionTranslaction").innerHTML+='<div class="card_name"><div class="translaction"><label for="polishcardName">'+flashcards_number+'. Polskie tłumaczenie:</label><input type="text" name="polishtrans[]" class="form-control"></div><div class="translaction"><label for="englishcardName">Angielskie tłumaczenie:</label><input type="text" name="englishtrans[]" class="form-control"></div></div><br>';

  }
  