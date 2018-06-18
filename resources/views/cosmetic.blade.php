@extends('layout')
<title>MCH-Cosmetic</title>

@section('content')
	
    <div class="gallery">
		<div class="text-center">
			<h2>災害性天氣特報資料</h2>
			<p>天氣特報-各別天氣警特報之內容及所影響之區域</p>
		</div>
		<div class="container">
			<div class="row">
			@foreach( $focus['ingrds'] as $index => $ingrd)
				<div class="col-md-12">
					<h3>{{ $ingrd['description'] }}</h3>
					<p>發布日期：{{ $ingrd['issueTime'] }}</p>
					<p>開始時間：{{ $ingrd['sTime'] }}</p>
					<p>結束時間：{{ $ingrd['eTime'] }}</p>
					<p>{{ $ingrd['content'] }}</p>					
				</div>
			@endforeach
			</div>
		</div>
    </div>
    
@stop