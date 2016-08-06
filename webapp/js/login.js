$(".show-signup").on("click", function(){
  $(".signup").removeClass("hide");
  $(".login").addClass("hide");
});

$(".show-login").on("click", function(){
  $(".signup").addClass("hide");
  $(".login").removeClass("hide");
});

$.fn.marginLeftCalc = function() {
  return this.each(function(){
    var marginLeft  = ( $(window).width() - $(this).width() ) / 2 ;
    $(this).css({"margin-left" : marginLeft });
  });
};

$(".login, .signup").marginLeftCalc();
