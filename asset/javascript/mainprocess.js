	
	//Variable URL Global
	var action_url = "http://localhost/akuberi/asset/pages/process/handler.php?action=";
	var base_url = "http://localhost/akuberi/";

	function redirect(url){
		window.location = url;
	}

	//Proses Register
	$("#notification").hide();
	$("#registerform").submit(function(e){
		e.preventDefault();
		$.ajax({
			url:action_url+'register',
			type:'POST',
			dataType:'json',
			data: new FormData(this),
			contentType:false,
			processData:false,
			success:function(data){
				if(data.notif=="err-username"){
					$("#notification").fadeIn();
					$("#notification").html("*Nama Hanya Boleh Berupa Huruf");
					$(".box").find("input[name=fname]").css({
						borderBottom: '2px solid #e74c3c'
					});
					$(".box").find("input[name=sname]").css({
						borderBottom: '2px solid #e74c3c'
					});
					$(".box").find("input[name=fname]").focus();
				}else if(data.notif=="err-email"){
					$("#notification").fadeIn();
					$("#notification").html("*Email Yang Anda Masukkan Sudah Digunakan");
					$(".box").find("input[name=email]").css({
						borderBottom: '2px solid #e74c3c'
					});
					$(".box").find("input[name=email]").focus();
				}else if(data.notif=="err-telp"){
					$("#notification").fadeIn();
					$("#notification").html("*No Hp Hanya Boleh Berupa Angka");
					$(".box").find("input[name=telp]").css({
						borderBottom: '2px solid #e74c3c'
					});
					$(".box").find("input[name=telp]").focus();
				}else if(data.notif=="err-failed"){
					alert("Terjadi Error Saat Memasukan Data Ke Database");
				}else if("success"){
					redirect(base_url+'asset/pages/main/login.php?status=registered');
				}else if(data.notif=="err-empty"){
					$("#notification").fadeIn();
					$("#notification").html("*Masih Terdapat Kolom Yang Kosong");
					$(".box").find("input").css({
						borderBottom: '2px solid #e74c3c'
					});
					$(".box").find("input[name=fname]").focus();
				}
			}
		});
	});

	$("#registerform").keyup(function(){
		$("#notification").hide();
		$(".box").find('input').css({
			borderBottom: '2px solid #999'
		});
	});


	// Proses Login
	$("#loginform").submit(function(e){
		e.preventDefault();
		$.ajax({
			url:action_url+'login',
			type:'POST',
			data: new FormData(this),
			dataType:'json',
			contentType:false,
			processData:false,
			success:function(data){
				if(data.notif=='err-empty'){
					$("#notification").fadeIn();
					$("#notification").html("*Masih Terdapat Kolom Yang Kosong");
					$(".box").find("input").css({
						borderBottom: '2px solid #e74c3c'
					});
					$(".box").find("input[name=email]").focus();
				}else if(data.notif=='err-wrong'){
					$("#notification").fadeIn();
					$("#notification").html("*Email Atau Password Yang Anda Masukkan Salah");
					$(".box").find("input").css({
						borderBottom: '2px solid #e74c3c'
					});
					$(".box").find("input[name=email]").focus();
				}else if(data.notif=='err-db'){
					$("#notification").fadeIn();
					$("#notification").html("*Terjadi Error Pada Proses Login, Segera Kontak Admin Website");
					$(".box").find("input").css({
						borderBottom: '2px solid #e74c3c'
					});
					$(".box").find("input[name=email]").focus();
				}else if(data.notif=='success'){
					if(data.level=='admin'){
						redirect(base_url+'asset/pages/main/admin.php');
					}else if(data.level=='user'){
						redirect(base_url+'asset/pages/main/user.php');
					}
				}else if(data.notif=='err-blocked'){
					$("#notification").fadeIn();
					$("#notification").html("*Akun Anda Telah Diblokir Dari Website Ini Karena Melanggar Aturan Yang Berlaku");
					$(".box").find("input").css({
						borderBottom: '2px solid #e74c3c'
					});
					$(".box").find("input[name=email]").focus();
				}
			}
		});
	});

	$("#loginform").keyup(function(){
		$("#notification").hide();
		$(".box").find('input').css({
			borderBottom: '2px solid #999'
		});
	});


	//Proses Logout
	$("#logout-btn").click(function(e){
		e.preventDefault();
		var usertoken = $(this).data('token'); 
		$.ajax({
			url:action_url+'logout',
			data:{token:usertoken},
			type:"POST",
			dataType:'json',
			success:function(data){
				if(data.notif=='success'){
					redirect(base_url);
				}
			}
		});
	});

	//Proses menyimpan sementara no rekening dan jenis bank pada halaman user
	var bankid = '';
	$('.radio-bnk').change(function(){
		bankid = $(this).val();
	});

	$("#addpayment").click(function(e){
		e.preventDefault();
		var norek = $('input[name=rekening]').val();
		$.ajax({
			url:action_url+'addpayment',
			data:{rekening:norek,bank:bankid},
			type:'POST',
			dataType:'json',
			success:function(data){
				if(data.notif=='success'){
					alert("No Rekening Anda Sudah Ditambahkan Silahkan Lanjutkan Pengisian Formulir Penggalangan Dana Kemudian Klik Tombol Post");
					$('input[name=judul]').focus();
				}else if(data.notif=='empty'){
					alert("Gagal!, Pastikan Anda Telah Mengisi Semua Informasi Dengan Benar!");
				}else{
					alert("Error!");
				}
			}
		});
	});

	//Proses upload post
	$("#postform").submit(function(e){
		e.preventDefault();
		$.ajax({
			url:action_url+'storepost',
			data:new FormData(this),
			processData:false,
			contentType:false,
			type:'POST',
			dataType:'json',
			success:function(data){
				switch(data.notif){
					case "err-ext":
						alert("Gambar Hanya Boleh Berupa .jpg, .png, dan .gif!");
					break;

					case "err-size":
						alert("Gambar Tidak Boleh Melebihi 100Mb");
					break;

					case "err-img":
						alert("Terjadi Kesalahan Dalam Memproses Gambar Anda, Silahkan Ganti Gambar");
					break;

					case "err-account":
						alert("Anda Belum Memasukkan Informasi Rekening , Silahkan Masukkan Dengan Menekan Tombol Media");
					break;

					case "err-empty":
						alert("Pastikan Anda Telah Mengisi Semua Informasi Pada Formulir!");
					break;

					case "err-db":
						alert("Terjadi Kesalahan Ketika Memasukkan Data Ke Database");
					break;

					case "success":
						alert("Selamat, Penggalangan Dana Telah Berhasil Dibuat!, Anda Dapat Melihatnya Di Beranda Atau Di Halaman Donasiku");
					break;
				}
			}
		});

	});















