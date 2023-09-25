   
//NAVIGATION**************************************************************
	       $(document).ready(function myfunction() {
	       var NavY = $('.navbar').offset().top;
	 
	       var stickyNav = function(){
	       var ScrollY = $(window).scrollTop();
		  
	       if (ScrollY > NavY) { 
		   $('.navbar').addClass('sticky');
	       } else {
		   $('.navbar').removeClass('sticky'); 
	       }
	       };
	 
	       stickyNav();
	 
	       $(window).scroll(function() {
		   stickyNav();
	       });
           });
//HAMBURGER****************************************************************
           var timesClicked = 1;

$(".hamburger").click(function() {
timesClicked++;

if (timesClicked%2==0) {
  $(".navbar__mobile").addClass("navbar__mobile_display");
            $(".navbar").addClass("sticky_mobile");
            $(".hamburger").removeClass("hidden_hamburger");
} else {
  $(".navbar__mobile").removeClass("navbar__mobile_display");
            $(".navbar").removeClass("sticky_mobile");
            $(".hamburger").addClass("hidden_hamburger");
}
})      

//SIGN IN FORM 1******************************************************************
           $(document).ready(function show_form(){
  $(".sign_in_click").click(function show_form(){
    $(".sign_in_form").addClass("sign_in");
    $(".sign_in_back").addClass("sign_in_darkback");
    $(".sign_in_form").removeClass("sign_in_invisible");
    $(".navbar__mobile").removeClass("navbar__mobile_display");
            $(".navbar").removeClass("sticky_mobile");
            timesClicked = 1;
  });
});

$(document).ready(function close_form(){
  $(".close_form").click(function show_form(){
    $(".sign_in_form").addClass("sign_in_invisible");
    $(".sign_in_back").removeClass("sign_in_darkback");
    
  });
});
//SIGN IN FORM 2******************************************************************

/*REGISTER*/
$(document).ready(function show_register(){
  $(".register_click").click(function show_register(){
    $(".register_form").addClass("register_in");
    $(".register_back").addClass("register_darkback");
    $(".register_form").removeClass("register_invisible");
    $(".navbar__mobile").removeClass("navbar__mobile_display");
            $(".navbar").removeClass("sticky_mobile");
            timesClicked = 1;
  });
});

$(document).ready(function show_register(){
  $(".close_form").click(function show_register(){
    $(".register_form").addClass("register_invisible");
    $(".register_back").removeClass("register_darkback");
    
  });
});

//COOKIES*********************************************************************
function cookies(){
  $(".cookie_invisible").addClass("cookie_visible");
}


function pop_up_fun(name,value,days) 
{ 
  if (days) {
    var date = new Date();
    date.setTime(date.getTime()+(days*24*60*60*1000));
    var expires = "; expires="+date.toGMTString(); 
  } else var expires = ""; 
    document.cookie = name+"="+value+expires+"; path=/";
    document.getElementById("pop_up").style.display = "none"; 
} 

function pop_up_fun_read_cookie(name){
    var nameEQ = name + "="; 
    var ca = document.cookie.split(";");
  for(var i=0;i < ca.length;i++) {
      var c = ca[i]; 
    while (c.charAt(0)==" ") c = c.substring(1,c.length);
      if (c.indexOf(nameEQ) == 0) return c.substring(nameEQ.length,c.length); 
  }
  return null;
}
  var pop_up_jest = pop_up_fun_read_cookie("pop_up");
  if(pop_up_jest==1){ 
  document.getElementById("pop_up").style.display = "none";
  }

  
  //PRELOADER********************************************************
  var preloaderDots=document.querySelector("#preloader");
  window.addEventListener("load", function(){
    setTimeout(function(){
       preloaderDots.style.opacity="0";
       preloaderDots.addEventListener("transitionend", function(){
           this.style.display="none";
       })
      },1000)
   })
   document.querySelector('#gierki').addEventListener('click', function(){
    alert('Funkcja nie gotowa - Strona w budowie ;)');
   });
 