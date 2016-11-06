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
							<h3 class="whiteFont">Visions</h3>
						</div>
					</div><!--end.caption1-->
				</div><!--end.left-capt1-->
				<div class="photo-banner">
					<img src="{{ asset(null) }}frontend/images/content/vision-banner.jpg">
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
			              <li><a href="#">About Us</a></li>
			              <li class="active">Vision</li>
			            </ol>
					</div>
				</div><!--end.right-->
			</div><!--end.top-menu-->
			<div class="text-content">
				<p>PT Suryaraya Rubberindo Industries memiliki visi untuk menjadi untuk menjadi pemimpin pasar untuk produsen ban sepeda motor dengan performa dan nilai tinggi di Indonesia melalui tenaga kerja yang terampil dan teknologi terbaik.
</p>
			</div>
			
		</div>
	</section>
</div>
<!-- end of middle -->

@endsection    