(function($) {
	// fungsi dijalankan setelah seluruh dokumen ditampilkan
	$(document).ready(function(e) {
		
		// deklarasikan variabel
		var data_tamu = "http://localhost/latihan_ci/tamu/tampil";
		
		// tampilkan data mahasiswa dari berkas mahasiswa.data.php 
		// ke dalam <div id="data-tamu"></div>
		$("#data-tamu").load(data_tamu);
		
		// ketika tombol tambah di tekan
		$('.tambah').on("click", function(){
			
			var url = "http://localhost/latihan_ci/tamu/tambah";

				// saran dari mas hangs 
				$("#myModalLabel").html("<span class='glyphicon glyphicon-pencil'></span> Isi Buku Tamu");
			

			$.post(url, function(data) {
				// tampilkan mahasiswa.form.php ke dalam <div class="modal-body"></div>
				$(".modal-body").html(data).show();
			});
		});
		
		
		// ketika tombol simpan ditekan
		$("#simpan-data-tamu").bind("click", function(event) {
			var url = "http://localhost/latihan_ci/tamu/simpan";

			// mengambil nilai dari inputbox, textbox dan select
			var v_nama = $('input:text[name=nama]').val();
			var v_email = $('input[name=email]').val();
			var v_web = $('input[name=web]').val();
			var v_pesan = $('textarea[name=pesan]').val();

			// mengirimkan data ke var URL  untuk di proses
			$.post(url, {nama: v_nama, email: v_email, web: v_web, pesan: v_pesan} ,function() {
				// tampilkan data tamu yang sudah di diupdate
				// ke dalam <div id="data-tamu"></div>
				$("#data-tamu").load(data_tamu);

				// sembunyikan modal dialog
				$('#dialog-tamu').modal('hide');
				
				// kembalikan judul modal dialog
				$("#myModalLabel").html("Isi Buku Tamu");
			});
		});
	});
}) (jQuery);
