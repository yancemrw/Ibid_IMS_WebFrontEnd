<div class="section-list-product">
   <div class="container">
      <div class="row">
         <div class="col-md-12">
            <form>
               <div class="form-group search-product">
                  <input type="text" class="form-control" placeholder="Cari berdasarkan merek, tipe, atau kata kunci lain, contoh: acura sedan">
                  <i class="fa fa-search"></i>
               </div>
            </form>
            <div class="button-filter text-center">
               <button class="btn btn-green filter-btn-mobile"><i class="fa fa-filter"></i> Filter</button>
            </div>
         </div>
         <div class="col-md-3">
            <form id="thisFormFilter" class="form-filter search-transport clearfix">
               <h1><span class="icon_ic-filter"></span> Filters</h1>
               <?php if($this->session->userdata('userdata') !== null) { ?>
               <div class="form-group">
                  <input type="radio" id="test1" name="radio-group" value="1" checked>
                  <label for="test1" class="view-filter">Tampilkan Favorit</label>
               </div>
               <?php } ?>
               <div class="form-group">
                  <input type="radio" id="test2" name="radio-group" value="2" <?php echo ($this->session->userdata('userdata') === null) ? 'checked' : ''; ?>>
                  <label for="test2" class="view-filter">Mobil Rekomendasi</label>
               </div>
               <h2>Tipe Lelang</h2>
               <div class="form-group">
                  <select class="form-control select-custom thisType" name="tipeLelang">
                     <option value="">Semua Tipe Lelang</option>
                     <option value="1">Lelang Online</option>
                     <option value="0">Lelang Live</option>
                  </select>
               </div>
               <h2>Kota & Jadwal</h2>
               <div class="form-group">
                  <select class="form-control select-custom thisKota" name="thisKota">
                     <option value="">Semua Kota</option>
					 <?php foreach($cabang as $row){ ?>
                     <option value="<?php echo $row['CompanyId']; ?>" ><?php echo ucwords(substr(strtolower($row['CompanyName']), 4)); ?></option>
                     <?php } ?>
                  </select>
               </div>
               <div class="form-group">
				<div id="divSchedule" class="input-group-ss">
				  <select class="form-control select-custom" id="ScheduleId" name="ScheduleId">
					<option value="">Semua Jadwal</option>
				  </select>
				  <span class="input-group-addon" style="display: none;"><i class="fa fa-spin fa-refresh"></i></span>
				</div>
               </div>
               <h2>Jenis Objek Lelang</h2>
               <div class="object-type clearfix">
                  <div class="form-group">
                     <input type="radio" name="tipe-object" id="type_1" class="input-hidden thisItem" value="6" />
                     <label for="type_1">
                        <div class="car-type ic ic-Mobil">
                        </div>
                        <p>Mobil</p>
                     </label>
                  </div>
                  <div class="form-group">
                     <input type="radio" name="tipe-object" id="type_2" class="input-hidden thisItem" value="7" />
                     <label for="type_2">
                        <div class="motorcycle-type ic ic-Motor">
                        </div>
                        <p>Motor</p>
                     </label>
                  </div>
                  <div class="form-group">
                     <input type="radio" name="tipe-object" id="type_3" class="input-hidden thisItem" value="14" />
                     <label for="type_3">
                        <div class="hve-type ic ic-HVE">
                        </div>
                        <p>HVE</p>
                     </label>
                  </div>
                  <div class="form-group">
                     <input type="radio" name="tipe-object" id="type_4" class="input-hidden thisItem" value="12" />
                     <label for="type_4">
                        <div class="gadget-type ic ic-Gadget">
                        </div>
                        <p>Gadget</p>
                     </label>
                  </div>
               </div>
               <div id="object6" class="desc-object">
                  <h2>Filter Mobil</h2>
				  <?php foreach($formDinamisMobil as $row){ echo $row['typeInput']; } ?>
                  <!-- div class="form-group">
                     <select class="form-control select-custom">
                        <option>Nomor Polisi</option>
                     </select>
                  </div>
                  <div class="form-group">
                     <select class="form-control select-custom">
                        <option>Model</option>
                     </select>
                  </div>
                  <div class="form-group">
                     <select class="form-control select-custom">
                        <option>Merk</option>
                     </select>
                  </div>
                  <div class="form-group">
                     <select class="form-control select-custom">
                        <option>Tipe</option>
                     </select>
                  </div>
                  <div class="form-group">
                     <select class="form-control select-custom">
                        <option>Tahun</option>
                     </select>
                  </div -->
               </div>
               <div id="object7" class="desc-object">
                  <h2>Filter Motor</h2>
				  <?php foreach($formDinamisMotor as $row){ echo $row['typeInput']; } ?>
                  <!-- div class="form-group">
                     <select class="form-control select-custom">
                        <option>Nomor Polisi</option>
                     </select>
                  </div>
                  <div class="form-group">
                     <select class="form-control select-custom">
                        <option>Model</option>
                     </select>
                  </div>
                  <div class="form-group">
                     <select class="form-control select-custom">
                        <option>Merk</option>
                     </select>
                  </div>
                  <div class="form-group">
                     <select class="form-control select-custom">
                        <option>Tipe</option>
                     </select>
                  </div>
                  <div class="form-group">
                     <select class="form-control select-custom">
                        <option>Tahun</option>
                     </select>
                  </div -->
               </div>
               <div id="object14" class="desc-object">
                  <h2>Filter Alat Berat</h2>
				  <?php foreach($formDinamisHve as $row){ echo $row['typeInput']; } ?>
                  <!-- div class="form-group">
                     <select class="form-control select-custom">
                        <option>Serial Number</option>
                     </select>
                  </div>
                  <div class="form-group">
                     <select class="form-control select-custom">
                        <option>Model</option>
                     </select>
                  </div>
                  <div class="form-group">
                     <select class="form-control select-custom">
                        <option>Merk</option>
                     </select>
                  </div>
                  <div class="form-group">
                     <select class="form-control select-custom">
                        <option>Tipe</option>
                     </select>
                  </div>
                  <div class="form-group">
                     <select class="form-control select-custom">
                        <option>Tahun</option>
                     </select>
                  </div -->
               </div>
               <div id="object12" class="desc-object">
                  <h2>Filter Unit Gadget</h2>
				  <?php foreach($formDinamisGadget as $row){ echo $row['typeInput']; } ?>
                  <!-- div class="form-group">
                     <select class="form-control select-custom">
                        <option>Serial Number</option>
                     </select>
                  </div>
                  <div class="form-group">
                     <select class="form-control select-custom">
                        <option>Model</option>
                     </select>
                  </div>
                  <div class="form-group">
                     <select class="form-control select-custom">
                        <option>Merk</option>
                     </select>
                  </div>
                  <div class="form-group">
                     <select class="form-control select-custom">
                        <option>Tipe</option>
                     </select>
                  </div>
                  <div class="form-group">
                     <select class="form-control select-custom">
                        <option>Processor</option>
                     </select>
                  </div>
                  <div class="form-group">
                     <select class="form-control select-custom">
                        <option>Ram</option>
                     </select>
                  </div>
                  <div class="form-group">
                     <select class="form-control select-custom">
                        <option>HDD</option>
                     </select>
                  </div>
                  <div class="form-group">
                     <select class="form-control select-custom">
                        <option>Screen</option>
                     </select>
                  </div>
                  <div class="form-group">
                     <select class="form-control select-custom">
                        <option>Operating System</option>
                     </select>
                  </div>
                  <div class="form-group">
                     <select class="form-control select-custom">
                        <option>Tahun</option>
                     </select>
                  </div -->
               </div>
               <div class="form-group">
                  <button id="btnFilter" type="submit" class="btn btn-green">Filter</button>
               </div>
			   <?php if (@$this->session->userdata('userdata')['UserId']){ ?>
			   <input type="hidden" name="userId" value="<?php echo $this->session->userdata('userdata')['UserId']; ?>">
			   <?php } ?>
            </form>
         </div>
         <div class="col-md-9 pl-0">
            <div class="main-right">
               <div id="loadings"></div>
               <!--div class="title-header clearfix" id="loadings">
                  <p>Menampilkan <span>2.240</span> objek lelang untuk “<b>acura sedan</b>” ( <b>1-9</b> dari <b>2.240</b> )</p>
                  <div class="action-header">
                     <button class="btn"><i class="fa fa-download"></i> Download</button>
                     <button class="btn"><i class="fa fa-sort"></i> Sort</button>
                  </div>
               </div-->
               <!--p class="notice clearfix"><span><i class="fa fa-exclamation-circle"></i> Produk telah dimasukkan ke dalam daftar perbandingan</span></p-->
               <div class="content-right product-mob content-load clearfix">
                  <div id="loadlist"></div>
               </div>
               <div id="mored" class="cursor-pointer margin-top-10px text-align-center width-100">
                  <!--a href="javascript:void(0)" class="font-green" onclick="">Berikutnya</a-->
                  <span></span>
               </div>
            </div>
         </div>
      </div>
   </div>
</div>

<?php if($this->session->userdata('userdata') !== null) {  ?>
<section class="bg-grey related-product">
   <div class="container">
      <div class="row">
         <a href="javascript:void(0)" class="open-compare" id="addcompare" style="display:none">Add Compare <i class="fa fa-plus"></i></a>
      </div>
   </div>
</section>
<?php } ?>

<section class="compare">
   <div class="container-fluid">
      <div class="row">
         <div class="compare-content">
            <p><i class="fa fa-exclamation"></i> Pilih produk yang akan di bandingkan, minimal 2 produk untuk di compare</p>
            <div class="col-md-12" id="loadContent">
               <!-- Load Content Compare Product -->
            </div>
            <a href="javascript:void(0);" class="close-compare">Tutup <i class="fa fa-times"></i></a>
         </div>
      </div>
   </div>
</section>

<script>
var thisCabang = [];
var loadFavorite = new Array, loadIcar = new Array;
var actionTotalData;
<?php foreach($cabang as $row){ ?>
thisCabang[<?php echo $row['CompanyId']; ?>] = "<?php echo (($row['CompanyName'])); ?>";
<?php } ?>
// load mobil nabrak plang iBid
document.addEventListener("DOMContentLoaded", function () {
   document.getElementById('preloader').style.display = 'block';
   preload(1);
});

$(document).ready(function() {
   //show compare element
   let linked = '<?php echo site_url('list-compare'); ?>';
   setCompare(linked);

   // array month
   window.arrMonth = ['Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni', 'Juli', 'Agustus', 'September', 'Oktober', 'November', 'Desember'];

   /*$('.content-load').jscroll({
      loadingHtml: '<img src="<?php echo base_url('assetsfront/images/loader/loading-produk.gif'); ?>" alt="Loading" />',
      autoTrigger: true,
      nextSelector: 'a.hidden-content:last'
   });*/

   $(".select-custom").select2({
      minimumResultsForSearch: -1
   });

   $("input[name$='tipe-object']").click(function() {
      var test = $(this).val();
      $(".desc-object").hide();
      $("#object" + test).show();
   });

   // filter mobile
   $('.filter-btn-mobile').click(function() {
      var hidden = $('.form-filter.filter-mobile').data('hidden');
      $('.filter-btn-mobile').text(hidden ? 'Filter' : 'Filter');
      if(hidden) {
         $('.form-filter.filter-mobile').animate({
            left: '0px'
         }, 500)
      }
      else {
         $('.form-filter.filter-mobile').animate({
            left: '0px'
         }, 500)
      }
   });

   $(".open-compare").click(function() {
      $(".compare").show(500) && $(".open-compare").hide();
   });
   $(".close-compare").click(function() {
      $(".compare").hide(500) && $(".open-compare").show();
   });

   // get list frontend
   loadContainer(0, 6, linked);
	
	$('#thisFormFilter').submit(function() {
		var thisFormInput = $(this).serialize();
      window.countTotal = 0;
      window.dataForm = '';
      actionTotalData = 0;
      $('#loadlist').html('');
      loadContainer(0, 6, linked, thisFormInput);
		return false;
	});

   $('input').blur(function() {
      tmpval = $(this).val();
      if(tmpval == '') {
         $(this).addClass('empty');
         $(this).removeClass('not-empty');
      }
      else {
         $(this).addClass('not-empty');
         $(this).removeClass('empty');
      }
   });
   
   $('.thisItem').click(function(){ getJadwalAms(); });
	$('.thisType').change(function(){ getJadwalAms(); });
	$('.thisKota').change(function(){ getJadwalAms(); });
});

// load ajax content finding
function loadContainer(offset = 0, limit = 6, linked = '', dataForm = '') {
   var initUserId = '<?php echo (@$this->session->userdata('userdata')['UserId']) ? '&userId='.$this->session->userdata('userdata')['UserId'] : ''; ?>';
   var formData = 'offset='+offset+'&limit='+limit+initUserId+'&'+dataForm;
   $.ajax({
      type: 'GET',
      url: '<?php echo linkservice('stock')."itemstock/Getfrontend"; ?>',
      data: formData,
      beforeSend: function() {
         $('#btnFilter').attr('disabled', true);
         $('#loadings').replaceWith('<div id="loadings" class="margin-10px margin-top-80px text-align-center"><img src="<?php echo base_url('assetsfront/images/loader/loading-produk.gif'); ?>" alt="Loading" width="200px" /></div>');
      },
      success: function(data) {
         $('#loadings').replaceWith('<div id="loadings"></div>');
         var content = '',
         data = data.data,
         datas = data.data,
         dataTotal = data.total,
         imgData = new Array,
         icarData = new Array,
         sessiond = "<?php echo ($this->session->userdata('userdata') !== null) ? 'TRUE' : 'FALSE'; ?>",
         sessionId = '<?php echo ($this->session->userdata('userdata')['UserId'] !== null) ? $this->session->userdata('userdata')['UserId'] : ''; ?>';

         if(datas !== null && datas.length > 0) {
            for (var i = 0; i < datas.length; i++) {
               var dataz = datas[i];
               imgData[i] = callImg(dataz);
               icarData[i] = callIcar(dataz);

               var compare_data = {
                  "AuctionItemId": dataz.AuctionItemId,
                  "BahanBakar": dataz.bahanbakar,
                  "Image": (imgData[i][0].ImagePath !== undefined) ? imgData[i][0].ImagePath : '<?php echo base_url('assetsfront/images/background/default.png') ?>',
                  //"Image": '//img.ibid.astra.co.id/item/12415/d8404a531ea286d733aa7c35bfbdc83c.jpg',
                  "Kilometer": dataz.km,
                  "Lot" : (dataz.thisLotNo !== undefined && dataz.thisLotNo !== null) ? dataz.thisLotNo : '???',
                  "Merk": (dataz.merk !== undefined) ? dataz.merk : '',
                  "Model": (dataz.model !== undefined) ? dataz.model : '',
                  "NoKeur": dataz.nokeur,
                  "NoMesin": dataz.nomesin,
                  "NoPolisi": dataz.nopolisi,
                  "NoRangka": dataz.norangka,
                  "NoSTNK": dataz.nostnk,
                  "Seri": (dataz.seri !== undefined) ? dataz.seri : '',
                  "Silinder": (dataz.silinder !== undefined) ? dataz.silinder : '',
                  "TaksasiGrade": icarData[i].TotalEvaluationResult,
                  "Tahun": (dataz.tahun !== undefined) ? dataz.tahun : '',
                  "Transmisi": (dataz.transmisi !== undefined) ? dataz.transmisi : '',
                  "Tipe": (dataz.grade !== undefined) ? dataz.grade : '',
                  "Price": (dataz.FinalPriceItem !== undefined) ? dataz.FinalPriceItem : 0,
                  "Warna": dataz.warnadoc
               };
               var json_str = JSON.stringify(compare_data);
               var iconFav = (dataz.thisFavorite === 0) ? '<img src="<?php echo base_url('assetsfront/images/icon/ic_favorite.png'); ?>" class="empty-fav-icon" />' : '<i class="fa fa-heart"></i>';
               var bottom_favcom = '<div class="action-bottom">'+
                                    '<button class="btn" onclick="addFav('+dataz.AuctionItemId+', '+sessionId+', this)">'+iconFav+'<span>Favorit</span></button>'+
                                    '<button class="btn btn-compare" onclick=\'set_compare_product('+json_str+', "'+linked+'")\'><i class="ic ic-Bandingkan-green"></i> <span>Bandingkan</span></button>'+
                                    '</div>';
               var favcom = (sessiond === 'TRUE') ? bottom_favcom : '';
               var lot = (dataz.thisLotNo !== null && dataz.thisLotNo !== undefined) ? dataz.thisLotNo : '???' ;
               var schedule = (dataz.thisScheduleId !== null) ? dataz.thisScheduleId : 0 ;
               var lokasi = 'Belum Tersedia';
               var waktu = 'Belum Tersedia';      
               var statusStock, classStatus;
               switch(dataz.StatusStok) {
                  case 0 : statusStock = 'Live'; classStatus = 'overlay-status-live'; break;
                  case 1 : statusStock = 'Online'; classStatus = 'overlay-status-online'; break;
                  case null: statusStock = 'Live'; classStatus = 'overlay-status-live'; break;
               }
               content = '<div class="col-md-4" id="this'+dataz.AuctionItemId+'">'+
                              '<div class="list-product box-recommend">'+
                              '<a href="<?php echo $link_detail; ?>/'+dataz.AuctionItemId+'">'+
                              '<div class="thumbnail">'+
                              '<div class="thumbnail-custom">'+
                              '<img src="'+compare_data.Image+'" />'+
                              '</div>'+
                              '<div class="overlay-grade">'+
                              'Grade <span>'+compare_data.TaksasiGrade+'</span>'+
                              '</div>'+
                              '<p class="overlay-lot">LOT '+compare_data.Lot+'</p>'+
                              '</div>'+
                              '<div class="boxright-mobile">'+
                              '<span class="'+classStatus+'">'+statusStock+'</span>'+
                              '<h2>'+compare_data.Merk+' '+compare_data.Seri+' '+compare_data.Silinder+' '+compare_data.Tipe+' '+compare_data.Transmisi+'</h2>'+
                              '<span>'+compare_data.Tahun+'</span> <span class="price">Rp. '+currency_format(compare_data.Price)+'</span>'+
                              '<p><span>Jadwal</span> <span class="fa fa-calendar"></span> <span class="wkt'+dataz.thisScheduleId+'">'+waktu+'</span></p>'+
                              '<p><span>Lokasi</span> <span class="fa fa-map-marker"></span> <span class="sch'+dataz.thisScheduleId+'">'+thisCabang[dataz.CompanyId]+'</span></p>'+
                              '</div>'+
                              '</a>'+
                              favcom+
                              '</div>'+
                              '</div>';
               $('#loadlist').append(content);
               if (schedule > 0) {
                  $.ajax({
                     type: 'GET',
                     url: 'http://alpha.ibid.astra.co.id/backend/serviceams/lot/api/getLotDataOnline?schedule='+schedule+'&lot='+lot,
                     success: function(sch) {
                        if(sch.data !== null) {
                           var dateSplit = sch.schedule.date.split('-');
                           lokasi = sch.schedule.CompanyName;
                           waktu = dateSplit[2]+' '+arrMonth[dateSplit[1]-1]+' '+dateSplit[0] + ' ' + sch.schedule.waktu;
                           $('.wkt'+schedule).html(waktu);
                        }
                        else {
                           $('.wkt'+schedule).html('Belum Tersedia');
                        }
                     },
                     error: function(e) {
                        console.log(e);
                     }
                  });
                  
               }
               $('#btnFilter').attr('disabled', false);
            }
            countContainer(offset, limit, linked, dataTotal, datas.length, dataForm);
         }
         else {
            $('#loadings').replaceWith('<div id="loadings" class="margin-10px margin-top-80px text-align-center"><img src="<?php echo base_url('assetsfront/images/background/management-empty.png'); ?>" alt="Loading" width="200px" /><div class="style="color:#757575">Data Tidak Ditemukan!</div></div>');
         }
      }
  });
}

function loadContainerPaging(offset, limit, linked, dataForm = '') {
   var initUserId = '<?php echo (@$this->session->userdata('userdata')['UserId']) ? '&userId='.$this->session->userdata('userdata')['UserId'] : ''; ?>';
   var formData = 'offset='+offset+'&limit='+limit+initUserId+'&'+dataForm;
   $.ajax({
      type: 'GET',
      url: '<?php echo linkservice('stock')."itemstock/Getfrontend"; ?>',
      data: formData,
      beforeSend: function() {
         $('#btnFilter').attr('disabled', true);
         $('#mored').children().replaceWith('<img src="<?php echo base_url('assetsfront/images/loader/loading-produk.gif'); ?>" alt="Loading" width="200px" />');
      },
      success: function(data) {
         var content = '',
         data = data.data, 
         datas = data.data,
         dataTotal = data.total,
         imgData = new Array,
         icarData = new Array,
         sessiond = "<?php echo ($this->session->userdata('userdata') !== null) ? 'TRUE' : 'FALSE'; ?>",
         sessionId = '<?php echo ($this->session->userdata('userdata')['UserId'] !== null) ? $this->session->userdata('userdata')['UserId'] : ''; ?>';

         window.dataTotal = dataTotal;

         if(datas !== null) {
            for (var i = 0; i < datas.length; i++) {
               var dataz = datas[i];
               imgData[i] = callImg(dataz);
               icarData[i] = callIcar(dataz);

               var compare_data = {
                  "AuctionItemId": dataz.AuctionItemId,
                  "BahanBakar": dataz.bahanbakar,
                  "Image": (imgData[i][0].ImagePath !== undefined) ? imgData[i][0].ImagePath : '<?php echo base_url('assetsfront/images/background/default.png') ?>',
                  "Kilometer": dataz.km,
                  "Lot" : (dataz.thisLotNo !== undefined && dataz.thisLotNo !== null) ? dataz.thisLotNo : '???',
                  "Merk": (dataz.merk !== undefined) ? dataz.merk : '',
                  "Model": (dataz.model !== undefined) ? dataz.model : '',
                  "NoKeur": dataz.nokeur,
                  "NoMesin": dataz.nomesin,
                  "NoPolisi": dataz.nopolisi,
                  "NoRangka": dataz.norangka,
                  "NoSTNK": dataz.nostnk,
                  "Seri": (dataz.seri !== undefined) ? dataz.seri : '',
                  "Silinder": (dataz.silinder !== undefined) ? dataz.silinder : '',
                  "TaksasiGrade": icarData[i].TotalEvaluationResult,
                  "Tahun": (dataz.tahun !== undefined) ? dataz.tahun : '',
                  "Transmisi": (dataz.transmisi !== undefined) ? dataz.transmisi : '',
                  "Tipe": (dataz.grade !== undefined) ? dataz.grade : '',
                  "Price": (dataz.FinalPriceItem !== undefined) ? dataz.FinalPriceItem : 0,
                  "Warna": dataz.warna
               };
               var json_str = JSON.stringify(compare_data);
               var iconFav = (dataz.thisFavorite === 0) ? '<img src="<?php echo base_url('assetsfront/images/icon/ic_favorite.png'); ?>" class="empty-fav-icon" />' : '<i class="fa fa-heart"></i>';
               var bottom_favcom = '<div class="action-bottom">'+
                                    '<button class="btn" onclick="addFav('+dataz.AuctionItemId+', '+sessionId+', this)">'+iconFav+'<span>Favorit</span></button>'+
                                    '<button class="btn btn-compare" onclick=\'set_compare_product('+json_str+', "'+linked+'")\'><i class="ic ic-Bandingkan-green"></i> <span>Bandingkan</span></button>'+
                                    '</div>';
               var favcom = (sessiond === 'TRUE') ? bottom_favcom : '';
               var lot = (dataz.thisLotNo !== null && dataz.thisLotNo !== undefined) ? dataz.thisLotNo : '???' ;
               var schedule = (dataz.thisScheduleId !== null) ? dataz.thisScheduleId : 0 ;
               var lokasi = 'Belum Tersedia';
               var waktu = 'Belum Tersedia';      
               var statusStock, classStatus;
               switch(dataz.StatusStok) {
                  case 0 : statusStock = 'Live'; classStatus = 'overlay-status-live'; break;
                  case 1 : statusStock = 'Online'; classStatus = 'overlay-status-online'; break;
                  case null: statusStock = 'Live'; classStatus = 'overlay-status-live'; break;
               }
               content = '<div class="col-md-4" id="this'+dataz.AuctionItemId+'">'+
                              '<div class="list-product box-recommend">'+
                              '<a href="<?php echo $link_detail; ?>/'+dataz.AuctionItemId+'">'+
                              '<div class="thumbnail">'+
                              '<div class="thumbnail-custom">'+
                              '<img src="'+compare_data.Image+'" />'+
                              '</div>'+
                              '<div class="overlay-grade">'+
                              'Grade <span>'+compare_data.TaksasiGrade+'</span>'+
                              '</div>'+
                              '<p class="overlay-lot">LOT '+compare_data.Lot+'</p>'+
                              '</div>'+
                              '<div class="boxright-mobile">'+
                              '<span class="'+classStatus+'">'+statusStock+'</span>'+
                              '<h2>'+compare_data.Merk+' '+compare_data.Seri+' '+compare_data.Silinder+' '+compare_data.Tipe+' '+compare_data.Transmisi+'</h2>'+
                              '<span>'+compare_data.Tahun+'</span> <span class="price">Rp. '+currency_format(compare_data.Price)+'</span>'+
                              '<p><span>Jadwal</span> <span class="fa fa-calendar"></span> <span class="wkt'+dataz.thisScheduleId+'">'+waktu+'</span></p>'+
                              '<p><span>Lokasi</span> <span class="fa fa-map-marker"></span> <span class="sch'+dataz.thisScheduleId+'">'+thisCabang[dataz.CompanyId]+'</span></p>'+
                              '</div>'+
                              '</a>'+
                              favcom+
                              '</div>'+
                              '</div>';
               $('#loadlist').children().last().after(content);
               if (schedule > 0) {
                  $.ajax({
                     type: 'GET',
                     url: 'http://alpha.ibid.astra.co.id/backend/serviceams/lot/api/getLotDataOnline?schedule='+schedule+'&lot='+lot,
                     success: function(sch) {
                        if(sch.data !== null) {
                           var dateSplit = sch.schedule.date.split('-');
                           lokasi = sch.schedule.CompanyName;
                           waktu = dateSplit[2]+' '+arrMonth[dateSplit[1]-1]+' '+dateSplit[0] + ' ' + sch.schedule.waktu;
                           $('.wkt'+schedule).html(waktu);
                        }
                        else {
                           $('.wkt'+schedule).html('Belum Tersedia');
                        }
                     },
                     error: function(e) {
                        console.log(e);
                     }
                  });
                  
               }
               $('#btnFilter').attr('disabled', false);
            }
            countContainer(offset, limit, linked, dataTotal, datas.length, dataForm);
         }
      }
   });
}

function callImg(datax) {
   $.ajax({
      type  : 'GET',
      async : false,
      url   : '<?php echo linkservice('taksasi')."icar/getimage"; ?>',
      data  : 'AuctionItemId='+datax.AuctionItemId,
      success: function(datax) {
         loadFavorite = datax.data;
      }
   });
   return loadFavorite;
}

function callIcar(datay) {
   $.ajax({
      type  : 'GET',
      async : false,
      url   : '<?php echo linkservice('taksasi')."nilaiicar/detail"; ?>',
      data  : 'AuctionItemId='+datay.AuctionItemId,
      success: function(datay) {
         loadIcar = datay.data;
      }
   });
   return loadIcar;
}

function countContainer(offset, limit, linked, dataTotal, countPage, dataForm = '') {
   window.countTotal = offset + limit;
   window.dataForm = dataForm;
   var countContainer = $('#loadlist').children().length;
   var arrCheck = new Array;
   countPage = countPage + offset;
   if(actionTotalData > 0) {
      actionTotalData = 0;
   }
   else {
      actionTotalData = dataTotal;
   }
   if(countPage === countContainer) {
      $('#mored').children().replaceWith('<span></span>');
      $(document).scroll(function(e) {
         if($(window).scrollTop() === $(document).height() - $(window).height()) {
            arrCheck.push(window.countTotal); // check multi load paging
            if(hasDuplicate(arrCheck) === false) {
               if(window.countTotal < actionTotalData) {
                  loadContainerPaging(window.countTotal, limit, linked, window.dataForm);
               }
            }
         }
      });
      return false;
   }
   else {
      // show loading paging
      $('#mored').children().replaceWith('<img src="<?php echo base_url('assetsfront/images/loader/loading-produk.gif'); ?>" alt="Loading" width="200px" />');
      return false;
   }
}

function hasDuplicate(arr) {
   for(var i = 0; i <= arr.length; i++) {
        for(var j = i; j <= arr.length; j++) {
            if(i != j && arr[i] == arr[j]) {
                return true;
            }
        }
    }
    return false;
}

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
                  var prevEle = ele.children[0];
                  $(prevEle).replaceWith('<i class="fa fa-heart"></i>');
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
                  $(prevEle).replaceWith('<img src="<?php echo base_url('assetsfront/images/icon/ic_favorite.png'); ?>" class="empty-fav-icon" />');
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

function getJadwalAms(){
	itemLelang = $('.thisItem:checked').val();
	tipeLelang = $('.thisType').val();
	cabangId = $('.thisKota').val();
	startdate = '<?php echo date('Y-m-d'); ?>';
	
	if (itemLelang != '' && tipeLelang != '' && tipeLelang != null && cabangId != ''){}
	$.ajax( {
		url: "<?php echo linkservice('AMSSCHEDULE') .'schedulelist/'; ?>",
		dataType: "json",
		data: {
			// thisData
			type: tipeLelang,
			item: itemLelang,
			company_id: cabangId,
			startdate: startdate,
		},
		beforeSend: function( ) {
			$('#divSchedule .input-group-addon').attr("style",'');
			$('#divSchedule').addClass('input-group');
			$('#divSchedule').removeClass('input-group-ss');
		},
		success: function( data ) {
			$('#ScheduleId option').remove();
			$('#ScheduleId')
				.append($("<option></option>")
				.attr("value",'')
				.text("Semua Jadwal"));
			
			thisArr = data.data;
			for(i=0; i<thisArr.length; i++){
				row = thisArr[i];
				$('#ScheduleId')
					.append($("<option></option>")
					.attr("value",row.id)
					.text(row.date + ' '+row.waktu.substring(0, 8)));
			}
		},
		complete: function(){
			$('#divSchedule .input-group-addon').css('display','none');
			$('#divSchedule').removeClass('input-group');
			$('#divSchedule').addClass('input-group-ss');
		}
	});
}
</script>