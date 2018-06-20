@extends('layout')
<title>天氣U&amp;U-Forecast</title>
<link href="css/forecast.css" rel="stylesheet">

@section('content')

    <div class="search_f">
    <div class="container">
		<div class="text-center">
			<h2>天氣預報</h2>
			<p class="txt-white">提供今明36小時的天氣預報</p>
			<div class="row">
			<form class="contact-form" action="" method="GET">
				<div class="col-md-8 col-md-offset-2">
					<div class="form-group">
						<input type="text" name="uvi_area" class="form-control" required="required" placeholder="地名名稱，例如：臺中">						
					</div>
				</div>
				<div class="row">
					<div class="col-md-4 col-md-offset-4">
						<div class="form-group">
							<button type="submit" name="submit" class="btn btn-primary btn-lg">Search</button>						
						</div>
					</div>
				</div>
			</form>
			</div>			
		</div>
	</div>
	</div>
	<div class="container">
		@if($focus['first']=='0')
		<div class="col-md-12">
			<hr>
			<h5>請輸入欲搜尋之地區</h5>
			<hr>
		</div>
		@else
			@if(count($focus['ingrds'])==0)
			<div class="col-md-12">
				<hr>
				<h5>查無此地區資料</h5>
				<hr>
			</div>
			@else
				@foreach($focus['ingrds'] as $index => $ingrd)
				<div class="col-md-12 text-center"><p class="mt-10">更新時間：{{ $ingrd['update'] }}</p></div>
					@foreach($ingrd['location'] as $ingrd2)
					<div class="col-md-12"><hr></div>
					<div class="col-md-12 text-center">
						<h3>{{ $ingrd2['locationName'] }}</h3>
						@foreach($ingrd2['weatherElement'] as $index => $ingrd3)
							@foreach($ingrd3[0=>['time']] as $index => $ingrd4)
							<div class="col-md-4">
								{{ $ingrd4['startTime'] }} 123至 {{ $ingrd4['endTime'] }}
							</div>
							@endforeach
						@endforeach
					</div>
					@endforeach
				@endforeach
			@endif
		@endif
	</div>

	<footer>
		<div class="container">
			<div class="col-md-12 wow fadeInDown" data-wow-duration="1000ms" data-wow-delay="900ms">				
				<div class="">
					<h4>Source Reference</h4>
					<p>此頁面的天氣預報資料來源，取自於<a target="_blank" href="https://data.gov.tw/dataset/6069" title="">DATA.GOV.TW</a>。</p>
                </div>
			</div>
		</div>	
	</footer>
	
@stop