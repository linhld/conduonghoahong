<script type="text/javascript" src="{{ asset('js/bootstrap.min.js') }}"></script>

<script src="{{ asset('js/jquery.min.js') }}"></script>

<script src="{{ asset('js/jQuery.scrollTo.min.js') }}"></script>
<script src="{{ asset('js/conduonghoahong.js') }}"></script>

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
