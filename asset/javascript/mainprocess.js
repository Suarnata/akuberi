	
	//Variable URL Global
	var action_url = "http://localhost/akuberi/asset/pages/process/handler.php?action=";
	var base_url = "http://localhost/akuberi/";

	function redirect(url){
		window.location = url;
	}
//==============================AUTHENTICATION===========================================================================
	
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

//=========================== / AUTHENTICATION===========================================================================

//==============================USER PAGE================================================================================
	
	//Proses menyimpan sementara no rekening dan jenis bank pada halaman user
	var bankid = '';
	$('.radio-bnk').change(function(){
		bankid = $(this).val();
	});

	$("#addpayment").click(function(e){
		e.preventDefault();
		var norek = $('input[name=rekening]').val();
		var jmltarget = $('input[name=target]').val();

		console.log(bankid+" | "+" | ");

		$.ajax({
			url:action_url+'addpayment',
			data:{rekening:norek,bank:bankid,target:jmltarget},
			type:'POST',
			dataType:'json',
			success:function(data){
				if(data.notif=='success'){
					$('input[name=judul]').focus();
					alert("No Rekening Anda Sudah Ditambahkan Silahkan Lanjutkan Pengisian Formulir Penggalangan Dana Kemudian Klik Tombol Post");
					$('html body').css({'overflow-y':'auto'});
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
						$.ajax({
							url:action_url+'showposts',
							type:'GET',
							success:function(data){
								$("#postsection").html(data);
								alert("Selamat, Penggalangan Dana Telah Berhasil Dibuat!, Anda Dapat Melihatnya Di Beranda Atau Di Halaman Donasiku");
								$("#img-container").html(`
					                <button class="picture-s" type="button" name="button"></button>
					             `);
								$('input[name=image]').val("");
								$('#reset-btn').click();
							}
						});
					break;
				}
			}
		});

	});

	$("#searchinput").keyup(function(e){
		var searchvalue = $(this).val();
		if(e.keyCode==13){
			window.location=base_url+'asset/pages/main/user.php?search='+searchvalue;
		}
	});

	setInterval(function(){
		$.ajax({	
			url:action_url+'getnotification',
			type:'GET',
			success:function(data){
				$("#notifsection").html(data);
			}
		});
	},1000);

	setInterval(function(){
		$.ajax({	
			url:action_url+'getchat',
			type:'GET',
			success:function(data){
				$("#chatsection").html(data);
			}
		});
	},1000);

	$("#sendchat").keyup(function(e){
		e.preventDefault();
		if(e.keyCode==13){
			var chatdata = $(this).val();
			$.ajax({
				url:action_url+'sendchat',
				type:'POST',
				dataType:'json',
				data:{chat:chatdata},
				success:function(data){
					
					if(data.notif=='err-db'){
						alert("Terjadi Kesalahan Dengan Database!");
					}

					$("#sendchat").val("");
				}
			});
		}
	});

//=========================== / USER PAGE================================================================================

//==============================DONATION PAGE============================================================================
	
	$("#paymentform").submit(function(e){
		e.preventDefault();
		$.ajax({
			url:action_url+'paymentprocess',
			data:new FormData(this),
			processData:false,
			contentType:false,
			type:'POST',
			dataType:'json',
			success:function(data){
				switch(data.notif){
					
					case "err-empty":
						alert("Pastikan Anda Telah Mengisi Jumlah Pembayaran Dengan Benar!");
					break;

					case "err-db":
						alert("Terjadi Masalah Ketika Memasukkan Data Ke Database");
					break;

					case "success":
						alert("Terima Kasih Telah Berdonasi Di Website Kami, Semoga Tuhan Membalas Budi Anda!");
						$('input[name="total"]').val("");

						$.ajax({
							url:action_url+'gettotal',
							type:'POST',
							data:{post_id:data.post_id},
							success:function(data){
								$("#terkumpultext").html(data);
							}
						});

					break;
				
				}
			}
		});
	});

//=========================== / DONATION PAGE============================================================================

//==============================SETTINGS PAGE============================================================================
	
	$("#editprofileform").submit(function(e){
		e.preventDefault();

		$.ajax({
			url:action_url+'updateprofile',
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

					case "err-empty":
						$("#notif").html("Masih Terdapat Kolom Yang Kosong!");
						$("#notif").addClass('notiferr');
					break;

					case "err-name":
						$("#notif").html("Nama Hanya Boleh Berupa Huruf!");
						$("#notif").addClass('notiferr');
						$("input[name=nama]").css({'border':'2px solid #e74c3c'});
						$("input[name=nama]").focus();
					break;

					case "err-telp":
						$("#notif").html("No Telp Hanya Boleh Berupa Angka!");
						$("#notif").addClass('notiferr');
						$("input[name=telp]").css({'border':'2px solid #e74c3c'});
						$("input[name=telp]").focus();
					break;

					case "err-db":
						$("#notif").html("Terjadi Kesalahan Ketika Memasukkan Data Ke Database!");
						$("#notif").addClass('notiferr');
					break;

					case 'success':
						$("#notif").html(`
							Informasi Anda Telah Berhasil Diperbaharui!<br/>
							<a href="profil.php">Lihat Profil</a>
							`);
						$("#notif").addClass('notifsuc');
					break;
				}
			}
		});
	});

	$("#editprofileform").keyup(function(){
		$("#notif").html("");
		$("#notif").removeClass('notiferr');
		$("#notif").removeClass('notifsuc');
		$("input[name=nama]").css({'border':'2px solid grey'});
		$("input[name=email]").css({'border':'2px solid grey'});
		$("input[name=telp]").css({'border':'2px solid grey'});
	});

	$("#updatepassform").submit(function(e){
		e.preventDefault();

		$.ajax({
			url:action_url+'updatepass',
			data:new FormData(this),
			processData:false,
			contentType:false,
			type:'POST',
			dataType:'json',
			success:function(data){
				switch(data.notif){
					case 'err-empty':
						$("#notifpw").html("Masih Terdapat Kolom Yang Kosong!");
						$("#notifpw").addClass('notiferr');
					break;

					case 'err-wrong':
						$("#notifpw").html("Password Lama Anda Salah!");
						$("#notifpw").addClass('notiferr');
						$("input[name=pass-lm]").css({'border':'2px solid #e74c3c'});
						$("input[name=pass-lm]").focus();
					break;

					case 'err-wrongrepeat':
						$("#notifpw").html("Penulisan Ulang Password Tidak Sama!");
						$("#notifpw").addClass('notiferr');
						$("input[name=pass-br]").css({'border':'2px solid #e74c3c'});
						$("input[name=pass-ul]").css({'border':'2px solid #e74c3c'});
						$("input[name=pass-br]").focus();
					break;

					case 'err-db':
						$("#notifpw").html("Terjadi Kesalahan Ketika Memasukkan Data Ke Database!");
						$("#notifpw").addClass('notiferr');
					break;

					case 'success':
						$("#notifpw").html("Password Telah Berhasil Diperbaharui!");
						$("#notifpw").addClass('notifsuc');
					break;
				}
			}
		});

	});

	$("#updatepassform").keyup(function(){
		$("#notifpw").html("");
		$("#notifpw").removeClass('notiferr');
		$("#notifpw").removeClass('notifsuc');
		$("input[name=pass-lm]").css({'border':'2px solid grey'});
		$("input[name=pass-br]").css({'border':'2px solid grey'});
		$("input[name=pass-ul]").css({'border':'2px solid grey'});
	});

//=========================== / SETTINGS PAGE============================================================================








