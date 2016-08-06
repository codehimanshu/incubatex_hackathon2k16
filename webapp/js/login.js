$(".show-signup").on("click", function(){
  $(".signup").removeClass("hide");
  $(".login").addClass("hide");
});

$(".show-login").on("click", function(){
  $(".signup").addClass("hide");
  $(".login").removeClass("hide");
});
