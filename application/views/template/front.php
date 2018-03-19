<section class="section section-search bg-grey">
   <div class="tab-search tab-search-mobile">
      <ul class="nav nav-tabs" role="tablist">
         <li role="presentation" class="active"><a href="#tab-mobile-1" aria-controls="tab-1" role="tab" data-toggle="tab">Cari Kendaraan</a></li>
         <li role="presentation"><a href="#tab-mobile-2" aria-controls="tab-2" role="tab" data-toggle="tab">Jadwal Lelang</a></li>
      </ul>
      <div class="tab-content">
         <div role="tabpanel" class="tab-pane search-transport active" id="tab-mobile-1">
            <form class="form-inline clearfix">

				<?php foreach($formDinamis as $row){ echo $row['typeInput']; } ?>
				<!-- div class="form-group clearfix"> namaLabel idInput
				  <select id="ItemId" class="select-custom form-control">
					 <?php foreach($itemType as $row){ ?>
					 <option value="<?php echo $row['ItemId']; ?>"><?php echo $row['ItemName']; ?></option>
					 <?php } ?>
				  </select>
				</div>
				<div id="thisSearchBrand" class="form-group clearfix">
					<div class="form-group clearfix">
					  <select class="select-custom form-control">
						 <option>Merk</option>
					  </select>
					</div>
					<div class="form-group clearfix">
					  <select class="select-custom form-control">
						 <option>Seri</option>
					  </select>
					</div>
				</div -->
				<div class="form-group">
				  <button class="btn btn-lg btn-green btn-search" disabled>Cari</button>
				</div>

            </form>
         </div>
         <div role="tabpanel" class="tab-pane" id="tab-mobile-2">
            <form class="form-inline clearfix">
               <div class="form-group">
                  <select class="select-custom form-control" id="thisCabang">
                     <!-- option value ="" ></option>
                     <option value ="" >Bandung</option>
                     <option value ="" >Jakarta</option -->
                     <?php foreach($cabang as $row){ ?>
                     <option value="<?php echo $row['CompanyId']; ?>" ><?php echo ucwords(substr(strtolower($row['CompanyName']), 4)); ?></option>
                     <?php } ?>
                  </select>
                  <label>Kota</label>
               </div>
               <div class="form-group clearfix">
                  <select class="select-custom form-control select-type" id="thisItem">
                     <option value="car-type"></option>
                     <option value="hve-type"></option>
                     <option value="motorcycle-type"></option>
                     <option value="gadget-type"></option>
                  </select>
               </div>
               <div class="form-group">
                  <select class="select-custom form-control select-address" id="thisDate">
                     <option value ="" ></option>
                     <!-- option value ="" >Jakarta Barat, Jl. Bintaro Mulia, 14/09</option>
                     <option value ="" >Jakarta Barat, Jl. Bintaro Mulia, 14/09</option -->
                  </select>
                  <label>Jadwal</label>
               </div>
               <div class="form-group">
                  <button class="btn btn-lg btn-green btn-search" disabled>Cari</button>
               </div>
            </form>
         </div>
      </div>
   </div>
</section>
<section class="section bg-grey">
   <div class="container-fluid">
      <div class="row">
         <div class="col-md-12">
            <h2 class="title">Kenapa IBID?</h2>
         </div>
         <div class="col-md-12">
            <div class="why-ibid">
               <div class="item active">
                  <div class="box-section">
                     <div class="box-image icn icn-frekwensi"></div>
                     <h2>Frekuensi Lelang</h2>
                     <p>Lebih dari 50 kali lelang perbulan</p>
                  </div>
               </div>
               <div class="item">
                  <div class="box-section">
                     <div class="box-image icn icn-jaringan-lelang"></div>
                     <h2>Jaringan Lelang</h2>
                     <p>Lebih dari 30 kota</p>
                  </div>
               </div>
               <div class="item">
                  <div class="box-section">
                     <div class="box-image icn icn-opsi-lelang"></div>
                     <h2>Opsi Lelang</h2>
                     <p>Onsite, Live & Online Auction</p>
                  </div>
               </div>
               <div class="item">
                  <div class="box-section">
                     <div class="box-image icn icn-car-valuation"></div>
                     <h2>Astra Car Valuation</h2>
                     <p>Inspeksi kendaraan secara saintifik</p>
                  </div>
               </div>
               <div class="item ">
                  <div class="box-section">
                     <div class="box-image icn icn-map"></div>
                     <h2>MAP (Market Auction Price)</h2>
                     <p>Acuan harga pasar</p>
                  </div>
               </div>
               <div class="item ">
                  <div class="box-section">
                     <div class="box-image icn icn-auto-bid"></div>
                     <h2>Auto BID</h2>
                     <p>Tawar harga secara otomatis</p>
                  </div>
               </div>
            </div>
         </div>
      </div>
   </div>
</section>
<section class="section background-white">
   <div class="container">
      <div class="row">
         <div class="col-md-12">
            <h2 class="title">Mobil Rekomendasi</h2>
         </div>
         <div class="col-md-12">
            <div class="section-recommend clearfix">
               <div class="item col-md-4 ">
                  <div class="box-recommend">
                     <a href="javascript:void(0)">
                        <div class="thumbnail">
                           <div class="thumbnail-custom">
                              <img src="<?php echo base_url('assetsfront/images/background/B1602UOY.JPG'); ?>" title="" alt="" />
                           </div>
                           <div class="overlay-grade">
                              Grade <span>B</span>
                           </div>
                        </div>
                        <h2>TOYOTA KIJANG INNOVA 2.0 G MINIBUS AT</h2>
                        <span>2012</span>
                        <p><span>Jadwal</span> <span class="fa fa-calendar"></span> <span>7 Februari 2018</span></p>
                        <p><span>Lokasi</span> <span class="fa fa-map-marker"></span> <span>Jakarta</span></p>
                     </a>
                  </div>
               </div>
               <div class="item col-md-4">
                  <div class="box-recommend">
                     <a href="javascript:void(0)">
                        <div class="thumbnail">
                           <div class="thumbnail-custom">
                              <img src="<?php echo base_url('assetsfront/images/background/B1553SAG.JPG'); ?>" title="" alt="" />
                           </div>
                           <div class="overlay-grade">
                              Grade <span>B</span>
                           </div>
                        </div>
                        <h2>TOYOTA VIOS 1.5 G SEDAN AT</h2>
                        <span>2012</span>
                        <p><span>Jadwal</span> <span class="fa fa-calendar"></span> <span>13 Januari 2018</span></p>
                        <p><span>Lokasi</span> <span class="fa fa-map-marker"></span> <span>Jakarta</span></p>
                     </a>
                  </div>
               </div>
               <div class="item col-md-4 ">
                  <div class="box-recommend">
                     <a href="javascript:void(0)">
                        <div class="thumbnail">
                           <div class="thumbnail-custom">
                              <img src="<?php echo base_url('assetsfront/images/background/B1819BRB.JPG'); ?>" title="" alt="" />
                           </div>
                           <div class="overlay-grade">
                              Grade <span>B</span>
                           </div>
                        </div>
                        <h2>TOYOTA KIJANG INNOVA 2.5 V MINIBUS AT</h2>
                        <span>2012</span>
                        <p><span>Jadwal</span> <span class="fa fa-calendar"></span> <span>7 Februari 2018</span></p>
                        <p><span>Lokasi</span> <span class="fa fa-map-marker"></span> <span>Jakarta</span></p>
                     </a>
                  </div>
               </div>
            </div>
         </div>
         <div class="col-md-12 text-center show-more hidden-xs">
            <button class="btn btn-lg btn-green" disabled>Lihat Semua</button>
         </div>
      </div>
   </div>
</section>
<section class="section live-auction">
   <div class="container">
      <div class="row">
         <div class="overlay-live-auction">
            <h2>Live Auction</h2>
            <p>Berhalangan hadir di lokasi lelang? <span>Manfaatkan opsi Live Auction untuk mengikuti lelang dari mana saja melalui gadget secara real time.</span></p>
            <button class="btn btn-lg btn-outline" disabled>Informasi Detail</button>
         </div>
      </div>
   </div>
</section>
<section class="section how-to-bid background-white">
   <div class="container-fluid">
      <div class="row">
         <div class="col-md-12">
            <h2 class="title">Cara Ikut Lelang & Titip Jual</h2>
         </div>
         <div class="tab-lelang">
            <ul class="nav nav-tabs" role="tablist">
               <li role="presentation" class="active"><a href="#tab-lelang-1" aria-controls="tab-lelang-1" role="tab" data-toggle="tab">Cara Ikut Lelang</a></li>
               <li role="presentation"><a href="#tab-lelang-2" aria-controls="tab-lelang-2" role="tab" data-toggle="tab">Cara Titip Jual</a></li>
            </ul>
            <div class="tab-content clearfix">
               <div role="tabpanel" class="tab-pane active clearfix" id="tab-lelang-1">
                  <div class="howTo-bid">
                     <div class="item col-md-2">
                        <div class="box-section">
                           <div class="box-image icn icn-check-jadwal"></div>
                           <h2>Cari kendaraan dan cek jadwal lelang</h2>
                        </div>
                     </div>
                     <div class="item col-md-2">
                        <div class="box-section">
                           <div class="box-image icn icn-check-detail"></div>
                           <h2>Cek detail kendaraan</h2>
                        </div>
                     </div>
                     <div class="item col-md-2">
                        <div class="box-section">
                           <div class="box-image icn icn-pay-registration"></div>
                           <h2>Registrasi & Beli Nomor Peserta Lelang (NPL)</h2>
                        </div>
                     </div>
                     <div class="item col-md-2">
                        <div class="box-section">
                           <div class="box-image icn icn-ikut-lelang"></div>
                           <h2>Ikut Lelang</h2>
                        </div>
                     </div>
                     <div class="item col-md-2">
                        <div class="box-section">
                           <div class="box-image icn icn-pelunasan"></div>
                           <h2>Pelunasan atau Pengembalian deposit</h2>
                        </div>
                     </div>
                     <div class="item col-md-2">
                        <div class="box-section">
                           <div class="box-image icn icn-pengambilan-kendaraan"></div>
                           <h2>Pengembalian unit yang dimenangkan</h2>
                        </div>
                     </div>
                  </div>
               </div>
               <div role="tabpanel" class="tab-pane clearfix" id="tab-lelang-2">
                  <div class="col-md-2">
                     <div class="box-section">
                        <div class="box-image icn icn-regis-login"></div>
                        <h2>Registrasi atau login</h2>
                     </div>
                  </div>
                  <div class="col-md-2">
                     <div class="box-section">
                        <div class="box-image icn icn-check-jadwal"></div>
                        <h2>Daftarkan kendaraan dan pilih jadwal inspeksi</h2>
                     </div>
                  </div>
                  <div class="col-md-2">
                     <div class="box-section">
                        <div class="box-image icn icn-bawa-mobil-dokumen"></div>
                        <h2>Bawa unit dan dokumen ke IBID</h2>
                     </div>
                  </div>
               </div>
            </div>
         </div>
         <div class="col-md-12 text-center show-more">
            <button class="btn btn-lg btn-green" disabled>Info Detail</button>
         </div>
      </div>
   </div>
</section>
<section class="section background-white">
   <div class="container-fluid">
      <div class="margin-right-min15px margin-left-min15px">
         <div class="col-md-6 auction-left">
            <div class="overlay-live-auction">
               <h2><?php echo $content->map->Title;?></h2>
               <?php echo $content->map->Content; ?>
               <button class="btn btn-lg btn-outline" disabled>Info Detail</button>
            </div>
         </div>
         <div class="col-md-6 auction-right">
            <div class="overlay-live-auction">
               <h2><?php echo $content->icar->Title;?></h2>
               <?php echo $content->icar->Content;?>
               <button class="btn btn-lg btn-outline" disabled>Info Detail</button>
            </div>
         </div>
      </div>
   </div>
</section>
<section class="section testimoni background-white">
   <div class="container">
      <div class="row">
         <div class="col-md-12 text-center">
            <h2 class="title">Testimoni</h2>
         </div>
         <div class="col-md-12">
            <div class="testimoni-slide">
               <?php foreach($content->testimoni as $keyTesti => $valTesti) { ?>
               <div class="item clearfix active">
                  <div class="content-testimoni">
                     <a href="#">
                        <div class="box-img-slide">
                           <img src="<?php echo linkservice('cms').'uploads/contents/'.$valTesti->Photo; ?>" class="img-responsive">
                        </div>
                        <h2><?php echo $valTesti->Title; ?></h2>
                        <p class="text-align-left">
                           <span><?php echo $valTesti->Subtitle; ?></span>
                           <?php echo $valTesti->Content; ?>
                        </p>
                     </a>
                  </div>
               </div>
               <?php } ?>
            </div>
         </div>
      </div>
   </div>
</section>
<section class="section bg-grey section-autobid">
   <div class="container">
      <div class="row">
         <div class="content-autobid clearfix">
            <div class="col-md-7">
               <h2><?php echo $content->autobid->Title; ?></h2>
               <p><?php echo $content->autobid->Content; ?> <span>Download sekarang!</span></p>
               <a href="javascript:void(0)" class="icn icn-google-play link-disabled"></a>
            </div>
            <div class="col-md-5">
               <img alt="" src="<?php echo base_url('assetsfront/images/background/bg-hand.png'); ?>" class="image-footer img-responsive" />
            </div>
         </div>
      </div>
   </div>
</section>

<script>
   function preload(opacity) {
      if(opacity <= 0) {
         showContent();
      }
      else {
         document.getElementById('preloader').style.opacity = opacity;
         window.setTimeout(function() { preload(opacity - 0.05) }, 100);
      }
   }

   document.addEventListener("DOMContentLoaded", function () {
      document.getElementById('preloader').style.display = 'block';
      preload(1);
   });
   
    Number.prototype.padLeft = function(base,chr){
        var  len = (String(base || 10).length - String(this).length)+1;
        return len > 0? new Array(len).join(chr || '0')+this : this;
    }
   
$(function(){
    
    $('.filterJadwal').change(function(){
        thisCabang = $('#thisCabang').val();
        thisItem = $('#thisItem').val();
        
        if (thisItem == 'car-type') item = 6;
        else if (thisItem == 'motorcycle-type') item = 7;
        else if (thisItem == 'gadget-type') item = 12;
        else if (thisItem == 'hve-type') item = 14;
        else item = 0;
        
        d = new Date();
        dformat = [d.getFullYear(), (d.getMonth()+1).padLeft(), d.getDate().padLeft()].join('-');
        // dformat = '2018-01-01';
        
        if (thisCabang != '' && item > 0){
            $.ajax({
                // url: 'http://ibid-ams-schedule.stagingapps.net/api/schedulelist',
                url: '<?php echo linkservice('AMSSCHEDULE') .'schedulelist/'; ?>',
                dataType: 'json',
                method: 'GET',
                data: {
                    item: item,
                    company_id: thisCabang,
                    startdate: dformat,
                },
                success: function(doc) {
                    html = "";
                    thisOption = doc.data;
                    for(i=0; i<thisOption.length; i++){
                        html = html + '<option value="'+thisOption[i].id+'">'+thisOption[i].date+' '+(thisOption[i].waktu).substring(0, 8);+'</option>';
                    }
                    $('#thisDate').html(html);
                }
            });
        }
        
    }); 
	
	$('.filterJadwal').change();
});
</script>