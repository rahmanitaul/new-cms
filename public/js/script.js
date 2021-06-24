$(document).ready(function(){
 var curr_url = window.location.href.split(/[?#]/)[0];
 var menu = $(".nav").find("li").find("a");
 menu.each(function() {
  var menu_url = $(this).attr("href");
  if(curr_url.indexOf(menu_url) > -1){
    $(this).parents(".parent-li").addClass("menu-open");
    $(this).addClass("active");
  }
});
})

$('#table_id').DataTable({
  "paging": true,
  "lengthChange": false,
  "searching": false,
  "ordering": true,
  "info": true,
  "autoWidth": false,
  "responsive": true,
});

$(function () {

  $('.icp-auto').iconpicker();

});