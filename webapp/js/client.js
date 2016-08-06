$(".show-signup").on("click", function(){
  $(".signup").removeClass("hide");
  $(".login").addClass("hide");
  if($(window).width() > 400) {
    $(".signup").marginLeftCalc();
  }
});

$(".show-login").on("click", function(){
  $(".signup").addClass("hide");
  $(".login").removeClass("hide");
  if($(window).width() > 400) {
    $(".login").marginLeftCalc();
  }
});

$.fn.marginLeftCalc = function() {
  return this.each(function(){
    var marginLeft  = ( $(window).width() - $(this).width() ) / 2 ;
    if($(this).hasClass("not-center")) {
      $(this).css({"margin-left" : marginLeft }).removeClass("not-center");
    }
  });
};

if($(window).width() > 400) {
  $(".login").marginLeftCalc();
}
// ===================login signup logic end=========================


// ajax to show chats
$(".get-data").click(function(){
  var id = (this.getAttribute('id'));
  console.log(id);
  $.ajax({
    type: 'POST',
    url: 'http://localhost/incubatex_hackathon2k16/webapp/data.php',
    data : "id="+id,
    success: function(data) {
      $(".chat").append(data);
      console.log(data);
    }
  });

});

var userSelected;
// Show chats on clicking a user li
$(".user-list li").on("click", function(){
  userSelected = $(this).text();
  $(".sidebar").addClass("hide");
  $(".chat-wrap").removeClass("hide");

});

// Hide chats on  clicking back button
$(".back").on("click", function(){
  $(".chat-wrap").addClass("hide");
  $(".sidebar").removeClass("hide");

});

$("#send-msg").on("click", function(){
  var chatText = $("#msg").val();
  console.log(chatText);
  $.ajax({
    type: 'POST',
    url: 'http://localhost/incubatex_hackathon2k16/webapp/data.php',
    data : 'msg='+chatText+"&receiver="+userSelected,
    success: function(data) {
      console.log(data);
    }
  });
});
