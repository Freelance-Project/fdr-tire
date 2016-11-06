@extends('frontend.layouts.layout')

@section('content')
<!-- middle -->
<div id="middle-content">

	<section id="news-page" class="edge-left" style="margin-bottom:200px;">
		<div class="edge-left-content">
			<div class="photo-page-section">
				<div class="left-capt1">
					<div class="caption1">
						<div class="title-cap">
							<h3 class="whiteFont">Career</h3>
							<h3 class="whiteFont">EVENT</h3>
						</div>
					</div><!--end.caption1-->
				</div><!--end.left-capt1-->
				<div class="photo-banner">
					<img src="{{ asset(null) }}frontend/images/content/career-event-banner.jpg">
				</div>
			</div><!--end.product-section-->
		</div>
	</section>
	<section id="photo-list">
		<div class="wrapper">
			<div class="top-menu-product">
				<div class="right">
					<div class="breadcum-product">
						<ol class="breadcrumb">
			              <li><a href="#">Home</a></li>
			              <li><a href="#">Career</a></li>
			              <li class="active">Job Vacancy</li>
			            </ol>
					</div>
				</div><!--end.right-->
			</div><!--end.top-menu-->
			<div class="text-content">
				<center><img src="{{ asset(null) }}frontend/images/content/poster-career.jpg"></center><br><br>
				<div class="table-job">
					<table class="rounded">
						<tr>
							<th>Position</th>
							<th colspan="2">Education</th>
						</tr>
						<tr>
							<td>Information Technology</td>
							<td>D3</td>
							<td class="text-right"><a href="#" class="aplly_bt">Apply</a></td>
						</tr>
						<tr>
							<td>Financial Planning</td>
							<td>S1</td>
							<td class="text-right"><a href="#" class="aplly_bt">Apply</a></td>
						</tr>
						<tr>
							<td>Pattern Development</td>
							<td>S1</td>
							<td class="text-right"><a href="#" class="aplly_bt">Apply</a></td>
						</tr>
						<tr>
							<td>Information Technology</td>
							<td>D3</td>
							<td class="text-right"><a href="#" class="aplly_bt">Apply</a></td>
						</tr>
						<tr>
							<td>Financial Planning</td>
							<td>S1</td>
							<td class="text-right"><a href="#" class="aplly_bt">Apply</a></td>
						</tr>
					</table>
				</div>
			</div>
			
		</div>
	</section>
</div>
<!-- end of middle -->
@endsection    