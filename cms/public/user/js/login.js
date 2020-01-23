$(".login-form1").hide();
$(".login1").css("background", "none");

$(".login1").click(function(){
  $(".signup-form1").hide();
  $(".login-form1").show();
  $(".signup1").css("background", "none");
  $(".login1").css("background", "#fff");
});

$(".signup1").click(function(){
  $(".signup-form1").show();
  $(".login-form1").hide();
  $(".login1").css("background", "none");
  $(".signup1").css("background", "#fff");
});

$(".btn1").click(function(){
  $(".input").val("");
});