
$(document).ready(function() {
$('li.dropdown').hover(function( ) {
    $(this).find('.dropdown-menu').stop(true,true).delay(200).fadeIn(200)
  }, function() {
    $(this).find('.dropdown-menu').stop(true,true).delay(200).fadeOut(200);
  })
  
  $('.serviceContent').mouseover(function() {
    $(this).find('.btn').addClass('selected')
  });
  
  $('.serviceContent').mouseout(function() {
    $(this).find('.btn').removeClass('selected')
  })
  
  $('.fixContent').mouseover(function() {
    $(this).find('.btn').addClass('selected')
  });
  
  $('.fixContent').mouseout(function(){
    $(this).find('.btn').removeClass('selected')
  })
})