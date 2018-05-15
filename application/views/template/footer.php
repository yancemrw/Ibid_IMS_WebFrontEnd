<footer>
  <div class="container-fluid">
    <div class="row">
      <div class="col-md-4 social-media text-right">
        <ul>
          <li><a href="https://www.instagram.com/ibid_balailelangserasi/" title="Instagram" target="_blank"><i class="fa fa-instagram"></i></a></li>
          <li><a href="https://twitter.com/ibid_lelang?lang=en" title="Twitter" target="_blank"><i class="fa fa-twitter"></i></a></li>
          <li><a href="https://www.facebook.com/IbidBalaiLelangSerasi/" title="Facebook" target="_blank"><i class="fa fa-facebook"></i></a></li>
          <li><a href="https://www.youtube.com/channel/UClTIiqX7MwL7MDOK0IoKEiQ" title="Youtube" target="_blank"><i class="fa fa-youtube-play"></i></a></li>
        </ul>
      </div>
      <div class="col-md-4 footer-link text-center">
        <ul>
          <li><a href="<?php echo site_url('about'); ?>">Tentang Ibid</a></li>
          <li><a href="<?php echo site_url('faq'); ?>">FAQ</a></li>
          <li><a href="<?php echo site_url('blog'); ?>">Blog</a></li>
          <li><a href="javascript:void(0)" data-toggle="modal" data-target="#privacy-modal-home">Privacy Policy</a></li>
        </ul>
      </div>
      <div class="col-md-4 copyright">
        <p>PT BALAI LELANG SERASI &copy; 2017</p>
      </div>
    </div>
  </div>
</footer>

<!-- LOGIN -->
<div class="modal fade modal-login" id="login" tabindex="-1" role="dialog" aria-labelledby="modalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal"><i class="ic ic-Close"></i><span class="sr-only">Close</span></button>
        <h3 class="modal-title" id="lineModalLabel">Login</h3>
      </div>
      <div class="modal-body clearfix">
        <div class="col-md-6 col-sm-6">
          <form class="form-login" id="form-login" data-provide="validation">
            <div class="form-group floating-label">
              <input type="email" class="form-control floating-handle input-custom is-invalid" id="usernamex" name="username"
                      oninvalid="this.setCustomValidity('Email tidak boleh kosong')" oninput="setCustomValidity('')" required />
              <label for="">Email</label>
            </div>
            <div class="form-group floating-label">
              <input type="password" class="form-control floating-handle input-custom is-invalid" id="passwordx" name="password" 
                      oninvalid="this.setCustomValidity('Password tidak boleh kosong')" oninput="setCustomValidity('')" required />
              <label for="">Password</label>
            </div>
            <div class="forgot"><a href="<?php echo site_url('forgot'); ?>">Lupa kata sandi?</a></div>
            <div class="form-group text-right">
              <div class="inis"><button class="btn btn-green" id="btn-loginx">Masuk</button></div>
              <div class="none"><a href="<?php echo site_url('register'); ?>" class="width-125px">Belum punya akun</a></div>
            </div>
            <span class="or">Atau</span>
          </form>
        </div>
        <div class="col-md-6 col-sm-6">
          <div class="login-socialmedia">
            <a href="javascript:void(0);" class="login-facebook"><i class="ic ic-facebook"></i> Masuk melalui Facebook</a>
            <a href="<?php echo site_url('omni/twitter/twitter');?>" class="login-twitter"><i class="ic ic-twitter"></i> Masuk melalui Twitter</a>
            <a href="<?php echo google(); ?>" class="login-google"><i class="ic ic-Google"></i> Masuk melalui Google</a>
            <a href="<?php echo linkedin(); ?>" class="login-linkedin"><i class="ic ic-linkedin"></i> Masuk melalui Linkedin</a>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

<!-- MODAL PRIVASI -->
<div class="modal fade" id="privacy-modal-home" tabindex="-1" role="dialog" aria-labelledby="modalLabel" aria-hidden="true">
  <div class="modal-dialog width-80">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal"><i class="ic ic-Close"></i><span class="sr-only">Close</span></button>
        <h3 class="modal-title" id="lineModalLabel">Kebijakan Privasi</h3>
      </div>
      <div class="modal-body clearfix">
        <div class="col-md-12 col-sm-12">
          <?php $this->load->view('userguide/privacy_policy.html'); ?>
        </div>
      </div>
    </div>
  </div>
</div>

<!-- Notifikasi  -->
<?php if ($this->session->flashdata('message')) { 

  // echo ;
  $message = $this->session->flashdata('message');

  ?>
  <script type="text/javascript">
    $(document).ready(function() { 
      bootoast.toast({
        message: '<?=@$message[1]?>',
        type: '<?=@$message[0]?>',
        position: 'top-center',
        timeout: 5
      });
    });
  </script>
  <?php } ?>
  <!-- End  -->

<script type="text/javascript">
  // handle login
  $('#btn-login').click(function(e) {
    var user = $('#username').val(), pass = $('#password').val();
    if(user !== '' && pass !== '') {
      e.preventDefault();
      if(pass.length < 8) {
        bootoast.toast({
          message: 'Sandi tidak boleh kurang dari 8 karakter',
          type: 'warning',
          position: 'top-center',
          timeout: 4
        });
        return false;
      }
      else {
        $('#btn-login').attr('disabled', true);
        $.ajax({
          type: 'POST',
          url: '<?php echo site_url('login'); ?>',
          data: 'username='+user+'&password='+pass,
          beforeSend: function() {
            $('#btn-login').html('Masuk <i class="fa fa-spin fa-refresh" style="position:absolute; margin-top:3px; right:87px; z-index:1;"></i>');
          },
          success: function(data) {
            var data = JSON.parse(data);
            if(data.status === 1) {
              setTimeout(function() {
                checkCookiePages(); // handle remove refer page after login
                location.href = data.url;
              }, 1500);
              return false;
            }
            else {
              $('#btn-login').attr('disabled', false).html('Masuk');
              bootoast.toast({
                message: data.messages,
                type: 'warning',
                position: 'top-center',
                timeout: 4
              });
              return false;
            }
          },
          error: function() {
            $('#btn-login').attr('disabled', false).html('Masuk');
            bootoast.toast({
              message: 'Terjadi Masalah Pada Koneksi ke Server',
              type: 'warning',
              position: 'top-center',
              timeout: 4
            });
          }
        });
      }
    }
  });
  $('#btn-loginx').click(function(e) {
    var userx = $('#usernamex').val(), passx = $('#passwordx').val();
    if(userx !== '' && passx !== '') {
      e.preventDefault();
      if(passx.length < 8) {
        bootoast.toast({
          message: 'Sandi tidak boleh kurang dari 8 karakter',
          type: 'warning',
          position: 'top-center',
          timeout: 4
        });
        return false;
      }
      else {
        $('#btn-loginx').attr('disabled', true);
        $.ajax({
          type: 'POST',
          url: '<?php echo site_url('login'); ?>',
          data: 'username='+userx+'&password='+passx,
          beforeSend: function() {
            $('#btn-loginx').html('Masuk <i class="fa fa-spin fa-refresh" style="position:absolute; top:18px; right:30px;"></i>');
          },
          success: function(data) {
            var data = JSON.parse(data);
            if(data.status === 1) {
              setTimeout(function() {
                checkCookiePages(); // handle remove refer page after login
                location.href = data.url;
              }, 1500);
              return false;
            }
            else {
              $('#btn-loginx').attr('disabled', false).html('Masuk');
              bootoast.toast({
                message: data.messages,
                type: 'warning',
                position: 'top-center',
                timeout: 4
              });
              return false;
            }
          },
          error: function() {
            $('#btn-loginx').attr('disabled', false).html('Masuk');
            bootoast.toast({
              message: 'Terjadi Masalah Pada Koneksi ke Server',
              type: 'warning',
              position: 'top-center',
              timeout: 4
            });
          }
        });
      }
    }
  });

  function showContent() {
    if(document.getElementById('content') !== null) {
      document.getElementById('preloader').style.display = 'none';
      if(document.getElementById('preloaderAuction').style.display === 'none') {
        document.getElementById('content').style.visibility = 'visible'; 
      }
    }
  }

  setTimeout(function() {
    if(document.getElementById('preloader') !== null) {
      if(document.getElementById('preloader').style.display === 'none') {
        showContent();
      }
    }
  }, 1000);

$(document).ready(function() {

<?php
  $ci = &get_instance();
  $error = $ci->session->flashdata('error_message');
  if($error){
?>
  bootoast.toast({
    message: "<?=$error?>",
    type: 'warning',
    position: 'top-center',
    timeout: 5
  });
<?php
  }
?>

  // ***** handle floating placeholder input field *****
  $('.floating-handle').blur(function() {
    tmpval = $(this).val();
    if(tmpval == '') {
      $(this).addClass('empty').removeClass('not-empty');
    }
    else {
      $(this).addClass('not-empty').removeClass('empty');
    }

    // for date
    /*if($(this).parent().hasClass('date') === true) {
      if($(this).val() === '') {
        $(this).css('border', 'none');
        $(this).parent().css('border', '1px solid #dc3545');
        $('.input-group-addon').css('border', 'none');
      }
      else {
        $(this).css('border', '1px solid #CCC');
        $(this).parent().css('border', 'none');
        $('.input-group-addon').css({'border-top':'1px solid #ccc', 'border-right':'1px solid #ccc', 'border-bottom':'1px solid #ccc'});
      }
    }*/
  });
  // **************************************************

  // ***** class number only *****
  $('.only-number').keypress(function(event) {
    var charCode = (event.which) ? event.which : event.keyCode;
    return (charCode >= 48 && charCode <= 57);
  });
  // *****************************

  // ***** disabled color *****
  $('input:disabled').css({'background':'#E0E0E0', 'z-index':'2'});
  // **************************

  $("nav").sticky({
    topSpacing:0
  });

  $(".select-custom").select2({
    minimumResultsForSearch: -1
  });

  $(".select-type").select2({
    minimumResultsForSearch: -1,
    templateResult: formatState,
    templateSelection: formatState
  });

  function formatState(state) {
    if (!state.id) { return state.text; }
    var $state = $(
    '<span ><img sytle="display: inline-block;" src="<?php echo base_url('assetsfront/images/icon/'); ?>' + state.element.value.toLowerCase() + '.png" /> ' + state.text + '</span>'
    );
    return $state;
  }

$('.why-ibid').slick({
    dots: false,
    infinite: false,
    speed: 300,
    slidesToShow: 6,
    slidesToScroll: 6,
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
        breakpoint: 600,
        settings: {
          slidesToShow: 3,
          slidesToScroll: 3,
          dots: true,

          prevArrow: false,
          nextArrow: false
        }
      },
      {
        breakpoint: 480,
        settings: {
          slidesToShow: 3,
          slidesToScroll: 3,
          dots: true,

          prevArrow: false,
          nextArrow: false
        }
      }
    ]
  });

  $('.howTo-bid').slick({
    dots: false,
    infinite: false,
    speed: 300,
    slidesToShow: 6,
    slidesToScroll: 6,
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
        breakpoint: 600,
        settings: {
          slidesToShow: 3,
          slidesToScroll: 3,
          dots: true,

          prevArrow: false,
          nextArrow: false
        }
      },
      {
        breakpoint: 480,
        settings: {
          slidesToShow: 3,
          slidesToScroll: 3,
          dots: true,

          prevArrow: false,
          nextArrow: false
        }
      }
    ]
  });

  $('.testimoni-slide').slick({
    dots: false,
    infinite: false,
    speed: 300,
    slidesToShow: 3,
    slidesToScroll: 3,
    responsive: [
      {
        breakpoint: 1024,
        settings: {
          slidesToShow: 3,
          slidesToScroll: 3,
          infinite: false,
          dots: true
        }
      },
      {
        breakpoint: 800,
        settings: {
          slidesToShow: 2,
          slidesToScroll: 1,
          infinite: false,
          dots: true
        }
      },
      { 
        breakpoint: 480,
        settings: {
          slidesToShow: 1,
          slidesToScroll: 1,
          infinite: false,
          dots: true
        }
      }
    ]
  });

  $('#toggle-nav').click(function() {
    $('.navbar-collapse.collapse').toggleClass('open')
  });

  $('.nav-close').click(function() {
    $('.navbar-collapse.collapse').toggleClass('open')
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
  });
});

// handle input number only for mobile and website
function checkOnlyNumber(ele, event, max) {
  var charCode = (event.which) ? event.which : event.keyCode;
  var val = $(ele).val();
  //if(charCode === 190 || charCode === 229 || val.substr(val.length-1, val.length) == ".") {
  if(charCode === 190 || charCode === 229) {
    //$(ele).val(val.replace(new RegExp(".",""), ""));
    var regexp = new RegExp(".", "");
    $(ele).val($(ele).val().replace(regexp, ""));
    return false;
  }
  else if($(ele).val().length >= max) {
    $(ele).val(val.substr(0, max));
  }
  else if(charCode === 8){
    $(ele).val(val.substr(0, (val.length)));
  }
}

// ini animasi mobil nabrak plang iBid
function preload(opacity) {
   if(opacity <= 0) {
      showContent();
   }
   else {
      document.getElementById('preloader').style.opacity = opacity;
      window.setTimeout(function() { preload(opacity - 0.05) }, 100);
   }
}

function checkCookiePages() {
  var pages = getActiveMenu('refer_page');
  if(pages != "") {
    deleteActiveMenu('refer_page');
  }
}


// =========================================================================
// for new facebook login
// =========================================================================
function testAPI() {
  FB.api('/me', {fields: 'email, name'}, function(response) {
    $.ajax({
      url: "<?=site_url('index.php/omni/facebook/callback/js_login')?>",
      type: "POST",
      data: response,
      success: function(resp){
        var resp = JSON.parse(resp);
        bootoast.toast({
          message: resp.message,
          type: resp.status?'success':'warning',
          position: 'top-center',
          timeout: 5
        });

        if(resp.status){
          setTimeout(function(){
            window.location = resp.data.redirect;
          }, 6000);
        }
      },
      error: function(e){
        bootoast.toast({
          message: "Tidak bisa menghubung ke server",
          type: 'warning',
          position: 'top-center',
          timeout: 5
        });
      }
    });
  });
}

(function(d, s, id){
   var js, fjs = d.getElementsByTagName(s)[0];
   if (d.getElementById(id)) {return;}
   js = d.createElement(s); js.id = id;
   js.src = "https://connect.facebook.net/en_US/sdk.js";
   fjs.parentNode.insertBefore(js, fjs);
 }(document, 'script', 'facebook-jssdk'));

$(function(){
  $('a.login-facebook').click(function(){
      FB.init({
        appId            : '156419028454962',
        autoLogAppEvents : true,
        xfbml            : true,
        version          : 'v2.12'
      });
      FB.login(testAPI, {scope: 'email,public_profile', return_scopes: true});
  });
});
// =========================================================================
// created by andi

// get notification
var getTopLocaleStore = JSON.parse(localStorage.getItem("NotifReload")); // cek timestamp from localstorage
var nowsTime = new Date();
/*if(nowsTime.getTime() <= getTopLocaleStore.timestamp) {
  var data = getTopLocaleStore.data, html = '';
  if(data.length > 0) {
    for(var i = 0; i < data.length; i++) {
      var images = JSON.parse(data[i].Image),
      stat = (data[i].StatusUser === 'seller') ? data[i].SubTitle : 'No. NPL #002';
      html += '<li class="input-dropdown">'+
              '<a href="javascript:void(0)">'+
              '<div class="transaction-image">'+
              '<img src="'+images.img+'" alt="" title="">'+
              '</div>'+
              '<div class="transaction-content">'+
              '<h2>'+data[i].Title+'</h2>'+
              '<p>'+stat+'<span>Rp. '+currency_format(data[i].Billing)+'</span></p>'+
              '</div>'+
              '</a>'+
              '</li>';
    }
  }
  else {
    html = 'Tidak Ada Transaksi';
  }
  $('#top-transaction').html(html);
  $('#top-transaction-mobile').html(html);
}
else {*/
  var TopUserId = '<?php echo $this->session->userdata('userdata')['UserId'] ?>';
  if(TopUserId !== '') {
    $.ajax({
      url: '<?php echo linkservice('account').'notifications/get'; ?>',
      type: 'POST',
      data: "type=2&UserId="+TopUserId,
      beforeSend: function() {
        $('#top-transaction').html('<img src="<?php echo base_url('assetsfront/images/loader/formloader.gif'); ?>" width="24">');
        $('#top-transaction-mobile').html('<img src="<?php echo base_url('assetsfront/images/loader/formloader.gif'); ?>" width="24">');
      },
      success: function(data) {
        var data = data.data, html = '';
        var tenMinutesLater = new Date();
        tenMinutesLater.setMinutes(tenMinutesLater.getMinutes() + 10)
        var localStore = {
          timestamp: tenMinutesLater.getTime(),
          data: data
        };
        localStorage.setItem("NotifReload", JSON.stringify(localStore));
        if(data.length > 0) {
          for(var i = 0; i < data.length; i++) {
            var images = JSON.parse(data[i].Image),
            stat = (data[i].StatusUser === 'seller') ? data[i].SubTitle : 'No. NPL #002';
            html += '<li class="input-dropdown">'+
                    '<a href="javascript:void(0)">'+
                    '<div class="transaction-image">'+
                    '<img src="'+images.img+'" alt="" title="">'+
                    '</div>'+
                    '<div class="transaction-content">'+
                    '<h2>'+data[i].Title+'</h2>'+
                    '<p>'+stat+'<span>Rp. '+currency_format(data[i].Billing)+'</span></p>'+
                    '</div>'+
                    '</a>'+
                    '</li>';
          }
        }
        else {
          html = 'Tidak Ada Transaksi';
        }
        $('#top-transaction').html(html);
        $('#top-transaction-mobile').html(html);
      }
    });
  }
//}

$('.scroll-dropdown').slimscroll({ allowPageScroll: true });
$('.scroll-dropdown-mobile').slimscroll({ allowPageScroll: true });
var UserId    = '<?php echo $this->session->userdata('userdata')['UserId']; ?>';
var dbRef     = firebase.database();
var notifRef  = dbRef.ref('notifications/penitip/'+UserId);
notifRef.on('value', function(snapshot) {
  if(snapshot.val() !== null) {
    var val = snapshot.val(),
    data = '', data_notif = '<ul class="notification">',
    object_key = Object.values(val).reverse();
    for(var i = 0; i < object_key.length; i++) {
      var img_src;
      switch(object_key[i].type) {
        case 'email': img_src = '<?php echo base_url('assetsfront/images/icon/ic_notif_1.png'); ?>'; break;
        case 'cc': img_src = '<?php echo base_url('assetsfront/images/icon/ic_notif_2.png'); ?>'; break;
        case 'pay': img_src = ''; break;
      }
      data += '<li class="clearfix">'+
              '<a href="'+object_key[i].link+'">'+
              '<div class="media-image">'+
              '<img src="'+img_src+'" alt="" title="">'+
              '</div>'+
              '<div class="media-content">'+
              '<h2>1 Pesan Email</h2>'+
              '<p>'+object_key[i].text+'<span>'+object_key[i].date+'</span></p>'+
              '</div>'+
              '</a>'+
              '</li>';
      data_notif += '<li>'+
                    '<div class="notif-image"><img src="'+img_src+'" alt=""></div>'+
                    '<div class="notif-desc">'+
                    '<h3>1 Pesan Email <span>'+object_key[i].date+'</span></h3>'+
                    '<p>'+object_key[i].text+'</p>'+
                    '</div>'+
                    '</li>';
    }
    data_notif += '</ul>';
    data += '<li class="text-center"><a href="" class="viewall-dropdown">Lihat Semua Notifikasi</a></li>';
    $('.notif-count').addClass('notification');
    $('.notif-count').html(object_key.length);
    $('.notif-content').children().children().children('#header-notif').nextAll().each(function(x) {
      if($(this).children().hasClass('notif') === false) {
        if(x > 0) {
          this.remove();
        }
      }
    }).promise().done(function() {
      $('.notif-content').children().children().children('#header-notif').nextAll().replaceWith(data);
    });
    
    $('.notif-content-mobile').children().children().children('#header-notif-mobile').nextAll().each(function(x) {console.log(x);
      if($(this).children().hasClass('notif') === false) {
        if(x > 0) {
          this.remove();
        }
      }
    }).promise().done(function() {
      $('.notif-content-mobile').children().children().children('#header-notif-mobile').nextAll().replaceWith(data);
    });

    // set for content notification
    $('#notif-dashboard').children().replaceWith(data_notif);
  }
  else {
    $('.notif-count').html('');
    $('.notif-count').removeClass('notification');
  }
});
</script>
</body>
</html>
