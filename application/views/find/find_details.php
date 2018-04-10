<input type="hidden" id="hidden-auctionitemid" value="<?php echo $data[0]->AuctionItemId; ?>" />
<section class="header-detail background-white">
   <div class="container-fluid">
      <div class="margin-right-min15px margin-left-min15px photo-landscape">
         <div id="lightgallery">
            <div class="col-md-4 stickys" data-src="<?php echo $dataphoto[0]->ImagePath; ?>">
               <a href="javascript:void(0)" class="image-header">
                  <img src="<?php echo $dataphoto[0]->ImagePath; ?>" alt="Gambar 1" id="img-gambar">
                  <p class="photo-amount">
                     <?php
                     $count_imgsx = 0; 
                     foreach($dataphoto as $key => $imgsx) {
                        if($imgsx->ImagePath !== '') {
                           $count_imgsx = $count_imgsx + 1;
                        }
                     }
                     echo $count_imgsx;
                     ?>
                     Foto
                  </p>
               </a>
            </div>
            <?php
            for ($i = 1; $i < count($dataphoto); $i++) { 
               if($dataphoto[$i]->ImagePath !== '') {
                  echo '<div class="col-md-4 stickys" data-src="'.$dataphoto[$i]->ImagePath.'">
                           <a href="javascript:void(0)" class="image-header" >
                              <img src="'.$dataphoto[$i]->ImagePath.'" alt="Gambar '.$i.'">
                           </a>
                        </div>';
               }
            }
            ?>
         </div>
      </div>
   </div>
</section>

<section class="detail-transport">
   <div class="container-fluid">
      <div class="row js-sticky-container background-white">
         <div class="detail-title">
            <h1><?php echo $data[0]->merk.' '.$data[0]->seri.' '.$data[0]->silinder.' '.$data[0]->tipe.' '.$data[0]->model.' '.$data[0]->transmisi; ?>
            <span><?php echo $data[0]->tahun; ?></span>
            </h1>
         </div>
         <div class="col-md-8">
            <div class="desc-transport">
               <h2>Detail Kendaraan</h2>
               <p class="no-pol">Nomor Polisi <span id="span-nopol">: <?php echo $data[0]->nopolisi; ?></span></p>
               <div class="desc-row clearfix">
                  <ul>
                     <li>
                        <p>Merk <span id="span-merk">: <?php echo $data[0]->merk; ?></span></p>
                     </li>
                     <li>
                        <p>Seri <span id="span-seri">: <?php echo $data[0]->seri; ?></span></p>
                     </li>
                     <li>
                        <p>Tipe <span id="span-tipe">: <?php echo $data[0]->grade; ?></span></p>
                     </li>
                     <li>
                        <p>Slinder  <span id="span-silinder">: <?php echo $data[0]->silinder; ?></span></p>
                     </li>
                     <li>
                        <p>Transmisi  <span id="span-transmisi">: <?php echo $data[0]->transmisi; ?></span></p>
                     </li>
                     <li>
                        <p>Model  <span id="span-model">: <?php echo $data[0]->model; ?></span></p>
                     </li>
                     <li>
                        <p>Tahun  <span id="span-tahun">: <?php echo $data[0]->tahun; ?></span></p>
                     </li>
                  </ul>
                  <ul>
                     <li>
                        <p>Nomor rangka <span id="span-norangka">: <?php echo $data[0]->norangka; ?></span></p>
                     </li>
                     <li>
                        <p>Nomor Mesin <span id="span-nomesin">: <?php echo $data[0]->nomesin; ?></span></p>
                     </li>
                     <li>
                        <p>Tanggal STNK <span id="span-nostnk">: <?php echo $data[0]->nostnk ?></span></p>
                     </li>
                     <li>
                        <p>Tanggal KEUR <span id="span-tglkeur">: <?php echo $data[0]->tglkeur; ?></span></p>
                     </li>
                     <li>
                        <p>Warna <span id="span-warna">: <?php echo $data[0]->warna; ?></span></p>
                     </li>
                     <li>
                        <p>Bahan Bakar <span id="span-bahanbakar">: <?php echo $data[0]->bahanbakar; ?></span></p>
                     </li>
                     <li>
                        <p>Kilometer <span id="span-kilometer">: <?php echo ($data[0]->km === '0') ? 'Data Tidak Valid' : $data[0]->km ; ?></span></p>
                        <input type="hidden" id="span-lot" value="<?php echo (@$data[0]->thisLotNo) ? $data[0]->thisLotNo : null ; ?>" />
                     </li>
                  </ul>
               </div>
               <div class="desc-row clearfix">
                  <ul>
                     <li>
                        <p>BPKB <span>: <?php echo ($data[0]->BPKB === '') ? 'BELUM ADA' : $data[0]->BPKB ; ?></span></p>
                     </li>
                     <li>
                        <p>Faktur <span>: <?php echo ($data[0]->nofaktur === 0) ? 'BELUM ADA' : 'ADA' ; ?></span></p>
                     </li>
                     <li>
                        <p>Kuitansi <span>: <?php echo ($data[0]->Kuitansi === 0) ? 'BELUM ADA' : 'ADA' ; ?></span></p>
                     </li>
                  </ul>
                  <ul>
                     <li>
                        <p>Surat Pelepasan Hak <span>: <?php echo ($data[0]->SuratPelepasanHak === 0) ? 'BELUM ADA' : 'ADA' ; ?></span></p>
                     </li>
                     <li>
                        <p>Ktp Pemilik <span>: <?php echo ($data[0]->KtpPemilik === 0) ? 'BELUM ADA' : 'ADA' ; ?></span></p>
                     </li>
                     <li>
                        <p>Form A <span>: <?php echo ($data[0]->FormA === 0) ? 'BELUM ADA' : 'ADA' ; ?></span></p>
                     </li>
                  </ul>
               </div>
               <div class="desc-row clearfix">
                  <ul>
                     <li>
                        <p><?php echo @$gradeinternal[1]->DamageName; ?> <span>: <?php echo @$gradeinternal[1]->TotalEvaluationResult; ?></span></p>
                     </li>
                     <li>
                        <p><?php echo @$gradeinternal[3]->DamageName; ?> <span>: <?php echo @$gradeinternal[3]->TotalEvaluationResult; ?></span></p>
                     </li>
                  </ul>
                  <ul>
                     <li>
                        <p><?php echo @$gradeinternal[0]->DamageName; ?> <span>: <?php echo @$gradeinternal[0]->TotalEvaluationResult; ?></span></p>
                     </li>
                     <li>
                        <p><?php echo @$gradeinternal[2]->DamageName; ?> <span>: <?php echo @$gradeinternal[2]->TotalEvaluationResult; ?></span></p>
                     </li>
                  </ul>
               </div>
            </div>
            <div class="photo-transport">
               <h2>Photo Kendaraan</h2>
               <!-- MAIN SLIDES -->
               <div class="overlay-slide">
                  <div class="slider" id="lightgallery2">
                     <?php foreach($dataphoto as $key => $imgs) {
                        if($key === 4) {
                           // Tambahkan di sini untuk gambar 360
                           echo '<div class="cursor-pointer">
                                    <a id="show360" href="'.site_url('welcome/d360').'" target="_blank">
                                       <input id="hidden360" type="hidden" value="'.site_url('welcome/d360').'" />
                                       <img src="'.$imgs->ImagePath.'" />
                                    </a>
                                 </div>';
                        }
                        else if($imgs->ImagePath !== '') {
                           echo '<div class="item-slide cursor-pointer" data-src="'.$imgs->ImagePath.'"><img src="'.$imgs->ImagePath.'" /></div>';
                        }
                     } ?>                     
                  </div>
               </div>
               <!-- THUMBNAILS -->
               <div class="slider-nav-thumbnails">
                  <?php foreach($dataphoto as $key => $imgsclick) {
                     if($imgsclick->ImagePath !== '') {
                        echo '<div class="cursor-pointer"><img src="'.$imgsclick->ImagePath.'" /></div>';
                     }
                  } ?>
               </div>
            </div>
            <div class="graphic-lelang">
               <h2>Grafik <?php echo $data[0]->merk; ?> <?php echo $data[0]->seri; ?></h2>
               <div class="canvas-graphic">
                  <div class="graphic-coomingsoon">
                     <span>
                        <h2>Coming Soon</h2>
                        <p>Fitur ini baru dapat digunakan beberapa waktu ke depan</p>
                     </span>
                  </div>
                  <canvas id="myChart" width="400" height="200"></canvas>
               </div>
            </div>
         </div>
         <div class="col-md-4">
            <div class="sticky-auction">
               <div class="lelang-online">
                  <div class="">
                     <p class="grade-detail">Grade <span id="span-gradetaksasi"><?php echo $grade; ?></span></p>
                     <div class="label-lot">
                        <h2>LOT <?php echo @$datalot->lot->no_lot ? @$datalot->lot->no_lot : '???'; ?></h2>
                     </div>
                     <ul>
                        <li class="clearfix">
                           Harga Awal <span class="price">Rp. <?php echo $dataharga; ?></span>
                           <input type="hidden" id="hide-hargafinal" value="<?php echo $data[0]->FinalPriceItem ?>"></li>
                        <li>Jadwal <span><?php echo @$datalot->schedule->date != '' ? date('d F Y',strtotime($datalot->schedule->date)) : '-'; ?></span></li>
                        <li>Lokasi <span><?php echo @$datalot->schedule->CompanyName; ?></span></li>
                     </ul>
                     <?php if($data[0]->StatusStok === 1) { // 0 = Live Auction, 1 = Online ?>
                     <ul class="mobile-info">
                        <li>
                           <p id="timer-title">Lelang Akan Dimulai Dalam</p>
                        </li>
                        <li>
                           <ul class="timer-auction" id="timer-desc">
                              <li>Hari</li>
                              <li>Jam</li>
                              <li>Menit</li>
                           </ul>
                        </li>
                        <li>
                           <p id="timer"></p>
                        </li>
                     </ul>
                     <?php } ?>
                  </div>
                  <div class="bidder">
                     <?php if($data[0]->StatusStok === 1) { // 0 = Live Auction, 1 = Online ?>
                     <h3>Kelipatan Rp. 500,000</h3>
                     <ul id="bidding-log-mb"></ul>
                     <h4 id="top-bid-mb">Rp. -,</h4>
                     <p id="top-bidder-info"><i class="fa fa-star"></i> Top BIDDER <span>Pilih NPL Sebelum Melakukan Lelang </span></p>
                     <select class="select-custom form-control" id="used-npl">
                        <option value="">Pilih NPL</option>
                        <?php foreach($thisNpl as $row){ ?>
                           <option value="<?php echo $row->NPLNumber; ?>"><?php echo $row->NPLNumber; ?></option>
                        <?php } ?>
                     </select>
                     <button class="btn btn-violet btn-bid" data-toggle="modal" onclick="bid()" id="bid">Tawar</button>
                     <p>Pengumuman : <br>Pemenang akan dikenakan biaya Administrasi Rp. 1.750.000 </p>
                     <?php } ?>
                     <?php if($userdata !== null) { ?>
                     <button class="btn btn-green" data-toggle="modal" data-target="#used-npl" onclick="location.href='<?php echo site_url('beli-npl'); ?>'">Beli NPL</button>
                     <?php } ?>
                     <?php if($data[0]->StatusStok === 0) { // 0 = Live Auction, 1 = Online ?>
                     <button class="btn btn-outline-violet" onclick="location.href='<?php echo site_url('live-auction'); ?>'">LIVE AUCTION</button>
                     <?php } ?>
                  </div>
               </div>
               <div class="info-ibid">
                  <div class="bg-white box-info">
                     <h2>IBID - Balai Lelang Serasi</h2>
                     <p>Jl. Bintaro Mulia I No.3 Bintaro Pesanggrahan - Jakarta Selatan 12250 <span>(62-21) 7355999</span></p>
                     <ul>
                        <li><a href="javascript:void(0)"><span class="ic ic-Chat-With"></span> <span>Chat With <br>Us</span></a></li>
                        <li><a href="javascript:void(0)"><span class="ic ic-Check-FAQ "></span> <span>Chat Out <br>Our FAQ</span></a></li>
                     </ul>
                  </div>
                  <?php if($this->session->userdata('userdata') !== null) { ?>
                  <button class="btn btn-orange" id="btn-favorit" onclick="addFav(<?php echo $data[0]->AuctionItemId; ?>, <?php echo $userdata['UserId'] ?>, this)">
                     <?php echo ($favAction->status === 1) ? '<i class="fa fa-heart"></i>' : ''; ?> Tambah ke Favorit
                  </button>
                  <button class="btn btn-green <?php echo ($this->session->userdata('userdata') === null) ? 'btn-bandingkan' : ''; ?>" onclick="compare_action('<?php echo site_url('list-compare'); ?>')" type="button">
                     <i class="ic ic-Bandingkan"></i> Bandingkan
                  </button>
                  <?php } ?>
               </div>
            </div>
         </div>
      </div>
   </div>
</section>

<section class="bg-grey related-product">
   <div class="container">
      <div class="row">
         <div class="col-md-12">
            <h2>Produk Terkait</h2>
         </div>
         <div class="col-md-12 related-product-slider">
            <?php for($footer = 0; $footer < 4; $footer++) { ?>
            <div class="col-md-3">
               <div class="list-product box-recommend">
                  <a href="<?php echo $link_detail; ?>">
                     <div class="thumbnail">
                        <div class="thumbnail-custom">
                           <img src="http:<?php echo $img_rec; ?>" />
                        </div>
                        <div class="overlay-grade">
                           Grade <span>A</span>
                        </div>
                        <p class="overlay-lot">LOT 170</p>
                     </div>
                     <h2>DAIHATSU LUXIO 1.5 X MINIBUS AT</h2>
                     <span>2014</span> <span class="price">Rp. 72.000.000</span>
                     <p><span>Jadwal</span> <span class="fa fa-calendar"></span> <span>04 September 2017</span></p>
                     <p><span>Lokasi</span> <span class="fa fa-map-marker"></span> <span>Jakarta</span></p>
                  </a>
                  <div class="action-bottom">
                     <button class="btn"><i class="fa fa-heart"></i> Favorit</button>
                     <button class="btn btn-compare"><i class="ic ic-Bandingkan-green"></i> Bandingkan</button>
                  </div>
               </div>
            </div>
            <?php } ?>
         </div>
         <a href="javascript:;" class="open-compare" id="addcompare" style="display:none">Add Compare <i class="fa fa-plus"></i></a>
      </div>
   </div>
</section>

<div class="bidder-mobile">
   <button class="btn btn-violet" data-toggle="modal" data-target="#bidder">Lakukan Penawaran</button>
</div>

<!-- line modal -->
<div class="modal fade" id="bidder" tabindex="-1" role="dialog" aria-labelledby="modalLabel" aria-hidden="true">
   <div class="modal-dialog">
      <div class="modal-content">
         <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span><span class="sr-only">Close</span></button>
         </div>
         <div class="modal-body">
            <div class="bidder bidder-popup">
               <p>Lelang Akan Dimulai Dalam</p>
               <p id="timer-mobile">00 : 00 : 00</p>
               <ul class="timer-auction">
                  <li>Hari</li>
                  <li>Jam</li>
                  <li>Menit</li>
               </ul>
               <h3>Kelipatan Rp. 500,000</h3>
               <ul>
                  <li>Rp. 416,000,000 <span>Proxy Bidder</span></li>
                  <li>Rp. 416,500,000 <span>Online Bidder</span></li>
                  <li>Rp. 417,000,000 <span>Floor Bidder</span></li>
                  <li>Rp. 417,500,000 <span>Proxy Bidder</span></li>
                  <li class="active">Rp. 418,000,000 <span>Online Bidder</span></li>
                  <li>Rp. 417,500,000 <span>Proxy Bidder</span></li>
                  <li>Rp. 417,500,000 <span>Proxy Bidder</span></li>
                  <li>Rp. 417,500,000 <span>Proxy Bidder</span></li>
                  <li>Rp. 417,500,000 <span>Proxy Bidder</span></li>
               </ul>
               <h4>Rp. 418,000,000</h4>
               <p><i class="fa fa-star"></i> Top BIDDER <span>Pilih NPL Sebelum Melakukan Lelang </span></p>
               <select class="select-custom form-control">
                  <option value="">NPL Reguler</option>
                  <option value="">NPL Premium</option>
               </select>
               <button class="btn btn-violet" data-toggle="modal" data-target="#choose-npl">Tawar</button>
               <p>Pengumuman : <br>Pemenang akan dikenakan biaya Administrasi Rp. 1.750.000 </p>
               <button class="btn btn-green" data-toggle="modal" data-target="#used-npl">Beli NPL</button>
               <div class="auction-empty">
                  <div class="image-empty">
                     <img src="<?php echo base_url('assetsfront/images/icon/lelang-empty.png'); ?>" alt="" title="">
                  </div>
                  <p>Lelang Belum Tersedia</p>
               </div>
            </div>
         </div>
      </div>
   </div>
</div>

<section class="compare">
   <div class="container-fluid">
      <div class="row">
         <div class="compare-content">
            <p><i class="fa fa-exclamation"></i> Pilih produk yang akan di bandingkan, minimal 2 produk untuk di compare</p>
            <div class="col-md-12">
               <div id="loadContent"></div>
               <!--div class="box-compare add-compare-box">
                  <a href="javascript:void(0)"><i class="fa fa-plus-circle"></i></a>
               </div-->
               <div class="box-compare button-compare">
                  <p>Untuk memulai perbandingan silakan klik button di bawah ini</p>
                  <button class="btn btn-green btn-compare" onclick="location.href='<?php echo site_url('list-compare'); ?>'" type="button">Bandingkan</button>
               </div>
            </div>
            <a href="javascript:void(0);" class="close-compare">Tutup <i class="fa fa-times"></i></a>
         </div>
      </div>
   </div>
</section>
<input id="lastbid" type="hidden" value="0">

<!-- line modal -->
<div class="modal fade modal-notification" id="choose-npl" tabindex="-1" role="dialog" aria-labelledby="modalLabel" aria-hidden="true">
   <div class="modal-dialog">
      <div class="modal-content">
         <div class="modal-body text-center">
            <div class="ic ic-Attention-Beli-NPL"></div>
            <p>Silakan Pilih Jenis NPL Sebelum Anda Melakukan Penawaran</p>
            <button class="btn btn-green">ok</button>
         </div>
      </div>
   </div>
</div>
<div class="modal fade modal-notification" id="used-npl" tabindex="-1" role="dialog" aria-labelledby="modalLabel" aria-hidden="true">
   <div class="modal-dialog">
      <div class="modal-content">
         <div class="modal-body text-center">
            <div class="ic ic-Attention-NPL-Sudah-digunakan"></div>
            <p>Maaf... NPL yang Anda pilih sudah pernah digunakan, silakan pilih NPL yang lainnya</p>
            <button class="btn btn-green">ok</button>
         </div>
      </div>
   </div>
</div>
<div class="modal fade" id="show-360" tabindex="-1" role="dialog" aria-labelledby="modalLabel" aria-hidden="true">
   <div class="modal-dialog modal360">
      <div class="modal-content">
         <div class="modal-body text-center clearfix">
            <iframe id="frame360" src="" class="modalframe360"></iframe>
         </div>
      </div>
   </div>
</div>

<script>
   var dbRef         = firebase.database();
   var companyRef    = dbRef.ref('company/<?php echo $company_id; ?>');
   var scheduleRef   = companyRef.child('schedule/<?php echo $schedule_id; ?>');
   var lotRef        = scheduleRef.child('lot|stock/<?php echo $no_lot; ?>');
   var logsRef       = lotRef.child('log');
   var tasksRef      = lotRef.child('tasks');
   var lotDataRef    = lotRef.child('lotData');
   var durationRef   = lotDataRef.child('duration');
   var allowRef      = lotRef.child('allowBid');
   var duration = 1;
   
   var bidderRef           = dbRef.ref('bidder/ongoing');
   
   <?php if($data[0]->StatusStok === 1 && $schedule_id > 0) { // 0 = Live Auction, 1 = Online ?>
   var countDownDate = new Date(<?php echo @$date[0].",".(@$date[1]-1).",".(int)@$date[2].",".@$time[0].",".@$time[1].",0,0"; ?>).getTime();
   var now = new Date(<?php echo "$serverdate[0],".((int)$serverdate[1]-1).",".(int)$serverdate[2].",$serverdate[3],$serverdate[4],".(int)$serverdate[4].",".(int)$serverdate[4]; ?>).getTime();
   
   var eligibleNpl = [];

      $('#used-npl option').each(function () {
         eligibleNpl.push($(this).val());
      });

      $('#top-bidder-info').hide();
      $('.auction-empty').hide();
         
   
   allowRef.on('value', function(allowedSnap){
     lotDataRef.on('value', function(lotDataSnap){
         if (allowedSnap.exists() && lotDataSnap.exists()) {
            if (allowedSnap.val() || lotDataSnap.val().duration > 0) {
               lotRef.once('value', function(lotSnap){
                  if (lotSnap.hasChild("log")) {
                     logsRef.on("child_added", function(logSnap) {
                        if (eligibleNpl.includes(logSnap.val().npl)) {
                          $('#top-bidder-info').show();
                          $('.btn-bid').prop('disabled', true);
                        } else {
                          $('#top-bidder-info').hide();
                          $('.btn-bid').prop('disabled', false);
                        }
                     });
                  } else {
                     $('.btn-bid').prop('disabled',false);
                  }
               });
            }else{
               $('.btn-bid').prop('disabled',true);
               $("#timer").text("LELANG SUDAH BERAKHIR");
               $("#timer-mobile").text("LELANG SUDAH BERAKHIR");
               $("#timer").css('font-size','39px');
               $("#message").hide();
               $("#message-mobile").hide();
               $(".timer-auction").hide();
            }
         }
     });
   });
   <?php } else { ?>
   $("#timer-title").css('display', 'none');
   $("#timer").text("JADWAL LELANG TIDAK DIKETAHUI");
   $("#timer-desc").css('display', 'none');
   $('#top-bidder-info').hide();
   <?php } ?>
   
$(document).ready(function() {
   // var dbRef         = firebase.database();
   // var companyRef    = dbRef.ref('company/<?php echo $company_id; ?>');
   // var scheduleRef   = companyRef.child('schedule/<?php echo $schedule_id; ?>');
   // var lotRef = scheduleRef.child('lot|stock/<?php echo $no_lot; ?>');
   // var now = new Date(<?php echo "$serverdate[0],".((int)$serverdate[1]-1).",".(int)$serverdate[2].",$serverdate[3],$serverdate[4],".(int)$serverdate[4].",".(int)$serverdate[4]; ?>).getTime();

   // get 360 link
   $('#show360').click(function() {
      $('#frame360').attr('src', $('#hidden360').val());
   });

   $('.top-bidder-wrapper').css('min-height','30px');
   
   //show compare element
   var linked = '<?php echo site_url('list-compare'); ?>';
   setCompare(linked);

   $(".select-custom").select2({
      minimumResultsForSearch: -1
   });
     
   // slide 360
   $('.slider').slick({
      slidesToShow: 1,
      slidesToScroll: 1,
      arrows: true,
      fade: false,
      asNavFor: '.slider-nav-thumbnails',
      dots: false
   });

   $('.slider-nav-thumbnails').slick({
      slidesToShow: 5,
      slidesToScroll: 1,
      asNavFor: '.slider',
      dots: true,
      focusOnSelect: true,
      dots: false
   });

   // Remove active class from all thumbnail slides
   $('.slider-nav-thumbnails .slick-slide').removeClass('slick-active');

   // Set active class to first thumbnail slides
   $('.slider-nav-thumbnails .slick-slide').eq(0).addClass('slick-active');

   // On before slide change match active thumbnail to current slide
   $('.slider').on('beforeChange', function (event, slick, currentSlide, nextSlide) {
      var mySlideNumber = nextSlide;
      $('.slider-nav-thumbnails .slick-slide').removeClass('slick-active');
      $('.slider-nav-thumbnails .slick-slide').eq(mySlideNumber).addClass('slick-active');
   });   
   
   <?php if($data[0]->StatusStok === 1 && $schedule_id > 0) { // 0 = Live Auction, 1 = Online ?>
   // Timer
   var countDownDate = new Date(<?php echo $date[0].",".(@$date[1]-1).",".(int)@$date[2].",".@$time[0].",".@$time[1].",0,0"; ?>).getTime();
   if(isNaN(countDownDate)) {
      $("#timer-title").css('display', 'none');
      $("#timer").text("JADWAL LELANG TIDAK DIKETAHUI");
      $("#timer-desc").css('display', 'none');
   }
   else {
      var x = setInterval(function() {
     var countDownDate = new Date(<?php echo $date[0].",".(@$date[1]-1).",".(int)@$date[2].",".@$time[0].",".@$time[1].",0,0"; ?>).getTime();
     
         now = now + 1000;
         var distance = countDownDate - now;
         var days = Math.floor(distance / (1000 * 60 * 60 * 24));
         var hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
         var minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
         // document.getElementById("timer").innerHTML = days + "   :  " + hours + "   :  " + minutes + " ";
       console.log(countDownDate);
       console.log('----------------');
         if (distance > 0) {
               $("#timer").text(twoDigits(days) + "   :  " + twoDigits(hours) + "   :  " + twoDigits(minutes) + " ");
               $("#timer-mobile").text(twoDigits(days) + "   :  " + twoDigits(hours) + "   :  " + twoDigits(minutes) + " ");
         }
        else if (distance < 0) {
         console.log('----------------2');
            $("#timer-title").css('display' , 'none');
            clearInterval(x);
            lotRef.once('value', function(lotSnap){
               if (!lotSnap.exists()) {
                  $("#timer").text("LELANG AKAN SEGERA DIMULAI");
                  $("#timer-mobile").text("LELANG AKAN SEGERA DIMULAI");
                  $("#timer").css('font-size','39px');
                  $("#message").hide();
                  $("#message-mobile").hide();
                  $(".timer-auction").hide();
               }
            });
         }
      }, 1000);
   }

   $('#top-bidder-info').hide();
   durationRef.on('value', function(durationSnap){
      if (durationSnap.exists()) {
         clearInterval(x);
         duration = durationSnap.val();
         $("#timer").css('font-size','');
         $("#timer").text(dhmFormat(duration));
         $("#timer-mobile").text(dhmFormat(duration));
         $("#message").text('Lelang Akan Berakhir Dalam');
         $("#message-mobile").text('Lelang Akan Berakhir Dalam');
         $("#message").show();
         $("#message-mobile").show();
         $(".timer-auction").show();
      }else{
         $('.btn-bid').prop('disabled',true);
      }
   });
   logsRef.on("child_added", function(logSnap) {
      if (eligibleNpl.includes(logSnap.val().npl)) {
           $('#top-bidder-info').show();
           $('.btn-bid').prop('disabled', true);
         } else {
           $('#top-bidder-info').hide();
           $('.btn-bid').prop('disabled', false);
         }
      $('#lastbid').val(logSnap.val().bid);
      $('#bidding-log li').removeClass('active');
      $('#bidding-log').prepend(logHtmlFromObject(logSnap.val()));
      $('#top-bid').text('Rp. ' + addPeriod(logSnap.val().bid));
      $('#bidding-log-mb li').removeClass('active');
      $('#bidding-log-mb').prepend(logHtmlFromObject(logSnap.val()));
      $('#top-bid-mb').text('Rp. ' + addPeriod(logSnap.val().bid));
   });

   // TIMER MOBILE
   //var countDownDate = new Date("feb 31, 2018 00:00:00").getTime();
   var x = setInterval(function() {
      var countDownDate = new Date(<?php echo $date[0].",".(@$date[1]-1).",".(int)@$date[2].",".@$time[0].",".@$time[1].",0,0"; ?>).getTime();
      var now = new Date().getTime();
      var distance = countDownDate - now;
      var days = Math.floor(distance / (1000 * 60 * 60 * 24));
      var hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
      var minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
      document.getElementById("timer-mobile").innerHTML = days + "   :  " + hours + "   :  " + minutes + " ";
      if (distance < 0) {
         clearInterval(x);
         document.getElementById("timer-mobile").innerHTML = "TIDAK ADA LELANG";
      }
   }, 1000);
   <?php } ?>
   
   // Graphic Lelang
   var canvas = document.getElementById("myChart");
   var ctx = canvas.getContext("2d");
   var data = {
      labels: ["Jan", "Feb", "Mar", "Apr", "May", "Jun", "Jul", "Aug", "Sept", "Oct", "Nov", "Dec"],
      datasets: [
         {
            label: "Harga Dasar",
            backgroundColor: "rgba(60,130,211,0.3)",
            borderColor: "rgba(60,130,211,1)",
            data: [150, 250, 200, 350, 150, 200, 300, 200, 150, 450, 350, 300]
         },
         {
            label: "Harga Terbentuk",
            backgroundColor: "rgba(225,47,42,0.3)",
            borderColor: "rgba(225,47,42,1)",
            data: [420, 375, 320, 450, 550, 448, 600, 448, 400, 500, 550, 450]
         }
      ]
   };

   var optionsLine = {
      responsive: true,
      scaleBeginAtZero: true,
      scaleShowVerticalLines: false,
      legend: {
         display: true,
         position: 'bottom',
         labels: {
            fontColor: 'rgb(166, 166, 166)',
            usePointStyle: true
         }
      },
      scales: {
         yAxes: [{
            gridLines: {
               display: true
            }
         }],
         xAxes: [{
            gridLines: {
               display: false,
               drawOnChartArea: false
            }
         }]
      }
   }

   var myNewChart = new Chart(ctx , {
      type: "line",
      data: data, 
      options: optionsLine
   });

   // ADD COMPARE
   $(".open-compare").click(function() {
      $(".compare").show(500) && $(".open-compare").hide();
   });
   $(".close-compare").click(function() {
      $(".compare").hide(500) && $(".open-compare").show();
   });

   if($(window).width() > 800) {
      $('.sticky-auction').stick_in_parent({
         'parent': $('.js-sticky-container'),
         'offset_top': 10
      }).on('sticky_kit:bottom', function(e) {
         $(this).parent().css('position', 'static');
      }).on('sticky_kit:unbottom', function(e) {
         $(this).parent().css('position', 'relative');
      });
   }

   $(window).on('resize', function(e) {
      if ($(window).width() > 800) {
         $('.sticky-auction').stick_in_parent({
            'parent': $('.js-sticky-container'),
            'offset_top': 10
         }).on('sticky_kit:bottom', function(e) {
            $(this).parent().css('position', 'static');
         }).on('sticky_kit:unbottom', function(e) {
            $(this).parent().css('position', 'relative');
         });
      }
   });

   // mobile view content
   if ($(window).width() < 800) {
      $(".photo-transport").appendTo('.header-detail .container-fluid'); 
      $('.box-info').appendTo('.related-product');
      $('.info-ibid').appendTo('.mobile-info');
      $('.detail-transport .detail-title span').appendTo('.detail-title');
      $('.sticky-auction').prependTo('.desc-transport');
   }
   $(window).on('resize', function(e) {
      if ($(window).width() < 800) {
         $(".photo-transport").appendTo('.header-detail .container-fluid'); 
         $('.box-info').appendTo('.related-product');
         $('.info-ibid').appendTo('.mobile-info');
         $('.detail-transport .detail-title span').appendTo('.detail-title');
         $('.sticky-auction').prependTo('.desc-transport');
      }
   });

   if ($(window).width() < 1025) {
      $(".close-compare").appendTo('.compare .container-fluid')
   }
   
   $('#toggle-nav').click(function() {
      $('.navbar-collapse.collapse').toggleClass('open')
   })
   $('.nav-close').click(function() {
      $('.navbar-collapse.collapse').toggleClass('open')
   })

   $('.lang-mob a').click(function() {
      $('.help-mob ul').removeClass('open')
      $(this).toggleClass('opened')
      $(this).siblings('ul').toggleClass('open')
   })
   $('.help-mob a').click(function() {
      $('.lang-mob ul').removeClass('open')
      $(this).toggleClass('opened')
      $(this).siblings('ul').toggleClass('open')
   })
   $('.sidemenu-left').height($('.am-right').height() - 100)

   $('#lightgallery').slick({
      dots: false,
      infinite: false,
      speed: 300,
    
      prevArrow: false,
      nextArrow: false,
      slidesToShow: 3,
      slidesToScroll: 3,
      responsive: [
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

   $('.related-product-slider').slick({
      dots: false,
      infinite: false,
      speed: 300,
    
      prevArrow: false,
      nextArrow: false,
      slidesToShow: 4,
      slidesToScroll: 4,
      responsive: [
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

   $("#lightgallery").lightGallery({
      thumbnail: true,
      selector: ".stickys"
   });
   $("#lightgallery2").lightGallery({
      thumbnail: true,
      selector: ".item-slide"
   });

   // toggle menu action
   $('#toggle-nav').click(function() {
      $('.navbar-collapse.collapse').toggleClass('open')
   });

   $('.nav-close').click(function() {
      $('.navbar-collapse.collapse').toggleClass('open')
   });
});

// handle favorit function
function addFav(aucid, id, ele) {
   $.ajax({
      type: 'POST',
      url: '<?php echo linkservice('stock')."favorite/Checked"; ?>',
      data: 'userid='+id+'&auctionid='+aucid,
      success: function(data) {
         if(data.status === 0) {
            var d = new Date(), 
            dateformat = d.getFullYear()+'-'+(d.getMonth()+1)+'-'+d.getDate()+' '+d.getHours()+':'+d.getMinutes()+':'+d.getSeconds();
            $.ajax({
               type: 'POST',
               url: '<?php echo linkservice('stock')."favorite/Add"; ?>',
               data: 'AuctionItemId='+aucid+'&CreateDate='+dateformat+'&CreateUserId='+id+'&StsDeleted=1',
               success: function(data) {
                  var prevEle = ele;
                  $(prevEle).html('<i class="fa fa-heart"></i> Tambah KE FAVORIT');
                  bootoast.toast({
                     message: 'Unit sudah ditambahkan ke daftar favorit kamu',
                     type: 'success',
                     position: 'top-center',
                     timeout: 3
                  });
               },
               error: function(e) {
                  bootoast.toast({
                     message: 'Koneksi terputus saat menambahkan favorit',
                     type: 'warning',
                     position: 'top-center',
                     timeout: 3
                  });
               }
            });
         }
         else {
            $.ajax({
               type: 'POST',
               url: '<?php echo linkservice('stock')."favorite/Delete"; ?>',
               data: 'auctionid='+aucid+'&userid='+id,
               success: function(data) {
                  var prevEle = ele.children[0];
                  $(prevEle).replaceWith('');
                  bootoast.toast({
                     message: 'Unit sudah dihapus dari daftar favorit kamu',
                     type: 'warning',
                     position: 'top-center',
                     timeout: 3
                  });
               },
               error: function(e) {
                  bootoast.toast({
                     message: e,
                     type: 'warning',
                     position: 'top-center',
                     timeout: 3
                  });
               }
            });
         }
      },
      error: function(e) {
         console.log(e);
      }
   });
}

function compare_action(linked) {
   var compare_data = {
      "AuctionItemId": parseInt($('#hidden-auctionitemid').val()),
      "BahanBakar"   : $('#span-bahanbakar').text().replace(': ', ''),
      "Image"        : $('#img-gambar').attr('src'),
      "Kilometer"    : $('#span-kilometer').text().replace(': ', ''),
      "Lot"          : $('#span-lot').val(),
      "Merk"         : $('#span-merk').text().replace(': ', ''),
      "Model"        : $('#span-model').text().replace(': ', ''),
      "NoKeur"       : $('#span-tglkeur').text().replace(': ', ''),
      "NoMesin"      : $('#span-nomesin').text().replace(': ', ''),
      "NoPolisi"     : $('#span-nopol').text().replace(': ', ''),
      "NoRangka"     : $('#span-norangka').text().replace(': ', ''),
      "NoSTNK"       : $('#span-nostnk').text().replace(': ', ''),
      "Seri"         : $('#span-seri').text().replace(': ', ''),
      "Silinder"     : $('#span-silinder').text().replace(': ', ''),
      "TaksasiGrade" : $('#span-gradetaksasi').text(),
      "Tahun"        : $('#span-tahun').text().replace(': ', ''),
      "Transmisi"    : $('#span-transmisi').text().replace(': ', ''),
      "Tipe"         : $('#span-tipe').text().replace(': ', ''),
      "Price"        : $('#hide-hargafinal').val(),
      "Warna"        : $('#span-warna').text().replace(': ', '')
   };
   set_compare_product(compare_data, linked);
}

function twoDigits(n){
  return n < 10 ? "0"+n : n;
}
function dhmFormat(s) {
  updateDuration(s);
  sec = s % 60; // SECONDS
  min = Math.floor(s / 60) % 60;
  var fm = [
     Math.floor(s / 60 / 60 / 24), // DAYS
     Math.floor(s / 60 / 60) % 24, // HOURS
     sec > 0 && sec <60  ? min + 1 : min, // MINUTES
  ];
  return $.map(fm, function(v, i) { return ((v < 10) ? '0' : '') + v; }).join(' : ');
}
function logHtmlFromObject(log){
var html = '<li class="active">Rp. '+addPeriod(log.bid)+' <span>'+log.type+' Bidder</span></li>'
return html;
}
function addPeriod(nStr){
  nStr += '';
  x = nStr.split('.');
  x1 = x[0];
  x2 = x.length > 1 ? '.' + x[1] : '';
  var rgx = /(\d+)(\d{3})/;
  while (rgx.test(x1)) {
     x1 = x1.replace(rgx, '$1' + '.' + '$2');
  }
  return x1 + x2;
}

function updateDuration(numb) {
   duration = numb;
}

function bid() {
   if($('#used-npl').val() === '') {
      alert('Silahkan Pilih NPL');
      return;
   }
   else {
      const last = $('#lastbid').val();
      var bid;
      var usedNpl = $('#used-npl').val();
      var currentLot = <?php echo @$no_lot ? $no_lot : 0; ?>;

      allowRef.once('value', function(allowedSnap) {
         lotDataRef.once('value', function(lotDataSnap) {
            if(allowedSnap.val() && lotDataSnap.val().duration > 0) {
               startPrice = lotDataSnap.exists() ? lotDataSnap.val().harga : 0;
               
            last <= 0 ? newbid = parseInt(startPrice) : newbid = parseInt(last) + parseInt(<?php echo $interval; ?>);

               //NPL ongoing check logic
               var ongoingBidder = bidderRef.child('schedule/<?php echo $schedule_id;?>/'+usedNpl);
                   ongoingBidder.once('value', function(bidderSnap){
                     if (bidderSnap.exists()) {
                              ongoingBidder.child('npl').once('value', function(ongoingNplSnap){
                                 nplLot = ongoingNplSnap.val();
                                 nplLot = nplLot.split('|');
                                 nplLot[1] == currentLot ? bid = true : bid = false;
                                 push_bid(bid,newbid,usedNpl);
                              });
                     } else {
                        ongoingBidder.child('npl').set(usedNpl+'|<?php echo $no_lot; ?>');
                        bid = true;
                        push_bid(bid,newbid,usedNpl);
                     }
                   });
            }
            else {
               bootoast.toast({
                  message: 'Tidak diperbolehkan melakukan lelang',
                  type: 'warning',
                  position: 'top-center',
                  timeout: 4
               });
            }
         });
      });
   }
}

function push_bid(bid_status,bid,npl){

      if (bid_status == true) {
         tasksRef.push({
            bid: bid,
            npl: npl,
            // npl: '100001',
            type: 'Online',
         });
      } else {
         //costumize alert here
         alert('NPL '+npl+' telah digunakan pada lot lain!!');
      }
  }
</script>
<script src="<?php echo base_url('assetsfront/assets360/three.min.js'); ?>"></script> 
<script src="<?php echo base_url('assetsfront/assets360/jquery.fullscreen.js'); ?>"></script>
<script src="<?php echo base_url('assetsfront/assets360/mousetrap.min.js'); ?>"></script>
<!--script src="<?php echo base_url('assetsfront/assets360/360.js'); ?>"></script-->
