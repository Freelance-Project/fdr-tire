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
							<h3 class="whiteFont">Photo</h3>
						</div>
					</div><!--end.caption1-->
				</div><!--end.left-capt1-->
				<div class="photo-banner">
					<img src="{{ asset(null) }}frontend/images/content/photo-banner.jpg">
				</div>
				<div class="photo-title">PHOTO TITLE</div>
			</div><!--end.product-section-->
		</div>
	</section>
	<section id="photo-list">
		<div class="wrapper">
			<div class="top-menu-product">
				<div class="right">
					<div class="breadcum-product">
						<ol class="breadcrumb">
			              <li><a href="{{url('/')}}">Home</a></li>
			              <li><a href="{{url('/gallery/index')}}">Gallery</a></li>
			              <li class="active">Photo All</li>
			            </ol>
					</div>
				</div><!--end.right-->
			</div><!--end.top-menu-->

			@if(!empty($racing))
			<div class="row-photo">
				<div class="title-edge">
					<h3>Racing</h3>
				</div>
				<div class="photolist">
				@foreach($racing as $valRacing)
					<div class="items">
						<a href="{{url('/gallery/photo/'.$valRacing->slug)}}">
							<div class="images">
								<img src="{{ asset(null) }}contents/foto/thumbnail/{{$valRacing->image}}" width="220px" height="220px">
							</div><!--end.images-->
							<div class="details">
								<p class="title">{{$valRacing->title}}</p>
								<span class="count">100 Photos</span>
							</div>
						</a>
					</div><!--end.items-->
				@endforeach
					{{--
					<div class="items">
						<a href="photo-details.php">
							<div class="images">
								<img src="{{ asset(null) }}frontend/images/content/photo-list2.jpg">
							</div><!--end.images-->
							<div class="details">
								<p class="title">Photo Title</p>
								<span class="count">100 Photos</span>
							</div>
						</a>
					</div><!--end.items-->
					<div class="items">
						<a href="photo-details.php">
							<div class="images">
								<img src="{{ asset(null) }}frontend/images/content/photo-list3.jpg">
							</div><!--end.images-->
							<div class="details">
								<p class="title">Photo Title</p>
								<span class="count">100 Photos</span>
							</div>
						</a>
					</div><!--end.items-->
					--}}
				</div><!--end.photo-list-->
			</div><!--end.row-photo-->
			@endif

			@if(!empty($event))
			<div class="row-photo">
				<div class="title-edge">
					<h3>Events</h3>
				</div>
				<div class="photolist">

				@foreach($event as $valEvent)
					<div class="items">
						<a href="{{url('/gallery/photo/'.$valEvent->slug)}}">
							<div class="images">
								<img src="{{ asset(null) }}contents/foto/thumbnail/{{$valEvent->image}}" width="220px" height="220px">
							</div><!--end.images-->
							<div class="details">
								<p class="title">{{$valEvent->title}}</p>
								<span class="count">100 Photos</span>
							</div>
						</a>
					</div><!--end.items-->
				@endforeach
					{{--
					<div class="items">
						<a href="photo-details.php">
							<div class="images">
								<img src="{{ asset(null) }}frontend/images/content/photo-list2.jpg">
							</div><!--end.images-->
							<div class="details">
								<p class="title">Photo Title</p>
								<span class="count">100 Photos</span>
							</div>
						</a>
					</div><!--end.items-->
					<div class="items">
						<a href="photo-details.php">
							<div class="images">
								<img src="{{ asset(null) }}frontend/images/content/photo-list3.jpg">
							</div><!--end.images-->
							<div class="details">
								<p class="title">Photo Title</p>
								<span class="count">100 Photos</span>
							</div>
						</a>
					</div><!--end.items-->
					--}}
				</div><!--end.photo-list-->
			</div><!--end.row-photo-->
			@endif
		</div>
	</section>
</div>
<!-- end of middle -->
@endsection    