<footer>
  <div class="container-fluid">
    <div class="row">
      <div class="col-md-4 social-media text-right">
        <ul>
          <li><a href="" title="Instagram"><i class="fa fa-instagram"></i></a></li>
          <li><a href="" title="Twitter"><i class="fa fa-twitter"></i></a></li>
          <li><a href="" title="Facebook"><i class="fa fa-facebook"></i></a></li>
          <li><a href="" title="Youtube"><i class="fa fa-youtube-play"></i></a></li>
        </ul>
      </div>
      <div class="col-md-4 footer-link text-center">
        <ul>
          <li><a href="<?php echo site_url('about'); ?>">Tentang Ibid</a></li>
          <li><a href="<?php echo site_url('faq'); ?>">FAQ</a></li>
          <li><a href="<?php echo site_url('blog'); ?>">Blog</a></li>
          <li><a href="<?php echo site_url(); ?>">Privacy Policy</a></li>
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
          <form class="form-login" id="form-login" action="<?php echo site_url('login'); ?>" method="POST" data-provide="validation">
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
            <div class="forgot"><a href="<?php echo site_url('forgot'); ?>">Lupa password?</a></div>
            <div class="form-group text-right">
              <div class="inis"><button class="btn btn-green" id="btn-loginx">Masuk</button></div>
              <div class="none"><a href="<?php echo site_url('register'); ?>">Belum punya akun</a></div>
            </div>
            <span class="or">Atau</span>
          </form>
        </div>
        <div class="col-md-6 col-sm-6">
          <div class="login-socialmedia">
            <a href="<?php echo facebook(); ?>" class="login-facebook"><i class="ic ic-facebook"></i> Masuk melalui Facebook</a>
            <a href="<?php echo site_url('omni/twitter/twitter');?>" class="login-twitter"><i class="ic ic-twitter"></i> Masuk melalui Twitter</a>
            <a href="<?php echo google(); ?>" class="login-google"><i class="ic ic-Google"></i> Masuk melalui Google</a>
            <a href="<?php echo linkedin(); ?>" class="login-linkedin"><i class="ic ic-linkedin"></i> Masuk melalui Linkedin</a>
          </div>
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
  $('#btn-login').click(function(e) {console.log('login');
    var user = $('#username').val(), pass = $('#password').val();
    if(user !== '' && pass !== '') {
      e.preventDefault();
      if(pass.length < 8) {
        bootoast.toast({
          message: 'Sandi tidak boleh kurang dari 8 karakter',
          type: 'warning',
          position: 'top-center',
          timeout: 5
        });
      }
      else {
        $('#btn-login').attr('disabled', true);
        $('#form-logins').submit();
      }
    }
  });
  $('#btn-loginx').click(function(e) {console.log('loginx');
    var userx = $('#usernamex').val(), passx = $('#passwordx').val();
    if(userx !== '' && passx !== '') {
      e.preventDefault();
      if(passx.length < 8) {
        bootoast.toast({
          message: 'Sandi tidak boleh kurang dari 8 karakter',
          type: 'warning',
          position: 'top-center',
          timeout: 5
        });
      }
      else {
        $('#btn-loginx').attr('disabled', true);
        $('#form-login').submit();
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
  $('.section-recommend').slick({
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
</script>
</body>
</html>
