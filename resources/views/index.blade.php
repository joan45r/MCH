@extends('layout')
<link href="css/index.css" rel="stylesheet" />	

@section('content')

    <div class="gallery">
		<div class="text-center">
			<h2>Weather Helper</h2>
			<p>本網站提供使用者查詢紫外線及天氣警報之資訊，方便一次了解天氣警訊。</p>
		</div>
		<div class="container">		
			<div class="col-md-4">
				<a href="/uvi">
				<figure class="effect-marley">
					<img src="img/12.jpg" alt="medicine" class="img-responsive"/>
					<figcaption>
						<h4>UVI</h4>
						<p>各地紫外線指數</p>				
					</figcaption>		
				</figure>
				</a>
			</div>
			<div class="col-md-4">
				<a href="/cosmetic">
				<figure class="effect-marley">
					<img src="img/11.jpg" alt="cosmetic" class="img-responsive"/>
					<figcaption>
						<h4>cosmetic</h4>
						<p>含藥化妝品</p>				
					</figcaption>			
				</figure>
				</a>
			</div>
			<div class="col-md-4">
				<a href="/health">
				<figure class="effect-marley">
					<img src="img/10.jpg" alt="health" class="img-responsive"/>
					<figcaption>
						<h4>health food</h4>
						<p>健康食品</p>				
					</figcaption>			
				</figure>
				</a>
			</div>
		</div>
    </div>
    
@stop