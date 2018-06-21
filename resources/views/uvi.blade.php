@extends('layout')
<title>天氣U&amp;U-UVI</title>
<link href="css/uvi.css" rel="stylesheet">

@section('content')

	<div class="search_u">
    <div class="container">
		<div class="text-center">
			<h2>UVI</h2>
			<p class="txt-white">輸入想搜尋紫外線的地區</p>
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
	<div class="detail_u container">
		<div class="row text-center">
		@if($focus['first']=='0')
		<div class="suggest_u container">
			<div class="row text-center">
				<div class="col-md-12"><hr></div>
				<div class="col-md-12">
					<!-- <h4>紫外線指數分級</h4> -->
					<div class="panel panel-default">
					<!-- Default panel contents -->
					<div class="panel-heading">紫外線指數分級</div>

					<!-- Table -->
					<table class="table">
						<thead>
							<tr>
								<th>指數</th>
								<th>曝曬級數</th>
								<th>曬傷時間</th>
								<th>建議的防護措施</th>
							</tr>
						</thead>
						<tbody>
							<tr>
								<td class="txt-green">0 - 2</td>
								<td class="bg-green">微量級</td>
								<td></td>
								<td></td>
							</tr>
							<tr>
								<td class="txt-yellow">3 - 5</td>
								<td class="bg-yellow">低量級</td>
								<td></td>
								<td></td>
							</tr>
							<tr>
								<td class="txt-orange">6 - 7</td>
								<td class="bg-orange">中量級</td>
								<td>30分鐘內</td>
								<td>帽子/陽傘 + 防曬液 + 太陽眼鏡 + 儘量待在陰涼處。</td>
							</tr>
							<tr>
								<td class="txt-red">8 - 10</td>
								<td class="bg-red">過量級</td>
								<td>20分鐘內</td>
								<td>帽子/陽傘 + 防曬液 + 太陽眼鏡 + 陰涼處 + 長袖衣物，上午十時至下午二時最好不外出。</td>
							</tr>
							<tr>
								<td class="txt-purple">11+</td>
								<td class="bg-purple">危險級</td>
								<td>15分鐘內</td>
								<td>帽子/陽傘 + 防曬液 + 太陽眼鏡 + 陰涼處 + 長袖衣物，上午十時至下午二時最好不外出。</td>
							</tr>
						</tbody>
					</table>
					</div>
				</div>
			</div>
		</div>
		@else
			@if(count($focus['ingrds'])==0)
			<div class="col-md-12">
				<hr>
				<h5>查無此地區資料</h5>
				<hr>
			</div>
			@else
				@foreach( $focus['ingrds'] as $index => $ingrd)
				<!-- <div class="row"> -->
					<div class="col-md-12"><hr></div>
					<div class="col-md-8 text-center">
						<h3>{{ $ingrd['county'] }}</h3>
						<p>發布日期：{{ $ingrd['time'] }}</p>
					</div>
					<div class="col-md-4">

					</div>
				</div>
				<div class="row">
					<div class="col-md-8">
						
						<div class="panel panel-default">
						<!-- Default panel contents -->
						<div class="panel-heading">詳細資料</div>
						<!-- Table -->
						<table class="table">
							<tbody>
							<tr>
								<td class="title">紫外線指數</td>
								<td>{{ $ingrd['uv'] }}</td>
							</tr>
							<tr>
								<td class="title">測站名稱</td>
								<td>{{ $ingrd['site'] }}</td>
							</tr>
							<tr>
								<td class="title">發布機關</td>
								<td>{{ $ingrd['agency'] }}</td>
							</tr>
							<tr>
								<td class="title">經度 WGS84</td>
								<td>{{ $ingrd['lon'] }}</td>
							</tr>
							<tr>
								<td class="title">緯度 WGS84</td>
								<td>{{ $ingrd['lat'] }}</td>
							</tr>
							</tbody>					
						</table>
						</div>
					</div>
					<div class="col-md-4">
						<div class="panel panel-default">
						<!-- Default panel contents -->
						<div class="panel-heading">紫外線指數分級對照表</div>
						<!-- Table -->
						<table class="table">
							<tbody>
								@if($ingrd['uv']<=2)
								<tr>
									<td class="title">指數</td>
									<td class="txt-green">0 - 2</td>
								</tr>
								<tr>
									<td class="title">曝曬級數</td>
									<td class="bg-green">微量級</td>
								</tr>
								<tr>
									<td class="title">曬傷時間</td>
									<td></td>
								</tr>
								<tr>
									<td class="title">建議的防護措施</td>
									<td></td>
								</tr>
								
								@elseif($ingrd['uv']<=5)
								<tr>
									<td class="title">指數</td>
									<td class="txt-yellow">3 - 5</td>
								</tr>
								<tr>
									<td class="title">曝曬級數</td>
									<td class="bg-yellow">低量級</td>
								</tr>
								<tr>
									<td class="title">曬傷時間</td>
									<td></td>
								</tr>
								<tr>
									<td class="title">建議的防護措施</td>
									<td></td>
								</tr>
								@elseif($ingrd['uv']<=7)
								<tr>
									<td class="title">指數</td>
									<td class="txt-orange">6 - 7</td>
								</tr>
								<tr>
									<td class="title">曝曬級數</td>
									<td class="bg-orange">中量級</td>
								</tr>
								<tr>
									<td class="title">曬傷時間</td>
									<td>30分鐘內</td>
								</tr>
								<tr>
									<td class="title">建議的防護措施</td>
									<td>帽子/陽傘+防曬液+太陽眼鏡+儘量待在陰涼處。</td>
								</tr>
								@elseif($ingrd['uv']<=10)
								<tr>
									<td class="title">指數</td>
									<td class="txt-red">8 - 10</td>
								</tr>
								<tr>
									<td class="title">曝曬級數</td>
									<td class="bg-red">過量級</td>
								</tr>
								<tr>
									<td class="title">曬傷時間</td>
									<td>20分鐘內</td>
								</tr>
								<tr>
									<td class="title">建議的防護措施</td>
									<td>帽子/陽傘+防曬液+太陽眼鏡+陰涼處+長袖衣物，上午十時至下午二時最好不外出。</td>
								</tr>
								@elseif($ingrd['uv']>=11)
								<tr>
									<td class="title">指數</td>
									<td class="txt-purple">11+</td>
								</tr>
								<tr>
									<td class="title">曝曬級數</td>
									<td class="bg-purple">危險級</td>
								</tr>							
								<tr>
									<td class="title">曬傷時間</td>
									<td>15分鐘內</td>
								</tr>
								<tr>
									<td class="title">建議的防護措施</td>
									<td>帽子/陽傘+防曬液+太陽眼鏡+陰涼處+長袖衣物，上午十時至下午二時最好不外出。</td>
								</tr>
								@endif
							</tbody>
						</table>
						</div>
					</div>
				<!-- </div> -->
				@endforeach
			@endif
		@endif
		</div>
	</div>
	<footer>
		<div class="container">
			<div class="col-md-12 wow fadeInDown" data-wow-duration="1000ms" data-wow-delay="900ms">				
				<div class="">
					<h4>Source Reference</h4>
					<p>本頁面的UVI天氣資料來源，取自於<a target="_blank" href="https://data.gov.tw/dataset/6076" title="">DATA.GOV.TW</a>。</p>
                </div>
			</div>
		</div>	
	</footer>
    
@stop