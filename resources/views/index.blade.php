@extends('layout')
<link href="css/index.css" rel="stylesheet" />	

@section('content')

    <div class="gallery">
		<div class="text-center">
			<h2>藥妝也要健康</h2>
			<p>本網站提供使用者查詢含藥化妝品、藥品的成分，<br/>以及健康食品的保健功效及注意事項，幫助民眾更了解日常所使用的產品，<br/>可以使用的更加安心，同時也可以當作選購產品的輔助建議。</p>
		</div>
		<div class="container">		
			<div class="col-md-4">
				<a href="/medicine">
				<figure class="effect-marley">
					<img src="img/12.jpg" alt="medicine" class="img-responsive"/>
					<figcaption>
						<h4>medicine</h4>
						<p>藥品</p>				
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