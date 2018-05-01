$(document).ready(function(){
  $(".burger").click(function(){
    $(".sidebar").toggleClass("active");
    $(".burger").toggleClass("toggle");
  });
  $(".val-s").click(function(){
    $(".val-byr").slideToggle(300);
  });
  $(".val-toggle").click(function(){
  	$(".val-byr").fadeOut(300);
  });
	//script data table
    $('#tabel-data-pengguna').DataTable();
   	$('#tabel-data-pengumuman').DataTable();
   	$('#tabel-data-lisdonasi').DataTable();
});
