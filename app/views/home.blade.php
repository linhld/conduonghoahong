@extends('layout.main')
@section('content')
<div class="row">
	<div class="category-select col-centered col-xs-10">
		<?php $config_category = Config::get('category.id') ?>
		<?php $lang_category	= Lang::get('category') ?>
		<p>Bấm vào các thể loại bạn KHÔNG MUỐN XEM để lọc danh sách video, hệ thống cũng sẽ lưu lại tùy chọn này cho lần sau</p>
		<div class="row">
			<ul class="col-xs-2">
				<span>Quốc gia: </span>
				@foreach($lang_category["quocgia"] as $kihieu => $quocgia)
				<li id="{{ $lang_category['quocgia'][$kihieu] }}">
					{{ $lang_category['quocgia'][$kihieu] }}
				</li>
				@endforeach
			</ul>
			<ul class="col-xs-3">
				<span>Kiểu quay: </span>
				@foreach($lang_category["kieuquay"] as $kihieu => $kieuquay)
				<li id="{{ $lang_category['kieuquay'][$kihieu] }}">
					{{ $lang_category['kieuquay'][$kihieu] }}
				</li>
				@endforeach
			</ul>
			<ul class="col-xs-1">
				<span>Kiểu chơi: </span>
				@foreach($lang_category["kieuchoi"] as $kihieu => $kieuchoi)
				<li id="{{ $lang_category['kieuchoi'][$kihieu] }}">
					{{ $lang_category['kieuchoi'][$kihieu] }}
				</li>
				@endforeach
			</ul>
			<ul class="col-xs-2">
				<span>Mẫu người: </span>
				@foreach($lang_category["maunguoi"] as $kihieu => $maunguoi)
				<li id="{{ $lang_category['maunguoi'][$kihieu] }}">
					{{ $lang_category['maunguoi'][$kihieu] }}
				</li>
				@endforeach
			</ul>
			<ul class="col-xs-3">
				<span>Thể loại: </span>
				@foreach($lang_category["theloai"] as $kihieu => $theloai)
				<li id="{{ $lang_category['theloai'][$kihieu] }}">
					{{ $lang_category['theloai'][$kihieu] }}
				</li>
				@endforeach
			</ul>
		</div>
	</div>
</div>
<div class="row">
	<div class="col-centered col-xs-10">
		<div class="clear"></div>
		<div class="content">
			@foreach( $videos as $index => $video )
			@if( $index % 5 == 0)
				<div class="clear"></div>
				<div class="video-group">
			@endif
			<div class="video-wrapper" id="{{ $video->id }}">
				<img src="{{ $video->thumbnail }}"/>
				<span>{{ $video->titleV }}</span>
				<div class="duration">
					{{ $video->duration }}</div>
				</div>
			@if( $index % 5 == 4)
			</div>
			@endif
			@endforeach
			<div class="pager">
			</div>
		</div>
	</div>
</div>
@endsection