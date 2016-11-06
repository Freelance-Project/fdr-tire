@extends('frontend.layouts.layout')

@section('content')
<!-- middle -->
<div id="middle-content">

	<section id="photo-details">
		<div class="wrapper">
			<div class="top-menu-product">
				<div class="right">
					<div class="breadcum-product">
						<ol class="breadcrumb">
			              <li><a href="#">Home</a></li>
			              <li><a href="#">Gallery</a></li>
			              <li><a href="#">Video All</a></li>
			              <li class="active">Video</li>
			            </ol>
					</div>
				</div><!--end.right-->
			</div><!--end.top-menu-->
			<div class="content-photo-details">
				<h1 class="title-photo">Para pemenang cabang olahraga<br>balap motor PON XIX</h1>
				<span class="date">30 Agustus 2016</span>
				<div class="share-socmed">
					<div class="right">
						<a href="#"><img src="{{ asset(null) }}frontend/images/material/socmed.jpg"></a>
					</div>
				</div>
				<div class="video-content">
					<iframe src="https://www.youtube.com/embed/JKdx5btvvzs" frameborder="0" allowfullscreen></iframe>
					<p>Nulla ac enim ligula. Cras nisi nisl, commodo sed semper quis, sagittis ut elit. Quisque vulputate fringilla metus, a ultricies lacus sollicitudin at. Vestibulum id massa magna. Duis leo velit, ullamcorper a vulputate sed, iaculis eu tortor. Sed vel diam dui, et feugiat nisi. Etiam mauris purus, viverra id iaculis eget, tristique a dolor. Sed convallis molestie lacinia. Maecenas blandit semper iaculis. Phasellus quis quam orci, vitae fermentum quam. Donec non odio in dui malesuada molestie. Nunc nulla tortor, ultrices a aliquet non, tincidunt quis metus. Morbi dignissim fringilla nunc, ut sollicitudin magna ornare vitae.</p>
				</div><!--end.cideo-content-->
			</div><!--end.content-photo-details-->
		</div>
	</section>
</div>
<!-- end of middle -->

@endsection    