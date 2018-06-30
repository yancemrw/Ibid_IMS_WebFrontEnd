<section class="section section-auction">
  <div class="container-fluid">
    <div class="row">
      <div class="list-favorite">
        <a href="javascript:;" class="favorite-button">
          <div class="favorite">
            <i class="fa fa-heart"></i>
          </div>
        </a>
        <div class="favorite-box" id="favoriteId">
          <!-- Load Favorit -->
        </div>
      </div>
      <div class="col-md-12 text-right clearfix">
        <form class="clearfix form-inline">
          <div class="form-group status-auction">
            <div class="ping-signal green" id="ping-wrapper">
              <svg version="1.1" id="wifi" xmlns="http://www.w3.org/2000/svg" x="0px" y="0px" width="50px" height="40px" viewBox="0 0 20 20">
              <path id="wifi3" fill="#000" fill-opacity="0.5" d="M9.9,5C6.8,5,4,6.4,2.2,8.7l1.1,1.1c1.6-2,4-3.2,6.7-3.2c2.7,0,5.1,1.3,6.7,3.2l1.1-1.1 C15.8,6.4,13,5,9.9,5z">
                <animate id="four" attributeName="fill-opacity" dur="500ms" values="0.5;1;0.5" calcMode="linear" begin="three.end+0.05s"/>
              </path>
              <path id="wifi2" fill="#000" fill-opacity="0.5" d="M9.9,8c-2.3,0-4.3,1.1-5.6,2.8l1.1,1.1c1-1.4,2.6-2.4,4.5-2.4c1.9,0,3.5,0.9,4.5,2.4l1.1-1.1 C14.2,9.1,12.2,8,9.9,8z">
                <animate id="three" attributeName="fill-opacity" dur="500ms" values="0.5;1;0.5" calcMode="linear" begin="two.end+0.05s"/>
              </path>
              <path id="wifi1" fill="#000" fill-opacity="0.5" d="M9.9,11c-1.5,0-2.7,0.8-3.4,2l1.1,1.1c0.4-0.9,1.3-1.6,2.3-1.6s2,0.7,2.3,1.6l1.1-1.1 C12.6,11.8,11.4,11,9.9,11z">
                <animate id="two" attributeName="fill-opacity" dur="500ms" values="0.5;1;0.5" calcMode="linear" begin="one.end+0.05s"/>
              </path>
              <circle id="dot" fill="#000" fill-opacity="0.5" cx="9.9" cy="15.3" r="1">
                <animate id="one" attributeName="fill-opacity" dur="500ms" values="0.5;1;0.5" calcMode="linear" begin="0s;four.end+0.05s"/>
              </circle>
              </svg>
            <!--p class="wifi">201MS</p-->
              <span class="ping-text" id="ping"></span>
            </div>
          </div>
          <div class="form-group">
            <div class="material-toggle" data-toggle="tooltip" title="Mode Tawar ON">
              <input type="checkbox" id="toggle" name="toggle" checked=true class="switch" />
              <label for="toggle" class="">Mode BID</label>
            </div>
          </div>
        </form>
      </div>

      <?php foreach($auctionsData as $key => $value): ?>
        <div class="col-md-6">
          <div class="content-live-auction clearfix">
             <h2 id="lot-company-name<?php echo $key+1;?>">-</h2>
             <ul class="bid-list clearfix">
                <li class="col-md-6 clearfix">
                   <div class="box-image-auction">
                    <div class="tumbnail-auction" id="thumbnail-action<?php echo $key+1;?>"> <!--add  .tumbnail-auction-overlay to five sold overlay -->
                      <img src="<?php echo base_url('assetsfront/images/background/default.png'); ?>" alt="" id="lot-img<?php echo $key+1;?>">
                      <div class="overlay-sold-out" id="overlay<?php echo $key+1;?>"></div>
                    </div>
                    <h2 class="overlay-title" id="lot-title<?php echo $key+1;?>">-</h2>
                    <ul class="grade-auction">
                       <li>
                        <a href="javascript:void(0)" id="myFav<?php echo $key+1;?>" class="">
                          <i class="fa fa-heart"></i>
                        </a>
                      </li>
                       <li>
                          <p class="overlay-grade">Grade <span id="lot-grade<?php echo $key+1;?>">-</span></p>
                       </li>
                    </ul>
                    <h3 id="lot-year<?php echo $key+1;?>">-</h3>
                   </div>
                   <div class="box-live-auction box-info">
                      <p>Harga Dasar :<span class="price-bidder" id="lot-startprice<?php echo $key+1;?>">-</span></p>
                      <p>Warna :<span class="price-bidder" id="lot-color<?php echo $key+1;?>">-</span></p>
                      <p>Transmisi :<span class="price-bidder" id="lot-transmission<?php echo $key+1;?>">-</span></p>
                      <p>Kilometer :<span class="price-bidder" id="lot-kilometers<?php echo $key+1;?>">-</span></p>
                      <p>Bahan Bakar :<span class="price-bidder" id="lot-fuel<?php echo $key+1;?>">-</span></p>
                      <ul class="desc-grade clearfix">
                         <li>
                            <p>Exterior :<span class="price-bidder" id="lot-exterior<?php echo $key+1;?>">-</span></p>
                            <p>Interior :<span class="price-bidder" id="lot-interior<?php echo $key+1;?>">-</span></p>
                         </li>
                         <li>
                            <p>Mechanical :<span class="price-bidder" id="lot-mechanical<?php echo $key+1;?>">-</span></p>
                            <p>Frame :<span class="price-bidder" id="lot-frame<?php echo $key+1;?>">-</span></p>
                         </li>
                      </ul>
                   </div>
                </li>
                <li class="col-md-6 clearfix">
                   <div class="lot-auction">
                      <h2 class="lot-number" id="lot-number<?php echo $key+1;?>">-</h2>
                      <ul class="list-bider" id="bidding-log<?php echo $key+1;?>">
                      </ul>
                      <h3 id="top-bidder<?php echo $key+1;?>">-</h3>
                      <input id="lastbid<?php echo $key+1;?>" type="hidden" value="0">
                      <div class="top-bidder-wrapper">
                        <p id="top-bidder-info<?php echo $key+1;?>"><i class="fa fa-star"></i> TOP BIDDER</p>
                      </div>
                      <?php if ($this->userdata['UserId'] > 0){ ?>
                      <div class="select-code clearfix">
                         <select class="form-control select-custom" id="used-npl<?php echo $key+1;?>">
                            <?php 
                            if($thisNpl[$key] !== null) {
                              foreach($thisNpl[$key] as $row) {
                                echo '<option value="'.$row->NPLNumber.'" id="'.$value->ScheduleId.'-'.$row->NPLType.'-npl-'.$row->NPLNumber.'">'.$row->NPLNumber.'</option>';
                              } 
                            }
                            else {
                              echo '<option value="">Tidak Ada NPL</option>';
                            }
                            ?>
                         </select>
                      </div>
                      <div class="button-bid">
                         <button class="btn btn-bid btn-violet" id="bid<?php echo $key+1;?>">TAWAR</button>
                      </div>
                      <?php } ?>
                   </div>
                </li>
             </ul>
             <ul class="lot-info clearfix">
                <li>
                   <h2>Lot Sebelumnya</h2>
                   <div class="lot-image">
                      <img id="lot-prev-img<?php echo $key+1;?>" src="<?php echo base_url('assetsfront/images/background/default.png'); ?>" alt="">
                   </div>
                   <h3 id="lot-prev-title<?php echo $key+1;?>"></h3>
                </li>
                <li>
                   <h2>Lot Selanjutnya</h2>
                   <div class="lot-image">
                      <img id="lot-next-img<?php echo $key+1;?>" src="<?php echo base_url('assetsfront/images/background/default.png'); ?>" alt="">
                   </div>
                   <h3 id="lot-next-title<?php echo $key+1;?>"></h3>
                </li>
             </ul>
          </div>
        </div>
      <?php endforeach ?>
    </div>
  </div>
</section>

<style>
/*live auction*/
.status-auction {
    padding-bottom: 20px;
    margin-right: 15px
}
.wifi {
    display: inline-block;
    position: relative;
    bottom: 10px;
    margin-right: 5px;
    width: 100%
}
.content-live-auction .grade-auction a.active {
    color: #ff4e00 !important;
}
/*end of signal*/
#ping-wrapper {
  height: 100px;
  width: 50px;
}
</style>

<script>
// sementara
// bootoast.toast({
// 	message: "Kami Mohon Maaf Karena Terdapat Kesalahan Teknis, Mohon Maaf Atas Tidak Nyaman ini",
// 	type: 'warning',
// 	position: 'top-center',
// 	timeout: 5
// });
	
myFav = [];
<?php foreach($favorite as $row){ ?>
myFav.push(<?php echo $row->AuctionItemId; ?>);
<?php } ?>
  
  startPing();

  function startPing()
  {
    setInterval(function(){
      pingProcess()
    }, 3000);
  }

  function pingProcess()
  {
     
     var ping = new Date;
     var newPing;
     $.ajax({ 
         type: "GET",
         url: "<?php echo linkservice('amsauction'); ?>../",
         data: {},
         cache:false,
         crossDomain : true,
         success: function(output){ 
             newPing = new Date - ping;
             if (newPing >= 999) {
              newPing = 999
             }
             $('#ping-wrapper').removeClass('green'); 
             $('#ping-wrapper').removeClass('red'); 
             $('#ping-wrapper').removeClass('yellow');
             if (newPing < 100) {
              $('#ping-wrapper').addClass('green');
             } else if (newPing >=100 && newPing <= 199){
              $('#ping-wrapper').addClass('yellow');
             } else if (newPing >= 200){
              $('#ping-wrapper').addClass('red');
             }
             $('#ping').html(newPing+'ms');
         },
         error: function(output){ 
             newPing = 999;
              $('#ping-wrapper').removeClass('green'); 
              $('#ping-wrapper').removeClass('red'); 
              $('#ping-wrapper').removeClass('yellow');
             $('#ping-wrapper').addClass('red');
             $('#ping').html(newPing+'ms');
         }
     });
  }

  var dbRef = firebase.database();
  var activeCompany = [];
  var liveCount = [];
  var log = [];
  var liveOn = [];
  var selectedLot = [];
  var allowBid = [];
  var checkAllowBid = [];
  var activeLot = [];
  var tasksRef = [];
  var checkRef = [];
  var checkLiveOn = [];
  var checkActiveLot = [];
  var checkBid = [];
  var bidMode;
  var loadFavorite = new Array, loadIcar = new Array;
  jQuery.fn.extend({
    slideRightShow: function() {
      return this.each(function() {
          $(this).show('slide', {direction: 'right'}, 1000);
      });
    },
    slideLeftHide: function() {
      return this.each(function() {
        $(this).hide('slide', {direction: 'left'}, 1000);
      });
    },
    slideRightHide: function() {
      return this.each(function() {
        $(this).hide('slide', {direction: 'right'}, 1000);
      });
    },
    slideLeftShow: function() {
      return this.each(function() {
        $(this).show('slide', {direction: 'left'}, 1000);
      });
    }
  });

  $(document).ready(function() {
	bootoast.toast({
		message: "Istirahat Sejenak Untuk Melakukan Shalat Ashar",
		type: 'warning',
		position: 'top-center',
		timeout: 5
	});
    $('.top-bidder-wrapper').css('min-height','30px');
    $('#toggle').prop('checked', false);
    $('.btn-bid').prop('disabled', true);
    bidMode = false;
    $("nav").sticky({
      topSpacing: 0
    });
       
    $(".select-custom").select2({
      minimumResultsForSearch: -1
    });

    $('#toggle-nav').click(function() {
      $('.navbar-collapse.collapse').toggleClass('open')
    });

    $('.nav-close').click(function() {
      $('.navbar-collapse.collapse').toggleClass('open')
    });

    $('[data-toggle="tooltip"]').tooltip();
    $('.favorite-button').click(function() {
      if($(this).hasClass('show')){
        $(this).removeClass('show');
        $('.list-favorite').animate({right: '-360px'});
      } else {
        $(this).addClass('show');
        $('.list-favorite').animate({right: '0'});
      }
    });

    $('.favorite-button-mobile').click(function() {
      $('.list-favorite').toggleClass('open');
    });
      
    $('.lang-mob a').click(function() {
      $('.help-mob ul').removeClass('open');
      $(this).toggleClass('opened');
      $(this).siblings('ul').toggleClass('open');
    });

    $('.help-mob a').click(function() {
      $('.lang-mob ul').removeClass('open');
      $(this).toggleClass('opened');
      $(this).siblings('ul').toggleClass('open');
    })

    // mobile view content
    $(window).on('resize', function(e) {
      $('.content-live-auction').each(function() {
        $(this).find('.lot-number').detach().insertBefore($(this).find('.bid-list'));
      });
    });

    if ($(window).width() < 601) {
      $('.content-live-auction').each(function() {
        $(this).find('.lot-number').detach().insertBefore($(this).find('.bid-list'));
      });
    }

    // toggle menu action
    $('#toggle-nav').click(function() {
      $('.navbar-collapse.collapse').toggleClass('open')
    });

    $('.nav-close').click(function() {
      $('.navbar-collapse.collapse').toggleClass('open')
    });

    <?php foreach($auctionsData as $key => $value): ?>
    var eligibleNpl<?php echo $key+1; ?> = [];

    $('#used-npl<?php echo $key+1; ?> option').each(function () {
      eligibleNpl<?php echo $key+1; ?>.push($(this).val());
    });

    // $('#myFav<?php echo $key+1;?>').removeClass('active');
    
    $('#top-bidder-info<?php echo $key+1;?>').hide();
    activeCompany[<?php echo $key+1; ?>] = dbRef.ref('company/<?php echo $value->CompanyId; ?>');
    liveCount[<?php echo $key+1; ?>] = activeCompany[<?php echo $key+1; ?>].child('liveCount');
    log[<?php echo $key+1; ?>];
    activeCompany[<?php echo $key+1; ?>].child('liveOn').on('value', function(snapshot<?php echo $key+1; ?>) {
      if (snapshot<?php echo $key+1; ?>.exists()) {
        $('#bidding-log<?php echo $key+1;?>').empty();
        $('#top-bidder<?php echo $key+1;?>').text('Rp. -');
        $('#lot-company-name<?php echo $key+1;?>').text("<?php echo $value->companyName ?>");
        liveOn[<?php echo $key+1;?>] = snapshot<?php echo $key+1; ?>.val();
        liveOn[<?php echo $key+1;?>] = liveOn[<?php echo $key+1;?>].split('|');
        if (liveOn[<?php echo $key+1;?>][0] == <?php echo $value->ScheduleId; ?>) {
          activeLot[<?php echo $key+1; ?>] = activeCompany[<?php echo $key+1; ?>].child('schedule/'+liveOn[<?php echo $key+1;?>][0]+'/lot|stock/'+liveOn[<?php echo $key+1;?>][1]);

          tasksRef[<?php echo $key+1; ?>] = activeLot[<?php echo $key+1; ?>].child('tasks');

          selectedLot[<?php echo $key+1; ?>] = activeLot[<?php echo $key+1; ?>].child('lotData');
          selectedLot[<?php echo $key+1; ?>].on('value', function(stockSnapshot<?php echo $key+1; ?>) {
            if (stockSnapshot<?php echo $key+1; ?>.exists()) {
              val<?php echo $key+1; ?> = stockSnapshot<?php echo $key+1; ?>.val();
              if (val<?php echo $key+1; ?>.LotStatus == "terjual") {
                $('#thumbnail-action<?php echo $key+1; ?>').addClass('tumbnail-auction-overlay');
                $('#overlay<?php echo $key+1; ?>').append('<img src="<?php echo base_url();?>assetsfront/images/icon/sold-out.png" alt="" title="Sold Out">');
              } else {
                $('#thumbnail-action<?php echo $key+1; ?>').removeClass('tumbnail-auction-overlay');
                $('#overlay<?php echo $key+1; ?>').empty();
              }
              var name = val<?php echo $key+1; ?>.Merk+" "+val<?php echo $key+1; ?>.Seri;
              $('#lot-title<?php echo $key+1;?>').text(name+" "+val<?php echo $key+1; ?>.Silinder+" "+val<?php echo $key+1; ?>.Model);
              $('#lot-number<?php echo $key+1;?>').text("LOT "+val<?php echo $key+1; ?>.NoLot);
              $('#lot-year<?php echo $key+1;?>').text(val<?php echo $key+1; ?>.Tahun);
              $('#lot-startprice<?php echo $key+1;?>').text(addPeriod(val<?php echo $key+1; ?>.StartPrice));
              $('#lot-kilometers<?php echo $key+1;?>').text(addPeriod(val<?php echo $key+1; ?>.Kilometer));
              $('#lot-color<?php echo $key+1;?>').text(val<?php echo $key+1; ?>.Warna);
              $('#lot-transmission<?php echo $key+1;?>').text(addPeriod(val<?php echo $key+1; ?>.Transmisi));
              $('#lot-fuel<?php echo $key+1;?>').text(val<?php echo $key+1; ?>.BahanBakar);
              $('#lot-exterior<?php echo $key+1;?>').text(val<?php echo $key+1; ?>.Exterior);
              $('#lot-interior<?php echo $key+1;?>').text(val<?php echo $key+1; ?>.Interior);
              $('#lot-mechanical<?php echo $key+1;?>').text(val<?php echo $key+1; ?>.Mesin);
              $('#lot-frame<?php echo $key+1;?>').text(val<?php echo $key+1; ?>.Rangka);
              $('#lot-grade<?php echo $key+1;?>').text(val<?php echo $key+1; ?>.Grade);
              $('#lot-img<?php echo $key+1;?>').attr("src",val<?php echo $key+1; ?>.Image);

              thisFav = jQuery.inArray( val<?php echo $key+1; ?>.AuctionItemId, myFav );
              // $('#myFav<?php echo $key+1;?>').removeClass('active');
              if (thisFav >= 0) {
                $('#myFav<?php echo $key+1;?>').addClass('active');
              } else {
          $('#myFav<?php echo $key+1;?>').removeClass('active');
        }
        console.log(val<?php echo $key+1; ?>.AuctionItemId);
        console.log(thisFav);
        console.log('----------------');

              $.ajax({
                url: "<?php echo linkservice('AMSLOT'); ?>nextPrev/"+val<?php echo $key+1; ?>.NoLot+"/"+val<?php echo $key+1; ?>.ScheduleId, 
                success: function(result){
                  if (result.status) {
                    data = result.data;

                    if (data.nextLot != null) {
                      nextLot = data.nextLot;
                      nextLotImg = JSON.parse(nextLot.stock_img_url).img;
                      nextLotTitle = nextLot.stock_merk+" "+nextLot.stock_seri+" "+nextLot.stock_silinder+" "+nextLot.stock_tipe+" "+nextLot.stock_model+" "+nextLot.stock_transmisi+" "+nextLot.stock_year+"<span>Rp. "+addPeriod(nextLot.stock_startprice)+"</span>";
                      prevNext(<?php echo $key+1; ?>,'next',nextLotTitle,nextLotImg);
                    }else{
                      prevNext(<?php echo $key+1; ?>,'next','');
                    }

                    if (data.prevLot != null) {
                      prevLot = data.prevLot;
                      prevLotImg = JSON.parse(prevLot.stock_img_url).img;
                      prevLotTitle = prevLot.stock_merk+" "+prevLot.stock_seri+" "+prevLot.stock_silinder+" "+prevLot.stock_tipe+" "+prevLot.stock_model+" "+prevLot.stock_transmisi+" "+prevLot.stock_year+"<span>Rp. "+addPeriod(prevLot.stock_startprice)+"</span>";
                      prevNext(<?php echo $key+1; ?>,'prev',prevLotTitle,prevLotImg);
                    }else{
                      prevNext(<?php echo $key+1; ?>,'prev','');
                    }

                  }
                }
              });
            }else{
              reset(<?php echo $key+1;?>);
              console.log('masuk sono|used-npl<?php echo $key+1;?>');
            }
          });

          allowBid[<?php echo $key+1; ?>] = activeLot[<?php echo $key+1; ?>].child('allowBid');
          allowBid[<?php echo $key+1; ?>].on('value', function(allowBidSnap<?php echo $key+1; ?>){
            if (allowBidSnap<?php echo $key+1; ?>.val()) {
              if (bidMode == true) {
                $('#bid<?php echo $key+1;?>').prop('disabled', false);
              }
            }else{
              $('#bid<?php echo $key+1; ?>').prop('disabled', true);
            }
          });

          log[<?php echo $key+1; ?>] = activeLot[<?php echo $key+1; ?>].child('log');
          log[<?php echo $key+1; ?>].on("child_added", function(snap<?php echo $key+1; ?>) {
            logVal = snap<?php echo $key+1; ?>.val();
            if (eligibleNpl<?php echo $key+1; ?>.includes(logVal.npl)) {
              $('#top-bidder-info<?php echo $key+1;?>').show();
              $('#bid<?php echo $key+1;?>').prop('disabled', true);
            } else {
              $('#top-bidder-info<?php echo $key+1;?>').hide();
              if (bidMode == true) {
                $('#bid<?php echo $key+1;?>').prop('disabled', false);
              } 
            }

            // handle button tawar
            $('#bid<?php echo $key+1;?>').click(function(e) {
              if($('#used-npl<?php echo $key+1;?> option').filter(":selected").val() === '') {
                e.preventDefault();
                return false;
              }
              else {
                $('#lastbid<?php echo $key+1;?>').val(snap<?php echo $key+1; ?>.val().bid);
              }
            });

            $('#bidding-log<?php echo $key+1;?> li').removeClass('active');
            $('#bidding-log<?php echo $key+1;?>').prepend(logHtmlFromObject(logVal));
            $('#top-bidder<?php echo $key+1;?>').text('Rp. ' + addPeriod(snap<?php echo $key+1; ?>.val().bid));
          });
        
      activeLot[<?php echo $key+1; ?>].on("value", function(onLotSnap){
            if (onLotSnap.hasChild("winnerNPL")) {
              activeLot[<?php echo $key+1; ?>].child('winnerNPL').on('value', function(winnerSnap){
                winnerNPL = winnerSnap.val();
                //costumize the winner's npl here
                var select<?php echo $key+1; ?> = $('#used-npl<?php echo $key+1; ?>');
                    select<?php echo $key+1; ?>.find('option#<?php echo $value->ScheduleId;?>-Live-npl-'+winnerNPL).remove();
				$('#top-bidder-info<?php echo $key+1;?>').hide();
              });
            }
          });

    }
        else {
          reset(<?php echo $key+1;?>);
          console.log('masuk sana|used-npl<?php echo $key+1;?>');
        }
      }
      else{
        reset(<?php echo $key+1;?>);
    
    $.ajax({
      url: '<?php echo linkservice('NPL')."counter/npl/searchAll/"; ?>', 
      data:{
        ScheduleId: val<?php echo $key+1; ?>.ScheduleId,
        Active: 1,
        BiodataId: '<?php echo $this->userdata['UserId']; ?>',
      },
      success: function(result){
        console.log('masuk sini|used-npl<?php echo $key+1;?>');
      }
    });
      }
    });

    $('#bid<?php echo $key+1; ?>').on('click', function(){
      bid(<?php echo $key+1; ?>);
    });
    <?php endforeach; ?>


    $('#toggle').on('click', function() {
      if ($('input#toggle').is(':checked')) {

        bidMode = true;
        // $('.btn-bid').prop('disabled',false);

        <?php foreach($auctionsData as $key => $value): ?>
          var eligibleNpl<?php echo $key+1; ?> = [];
          var enableCheckOne<?php echo $key+1; ?> = true;
          var enableCheckTwo<?php echo $key+1; ?> = true;

          $('#used-npl<?php echo $key+1; ?> option').each(function () {
            eligibleNpl<?php echo $key+1; ?>.push($(this).val());
          });

          checkRef[<?php echo $key+1; ?>] = dbRef.ref('company/<?php echo $value->CompanyId; ?>');
          checkRef[<?php echo $key+1; ?>].child('liveOn').on('value', function(snapshot<?php echo $key+1; ?>) { 
            checkLiveOn[<?php echo $key+1;?>] = snapshot<?php echo $key+1; ?>.val();
            checkLiveOn[<?php echo $key+1;?>] = checkLiveOn[<?php echo $key+1;?>].split('|');
            checkActiveLot[<?php echo $key+1; ?>] = checkRef[<?php echo $key+1; ?>].child('schedule/'+checkLiveOn[<?php echo $key+1;?>][0]+'/lot|stock/'+checkLiveOn[<?php echo $key+1;?>][1]);
            checkBid[<?php echo $key+1; ?>] = checkActiveLot[<?php echo $key+1; ?>].child('log').orderByKey().limitToLast(1);
            checkBid[<?php echo $key+1; ?>].once('value', function(snapData) {
              logVal = snapData.val();
              $.each(logVal, function( index, value ) {
                if (eligibleNpl<?php echo $key+1; ?>.includes(value.npl)) {
                  enableCheckOne<?php echo $key+1; ?> = false;
                }
              });
            });
            checkAllowBid[<?php echo $key+1; ?>] = checkActiveLot[<?php echo $key+1; ?>].child('allowBid');
            checkAllowBid[<?php echo $key+1; ?>].on('value', function(allowBidSnap<?php echo $key+1; ?>){
              if (allowBidSnap<?php echo $key+1; ?>.val()) {
                enableCheckTwo<?php echo $key+1; ?> = true;
              }else{
                enableCheckTwo<?php echo $key+1; ?> = false;
              }
            });
          });

          if (enableCheckOne<?php echo $key+1; ?> == true && enableCheckTwo<?php echo $key+1; ?> == true) {
            $('#bid<?php echo $key+1; ?>').prop('disabled', false);
          }
          else {
            $('#bid<?php echo $key+1; ?>').prop('disabled', true);
          }
          
        <?php endforeach; ?>

      }
      else {
        bidMode = false;
        $('.btn-bid').prop('disabled',true);
      }
    });

    // get data favorite
    var thisCabang = [];
    <?php foreach($cabang as $row){ ?>
    thisCabang[<?php echo $row['CompanyId']; ?>] = "<?php echo (($row['CompanyName'])); ?>";
    <?php } ?>
    window.arrMonth = ['Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni', 'Juli', 'Agustus', 'September', 'Oktober', 'November', 'Desember'];

    $.ajax({
      type  : 'POST',
      url   : '<?php echo linkservice('stock')."favorite/Lists"; ?>',
      data  : 'userid=<?php echo $userdata['UserId']; ?>',
      beforeSend: function() {
        $('#favoriteId').html('<div class="loadFavSide"><img src="<?php echo base_url('assetsfront/images/loader/loading-produk.gif'); ?>" alt="Loading" width="200px" /></div>');
      },
      success: function(data) {
        var datax = data.data, 
        imgData = new Array, icarData = new Array, loadContent = '';
        for(var i = 0; i < datax.length; i++) {
          imgData[i] = callImg(datax[i]);
          icarData[i] = callIcar(datax[i]);

          var jsonData = {
            "AuctionItemId" : (datax[i].AuctionItemId !== undefined) ? datax[i].AuctionItemId : '',
            "BahanBakar"    : datax[i].bahanbakar,
            "Image"         : (imgData[i][0] !== undefined && (imgData[i][0].ImagePath).length > 0) ? 'http:'+imgData[i][0].ImagePath : '<?php echo base_url('assetsfront/images/background/default.png') ?>',
            "Kilometer"     : datax[i].km,
            "Lot"           : (datax[i].thisLotNo !== undefined && datax[i].thisLotNo !== null) ? datax[i].thisLotNo : '-',
            "Merk"          : (datax[i].merk !== undefined) ? datax[i].merk : '',
            "Model"         : (datax[i].model !== undefined) ? datax[i].model : '',
            "NoKeur"        : datax[i].nokeur,
            "NoMesin"       : datax[i].nomesin,
            "NoPolisi"      : datax[i].merk,
            "NoRangka"      : datax[i].norangka,
            "NoSTNK"        : datax[i].nostnk,
            "Seri"          : (datax[i].seri !== undefined) ? datax[i].seri : '',
            "Silinder"      : (datax[i].silinder !== undefined) ? datax[i].silinder : '',
            "TaksasiGrade"  : icarData[i].TotalEvaluationResult,
            "Tahun"         : (datax[i].tahun !== undefined) ? datax[i].tahun : '',
            "Transmisi"     : (datax[i].transmisi !== undefined) ? datax[i].transmisi : '',
            "Tipe"          : (datax[i].grade !== undefined) ? datax[i].grade : '',
            "Price"         : (datax[i].FinalPriceItem !== undefined) ? datax[i].FinalPriceItem : 0,
            "Warna"         : datax[i].warna
          };
          var json_str = JSON.stringify(jsonData);
          var lot = (datax[i].thisLotNo !== null && datax[i].thisLotNo !== undefined) ? datax[i].thisLotNo : '-' ;
          var schedule = (datax[i].thisScheduleId !== null) ? datax[i].thisScheduleId : 0 ;
          var lokasi = 'Belum Tersedia';
          var waktu = 'Belum Tersedia';
          var lokasiLelang = (thisCabang[datax[i].CompanyId] !== undefined) ? thisCabang[datax[i].CompanyId] : 'Belum Tersedia';
          
          if (schedule > 0) {
            var dateSplit = datax[i].date.split('-');
            waktu = dateSplit[2]+' '+arrMonth[dateSplit[1]-1]+' '+dateSplit[0] + ' ' + datax[i].waktu;
          }

          loadContent += '<div class="list-product box-recommend">'+
                        '<a href="javascript:void(0)">'+
                        '<div class="thumbnail">'+
                        '<div class="thumbnail-custom">'+
                        '<img alt="" src="'+jsonData.Image+'">'+
                        '</div>'+
                        '<div class="overlay-grade">'+
                        'Grade <span>'+icarData[i].TotalEvaluationResult+'</span>'+
                        '</div>'+
                        '<p class="overlay-lot">LOT '+lot+'</p>'+
                        '</div>'+
                        '<div class="boxright-mobile">'+
                        '<h2>'+jsonData.Merk+' '+jsonData.Seri+' '+jsonData.Silinder+' '+jsonData.Tipe+' '+jsonData.Model+' '+jsonData.Transmisi+'</h2>'+
                        '<span>'+jsonData.Tahun+'</span> <span class="price">Rp. '+currency_format(jsonData.Price)+'</span>'+
                        '<p><span>Jadwal</span> <span class="fa fa-calendar"></span> <span class="wkt'+datax[i].thisScheduleId+'">'+waktu+'</span></p>'+
                        '<p><span>Lokasi</span> <span class="fa fa-map-marker"></span> <span class="sch'+datax[i].thisScheduleId+'">'+lokasiLelang+'</span></p>'+
                        '</div>'+
                        '</a>'+
                        '<div class="action-bottom">'+
                        '<button class="btn"><i class="fa fa-heart"></i> <span>Favorit</span></button>'+
                        '<button class="btn btn-compare" onclick=\'set_compare_product('+json_str+', "")\'><i class="ic ic-Bandingkan-green"></i><span>Bandingkan</span></button>'+
                        '</div>'+
                        '</div>';
        }
        $('#favoriteId').html(loadContent);

        /*if (schedule > 0) {
          $.ajax({
            type: 'GET',
            url: 'http://alpha.ibid.astra.co.id/backend/serviceams/lot/api/getLotDataOnline?schedule='+schedule+'&lot='+lot,
            success: function(sch) {
              var dateSplit = sch.schedule.date.split('-');
              lokasi = sch.schedule.CompanyName;
              waktu = dateSplit[2]+' '+arrMonth[dateSplit[1]-1]+' '+dateSplit[0] + ' ' + sch.schedule.waktu;
              $('.wkt'+schedule).html(waktu);
            }
          });
        }*/
      },
      error: function(e) {
        $('#favoriteId').html('<div class="loadFavSide"><img src="<?php echo base_url('assetsfront/images/background/management-empty.png'); ?>" alt="Loading" width="200px" /><div style="margin-top-10px">Data Favorite Tidak Ada</div></div>');
        console.log(e);
      }
    });
  });

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

  function logHtmlFromObject(log){
    var html = '<li class="active">Rp. '+addPeriod(log.bid)+' <span>'+log.type+' Bidder</span></li>'
    return html;
  }

  function reset(key){
    $('#lot-title'+key).text("-");
    $('#lot-number'+key).text("-");
    $('#lot-startprice'+key).text("-");
    $('#lot-year'+key).text("-");
    $('#lot-kilometers'+key).text("-");
    $('#lot-color'+key).text("-");
    $('#lot-transmission'+key).text("-");
    $('#lot-exterior'+key).text("-");
    $('#lot-interior'+key).text("-");
    $('#lot-mechanical'+key).text("-");
    $('#lot-fuel'+key).text("-");
    $('#lot-frame'+key).text("-");
    $('#lot-grade'+key).text("-");
    $('#lot-img'+key).attr("src","<?php echo base_url('assetsfront/images/background/default.png'); ?>");
    $('#bid'+key).prop('disabled',true);
    prevNext(key,'next','');
    prevNext(key,'prev','');
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

  function prevNext(key, state, title, img = "<?php echo base_url('assetsfront/images/background/default.png'); ?>"){
    $('#lot-'+state+'-title'+key).html(title);
    $('#lot-'+state+'-img'+key).attr("src",img);
  }

  function bid(key){
    const bidedLotData = selectedLot[key];
    const allowed = allowBid[key];
    const lastBid = $('#lastbid'+key).val();

    allowed.once('value', function(allowedSnap){
      if (allowedSnap.val()) {    
        bidedLotData.once('value', function(lotDataSnap){
          startPrice = lotDataSnap.exists() ? lotDataSnap.val().StartPrice : 0;
          if (lastBid <= 0) {
            newbid = parseInt(startPrice);
          } else{
            newbid = parseInt(lastBid) + parseInt(lotDataSnap.val().Interval);
          }
          tasksRef[key].push({
            bid: newbid,
            npl: $('#used-npl'+key).val(),
            type: 'Online',
          });
        });
      }else{
        alert('bid is not allow bro!!');
      }
    })
  }
</script>
