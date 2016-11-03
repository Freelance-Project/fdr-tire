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
							<h3><span class="whiteFont">News</span></h3>
							<a href="news-list.php" class="buttonskew"><div class="reserve-skew">View All</div></a>
						</div>
					</div>
				</div><!--end.left-news1-->
				<div class="news-jer">
					<div class="news-items-list edge-news-list">
						<div class="edge-reserve-news-list">
							<div class="image-news">
								<img src="{{ asset(null) }}frontend/images/content/news-image.jpg">
							</div><!--end.images-news-->
							<div class="details-news">
								<h4 class="detail-title">Lorem ipsum<br><span class="whiteFont">dolor sit amet</span></h4>
								<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer quis dictum urna, quis feugiat tellus.</p>
								<a href="#" class="learnMore">More Details</a>
							</div><!--end.details-news-->
						</div><!--.edge-reserve-news-list-->
					</div><!--.news-items-list-->

					<div class="news-items-list edge-news-list">
						<div class="edge-reserve-news-list">
							<div class="image-news">
								<img src="{{ asset(null) }}frontend/images/content/news-image2.jpg">
							</div><!--end.images-news-->
							<div class="details-news">
								<h4 class="detail-title">Lorem ipsum<br><span class="whiteFont">dolor sit amet</span></h4>
								<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer quis dictum urna, quis feugiat tellus.</p>
								<a href="#" class="learnMore">More Details</a>
							</div><!--end.details-news-->
						</div><!--.edge-reserve-news-list-->
					</div><!--.news-items-list-->

					<div class="news-items-list edge-news-list">
						<div class="edge-reserve-news-list">
							<div class="image-news">
								<img src="{{ asset(null) }}frontend/images/content/news-image3.jpg">
							</div><!--end.images-news-->
							<div class="details-news">
								<h4 class="detail-title">Lorem ipsum<br><span class="whiteFont">dolor sit amet</span></h4>
								<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer quis dictum urna, quis feugiat tellus. </p>
								<a href="#" class="learnMore">More Details</a>
							</div><!--end.details-news-->
						</div><!--.edge-reserve-news-list-->
					</div><!--.news-items-list-->


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
							<h3><span class="whiteFont">TIPS</span></h3>
							<a href="news-list.php" class="buttonskew-red"><div class="reserve-skew">View All</div></a>
						</div>
					</div>
				</div><!--end.left-news1-->
				<div class="news-jer">
					<div class="news-items-list edge-news-list">
						<div class="edge-reserve-news-list">
							<div class="image-news">
								<img src="{{ asset(null) }}frontend/images/content/news-tips1.jpg">
							</div><!--end.images-news-->
							<div class="details-news">
								<h4 class="detail-title">Lorem ipsum<br><span class="whiteFont">dolor sit amet</span></h4>
								<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer quis dictum urna, quis feugiat tellus.</p>
								<a href="" class="learnMore">More Details</a>
							</div><!--end.details-news-->
						</div><!--.edge-reserve-news-list-->
					</div><!--.news-items-list-->

					<div class="news-items-list edge-news-list">
						<div class="edge-reserve-news-list">
							<div class="image-news">
								<img src="{{ asset(null) }}frontend/images/content/news-tips2.jpg">
							</div><!--end.images-news-->
							<div class="details-news">
								<h4 class="detail-title">Lorem ipsum<br><span class="whiteFont">dolor sit amet</span></h4>
								<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer quis dictum urna, quis feugiat tellus.</p>
								<a href="#" class="learnMore">More Details</a>
							</div><!--end.details-news-->
						</div><!--.edge-reserve-news-list-->
					</div><!--.news-items-list-->

					<div class="news-items-list edge-news-list">
						<div class="edge-reserve-news-list">
							<div class="image-news">
								<img src="{{ asset(null) }}frontend/images/content/news-tips3.jpg">
							</div><!--end.images-news-->
							<div class="details-news">
								<h4 class="detail-title">Lorem ipsum<br><span class="whiteFont">dolor sit amet</span></h4>
								<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer quis dictum urna, quis feugiat tellus. </p>
								<a href="#" class="learnMore">More Details</a>
							</div><!--end.details-news-->
						</div><!--.edge-reserve-news-list-->
					</div><!--.news-items-list-->
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
							<h3><span class="whiteFont">Media</span></h3>
							<h3 class="whiteFont">Highlights</h3>
							<a href="news-list.php" class="buttonskew"><div class="reserve-skew">View All</div></a>
						</div>
					</div>
				</div><!--end.left-news1-->
				<div class="news-jer-reserve">
					<div class="news-items-list edge-news-list">
						<div class="edge-reserve-news-list">
							<div class="image-news">
								<img src="{{ asset(null) }}frontend/images/content/hightlights-image.jpg">
							</div><!--end.images-news-->
							<div class="details-news">
								<h4 class="detail-title">Lorem ipsum<br><span class="whiteFont">dolor sit amet</span></h4>
								<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer quis dictum urna, quis feugiat tellus.</p>
								<a href="#" class="learnMore">More Details</a>
							</div><!--end.details-news-->
						</div><!--.edge-reserve-news-list-->
					</div><!--.news-items-list-->

					<div class="news-items-list edge-news-list">
						<div class="edge-reserve-news-list">
							<div class="image-news">
								<img src="{{ asset(null) }}frontend/images/content/hightlights-image2.jpg">
							</div><!--end.images-news-->
							<div class="details-news">
								<h4 class="detail-title">Lorem ipsum<br><span class="whiteFont">dolor sit amet</span></h4>
								<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer quis dictum urna, quis feugiat tellus.</p>
								<a href="#" class="learnMore">More Details</a>
							</div><!--end.details-news-->
						</div><!--.edge-reserve-news-list-->
					</div><!--.news-items-list-->

					<div class="news-items-list edge-news-list">
						<div class="edge-reserve-news-list">
							<div class="image-news">
								<img src="{{ asset(null) }}frontend/images/content/hightlights-image3.jpg">
							</div><!--end.images-news-->
							<div class="details-news">
								<h4 class="detail-title">Lorem ipsum<br><span class="whiteFont">dolor sit amet</span></h4>
								<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer quis dictum urna, quis feugiat tellus. </p>
								<a href="#" class="learnMore">More Details</a>
							</div><!--end.details-news-->
						</div><!--.edge-reserve-news-list-->
					</div><!--.news-items-list-->


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
							<h3 style="margin-bottom:0;"><span class="whiteFont">FDR</span></h3>
							<h3 class="whiteFont">NEWS</h3>
							<a href="news-list.php" class="buttonskew-red"><div class="reserve-skew">View All</div></a>
						</div>
					</div>
				</div><!--end.left-news1-->
				<div class="news-jer">
					<div class="news-items-list edge-news-list">
						<div class="edge-reserve-news-list">
							<div class="image-news">
								<img src="{{ asset(null) }}frontend/images/content/fdr-image.jpg">
							</div><!--end.images-news-->
							<div class="details-news">
								<h4 class="detail-title">Lorem ipsum<br><span class="whiteFont">dolor sit amet</span></h4>
								<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer quis dictum urna, quis feugiat tellus.</p>
								<a href="#" class="learnMore">More Details</a>
							</div><!--end.details-news-->
						</div><!--.edge-reserve-news-list-->
					</div><!--.news-items-list-->

					<div class="news-items-list edge-news-list">
						<div class="edge-reserve-news-list">
							<div class="image-news">
								<img src="{{ asset(null) }}frontend/images/content/fdr-image2.jpg">
							</div><!--end.images-news-->
							<div class="details-news">
								<h4 class="detail-title">Lorem ipsum<br><span class="whiteFont">dolor sit amet</span></h4>
								<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer quis dictum urna, quis feugiat tellus.</p>
								<a href="#" class="learnMore">More Details</a>
							</div><!--end.details-news-->
						</div><!--.edge-reserve-news-list-->
					</div><!--.news-items-list-->

					<div class="news-items-list edge-news-list">
						<div class="edge-reserve-news-list">
							<div class="image-news">
								<img src="{{ asset(null) }}frontend/images/content/fdr-image3.jpg">
							</div><!--end.images-news-->
							<div class="details-news">
								<h4 class="detail-title">Lorem ipsum<br><span class="whiteFont">dolor sit amet</span></h4>
								<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer quis dictum urna, quis feugiat tellus. </p>
								<a href="#" class="learnMore">More Details</a>
							</div><!--end.details-news-->
						</div><!--.edge-reserve-news-list-->
					</div><!--.news-items-list-->
				</div><!--end.news-jer-->
			</div><!--end.news-section-->
		</div>
	</section>
	<section id="news-page-section5" class="">
		<div class="not-edge">
		 	<div class="eventSection">
		 		<div class="left-event1">
		 			<h3 class="event-title"><span class="redFont">Events</span><br>Calendar</h3>
		 			<div class="event-row">
		 				<div class="date-event">
		 					<span class="number">1-2</span>
		 					<span class="month">SEP</span>	
		 				</div>
		 				<div class="detail-event">
		 					<h4>MotorPrix</h4>
		 					<p><strong>REGION 1</strong></p>
		 					<p>tetur, egestas ligula ac, aliquam dolor. Morbi </p>
		 				</div>
		 			</div><!--end.row-->
		 			<div class="event-row">
		 				<div class="date-event">
		 					<span class="number">6-7</span>
		 					<span class="month">AUG</span>	
		 				</div>
		 				<div class="detail-event">
		 					<h4>HRC</h4>
		 					<p><strong>REGION 1</strong></p>
		 					<p>tetur, egestas ligula ac, aliquam dolor. Morbi </p>
		 				</div>
		 			</div><!--end.row-->
		 			<div class="event-row">
		 				<div class="date-event">
		 					<span class="number">21-23</span>
		 					<span class="month">JUL</span>	
		 				</div>
		 				<div class="detail-event">
		 					<h4>Bikers Gathering</h4>
		 					<p><strong>REGION 1</strong></p>
		 					<p>tetur, egestas ligula ac, aliquam dolor. Morbi </p>
		 				</div>
		 			</div><!--end.row-->
		 			<div class="event-row">
		 				<a href="#" class="viewAll">View All</a>
		 			</div>
		 		</div><!--end.left-event1-->
		 		<div class="left-event-page1-reserve">
					<div class="news-cap1">
						<div class="title-cap">
							<h3><span class="whiteFont">EVENT</span></h3>
						</div>
					</div>
				</div>
		 		<div class="slider-event">
		 			<ul id="eventSlider" class="slider"> 
			            <li  style="background-image: url({{ asset(null) }}frontend/images/content/slide-event1.jpg)"></li>
			            <li  style="background-image: url({{ asset(null) }}frontend/images/content/slide-event2.jpg)"></li>
			        </ul>
		 		</div>
		 	</div><!--end.eventSection-->
		 </div>
	</section>

	

</div>
<!-- end of middle -->
@endsection    