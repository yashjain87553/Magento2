 var timerStart = Date.now();
 
 require(['jquery', 'jquery/ui'], function($){ 
     var image_h=$(".c-p-image").width()/2;
     $(".c-p-image").css('height',image_h);
     $(document).ready(function(){
    $(".c-open").click(function(){
        $(".c-container").css('width','50%');
        $(".c-container").css('left','0px');
    });
    $(".c-close").click(function(){
        $(".c-container").css('width','0%');
        $(".c-container").css('left','-50px');
    });

    $(window).resize(function(){
      var image_h=$(".c-p-image").width()/2;
     $(".c-p-image").css('height',image_h);
    var windowWidth = $(window).width();
if(windowWidth > 764){
    $(".c-container").css('width','100%');
    $(".c-container").css('left','0px');
}
  if(windowWidth < 764){
    if($(".c-container").width()>0){
    $(".c-container").css('width','50%');
    $(".c-container").css('left','0px');
}
  else{
    $(".c-container").css('width','0%');
    $(".c-container").css('left','-50px');
  }
}
});
    });
     $('.owl-carousel .owl-nav .owl-prev').text('');
     $('.owl-carousel .owl-nav .owl-prev').addClass('fa fa-arrow-left');
     $('.owl-carousel .owl-nav .owl-next').text('');
     $('.owl-carousel .owl-nav .owl-next').addClass('fa fa-arrow-right');
     
      $(document).ready(function() {
                 console.log("Time until DOMready: ", Date.now()-timerStart);
             });
             window.onload = function() {myFunction()};

function myFunction() {
    console.log("Time until everything loaded: ", Date.now()-timerStart);
}
 });