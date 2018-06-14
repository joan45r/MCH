@extends('layout')
<title>MCH-Medicine</title>
<link href="css/medicine.css" rel="stylesheet">

@section('content')

	<div class="search_m">
    <div class="container">
		<div class="text-center">
			<h2>Medicine</h2>
			<p>輸入西藥藥品的名稱，以搜尋處方成分資料</p>
			<div class="row">
			<form class="contact-form" action="">
				<div class="col-md-8 col-md-offset-2">
					<div class="form-group">
						<input type="text" name="search" class="form-control" required="required" placeholder="藥品名稱，例如：舒壓朗錠">						
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
	<div class="result_m container">
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
	<hr>
	<div class="detail_m container">
		<div class="row text-center">
			<div class="col-md-6">
				<h3>藥品名稱</h3>
				<h4>中文名稱</h4>
				<p>English name</p>
			</div>
			<div class="col-md-6">
				<h3>成分列表</h3>
				<div class="panel panel-default">
				<!-- Default panel contents -->
				<div class="panel-heading">藥品詳細處方成分資料</div>

				<!-- Table -->
				<table class="table">
					<tbody>
					<tr>
						<td class="title">許可證字號</td>
						<td>200000000</td>
					</tr>
					<tr>
						<td class="title">處方標示</td>
						<td>XXXXXXXXXXX</td>
					</tr>
					<tr>
						<td class="title">成分名稱</td>
						<td>XXXXXXXXXXX</td>
					</tr>
					<tr>
						<td class="title">成分代碼</td>
						<td>XXXXXXXXXXX</td>
					</tr>
					<tr>
						<td class="title">含量描述</td>
						<td>XXXXXXXXXXX</td>
					</tr>
					<tr>
						<td class="title">含量</td>
						<td>XXXXXXXXXXX</td>
					</tr>
					<tr>
						<td class="title">含量單位</td>
						<td>XXXXXXXXXXX</td>
					</tr>
					</tbody>					
				</table>
				</div>
			</div>
		</div>
		
	</div>
    
@stop