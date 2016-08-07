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

/*
// ajax to show chats
var getData = function() {
  //$(".get-data").click(function(){
    var x = $(".get-data");
    for (var i = 0; i < x.length; i++) {
      var id = x[i].getAttribute('id');
      console.log(id);
    }

    $.ajax({
      type: 'POST',
      url: 'http://localhost/incubatex_hackathon2k16/webapp/data.php',
      data : "id="+id,
      success: function(data) {
        $(".chat").append(data);
        console.log(data);
     }
    });
  
*/
// ajax to show chats
var store;
var flag=0;
$(".get-data").click(function () {
  flag=1;
});

var getData = function() {
  $(".get-data").click(function(){
      var id = $(this).attr('id');
      console.log(id);
      if(flag==1)
        stop();
  
    $.ajax({
      type: 'POST',
      url: 'http://localhost/incubatex_hackathon2k16/webapp/data.php',
      data : "id="+id,
      success: function(data) {
        $(".chat").append(data);
        // console.log(data);
     }
    });
  });

    
}

$(document).ready(function() {store=setInterval(getData, 500);});
 // 

var userSelected;
// Show chats on clicking a user li
$(".user-list li").on("click", function(){
  $(".welcome-text").addClass("hide");
  userSelected = $(this).text();
  $(".chat-user a").html(userSelected);
  $(".sidebar").addClass("hidden-xs");
  $(".chat-wrap").removeClass("hide hidden-xs");

  // Adjust Height
  chatsHeight();
});

// Hide chats on  clicking back button
$(".back").on("click", function(){
  $(".chat-wrap").addClass("hidden-xs");
  $(".sidebar").removeClass("hidden-xs");

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

$("#msg").on("keydown", function(e){
  if(e.keyCode == 13)
    $("#send-msg").click();
});


// FIND HIeGHt
var chatsHeight = function() {
      var topHeight = Number ($(".row.chat-user").outerHeight() );
      var bottomHeight =  Number ( $(".row.message").outerHeight() );
			var fixedHeight = $(window).height() - topHeight - bottomHeight;
			$(".convo.row .chat").height(fixedHeight);
      console.log(fixedHeight);
};

var usersHeight = function() {
      var topHeight = Number ($(".row.current-user").outerHeight() );
			var fixedHeight = $(window).height() - topHeight;
			$(".list.row").height(fixedHeight);
      console.log(fixedHeight);
};
usersHeight();

function stop()
{
  clearInterval(store);
  console.log(1);
}