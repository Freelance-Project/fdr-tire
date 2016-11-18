@extends('frontend.layouts.layout')

@section('content')
<!-- middle -->
<div id="middle-content">

	<section id="news-page" class="edge-left">
		<div class="edge-left-content">
			<div class="news-page-section">
				<div class="left-capt1">
					<div class="caption1">
						<div class="news-page-caption">
							<h1>Lorem ipsum<br><span class="whiteFont">dolor sit amet</span></h1>
							<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer quis dictum urna, quis feugiat tellus. Aenean </p>
							<a href="news-list.php" class="learnMoreGrey">More Details</a>
						</div><!--news-page-caption-->
					</div><!--end.caption1-->
				</div><!--end.left-capt1-->
			</div><!--end.product-section-->
		</div>
	</section>
	<section id="news-page-section1" class="">
		<div class="not-edge">
			<div class="news-sectionRed">
				<div class="left-news-page1">
					<div class="news-cap1">
						<div class="title-cap">
							<h3><span class="whiteFont">Video</span></h3>
							<a href="{{url('/gallery/video')}}" class="buttonskew"><div class="reserve-skew">View All</div></a>
						</div>
					</div>
				</div><!--end.left-news1-->
				<div class="news-jer">

				@if(!empty($video))
					@foreach($video as $valVideo)
					<div class="news-items-list with-border edge-news-list">
						<div class="edge-reserve-news-list">
							<div class="image-news">
								<img src="{{ asset(null) }}contents/video/medium/{{$valVideo->image}}">
							</div><!--end.images-news-->
							<div class="details-news video-play">
								<a href="{{url('/gallery/video/'.$valVideo->slug)}}" class="icon-play"></a>
							</div><!--end.details-news-->
						</div><!--.edge-reserve-news-list-->
					</div><!--.news-items-list-->
					@endforeach
				@endif
				{{--
					<div class="news-items-list with-border edge-news-list">
						<div class="edge-reserve-news-list">
							<div class="image-news">
								<img src="{{ asset(null) }}frontend/images/content/news-image2.jpg">
							</div><!--end.images-news-->
							<div class="details-news video-play">
								<a href="#" class="icon-play"></a>
							</div><!--end.details-news-->
						</div><!--.edge-reserve-news-list-->
					</div><!--.news-items-list-->

					<div class="news-items-list edge-news-list">
						<div class="edge-reserve-news-list">
							<div class="image-news">
								<img src="{{ asset(null) }}frontend/images/content/news-image3.jpg">
							</div><!--end.images-news-->
							<div class="details-news video-play">
								<a href="#" class="icon-play"></a>
							</div><!--end.details-news-->
						</div><!--.edge-reserve-news-list-->
					</div><!--.news-items-list-->
				--}}

				</div><!--end.news-jer-->
			</div><!--end.news-section-->
		</div>
	</section>
	<section id="news-page-section2" class="edge-right">
		<div class="edge-right-content">
			<div class="news-sectionRed">
				<div class="left-news-page1 tips-page">
					<div class="news-cap1">
						<div class="title-cap red-cap">
							<h3><span class="whiteFont">Photo</span></h3>
							<a href="{{url('/gallery/photo')}}" class="buttonskew-red"><div class="reserve-skew">View All</div></a>
						</div>
					</div>
				</div><!--end.left-news1-->
				<div class="news-jer">
				@if(!empty($photo))
					@foreach($photo as $valPhoto)
					<div class="news-items-list edge-news-list">
						<div class="edge-reserve-news-list">
							<div class="image-news">
								<img src="{{ asset(null) }}contents/foto/medium/{{$valPhoto->image}}">
							</div><!--end.images-news-->
							<div class="details-news photo-news">
								<h4 class="detail-title"><span class="whiteFont">{{$valPhoto->title}}</span></h4>
								<a href="{{url('/gallery/photo/'.$valPhoto->slug)}}" class="learnMore">More Details</a>
							</div><!--end.details-news-->
						</div><!--.edge-reserve-news-list-->
					</div><!--.news-items-list-->
					@endforeach
					{{--
					<div class="news-items-list edge-news-list">
						<div class="edge-reserve-news-list">
							<div class="image-news">
								<img src="{{ asset(null) }}frontend/images/content/news-tips2.jpg">
							</div><!--end.images-news-->
							<div class="details-news photo-news">
								<h4 class="detail-title">Lorem ipsum<br><span class="whiteFont">dolor sit amet</span></h4>
								<a href="#" class="learnMore">More Details</a>
							</div><!--end.details-news-->
						</div><!--.edge-reserve-news-list-->
					</div><!--.news-items-list-->

					<div class="news-items-list edge-news-list">
						<div class="edge-reserve-news-list">
							<div class="image-news">
								<img src="{{ asset(null) }}frontend/images/content/news-tips3.jpg">
							</div><!--end.images-news-->
							<div class="details-news photo-news">
								<h4 class="detail-title">Lorem ipsum<br><span class="whiteFont">dolor sit amet</span></h4>
								<a href="#" class="learnMore">More Details</a>
							</div><!--end.details-news-->
						</div><!--.edge-reserve-news-list-->
					</div><!--.news-items-list-->
					--}}
				@endif
				</div><!--end.news-jer-->
			</div><!--end.news-section-->
		</div>
	</section>
	<section id="news-page-section3" class="">
		<div class="not-edge">
			<div class="news-sectionRed">
				<div class="left-news-page1-reserve">
					<div class="news-cap1">
						<div class="title-cap">
							<h3><span class="whiteFont">Instagram</span></h3>
							<h3 class="whiteFont">Feeds</h3>
						</div>
					</div>
				</div><!--end.left-news1-->
				<div class="news-jer-reserve instagramFeed" style="background:#fff;">
                    @if(!empty($instagram))
                        @foreach($instagram as $key => $valInsta)
						<img src="{{$valInsta['thumbnail_src']}}" width="113px" height="115px">
						@if($key==5)
						<br/>

						@endif
						@endforeach
					@endif
				</div><!--end.news-jer-->
			</div><!--end.news-section-->
		</div>
	</section>
	<section id="news-page-section4" class="edge-left-small">
		<div class="edge-left-small-content">
			<div class="news-sectionRed">
				<div class="left-news-page1 tips-page">
					<div class="news-cap1">
						<div class="title-cap red-cap">
							<h3 style="margin-bottom:0;"><span class="whiteFont">Download</span></h3>
						</div>
					</div>
				</div><!--end.left-news1-->
				<div class="news-jer downloadList" style="background:#fff;">
					@if(!empty($ecard->id))
					<a href="{{url('/gallery/downloadecard/'.$ecard->id)}}"><img src="{{ asset(null) }}frontend/images/material/download-ecard.jpg"></a>
					@endif

					@if(!empty($wallpaper->id))
					<a href="{{url('/gallery/download/'.$wallpaper->id)}}"><img src="{{ asset(null) }}frontend/images/material/download-wallpaper.jpg"></a>
					@endif
					@if(!empty($chart->id))
					<a href="{{url('/gallery/download/'.$chart->id)}}"><img src="{{ asset(null) }}frontend/images/material/download-chart.jpg"></a>
					@endif
					@if(!empty($calender->id))
					<a href="{{url('/gallery/download/'.$calender->id)}}"><img src="{{ asset(null) }}frontend/images/material/download-calender.jpg"></a>
					@endif
					@if(!empty($bulletin->id))
					<a href="{{url('/gallery/download/'.$bulletin->id)}}"><img src="{{ asset(null) }}frontend/images/material/download-buletin.jpg"></a>
					@endif
				</div><!--end.news-jer-->
			</div><!--end.news-section-->
		</div>
	</section>
</div>
<!-- end of middle -->

@endsection    