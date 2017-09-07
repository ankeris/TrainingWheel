// JavaScript Document
$("#question").hover(
  function () {
    $(this).addClass('animated swing');
  },
  function () {
    $(this).removeClass('animated swing');
  }
  );

$(".back").hover(
  function () {
    $(this).addClass('animated swing');
  },
  function () {
    $(this).removeClass('animated swing');
  }
  );


$(".levelcontainer").hover(
  function () {
    $(this).addClass('animated tada .leveltexthover');
  }, 
  function () {
    $(this).removeClass('animated tada .leveltexthover');
  }
  );
  
    var sound = new Audio ();
    sound.src = "sound.mp3";