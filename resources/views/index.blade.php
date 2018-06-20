@extends('layout')
<link href="css/index.css" rel="stylesheet" />	

@section('content')

    <div class="gallery">
		<div class="text-center">
			<h2>天氣 UVI&amp;Unusual</h2>
			<p>本網站提供使用者查詢紫外線及天氣警特報之資訊，方便一次了解天氣警訊。</p>
		</div>
		<div class="container">		
			<div class="col-md-4">
				<a href="/uvi">
				<figure class="effect-marley">
					<img src="img/12.jpg" alt="uvi" class="img-responsive"/>
					<figcaption>
						<h4>UVI</h4>
						<p>各地紫外線指數</p>
					</figcaption>		
				</figure>
				</a>
			</div>
			<div class="col-md-4">
				<a href="/unusual">
				<figure class="effect-marley">
					<img src="img/11.jpg" alt="unusual" class="img-responsive"/>
					<figcaption>
						<h4>Unusual</h4>
						<p>災害性天氣特報</p>				
					</figcaption>			
				</figure>
				</a>
			</div>
			<div class="col-md-4">
				<a href="/forecast">
				<figure class="effect-marley">
					<img src="img/10.jpg" alt="forecast" class="img-responsive"/>
					<figcaption>
						<h4>forecast</h4>
						<p>天氣預報</p>				
					</figcaption>			
				</figure>
				</a>
			</div>
		</div>
    </div>
    
@stop