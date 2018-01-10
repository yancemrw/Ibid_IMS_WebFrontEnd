  <footer>
    <div class="container-fluid">
     <div class="row">
      <div class="col-md-4 social-media text-right">
       <ul>
        <li><a href=""><i class="fa fa-instagram"></i></a></li>
        <li><a href=""><i class="fa fa-twitter"></i></a></li>
        <li><a href=""><i class="fa fa-facebook"></i></a></li>
        <li><a href=""><i class="fa fa-youtube-play"></i></a></li>
      </ul>
    </div>
    <div class="col-md-4 footer-link text-center">
     <ul>
      <li><a href="tentang-ibid.html">Tentang Ibid</a></li>
      <li><a href="faq.html">FAQ</a></li>
      <li><a href="blog.html">Blog</a></li>
      <li><a href="">Privacy Policy</a></li>
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
    <h3 class="modal-title" id="lineModalLabel">Log in</h3>
  </div>
  <div class="modal-body clearfix">
    <div class="col-md-6 col-sm-6">
     <form class="form-login" action="<?php echo site_url('front'); ?>" method="POST">
      <div class="form-group floating-label">
       <input type="email" class="form-control floating-handle" id="username" name="username">
       <label for="">Email</label>
     </div>
     <div class="form-group floating-label">
       <input type="password" class="form-control floating-handle" id="password" name="password">
       <label for="">Password</label>
     </div>
     <a href="<?php echo site_url('forgot_password'); ?>">Lupa password?</a>
     <div class="form-group text-right">
       <button class="btn btn-green">Masuk</button>
       <a href="<?php echo site_url('register'); ?>">Belum punya akun</a>
     </div>
     <span class="or">Or</span>
   </form>
 </div>
 <div class="col-md-6 col-sm-6">
   <div class="login-socialmedia">
    <a href="<?php echo facebook(); ?>" class="login-facebook"><i class="ic ic-facebook"></i> Masuk melalui facebook</a>
    <a href="<?php echo site_url('omni/twitter/twitter');?>" class="login-twitter"><i class="ic ic-twitter"></i> Masuk melalui twitter</a>
    <a href="<?php echo google(); ?>" class="login-google"><i class="ic ic-Google"></i> Masuk melalui google</a>
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
      swal("<?=@$message[2]?> ", "<?=@$message[1]?>" , "<?=@$message[0]?>");
    });
  </script>
  <?php } ?>
  <!-- End  -->

  <script>
   var preloader;

   function preload(opacity) {
     if(opacity <= 0) {
       showContent();
     }
     else {
       preloader.style.opacity = opacity;
       window.setTimeout(function() { preload(opacity - 0.05) }, 100);
     }
   }

   function showContent() {
    preloader.style.display = 'none';
    document.getElementById('content').style.visibility = 'visible';
  }

  document.addEventListener("DOMContentLoaded", function () {
    preloader = document.getElementById('preloader');
    preload(1);
  });
</script>


<script type="text/javascript">
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
      if($(this).parent().hasClass('date') === true) {
        if($(this).val() === '') {
          $(this).css('border', 'none');
          $(this).parent().css('border', '1px solid #dc3545');
        }
        else {
          $(this).css('border', '1px solid #CCC');
          $(this).parent().css('border', 'none');
        }
      }
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
        '<span ><img sytle="display: inline-block;" src="http://sera-ibid.stagingapps.net/assets/images/icon/' + state.element.value.toLowerCase() + '.png" /> ' + state.text + '</span>'
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

    $('#toggle-nav').click(function(){
     $('.navbar-collapse.collapse').toggleClass('open')
   })
    $('.nav-close').click(function(){
     $('.navbar-collapse.collapse').toggleClass('open')
   })

    $('.lang-mob a').click(function(){
     $('.help-mob ul').removeClass('open')
     $(this).toggleClass('opened')
     $(this).siblings('ul').toggleClass('open')
   })
    $('.help-mob a').click(function(){
     $('.lang-mob ul').removeClass('open')
     $(this).toggleClass('opened')
     $(this).siblings('ul').toggleClass('open')
   })
  });
</script>
</body>
</html>
