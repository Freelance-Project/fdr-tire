@extends('frontend.layouts.layout')

@section('content')
    <!-- middle -->
<div id="middle-content">

	<section id="career-page" class="edge-left">
		<div class="edge-left-content">
			<div class="career-section">
			@if(!empty($faqBanner))
				<div class="bg-career">
					<img src="{{ asset(null) }}contents/faq/large/{{$faqBanner->image}}">
				</div>
				<div class="career-right">
					<div class="bg-right">
						<img src="{{asset(null)}}frontend/images/material/career-right.png">
					</div>
					<div class="content-career">
						<h3><span class="redFont">{{ $faqBanner->title }}</span></h3>
						{!! $faqBanner->description !!}>
						<a href="{{url('/career/event')}}" class="learnMore">Lihat Lowongan</a>
					</div>
				</div>
			@endif
			</div><!--end.product-section-->
	        <a href="" class="findtire"></a>
    	</div>
	</section>
	<section id="search-home" class="">
		<div class="triangle-search"><img src="{{asset(null)}}frontend/images/material/triangle-search.png" /></div>
		<div class="not-edge">
			<div class="search-section">
				<div class="tab-search">
					<div class="tab-menu">
						<a href="#" class="skew-tab-menu  right-triangle active" data-tabId="motor-search">By Motorcycle</a><a href="#" class="skew-tab-menu left-triangle" data-tabId="tire-search">By Tire Size</a>
					</div>
					<div id="motor-search" class="content-tab">
						<h3>What is your Motorcycle Size</h3>
						<div class="select-item">
							<div class="select-form">
								<select>
								  <option value="">Manufacture</option>
								  <option value="1">Honda</option>
								  <option value="2">Yamaha</option>
								  <option value="3">Suzuki</option>
								</select>
							</div>
							<div class="select-form">
								<select>
								  <option value="">Model</option>
								  <option value="1">Bebek</option>
								  <option value="2">Matic</option>
								  <option value="3">Kopling</option>
								</select>
							</div>
							<div class="select-form">
								<select>
								  <option value="">Tire Category</option>
								  <option value="1">category 1</option>
								  <option value="2">category 2</option>
								  <option value="3">category 3</option>
								</select>
							</div>
							<div class="select-form">
								<select>
								  <option value="">Tire Size</option>
								  <option value="1">100 mm</option>
								  <option value="2">200 mm</option>
								  <option value="3">300 mm</option>
								</select>
							</div>
						</div><!--end.select-item-->
					</div><!--end.motor-search-->
					<div id="tire-search" class="content-tab hide">
						<h3>What is your Tire Size</h3>
						<div class="select-item">
							<div class="select-form">
								<select>
								  <option value="">Rim Diameter</option>
								  <option value="1">100 mm</option>
								  <option value="2">200 mm</option>
								  <option value="3">300 mm</option>
								</select>
							</div>
							<div class="select-form">
								<select>
								  <option value="">Tire Ratio</option>
								  <option value="1">10 mm</option>
								  <option value="2">20 mm</option>
								  <option value="3">20 mm</option>
								</select>
							</div>
						</div><!--end.select-item-->
					</div><!--end.tire-search-->
				</div><!--end.tab-search-->
			</div>
		</div>
	</section>
	<section id="career-news" class="edge-left">
		<div class="edge-left-content">
			<div class="left-news-career">
				<div class="bg-left-career">
					<img src="{{asset(null)}}frontend/images/material/bg-jobfair.png">
				</div>
				<div class="title-career-news">
					<div class="title-cap">
						<h3>Job fair</h3>
						<h3>Event</h3>
					</div>
				</div>
			</div><!--.left-news-career-->
			<div class="career-news-section">
				<div class="content-career-news">
					<img src="{{ asset(null) }}contents/jobfair/large/ori-{{$jobFair->image}}">
				</div><!--end.content-career-news-->
			</div><!--end.career-news-section-->
		</div>
	</section>
	<section id="faq-row" class="edge-right">
		<div class="edge-right-content">
		 	<div class="faq-section">
		 		<div class="faq-title">
		 			<div class="title-cap red-cap">
						<h3>FAQ</h3>
					</div>
		 		</div><!--end.faq-title-->
		 		<div class="faq-content">
		 			<div id="content-accodion">
		 			@if(!empty($faq))
		 				@foreach($faq as $valFaq)
		 				<div class="items">
		 					<h4 class="page">{{$valFaq->title}}</h4>
		 					<div class="content">
		 						{!! $valFaq->description !!}
							</div><!--end.content-->
		 				</div><!--end.items-->
		 				@endforeach
		 			@endif
		 			{{--
		 				<div class="items">
		 					<h4 class="page">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer quis dictum urna, quis</h4>
		 					<div class="content">
		 						<p>We aim to be a global organization that constantly stays a step ahead in dealing with change, creates new value, and contributes broadly to society.</p>
		 						<p>We aim to be a global organization that constantly stays a step ahead in dealing with change, creates new value, and contributes broadly to society.</p>
							</div><!--end.content-->
		 				</div><!--end.items-->
		 				<div class="items">
		 					<h4 class="page">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer quis dictum urna, quis</h4>
		 					<div class="content">
		 						<p>We aim to be a global organization that constantly stays a step ahead in dealing with change, creates new value, and contributes broadly to society.</p>
		 						<p>We aim to be a global organization that constantly stays a step ahead in dealing with change, creates new value, and contributes broadly to society.</p>
							</div><!--end.content-->
		 				</div><!--end.items-->
		 				<div class="items">
		 					<h4 class="page">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer quis dictum urna, quis</h4>
		 					<div class="content">
		 						<p>We aim to be a global organization that constantly stays a step ahead in dealing with change, creates new value, and contributes broadly to society.</p>
		 						<p>We aim to be a global organization that constantly stays a step ahead in dealing with change, creates new value, and contributes broadly to society.</p>
							</div><!--end.content-->
		 				</div><!--end.items-->
		 				<div class="items">
		 					<h4 class="page">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer quis dictum urna, quis</h4>
		 					<div class="content">
		 						<p>We aim to be a global organization that constantly stays a step ahead in dealing with change, creates new value, and contributes broadly to society.</p>
		 						<p>We aim to be a global organization that constantly stays a step ahead in dealing with change, creates new value, and contributes broadly to society.</p>
							</div><!--end.content-->
		 				</div><!--end.items-->
		 				<div class="items">
		 					<h4 class="page">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer quis dictum urna, quis</h4>
		 					<div class="content">
		 						<p>We aim to be a global organization that constantly stays a step ahead in dealing with change, creates new value, and contributes broadly to society.</p>
		 						<p>We aim to be a global organization that constantly stays a step ahead in dealing with change, creates new value, and contributes broadly to society.</p>
							</div><!--end.content-->
		 				</div><!--end.items-->
		 				<div class="items">
		 					<h4 class="page">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer quis dictum urna, quis</h4>
		 					<div class="content">
		 						<p>We aim to be a global organization that constantly stays a step ahead in dealing with change, creates new value, and contributes broadly to society.</p>
		 						<p>We aim to be a global organization that constantly stays a step ahead in dealing with change, creates new value, and contributes broadly to society.</p>
							</div><!--end.content-->
		 				</div><!--end.items-->
		 				<div class="items">
		 					<h4 class="page">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer quis dictum urna, quis</h4>
		 					<div class="content">
		 						<p>We aim to be a global organization that constantly stays a step ahead in dealing with change, creates new value, and contributes broadly to society.</p>
		 						<p>We aim to be a global organization that constantly stays a step ahead in dealing with change, creates new value, and contributes broadly to society.</p>
							</div><!--end.content-->
		 				</div><!--end.items-->
		 				<div class="items">
		 					<h4 class="page">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer quis dictum urna, quis</h4>
		 					<div class="content">
		 						<p>We aim to be a global organization that constantly stays a step ahead in dealing with change, creates new value, and contributes broadly to society.</p>
		 						<p>We aim to be a global organization that constantly stays a step ahead in dealing with change, creates new value, and contributes broadly to society.</p>
							</div><!--end.content-->
		 				</div><!--end.items-->
		 				<div class="items">
		 					<h4 class="page">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer quis dictum urna, quis</h4>
		 					<div class="content">
		 						<p>We aim to be a global organization that constantly stays a step ahead in dealing with change, creates new value, and contributes broadly to society.</p>
		 						<p>We aim to be a global organization that constantly stays a step ahead in dealing with change, creates new value, and contributes broadly to society.</p>
							</div><!--end.content-->
		 				</div><!--end.items-->
		 				--}}
		 			</div><!--end.contentaccodion-->
		 		</div><!--end.faq-content-->
		 	</div><!--end.faq-section-->
		 </div>
	</section>
</div>
<!-- end of middle -->

<script type="text/javascript">
$(document).ready(function(e) {
    $("#content-accodion").accordion_custom();   
});

</script>

@endsection    