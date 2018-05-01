$(document).ready(function(){
  $(".burger").click(function(){
    $(".sidebar").toggleClass("active");
    $(".burger").toggleClass("toggle");
  });
<<<<<<< HEAD
  $(".val-s").click(function(){
    $(".val-byr").slideToggle(300);
  });
  $(".val-toggle").click(function(){
  	$(".val-byr").fadeOut(300);
  });
	//script data table
    $('#tabel-data-pengguna').DataTable();
=======
  
});
$(document).ready(function(){
	$('#tabel-data-pengguna').DataTable();
>>>>>>> f7cf5772217a0b351ab0e12ace091baebf872169
   	$('#tabel-data-pengumuman').DataTable();
   	$('#tabel-data-lisdonasi').DataTable();

});