<section class="section section-search bg-grey">
   <div class="tab-search tab-search-mobile">
      <ul class="nav nav-tabs" role="tablist">
         <li role="presentation" class="active"><a href="#tab-mobile-1" aria-controls="tab-1" role="tab" data-toggle="tab">Cari Kendaraan</a></li>
         <li role="presentation"><a href="#tab-mobile-2" aria-controls="tab-2" role="tab" data-toggle="tab">Jadwal Lelang</a></li>
      </ul>
      <div class="tab-content">
         <div role="tabpanel" class="tab-pane search-transport active" id="tab-mobile-1">
            <form id="search-object" class="form-inline clearfix" action="<?php echo site_url('cari-lelang'); ?>" method="POST" data-provide="validation">
   				<input type="hidden" value="find_unit" name="from_front" />
               <?php foreach($formDinamis as $row) { echo $row['typeInput']; } ?>
   				<div class="form-group">
                  <button id="cari-object" class="btn btn-lg btn-green btn-search">Cari</button>
   				</div>
            </form>
         </div>
         <div role="tabpanel" class="tab-pane" id="tab-mobile-2">
            <form id="search-jadwal" class="form-inline clearfix" action="<?php echo site_url('cari-lelang'); ?>" method="POST" data-provide="validation">
               <input type="hidden" value="auction_date" name="from_front" />
               <div class="form-group">
                  <select class="select-custom form-control" name="thisCabang" id="thisCabang">
                     <option value="">Pilih Kota</option>
                     <option value="2"><?php echo ucwords(substr(strtolower('IBID JAKARTA'), 4)); ?></option>
                     <?php /*foreach($cabang as $row){ if ($row['CompanyId'] != 2){ ?>
                     <option value="<?php echo $row['CompanyId']; ?>" ><?php echo ucwords(substr(strtolower($row['CompanyName']), 4)); ?></option>
                     <?php } }*/ ?>
                  </select>
                  <label>Kota</label>
               </div>
               <div class="form-group clearfix">
                  <select class="select-custom form-control select-type" name="thisItem" id="thisItem">
                     <option value="car-type"></option>
                     <option value="hve-type"></option>
                     <option value="motorcycle-type"></option>
                     <option value="gadget-type"></option>
                  </select>
               </div>
               <div class="form-group">
                  <select class="select-custom form-control select-address" name="thisDate" id="thisDate">
                     <option value="">Pilih Jadwal</option>
                  </select>
                  <label>Jadwal</label>
               </div>
               <div class="form-group">
                  <button id="cari-jadwal" class="btn btn-lg btn-green btn-search">Cari</button>
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
               <?php foreach($content->kenapa_ibid as $keyWhy => $valWhy) { ?>
               <div class="item">
                  <div class="box-section">
                     <div class="<?php echo $valWhy->Subtitle; ?>"></div>
                     <h2><?php echo $valWhy->Title; ?></h2>
                     <p><?php echo $valWhy->Content; ?></p>
                  </div>
               </div>
               <?php } ?>
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
            <div class="section-recommend clearfix" id="showrelated">
               <!--div class="item col-md-4 ">
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
               </div-->
            </div>
         </div>
         <div class="col-md-12 text-center show-more hidden-xs">
            <button class="btn btn-lg btn-green" onclick="location.href='<?php echo site_url('cari-lelang?unit_rec=3'); ?>';" disabled>Lihat Semua</button>
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
            <button class="btn btn-lg btn-outline" onclick="location.href='<?php echo site_url('panduan-lelang/live'); ?>';">Informasi Detail</button>
         </div>
      </div>
   </div>
</section>
<section class="section how-to-bid background-white">
   <div class="container-fluid">
      <div class="row">
         <div class="col-md-12">
            <h2 class="title">Cara Ikut Lelang & Titip Lelang</h2>
         </div>
         <div class="tab-lelang">
            <ul class="nav nav-tabs" role="tablist">
               <li role="presentation" class="active"><a href="#tab-lelang-1" aria-controls="tab-lelang-1" role="tab" data-toggle="tab">Cara Ikut Lelang</a></li>
               <li role="presentation"><a href="#tab-lelang-2" aria-controls="tab-lelang-2" role="tab" data-toggle="tab">Cara Titip Lelang</a></li>
            </ul>
            <div class="tab-content clearfix">
               <div role="tabpanel" class="tab-pane active clearfix" id="tab-lelang-1">
                  <div class="howTo-bid">
                     <?php foreach($content->cara_lelang as $keyLelang => $valLelang) { ?>
                     <div class="item col-md-2">
                        <div class="box-section">
                           <div class="<?php echo $valLelang->Subtitle; ?>"></div>
                           <h2><?php echo $valLelang->Content; ?></h2>
                        </div>
                     </div>
                     <?php } ?>
                  </div>
               </div>
               <div role="tabpanel" class="tab-pane clearfix" id="tab-lelang-2">
                  <?php foreach($content->cara_titip as $keyTitip => $valTitip) { ?>
                  <div class="col-md-2">
                     <div class="box-section">
                        <div class="<?php echo $valTitip->Subtitle; ?>"></div>
                        <h2><?php echo $valTitip->Content; ?></h2>
                     </div>
                  </div>
                  <?php } ?>
               </div>
            </div>
         </div>
         <div class="col-md-12 text-center show-more">
            <button class="btn btn-lg btn-green" onclick="location.href='<?php echo site_url('panduan-lelang'); ?>';">Info Detail</button>
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
               <p><?php echo $content->autobid->Content; ?><!--span>Download sekarang!</span--></p>
               <!--a href="javascript:void(0)" class="icn icn-google-play link-disabled"></a-->
            </div>
            <div class="col-md-5">
               <img alt="" src="<?php echo base_url('assetsfront/images/background/bg-hand.png'); ?>" class="image-footer img-responsive" />
            </div>
         </div>
      </div>
   </div>
</section>

<!-- line modal -->
<div class="modal fade" id="modalTemp" tabindex="-1" role="dialog" aria-labelledby="modalLabel" aria-hidden="true">
   <div class="modal-dialog">
      <div class="modal-content">
         <div class="modal-body">
            <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span><span class="sr-only">Close</span></button>
            <!-- content goes here -->
            <div class="modalTemporary">
               <img src="assetsfront/images/background/luarjakarta.png">
               <h3>Selamat datang di website baru IBID,</h3>
               <p>Website ini baru mencakup wilayah Jakarta dan Sekitarnya, untuk wilayah di luar JABODETABEK dapat klik tombol "Area lainnya"</p>
               <div> 
                  <a class="btn btn-big btn-success" data-dismiss="modal" href="javascript:void(0)">Area Jabodetabek</a>
                  <a class="btn btn-default" data-dismiss="modal" href="javascript:void(0)" onclick="location.href='http://ext.ibid.astra.co.id'">Area Lainnya</a>
               </div>
            </div>
         </div>
      </div>
   </div>
</div>

<script>
// MODAL POPUP TEMPORARY
/*$(window).on('load',function() {
   var pophm = localStorage.getItem('POPHM');
   if(pophm === null || pophm === 'false') {
      localStorage.setItem('POPHM', true);*/
      setTimeout(function(){
         $('#modalTemp').modal('show');
      }, 1000);  
   /*} 
});*/

// set active menu if to homepage
setActiveMenu('home');

// load mobil nabrak plang iBid
document.addEventListener("DOMContentLoaded", function () {
   document.getElementById('preloader').style.display = 'block';
   preload(1);
});

Number.prototype.padLeft = function(base,chr){
   var  len = (String(base || 10).length - String(this).length)+1;
   return len > 0? new Array(len).join(chr || '0')+this : this;
}
   
$(function() {
   // add notice
   bootoast.toast({
            message: "30 menit ke depan akan ada maintenance sistem. Terima kasih atas perhatiannya",
            type: 'warning',
            position: 'top-center',
            timeout: 25
   });
   
   $('#thisCabang').change(function() {
      thisCabang = $(this).val();
      thisItem = $('#thisItem').val();

      if (thisItem == 'car-type') item = 6;
      else if (thisItem == 'motorcycle-type') item = 7;
      else if (thisItem == 'gadget-type') item = 12;
      else if (thisItem == 'hve-type') item = 14;
      else item = 0;

      d = new Date();
      dformat = [d.getFullYear(), (d.getMonth()+1).padLeft(), d.getDate().padLeft()].join('-');
      // dformat = '2018-01-01';

      if (thisCabang != '' && item > 0) {
         $.ajax({
            url: '<?php echo linkservice('AMSSCHEDULE') .'schedulelist'; ?>',
            dataType: 'JSON',
            method: 'GET',
            data: {
              'startdate' : '<?php echo date('Y-m-d'); ?>',
              'notFinished' : 1,
            },
            success: function(doc) {
               var html;
               if(doc.data.length > 0) {
                  html = '<option value="">Pilih Jadwal</option>';
                  for(var y = 0; y < doc.data.length; y++) {
                     thisOption = doc.data[y];
                     if(thisCabang == thisOption.company_id) {
                        html += '<option value="'+thisOption.id+'">'+thisOption.date+' '+(thisOption.waktu).substring(0, 5);+'</option>';
                     }
                  }
               }
               else {
                  html = '<option value="">Tidak Ada Jadwal</option>';
               }
               $('#thisDate').html(html);
            }
         });
      }
   });

   // handle filter cari kendaraan
   $('#cari-object').click(function(e) {
      e.preventDefault();
      var ele = $(this).parent().parent();
      if(ele[0][0].value === '' && ele[0][1].value === '' && ele[0][2].value === '') {
         bootoast.toast({
            message: "Pilih Salah Satu Filter Cari Kendaraan",
            type: 'warning',
            position: 'top-center',
            timeout: 3
         });
      }
      else {
         $(this).attr('disabled', true);
         $('#cari-object').html('cari <i class="fa fa-spin fa-refresh" style="position:absolute; top:18px; right:80px;"></i>');
         ele.submit();
      }
   });

   // handle filter cari jadwal lelang
   $('#search-jadwal').submit(function(e) {
      if($('#thisCabang').val() === '') {
         bootoast.toast({
            message: "Pilih Kota",
            type: 'warning',
            position: 'top-center',
            timeout: 3
         });
         e.preventDefault();
      }
      else if($('#thisDate').val() === '') {
         bootoast.toast({
            message: "Pilih Jadwal",
            type: 'warning',
            position: 'top-center',
            timeout: 3
         });
         e.preventDefault();
      }
      else {
         $('#cari-jadwal').html('cari <i class="fa fa-spin fa-refresh" style="position:absolute; top:18px; right:80px;"></i>').attr('disabled', true);
      }
   });

   // create related product by object, merk, price
   window.classSlickNames = '.section-recommend';
   $.ajax({
      type: 'GET',
      url: '<?php echo linkservice('stock')."rekomendasi/Get"; ?>',
      data: 'top=3',
      beforeSend: function() {
         for(var i = 0; i < 3; i++) {
            var content =  '<div class="item col-md-4">'+
                           '<div class="box-recommend">'+
                           '<a href="#">'+
                           '<div class="thumbnail">'+
                           '<div class="thumbnail-custom">'+
                           '<img src="<?php echo base_url('assetsfront/images/background/default.png'); ?>" height="197px" />'+
                           '</div>'+
                           '<div class="overlay-grade">'+
                           '<span></span>'+
                           '</div>'+
                           '<p class="overlay-lot">LOT</p>'+
                           '</div>'+
                           '<h2></h2>'+
                           '<span></span><span class="price"></span>'+
                           '<p><span></span><span class="fa fa-calendar"></span><span></span></p>'+
                           '<p><span></span><span class="fa fa-map-marker"></span><span></span></p>'+
                           '</a>'+
                           '</div>'+
                           '</div>';
            $('#showrelated').append(content);
         }
         mobileSlick(3, classSlickNames);
      },
      success: function(data) {
         $(classSlickNames).slick('unslick');
         $('#showrelated').children().remove();
         var data = data.data,
         sessiond = "<?php echo ($userdata !== null) ? 'TRUE' : 'FALSE'; ?>",
         sessionId = '<?php echo ($userdata !== null) ? $userdata['UserId'] : ''; ?>';
         for(var i = 0; i < data.length; i++) {
            var datetime, location;
            if(data[i].schedule.status !== false) {
               var dateSplit = (data[i].schedule.schedule.date).split('-');
               datetime = dateSplit[2]+' '+arrMonth[dateSplit[1]-1]+' '+dateSplit[0] + ' ' + data[i].schedule.schedule.waktu;
               location = data[i].schedule.schedule.CompanyName;
            }
            else {
               datetime = 'Belum Tersedia';
               location = 'Belum Tersedia';
            }
            var compare_data = {
               "AuctionItemId": data[i].AuctionItemId,
               "BahanBakar": data[i].bahanbakar,
               "Image": data[i].icarImage,
               //"Image": '//img.ibid.astra.co.id/item/12415/d8404a531ea286d733aa7c35bfbdc83c.jpg',
               "Kilometer": data[i].km,
               "Lot": (data[i].thisLotNo !== undefined && data[i].thisLotNo !== null) ? data[i].thisLotNo : '-',
               "Merk": (data[i].merk !== undefined) ? data[i].merk : '',
               "Model": (data[i].model !== undefined) ? data[i].model : '',
               "NoKeur": data[i].nokeur,
               "NoMesin": data[i].nomesin,
               "NoPolisi": data[i].nopolisi,
               "NoRangka": data[i].norangka,
               "NoSTNK": data[i].nostnk,
               "Seri": (data[i].seri !== undefined) ? data[i].seri : '',
               "Silinder": (data[i].silinder !== undefined) ? data[i].silinder : '',
               "TaksasiGrade": data[i].nilaiIcar,
               "Tahun": (data[i].tahun !== undefined) ? data[i].tahun : '',
               "Transmisi": (data[i].transmisi !== undefined) ? data[i].transmisi : '',
               "Tipe": (data[i].grade !== undefined) ? data[i].grade : '',
               "Price": (data[i].FinalPriceItem !== undefined) ? data[i].FinalPriceItem : 0,
               "Warna": data[i].warna
            };
            var json_str = JSON.stringify(compare_data);
            var link_detail = "<?php echo site_url('detail-lelang/'); ?>"+data[i].AuctionItemId;
            var iconFav = (data[i].thisFavorite === 0) ? '<img src="<?php echo base_url('assetsfront/images/icon/ic_favorite.png'); ?>" class="empty-fav-icon empty-favicon-details" />' : '<i class="fa fa-heart"></i>';
            var bottom_favcom = '<div class="action-bottom">'+
                                 '<button class="btn" onclick="addFav('+data[i].AuctionItemId+', '+sessionId+', this, 2)">'+iconFav+'<span class="btnItemFooter">Favorit</span></button>'+
                                 '<button class="btn btn-compare" onclick=\'set_compare_product('+json_str+', "'+link_detail+'")\'><i class="ic ic-Bandingkan-green"></i><span class="btnItemFooter">Bandingkan</span></button>'+
                                 '</div>';
            var favcom = (sessiond === 'TRUE') ? bottom_favcom : '';
            var content =  '<div class="item col-md-4">'+
                           '<div class="box-recommend">'+
                           '<a href="'+link_detail+'">'+
                           '<div class="thumbnail">'+
                           '<div class="thumbnail-custom">'+
                           '<img src="'+data[i].icarImage+'" />'+
                           '</div>'+
                           '<div class="overlay-grade">'+
                           'Grade <span>'+data[i].nilaiIcar+'</span>'+
                           '</div>'+
                           '<p class="overlay-lot">LOT '+compare_data.Lot+'</p>'+
                           '</div>'+
                           '<h2>'+data[i].merk+' '+data[i].seri+' '+data[i].silinder+' '+data[i].grade+' '+data[i].model+' '+data[i].transmisi+'</h2>'+
                           '<span>'+data[i].tahun+'</span> <span class="price">Rp. '+currency_format(data[i].FinalPriceItem)+'</span>'+
                           '<p><span>Jadwal</span> <span class="fa fa-calendar"></span><span>'+datetime+'</span></p>'+
                           '<p><span>Lokasi</span> <span class="fa fa-map-marker"></span><span>'+location+'</span></p>'+
                           '</a>'+
                           favcom+
                           '</div>'+
                           '</div>';
            $('#showrelated').append(content);
         }
         mobileSlick(data.length, classSlickNames);
      },
      error: function(e) {
         var data = e.responseJSON;
         if(data.status === 0 && data.data.length === 0) {
            bootoast.toast({
               message: data.message,
               type: 'warning',
               position: 'top-center',
               timeout: 3
            });
         }
         else {
            bootoast.toast({
               message: 'Koneksi terputus saat mengolah data produk rekomendasi',
               type: 'warning',
               position: 'top-center',
               timeout: 3
            });
         }
      }
   });
});

function mobileSlick(value, classSlickNames) {
   var vw = false;
   if(value < 2) {
      vw = true;
   }
   $(classSlickNames).slick({
      dots: false,
      infinite: false,
      speed: 300,
      variableWidth: vw,
      slidesToShow: value,
      slidesToScroll: value,
      responsive: 
      [
         {
            breakpoint: 1024,
            settings: {
               slidesToShow: 3,
               slidesToScroll: 3,
               infinite:false,
               dots: true,
               prevArrow: false,
               nextArrow: false
            }
         },
         {
            breakpoint: 800,
            settings: {
               slidesToShow: 2,
               slidesToScroll: 1,
               dots: true,
               prevArrow: false,
               nextArrow: false
            }
         },
         {
            breakpoint: 600,
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

   if(value < 2) {
      $('#showrelated').children().children().attr('style', 'opacity:1; width:auto; transform:translate3d(0px, 0px, 0px);');
      $('#showrelated').children().children().children().attr('style', 'opacity:1; width:auto; transform:translate3d(0px, 0px, 0px);');
   }
}
</script>
