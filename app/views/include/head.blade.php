<meta charset="utf-8">
<meta name="description" content="">
<meta name="author" content="Scotch">
<title> @yield('title') </title>

{{ HTML::style('css/bootstrap.min.css') }}
{{ HTML::style('css/style.css') }}
{{ HTML::script('js/jquery.min.js') }}

 <style>
    /* Remove the navbar's default margin-bottom and rounded borders */ 
    .navbar {
      margin-bottom: 0;
      border-radius: 0;
    }
    
    /* Set height of the grid so .sidenav can be 100% (adjust as needed) */
    .row.content {height: 450px}
    
    /* Set gray background color and 100% height */
    .sidenav {
      padding-top: 20px;
      background-color: #f1f1f1;
      height: 100%;
    }
    
    /* Set black background color, white text and some padding */
    footer {
      background-color: #555;
      color: white;
      padding: 15px;
      margin-top:40px;
    }
    
    /* On small screens, set height to 'auto' for sidenav and grid */
    @media screen and (max-width: 767px) {
      .sidenav {
        height: auto;
        padding: 15px;
      }
      .row.content {height:auto;} 
    }

    .panel{
      margin-top: 30px !important;
    }

    #sideBar .nav li{
      width: 100%;
    }

     #sideBar .nav li:hover{
       background: #121C38;
    }


    .panel-body{
      background: #08455D;
    }

    .panel-body li a{
      color: #DADFEF !important;
    }

    #myNavbar {
      background:  #08455D;
    }

     #myNavbar li a {
      color: #DADFEF !important;
    }

    .navbar-nav .active a{
      background: #111A33 !important;
    }
  </style>

<script>
$(document).ready(function(){

	$('.delete').click(function (e){

	   var answer = confirm("Bạn có muốn xóa không?");
	      if (answer) {
	         return true;
	      }else{
	         return false;
	      }
	});

	$('.phathanh').click(function (e){

	   var answer = confirm("Bạn có muốn phát hành không?");
	      if (answer) {
	         return true;
	      }else{
	         return false;
	      }
	});

	$('.xetduyet').click(function (e){

	   var answer = confirm("Bạn có muốn xét duyệt không?");
	      if (answer) {
	         return true;
	      }else{
	         return false;
	      }
	});
});
</script>