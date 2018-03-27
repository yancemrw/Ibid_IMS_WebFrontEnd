<section class="section section-auction">
  <div class="container-fluid">
    <div class="row">
      <div class="list-favorite">
        <a href="javascript:;" class="favorite-button">
          <div class="favorite">
            <i class="fa fa-heart"></i>
          </div>
        </a>
        <div class="favorite-box">
          <div class="list-product box-recommend">
            <a href="halaman-detail-kendaraan.html">
            <div class="thumbnail">
              <div class="thumbnail-custom">
                <img alt="" src="<?php echo $img1; ?>">
              </div>
              <div class="overlay-grade">
                Grade <span>A</span>
              </div>
              <p class="overlay-lot">LOT 170</p>
            </div>
            <div class="boxright-mobile">
              <h2>DAIHATSU LUXIO 1.5 X MINIBUS AT </h2>
              <span>2014</span> <span class="price">Rp. 72,000,000</span>
              <p><span>Jadwal</span> <span class="fa fa-calendar"></span> <span>04 September 2017</span></p>
              <p><span>Lokasi</span> <span class="fa fa-map-marker"></span> <span>Jakarta</span></p>
            </div>
            </a>
            <div class="action-bottom">
              <button class="btn"><i class="fa fa-heart"></i> <span>Favorit</span></button>
              <button class="btn btn-compare"><i class="ic ic-Bandingkan-green"></i> <span>Bandingkan</span></button>
            </div>
          </div>
          <div class="list-product box-recommend">
            <a href="halaman-detail-kendaraan.html">
              <div class="thumbnail">
                <div class="thumbnail-custom">
                  <img alt="" src="<?php echo $img1; ?>">
                </div>
                <div class="overlay-grade">
                  Grade <span>A</span>
                </div>
                <p class="overlay-lot">LOT 170</p>
              </div>
              <div class="boxright-mobile">
                <h2>DAIHATSU LUXIO 1.5 X MINIBUS AT </h2>
                <span>2014</span> <span class="price">Rp. 72,000,000</span>
                <p><span>Jadwal</span> <span class="fa fa-calendar"></span> <span>04 September 2017</span></p>
                <p><span>Lokasi</span> <span class="fa fa-map-marker"></span> <span>Jakarta</span></p>
              </div>
            </a>
            <div class="action-bottom">
              <button class="btn"><i class="fa fa-heart"></i> <span>Favorit</span></button>
              <button class="btn btn-compare"><i class="ic ic-Bandingkan-green"></i> <span>Bandingkan</span></button>
            </div>
          </div>
          <div class="list-product box-recommend">
            <a href="halaman-detail-kendaraan.html">
              <div class="thumbnail">
                <div class="thumbnail-custom">
                  <img alt="" src="<?php echo $img1; ?>">
                </div>
                <div class="overlay-grade">
                  Grade <span>A</span>
                </div>
                <p class="overlay-lot">LOT 170</p>
              </div>
              <div class="boxright-mobile">
                <h2>DAIHATSU LUXIO 1.5 X MINIBUS AT </h2>
                <span>2014</span> <span class="price">Rp. 72,000,000</span>
                <p><span>Jadwal</span> <span class="fa fa-calendar"></span> <span>04 September 2017</span></p>
                <p><span>Lokasi</span> <span class="fa fa-map-marker"></span> <span>Jakarta</span></p>
              </div>
            </a>
            <div class="action-bottom">
              <button class="btn"><i class="fa fa-heart"></i> <span>Favorit</span></button>
              <button class="btn btn-compare"><i class="ic ic-Bandingkan-green"></i> <span>Bandingkan</span></button>
            </div>
          </div>
        </div>
      </div>
      <div class="col-md-12 text-right clearfix">
        <form class="clearfix form-inline">
          <div class="form-group status-auction">
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
            <p class="wifi">201MS</p>
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
                      <div class="overlay-sold-out" id="overlay<?php echo $key+1;?>">
                      </div>
                    </div>
                      <h2 class="overlay-title" id="lot-title<?php echo $key+1;?>">-</h2>
                      <ul class="grade-auction">
                         <li><a href="" class="active"><i class="fa fa-heart"></i></a></li>
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
                      <div class="select-code clearfix">
                         <select class="form-control select-custom" id="used-npl<?php echo $key+1;?>">
                            <?php foreach($thisNpl[$key] as $row){ ?>
                            <option value="100002"><?php echo $row->NPLNumber; ?></option>
                            <?php } ?>
                            <!-- option value="100001" selected>#100001</option>
                            <option value="100002">#100002</option>
                            <option value="100003">#100003</option>
                            <option value="100004">#100004</option -->
                         </select>
                      </div>
                      <div class="button-bid">
                         <button class="btn btn-bid btn-violet" id="bid<?php echo $key+1;?>">TAWAR</button>
                      </div>
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
/*end of signal*/
</style>

<script>
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

    <?php foreach($auctionsData as $key => $value): ?>
    var eligibleNpl<?php echo $key+1; ?> = [];

    $('#used-npl<?php echo $key+1; ?> option').each(function () {
      eligibleNpl<?php echo $key+1; ?>.push($(this).val());
    });

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

              $.ajax({
                url: "http://alpha.ibid.astra.co.id/backend/serviceams/lot/api/nextPrev/"+val<?php echo $key+1; ?>.NoLot+"/"+val<?php echo $key+1; ?>.ScheduleId, 
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
            $('#lastbid<?php echo $key+1;?>').val(snap<?php echo $key+1; ?>.val().bid);
            $('#bidding-log<?php echo $key+1;?> li').removeClass('active');
            $('#bidding-log<?php echo $key+1;?>').prepend(logHtmlFromObject(logVal));
            $('#top-bidder<?php echo $key+1;?>').text('Rp. ' + addPeriod(snap<?php echo $key+1; ?>.val().bid));
          });
        }
        else {
          reset(<?php echo $key+1;?>);
        }
      }
      else{
        reset(<?php echo $key+1;?>);
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

  });

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