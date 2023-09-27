$(".submenu_print").click(function(){
  $(this).children("ul").slideToggle();
})

$(".submenu").click(function(){
  $(this).children("ul").slideToggle();
})

$("ul").click(function(p){
  p.stopPropagation();
})