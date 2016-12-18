<script type="text/javascript" src="js/bootstrap.min.js"></script>

<script src="js/jquery.min.js"></script>

<script src="js/jQuery.scrollTo.min.js"></script>
<script src="js/conduonghoahong.js"></script>

  <!-- jQuery library (served from Google) -->
<script>
   $(window).scroll(function(){
      if ($(this).scrollTop() > 500) {
          $('#top-header').addClass('fixed');
      } else {
          $('#top-header').removeClass('fixed');
      }
  });
</script>