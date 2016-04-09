<meta charset="utf-8">
<meta name="description" content="">
<meta name="author" content="Scotch">
<title> @yield('title') </title>

{{ HTML::style('css/bootstrap.min.css') }}
{{ HTML::style('css/style.css') }}
{{ HTML::script('js/jquery.min.js') }}

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

});
</script>


