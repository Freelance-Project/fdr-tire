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
			              <li><a href="{{url('/')}}">Home</a></li>
			              <li><a href="{{url('/gallery/index')}}">Gallery</a></li>
			              <li><a href="{{url('/gallery/video')}}">Video All</a></li>
			              <li class="active">Video</li>
			            </ol>
					</div>
				</div><!--end.right-->
			</div><!--end.top-menu-->
			<div class="content-photo-details">

        	@if(!empty($video->id))
				<h1 class="title-photo">{{$video->title}}</h1>
				<span class="date">{{$video->created_at}}</span>
				<div class="share-socmed">
					<div class="right">
						<a href="#"><img src="{{ asset(null) }}frontend/images/material/socmed.jpg"></a>
					</div>
				</div>
				<div class="video-content">
					@if(!empty($youtube))
					<iframe src="https://www.youtube.com/embed/{{$youtube}}" frameborder="0" allowfullscreen></iframe>
					@endif
					{!! $video->description !!}
				</div><!--end.cideo-content-->
			@endif
			</div><!--end.content-photo-details-->
		</div>
	</section>
</div>
<!-- end of middle -->

@endsection    