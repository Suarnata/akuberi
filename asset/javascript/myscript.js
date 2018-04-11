$(document).ready(function(){
  $(".burger").click(function(){
    $(".sidebar").toggleClass("active");
    $(".burger").toggleClass("toggle");
  });
  $('#tabel-data-pengguna').DataTable();
  $('#tabel-data-donasi').DataTable();
});
