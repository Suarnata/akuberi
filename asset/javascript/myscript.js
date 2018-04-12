$(document).ready(function(){
  $(".burger").click(function(){
    $(".sidebar").toggleClass("active");
    $(".burger").toggleClass("toggle");
  });
   //script data table
    $('#tabel-data-pengguna').DataTable();
   	$('#tabel-data-pengumuman').DataTable();
   	$('#tabel-data-lisdonasi').DataTable();
});
