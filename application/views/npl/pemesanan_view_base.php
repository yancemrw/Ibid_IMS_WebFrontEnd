<style>
.desc-npl p{
	border-bottom: 1px dotted #eee;
}
</style>
<section class="section section-auction">
    <div class="container">
        <div class="row">
            <div class="col-md-7 col-sm-6">
                <h2>Keuntungan Beli NPL di IBID?</h2>
                <ul class="auction-info clearfix">
                    <?php foreach($cms->titip as $keyCms => $valueCms) { ?>
                    <li class="item">
                        <div class="form-info display-block ic <?php echo $valueCms->ClassName; ?>"></div>
                        <div class="content-media">
                            <h2><?php echo $valueCms->Title; ?></h2>
                            <p><?php echo $valueCms->Content; ?></p>
                        </div>
                    </li>
                    <?php } ?>
                </ul>
            </div> 
            <div class="col-md-5 col-sm-6">      
                    <h2>Beli NPL</h2>
                    <div class="booking-schedule buying-npl">
                        <form class="form-filter" id="thisBuyNPL">
                            <h2>Pilih Objek Lelang</h2>
                            <div class="object-type clearfix">
                                <div class="form-group">
                                    <input name="tipe-object" id="type_1" class="input-hidden thisItem" value="6" checked="" type="radio" thisNplType="nplMobil">
                                    <label for="type_1">
                                        <div class="car-type">
                                            <img alt="" src="<?php echo base_url(); ?>assetsfront/images/icon/car-type.png">
                                        </div>
                                        <p>Mobil</p>
                                    </label>
                                </div>
                                <div class="form-group">
                                    <input name="tipe-object" id="type_2" class="input-hidden thisItem" value="7" type="radio" thisNplType="nplMotor">
                                    <label for="type_2">
                                        <div class="motorcycle-type">
                                            <img alt="" src="<?php echo base_url(); ?>assetsfront/images/icon/motorcycle-type.png">
                                        </div>
                                        <p>Motor</p>
                                    </label>
                                </div>
                                <div class="form-group">
                                    <input name="tipe-object" id="type_3" class="input-hidden thisItem" value="14" type="radio" thisNplType="nplHve">
                                    <label for="type_3">
                                        <div class="hve-type">
                                            <img alt="" src="<?php echo base_url(); ?>assetsfront/images/icon/hve-type.png">
                                        </div>
                                        <p>HVE</p>
                                    </label>
                                </div>
                                <div class="form-group">
                                    <input name="tipe-object" id="type_4" class="input-hidden thisItem" value="12" type="radio" thisNplType="nplGadget">
                                    <label for="type_4">
                                        <div class="gadget-type">
                                            <img alt="" src="<?php echo base_url(); ?>assetsfront/images/icon/gadget-type.png">
                                        </div>
                                        <p>Gadget</p>
                                    </label>
                                </div>
                            </div>
                            <h2>Pilih Type NPL</h2>
                            <div class="object-type clearfix object-npl">
                                <div class="form-group thisNplType nplMobil nplMotor nplHve">
                                    <input name="npl" id="npl-1" class="input-hidden thisType" value="0" type="radio">
                                    <label for="npl-1">
                                        <p>NPL Live</p>
                                    </label>
                                </div>
                                <div class="form-group thisNplType nplMobil nplMotor nplHve nplGadget">
                                    <input name="npl" id="npl-2" class="input-hidden thisType" value="1" type="radio">
                                    <label for="npl-2">
                                        <p>NPL Online</p>
                                    </label>
                                </div>
                                <div class="form-group thisNplType nplMobil nplMotor">
                                    <input name="npl" id="npl-3" class="input-hidden thisType" value="5" type="radio">
                                    <label for="npl-3">
                                        <p>NPL Unlimited</p>
                                    </label>
                                </div>
                            </div>
                            <ul class="choose-npl clearfix font-10px">
                                <li>
                                   
                                    <div class="form-group">
                                        <label>Jumlah</label>
                                        <input name="qty" class="form-control input-custom" type="number" min="1">
                                    </div>
                                </li>
                                <li>
                                    <div class="form-group form-calendar">
                                        <label>Jadwal Lelang</label>
                                        <select name="KotaLelang" class="form-control select-custom select2-hidden-accessible thisKota" tabindex="-2" aria-hidden="true">
                                            <option value="">-Kota/Cabang-</option>
											<?php foreach($cabang as $row){ ?>
											<option value="<?php echo $row['CompanyId']; ?>" ><?php echo trim(substr($row['CompanyName'],4)); ?></option>
											<?php } ?>
                                        </select>
										<select id="ScheduleId" class="form-control select-custom select2-hidden-accessible" tabindex="-1" aria-hidden="true">
											<option value="">-Tanggal-</option>
                                            <!-- option value="0">12/20/2017 12:00</option>
                                            <option value="1">15/20/2017 12:00</option>
                                            <option value="2">12/20/2017 12:00</option -->
                                        </select>
                                    </div>
                                </li>
                                <li>
                                    
                                    <div class="form-group">
                                        <label>Harga</label>
                                        <p class="price" id="totalPrice">Rp. -</p>
                                    </div>   
                                </li>
                            </ul>
                            <div class="text-center">
                                <button type="button" class="btn btn-violet btn-add-npl" id="btnAddToCart">Tambah <i class="fa fa-plus-circle"></i></button>
                            </div>
                        </form>
                    </div>
                    <div class="content-add-npl">
                        <ul class="clearfix" id="thisItemCart">
							<?php 
							foreach ($this->cart->contents() as $items){ 
								$jadwal = ucfirst(strtolower($items['name'])).', '.$items['options']['thisDate'];
			
								if ($items['options']['tipeLelangId'] == 0) @$tipeLelang = 'Live';
								else if ($items['options']['tipeLelangId'] == 1) @$tipeLelang = 'Online';
								else if ($items['options']['tipeLelangId'] == 5) {
									$jadwal = '-';
									@$tipeLelang = 'Unlimited';
								}
								
								if ($items['options']['ItemId'] == 6){
									$h2Class = 'npl-car';
									$imgPath = base_url().'assetsfront/images/icon/car-white.png';
								} else if ($items['options']['ItemId'] == 7){
									$h2Class = 'npl-motorcycle';
									$imgPath = base_url().'assetsfront/images/icon/motorcycle-calendar.png';
								} else if ($items['options']['ItemId'] == 14){
									$h2Class = 'npl-hve';
									$imgPath = base_url().'assetsfront/images/icon/hve-white.png';
								} else if ($items['options']['ItemId'] == 12){
									$h2Class = 'npl-gadget';
									$imgPath = base_url().'assetsfront/images/icon/gadget-calendar.png';
								} else {
									$h2Class = '';
									$imgPath = '';
								}
								
								echo '
								<li class="'.$items['rowid'].' width-155px">
									<h2 class="'.@$h2Class.'">
										<img src="'.@$imgPath.'" alt=""> '.@$items['options']['Item'].' 
										<a href="#" class="delete-npl" thisrowid="'.@$items['rowid'].'" onclick="return thisremove(\''.@$items['rowid'].'\')"></a>
									</h2>
									<div class="desc-npl">
										<p>NPL '.@$tipeLelang.'</p>
										<p>'.@$jadwal.'</p>
										<p>'.@$items['qty'].'</p>
										<p>Rp. '.number_format(@$items['subtotal']).'</p>
									</div>
								</li>';
							} ?>
							<!-- 
                            <li>
                                <h2 class="npl-car">
                                    <img src="<?php echo base_url('assetsfront/images/icon/car-white.png'); ?>" alt=""> Mobil 
                                    <a href="" class="delete-npl"></a>
                                </h2> 
                                <div class="desc-npl">
                                    <p>NPL Unlimited</p>
                                    <p>-</p>
                                    <p>2</p>
                                    <p>Rp. 5,000,000</p>
                                </div>
                            </li>
                            <li>
								<h2 class="npl-motorcycle">
									<img src="<?php echo base_url('assetsfront/images/icon/motorcycle-calendar.png'); ?>" alt=""> Motor 
									<a href="" class="delete-npl"></a>
								</h2>
								<div class="desc-npl">
									<p>NPL Online</p>
									<p>Jakarta, 14 Agustus 2018</p>
									<p>2</p>
									<p>Rp. 10,000,000</p>
								</div>
							</li>
							<li>
                                <h2 class="npl-hve">
                                    <img src="<?php echo base_url('assetsfront/images/icon/hve-white.png'); ?>" alt=""> HVE 
                                    <a href="" class="delete-npl"></a>
                                </h2>  
                                <div class="desc-npl">
                                    <p>NPL Online</p>
                                    <p>Jakarta, 14 Agustus 2018</p>
                                    <p>2</p>
                                    <p>Rp. 10,000,000</p>
                                </div>
                            </li>
                            <li>
								<h2 class="npl-gadget">
									<img src="<?php echo base_url('assetsfront/images/icon/gadget-calendar.png'); ?>" alt=""> Gadget 
									<a href="" class="delete-npl"></a>
								</h2>
								<div class="desc-npl">
									<p>NPL Unlimited</p>
									<p>-</p>
									<p>2</p>
									<p>Rp. 5,000,000</p>
								</div>
							</li>
							-->
						</ul>
                        <div class="total-price text-right">
                            <p id="thisCartTotal"><span>Total</span> Rp. <?php echo number_format($this->cart->total()); ?></p>
                        </div>
                        <div class="button-npl text-right">
                            <button class="btn btn-green" onclick="location.href='<?php echo site_url('npl/metodepembayaran'); ?>'" type="button">Lanjutkan Pembayaran <i class="fa fa-angle-right"></i></button>
                        </div>
                    </div>
			</div>
        </div>
    </div>
</section>

<script>
var count_slide = '<?php echo count($cms->titip); ?>';
$('.auction-info').slick({
    dots: false,
    infinite: false,
    speed: 300,
    prevArrow: false,
    nextArrow: false,
    slidesToShow: count_slide,
    slidesToScroll: count_slide,
    responsive: [
        {
            breakpoint: 768,
            settings: {
                slidesToShow: 1,
                slidesToScroll: 1,
                dots: true,
                prevArrow: false,
                nextArrow: false
            }
        }
    ]
});

function formatCurrency(num) {
    num = num.toString().replace(/\$|\,/g, '');
    if (isNaN(num)){
        num = "0";
    }

    sign = (num == (num = Math.abs(num)));
    num = Math.floor(num * 100 + 0.50000000001);
    cents = num % 100;
    num = Math.floor(num / 100).toString();

    if (cents < 10){
        cents = "0" + cents;
    }
    for (var i = 0; i < Math.floor((num.length - (1 + i)) / 3); i++){
        num = num.substring(0, num.length - (4 * i + 3)) + ',' + num.substring(num.length - (4 * i + 3));
    }

    return (((sign) ? '' : '-') + '' + num + '.' + cents);
}

function getJadwalAms() {
	itemLelang = $('.thisItem:checked').val();
	tipeLelang = $('.thisType:checked').val();
	cabangId = $('.thisKota').val();
	// startdate = '<?php echo date('Y-m-d'); ?>';
	startdate = '2018-06-01';
	
	if (itemLelang != '' && tipeLelang != '' && tipeLelang != null && cabangId != ''){
		if (tipeLelang == '5') tipeLelang = '';
		
		$.ajax( {
			// url: "http://ibid-ams-schedule.stagingapps.net/api/schedulelist",
			url: "<?php echo linkservice('AMSSCHEDULE') .'schedulelist/'; ?>",
			dataType: "json",
			data: {
				// thisData
				type: tipeLelang,
				item: itemLelang,
				company_id: cabangId,
				startdate: startdate,
				notFinished : 1,
			},
			beforeSend: function( ) {
				// $('#ScheduleId').css('display','none');
			},
			success: function( data ) {
				$('#ScheduleId option').remove();
				$('#ScheduleId')
					.append($("<option></option>")
					.attr("value",'')
					.text("-Pilih-"));
				
				thisArr = data.data;
				for(i=0; i<thisArr.length; i++){
					row = thisArr[i];
					$('#ScheduleId')
						.append($("<option></option>")
						.attr("value",row.id)
						.text(row.date + ' '+row.waktu.substring(0, 8)));
						
					// console.log(thisArr[i]);
					
				}
			},
			complete: function(){
				// $('#ScheduleId').css('display','block');
			}
		});
	}
	
}

function getPrice() {
	itemLelang = $('.thisItem:checked').val();
	tipeLelang = $('.thisType:checked').val();
	if (itemLelang != '' && tipeLelang != '' && tipeLelang){
		$.ajax( {
			url: "<?php echo linkservice('master') .'item/detail/'; ?>",
			dataType: "json",
			data: { 
				itemid: itemLelang,
			},
			beforeSend: function( ) {
				// $('.biodataLoading').css('display','block');
			},
			success: function( thisData ) {
				if (tipeLelang == 5)
					$('#totalPrice').html('Rp. '+formatCurrency(thisData.data.PriceUnlimitedNPL));
				else 
					$('#totalPrice').html('Rp. '+formatCurrency(parseInt(thisData.data.PriceNPL)));
			},
			complete: function(){
				// $('.biodataLoading').css('display','none');
			}
		});
	}
	
}

function thisremove(thisRowId) {
	$('.'+thisRowId).css('display','none');
	// alert('kesini');
	$.ajax( {
		url: "<?php echo site_url('thisCart/remove'); ?>",
		dataType: "json",
		type: "POST", 
		data: {
			thisRowId: thisRowId,
		},
		success: function( data ) {
			$('#thisItemCart').html(data.allItem);
			$('#thisCartTotal').html('<span>Total</span> Rp. ' + data.totalHarga);
		},
	});
	return false;
}

function getNplType() {
	$('.thisNplType').css('display', 'none');
	thisNplType = $('.thisItem:checked').attr('thisNplType');
	$('.'+thisNplType).css('display', 'block');
	// console.log(thisNplType);
}

$(function() {
	$('.thisItem').click(function(){ getJadwalAms(); getPrice(); getNplType(); });
	$('.thisType').click(function(){ getJadwalAms(); getPrice(); });
	$('.thisKota').change(function(){ getJadwalAms(); });
	
	$('#btnAddToCart').click(function(){
		TipeObject = $("#thisBuyNPL input[name=tipe-object]:checked").val();
		
		TipeNPL = $("#thisBuyNPL input[name=npl]:checked").val();
		
		KotaLelang = $("#thisBuyNPL select[name=KotaLelang]").val();
		KotaLelangTxt = $(".thisKota option:selected").text();
		
		ScheduleId = $("#ScheduleId").val();
		ScheduleIdTxt = $("#ScheduleId option:selected").text();
		
		Qty = $("#thisBuyNPL input[name=qty]").val();
		
		$.ajax( {
			url: "<?php echo site_url('thisCart/add'); ?>",
			dataType: "json",
			method: 'POST', 
			data: {
				TipeObject: TipeObject,
				TipeNPL: TipeNPL,
				KotaLelang: KotaLelang,
				KotaLelangTxt: KotaLelangTxt,
				ScheduleId: ScheduleId,
				ScheduleIdTxt: ScheduleIdTxt,
				Qty: Qty,
			},
			beforeSend: function( ) {
				$('#btnAddToCart').addClass('disabled');
			},
			success: function( data ) {
				$('#thisItemCart').html(data.allItem);
				$('#thisCartTotal').html('<span>Total</span> Rp. ' + data.totalHarga);
			},
			complete: function(){
				$('#btnAddToCart').removeClass('disabled');
			}
		});
		
		return false;
	});
	
	$('.delete-npl').click(function(){
		// aelrt('masuk sini');
		$(this).parent().parent().css('display','none');
	});

	getPrice();
});
</script>
