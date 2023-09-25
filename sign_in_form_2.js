
//SIGN IN FORM 2******************************************************************
$(document).ready(function show_form(){
  $(".sign_in_click_2").click(function show_form(){
    $(".sign_in_form_2").addClass("sign_in");
    $(".sign_in_back_2").addClass("sign_in_darkback");
    $(".sign_in_form_2").removeClass("sign_in_invisible");
    $(".navbar__mobile").removeClass("navbar__mobile_display");
            $(".navbar").removeClass("sticky_mobile");
            timesClicked = 1;
  });
});

$(document).ready(function close_form(){
  $(".close_form").click(function show_form(){
    $(".sign_in_form_2").addClass("sign_in_invisible");
    $(".sign_in_back_2").removeClass("sign_in_darkback");
    
  });
});
