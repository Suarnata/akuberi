	
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
					redirect(base_url+'asset/pages/main/login.php');
				}
			}
		});
	});

	$("#registerform").keyup(function(){
		$("#notification").hide();
		$(".box").find('input').css({
			borderBottom: '2px solid #999'
		});;
	});