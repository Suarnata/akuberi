$(document).ready(function(){
  
  $(".burger").click(function(){
    $(".sidebar").toggleClass("active");
    $(".burger").toggleClass("toggle");
  });
   $(".burger1").click(function(){
    $(".bar1").toggleClass("active1");
    $(".burger1").toggleClass("toggle");
  });

  $(".val-s").click(function(){
    $(".val-byr").slideToggle(300);
     $("body").css("overflow","hidden");
  });

  $(".val-toggle").click(function(){
  	$(".val-byr").fadeOut(300);
     $("body").css("overflow","");
  });

  $(".edit-show").click(function(){
    
    $(".edit").slideToggle(300);
    $("body").css("overflow","hidden");
  });
  $(".cancle-edit").click(function(){
    $(".edit").fadeOut(300);
    $("body").css("overflow","");
  });
  

  $(".notif1").click(function(){
    $(".notif-up").slideToggle(300);
    $("body").css("overflow","hidden");
  });
  $(".cancle-notif").click(function(){
    $(".notif-up").fadeOut(300);
    $("body").css("overflow","");
  });

  $(".mengerti-notif").click(function(){
    $(".notif-up").fadeOut(300);
    $("body").css("overflow","");
  });
  
	//script data table

	
  //script data table

    $('#tabel-data-pengguna').DataTable();


    $(".banner-u").flickity({
        wrapAround : true,
        autoPlay : 3500
    });


	 $('#tabel-data-pengguna').DataTable();
   	$('#tabel-data-pengumuman').DataTable();
   	$('#tabel-data-lisdonasi').DataTable();

    $('#tabel-data-pengguna').DataTable();
    $('#tabel-data-pengumuman').DataTable();
    $('#tabel-data-lisdonasi').DataTable();


});
