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
  });
  $(".val-toggle").click(function(){
  	$(".val-byr").fadeOut(300);
  });

  $(".bullet").click(function(){
  	$(".bullet-menu").toggleClass("active-bull");
  });

	//script data table
    $('#tabel-data-pengguna').DataTable();
});

$(document).ready(function(){
          $(".banner-u").flickity({
            wrapAround : true,
            autoPlay : 3500
        });
});
$(document).ready(function(){
	$('#tabel-data-pengguna').DataTable();
   	$('#tabel-data-pengumuman').DataTable();
   	$('#tabel-data-lisdonasi').DataTable();
});
