@extends('layout')
<title>天氣U&amp;U-Unusual</title>
<link href="css/unusual.css" rel="stylesheet">

@section('content')
	
    <div class="uns-header">
		<div class="text-center">
			<h2>天氣警特報資料</h2>
			<p class="txt-white">天氣特報-各別天氣警特報之內容及所影響之區域</p>
		</div>
	</div>
	<div class="container">
	@if(count($focus['ingrds'])==0)
	<div class="row">
		<div class="col-md-12">
			<h2>目前無發布警特報</h2>
		</div>
	</div>
	@else
		<div class="row mb-20">
		@foreach( $focus['ingrds'] as $index => $ingrd)
			<hr>
			<div class="col-md-12">
				<h2><i class="fa fa-warning fa"></i>&ensp;{{ $ingrd['description'] }}</h2>
			</div>
			<div class="col-md-8">
				<p class="description">&emsp;&emsp;{{ $ingrd['content'] }}</p>
			</div>
			<div class="col-md-4 left-line">
				<p>發布日期：{{ $ingrd['issueTime'] }}</p>
				<p>開始時間：{{ $ingrd['sTime'] }}</p>
				<p>結束時間：{{ $ingrd['eTime'] }}</p>
			</div>
		</div>
		<div class="row">
			@if($ingrd['phenomenas']!=0)
			@foreach( $ingrd['phenomenas'] as $index => $info)
			<div class="col-md-4">
				<div class="panel panel-default">
				<div class="panel-heading" style="text-size: 18px;"><b class="title">{{ $info['phenomena'] }}</b> |區域</div>
				<table class="table">
					<tr>
						<!-- <td class="title">影響區域</td> -->
						<td style="padding-left: 15px;">
							@foreach( $info['affectedAreas'] as $index => $info2)
							{{ $info2 }} | 
							@endforeach
						</td>
						
					</tr>
				</table>
				</div>
				<p></p>
			</div>
			@endforeach
			@else{ <hr> }
			@endif
		@endforeach
		</div>
	@endif
	</div>


    <footer>
		<div class="container">
			<div class="col-md-12 wow fadeInDown" data-wow-duration="1000ms" data-wow-delay="900ms">				
				<div class="">
					<h4>Source Reference</h4>
					<p>此頁面的天氣警特報資料來源，取自於<a target="_blank" href="https://data.gov.tw/dataset/9245" title="">DATA.GOV.TW</a>。</p>
                </div>
			</div>
		</div>	
	</footer>
    
@stop