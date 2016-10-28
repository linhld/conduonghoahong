<meta charset="utf-8"/>

<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css"> 
<link rel="stylesheet" type="text/css" href="css/style.css">

<script src="js/jquery.min.js"></script>
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
</head>
<body>
<div id="header">
  <!--NAV MENU -->
    <div id="top-header">
      
      <div class="language_switcher">
        <div><img src="img/lang_en_icon.png"/><a href="?lang=en">English</a></div>
        <div><img src="img/lang_vi_icon.png"/><a href="?lang=vi">Việt Nam</a></div>
      </div>
    </div>
  <!-- LOGO and SEARCH  -->
      <div id="logo">
        <div id="warning"><img src="img/warning.png"/></div>
        <p><img src="img/logo.png"/></p> 
        <div id="search-box">
        <form action="search.php" method="get">
          <input name="query" type="text" placeholder="placeholder"/>
          <input name="submit" type="submit" title="search" value>
        </form>
        
      
        </div>
        </div>
      </div>

    </div>
</div>

<script src="js/jQuery.scrollTo.min.js"></script>
  <script src="js/ts.js"></script>