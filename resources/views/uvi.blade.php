@extends('layout')
<title>WH-UVI</title>
<link href="css/uvi.css" rel="stylesheet">

@section('content')

	<div class="search_m">
    <div class="container">
		<div class="text-center">
			<h2>UVI</h2>
			<p>輸入想搜尋紫外線的地區</p>
			<div class="row">
			<form class="contact-form" action="" method="POST">
				<div class="col-md-8 col-md-offset-2">
					<div class="form-group">
						<input type="text" name="uvi_area" class="form-control" required="required" placeholder="地名名稱，例如：台中">						
					</div>
				</div>
				<div class="row">
					<div class="col-md-4 col-md-offset-4">
						<div class="form-group">
							<button type="submit" name="submit" class="btn btn-primary btn-lg" required="required">Search</button>						
						</div>
					</div>
				</div>
			</form>
			</div>			
		</div>
	</div>
	</div>
	<hr>
	<!-- <div class="result_m container">
		<div class="row text-center">
			<div class="col-md-8 col-md-offset-2">
				<h3>搜尋結果</h3>
				<table class="table">
					<tr>
						<td>結果1-中文品名</td>
						<td>結果1-英文品名</td>
					</tr>
					<tr>
						<td>結果2-中文品名</td>
						<td>結果2-英文品名</td>
					</tr>
					<tr>
						<td>結果3-中文品名</td>
						<td>結果3-英文品名</td>
					</tr>
				</table>
			</div>
		</div>
	</div>
	<hr> -->
	<div class="detail_m container">
		<div class="row text-center">
		@foreach( $focus['ingrds'] as $index => $ingrd)
			<div class="col-md-6">
				<h3>{{ $ingrd['county'] }}</h3>
				<!-- <h4>{{ $ingrd['site'] }}</h4> -->
				<p>發布日期：{{ $ingrd['time'] }}</p>
			</div>
			<div class="col-md-6">
				<!-- <h3>詳細資訊</h3> -->
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
		@endforeach
		</div>
		
	</div>
    
@stop