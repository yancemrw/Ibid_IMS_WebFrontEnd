<div class="load-payment" id="loading-payment" style="display:none">
    <div>
        <img src="<?php echo base_url('assetsfront/images/loader/formloader.gif'); ?>">
        <p>Mohon tunggu,,</p>
        <p>Transaksi sedang berlangsung</p>
    </div>
</div>
<section class="section section-auction">
    <div class="container">
        <div class="row">
            <div class="col-md-7 col-sm-7">
                <h2>Pilih Metode Pembayaran</h2>
                <form class="form-methode form-filter" id="thisForm" action="#<?php // echo site_url('npl/checkout'); ?>" method="POST">
                    <div class="object-type pay-methode clearfix">
                        <div class="form-group">
                            <input type="radio" name="tipe_methode" id="va-bca" class="input-hidden" value="2" disabled />
                            <label for="va-bca">
                                <p>Transfer Virtual Account</p>
                                <ul>
                                    <li><img src="<?php echo base_url('assetsfront/images/icon/ic-bca.png'); ?>" alt=""></li>
                                </ul>
                            </label>
                            <div id="methode2" class="desc-methode padding-30px-15px-30px-30px">
                                <ul class="list-style margin-bottom-10px">
                                    <li class="margin-bottom-10px">Kode pembayaran Virtual Account merupakan kombinasi 5 nomor unik dan nomor handphone yang terdaftar di akun IBID.</li>
                                    <li class="margin-bottom-10px">Satu nomor Virtual Account BCA berlaku untuk satu akun saja.</li>
                                    <li class="margin-bottom-10px">Pembayaran hanya berlaku untuk satu tagihan terbaru. Jika Anda masih memiliki tagihan yang belum dibayarkan, transaksi sebelumnya akan otomatis dibatalkan.</li>
                                    <li class="margin-bottom-10px">Batas waktu pembayaran adalah 2 hari.</li>
                                    <li class="margin-bottom-10px">Pembayaran Virtual Account BCA dapat dilakukan lewat ATM, m-BCA, KlikBCA Individual, atau langsung melalui teller.</li>
                                    <li class="margin-bottom-10px">Verifikasi pembayaran secara otomatis.</li>
                                </ul>
                            </div>
                        </div>
                        <div class="form-group">
                            <input type="radio" name="tipe_methode" id="va-mandiri" class="input-hidden" value="1" disabled />
                            <label for="va-mandiri">
                                <p>Transfer Virtual Account</p>
                                <ul>
                                    <li><img src="<?php echo base_url('assetsfront/images/icon/ic-mandiri.png'); ?>" alt=""></li>
                                </ul>
                            </label>
                            <div id="methode1" class="desc-methode padding-30px-15px-30px-30px">
                                <ul class="list-style margin-bottom-10px">
                                    <li class="margin-bottom-10px">Kode pembayaran Virtual Account merupakan kombinasi 5 nomor unik dan nomor handphone yang terdaftar di akun IBID.</li>
                                    <li class="margin-bottom-10px">Satu nomor Virtual Account berlaku untuk satu akun saja.</li>
                                    <li class="margin-bottom-10px">Pembayaran hanya berlaku untuk satu tagihan terbaru.</li>
                                    <li class="margin-bottom-10px">Tagihan terbayar bila Anda melakukan pembayaran dengan nominal tepat.</li>
                                    <li class="margin-bottom-10px">Pembayaran Virtual Account Mandiri dapat dilakukan lewat ATM, Mandiri Online, atau langsung melalui teller.</li>
                                    <li class="margin-bottom-10px">Verifikasi pembayaran secara otomatis.</li>
                                </ul>
                            </div>
                        </div>
                        <div class="form-group">
                            <input type="radio" name="tipe_methode" id="cc" class="input-hidden" value="3" disabled />
                            <label for="cc">
                                <p>Kartu Visa / Master Card</p>
                                <ul>
                                    <li><img src="<?php echo base_url('assetsfront/images/icon/ic-visa.png'); ?>" alt="" title=""></li>
                                    <li><img src="<?php echo base_url('assetsfront/images/icon/ic-master-card.png'); ?>" alt="" title=""></li>
                                </ul>
                            </label>
                            <div id="methode3" class="desc-methode padding-30px-15px-30px-30px">
                                <ul class="list-style margin-bottom-10px">
                                    <li class="margin-bottom-10px">Pembayaran hanya dapat dilakukan menggunakan kartu kredit berlogo Visa/Master Card.</li>
                                    <li class="margin-bottom-10px">Pembayaran dilakukan secara online melalui situs IBID yang nantinya akan terhubung dengan sistem Visa/Master Card.</li>
                                    <li class="margin-bottom-10px">Verifikasi pembayaran secara otomatis.</li>
                                    <li class="margin-bottom-10px">Pastikan limit kartu kredit Anda mencukupi.</li>
                                    <li class="margin-bottom-10px">Refund atau pengembalian dana akan dikembalikan ke rekening kartu kredit Anda.</li>
                                </ul>
                            </div>
                        </div>
                        <div class="form-group">
                            <input type="radio" name="tipe_methode" id="loket" class="input-hidden" value="4" />
                            <label for="loket">
                                <p>Loket</p>
                            </label>
                            <div id="methode4" class="desc-methode padding-30px-15px-30px-30px">
                                <ul class="list-style">
                                    <li class="margin-bottom-10px">Pembayaran hanya dapat dilakukan di loket IBID menggunakan kartu debet.</li>
                                    <li class="margin-bottom-10px">Anda akan menerima struk berisi barcode yang harus dibawa ketika datang ke loket.</li>
                                    <li class="margin-bottom-10px">Verifikasi pembayaran dilakukan oleh petugas loket.</li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </form>
               
            </div>
            <div class="col-md-5  col-sm-5">      
                <h2>Ringkasan Belanja</h2>
                <div class="shopping-history">
                    <p>Total Harga Barang <span>Rp. <?php echo number_format($this->cart->total()); ?></span></p>
                    <p>Biaya Layanan <span>Rp. 0</span></p>
                    <p class="total-shopping">Total Belanja <span>Rp. <?php echo number_format($this->cart->total()); ?></span></p>
                    <button class="btn btn-green" type="button" id="btnBayar">Bayar</button>
                </div>
            </div>
            <div class="col-md-12 col-sm-12"><a href="<?php site_url('beli-npl'); ?>" class="back-to"><i class="fa fa-angle-left"></i> Kembali ke Beli NPL</a></div>
			<form action="" method="POST" id="ccPost">
				<input type="hidden" id="thisAmount" name="amount" value="">
				<input type="hidden" id="thisInvoice" name="invoice" value="">
				<input type="hidden" name="TransactionId" value="">
				<input type="hidden" name="BiodataId" value="<?php echo $detailBiodata['BiodataId']; ?>">
				<input type="hidden" name="name" value="<?php echo $detailBiodata['first_name'].' '.$detailBiodata['last_name']; ?>">
				<input type="hidden" name="email" value="<?php echo $detailBiodata['Email']; ?>">
				<input type="hidden" name="phone" value="<?php echo $detailBiodata['Phone']; ?>">
				<input type="hidden" name="address" value="Jakarta">
			</form>
        </div>
    </div>
</section>
<script>
$(function() {
	function pembayaranVa(){
		alert('berhasil');	
	}
	
	$('#btnBayar').click(function() {
        $('#loading-payment').css('display', 'block');
		$(this).addClass('disabled').attr('disabled', true);
		$('#thisForm').submit();
	});

    $("input[name$='tipe_methode']").click(function() {
        var test = $(this).val();
        $(".desc-methode").hide();
        $("#methode" + test).css('display', 'inline-block');
    });
	
	$('#thisForm').submit(function(){
		tipe_methode = $("input[name$='tipe_methode']:checked").val();
		
		$.ajax( {
			url: "<?php echo site_url('npl/checkout'); ?>",
			dataType: "json",
			method: "POST",
			data: {
				tipe_methode: tipe_methode,
			},
			beforeSend: function( ) {
			},
			success: function( data ) {
				// console.log(data);
				if (data.aksi == 'redir')
					window.location = data.url;
				else if (data.aksi == 'cc'){
					$('#ccPost').attr('action', data.url);
					$("#ccPost input[name$='TransactionId']").val(data.TransactionId);
					$("#ccPost input[name$='amount']").val(data.bill);
					$("#ccPost input[name$='invoice']").val(data.code);
				}
				else if (data.aksi == 'va')
					window.location = data.url;
				else{
					console.log(data);
				}
			},
			complete: function(data){
				if (tipe_methode == 3)
					$('#ccPost').submit();
			}
		});
		return false;
		
	});
	
	$('#ccPost').submit(function(){
		thisAmount = $('#thisAmount').val();
		console.log(thisAmount);
		thisInvoice = $('#thisInvoice').val();
		console.log(thisInvoice);
	});
	
	
});
</script>
