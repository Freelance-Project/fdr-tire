@extends('frontend.layouts.layout')

@section('content')

<!-- middle -->
<div id="middle-content">

	<section id="slider-home" class="edge-left">
		<div class="edge-left-content">
			<ul id="homeSlider" class="slider"> 
	            <li><img src="{{ asset(null) }}frontend/images/content/slide1.jpg" /></li>
	  			<li><img src="{{ asset(null) }}frontend/images/content/slide2.jpg" /></li>
	        </ul>
	        <a href="#" class="findtire"></a>
    	</div>
	</section>
	<section id="search-home" class="">
		<div class="triangle-search"><img src="{{ asset(null) }}frontend/images/material/triangle-search.png" /></div>
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
	<section id="product-home" class="edge-left">
		<div class="edge-left-content">
			<div id="productBgnya" class="product-section" style="background: url({{ asset(null) }}frontend/images/content/bg-product.jpg) no-repeat;">
				<div class="left-capt1">
					<div class="caption1">
						<div class="title-cap">
							<h3>Product</h3>
							<h3 class="whiteFont">Line UP</h3>
						</div>
						<div class="sub-cap">
							@if($resultSlide)
							@foreach ($resultSlide as $k => $val)
							<div class="side-triangle @if($k == 1)white-triangle @endif">
								<a href="{{url('product')}}" class="capSub" data-kanalId="onRoad" data-imageUrl="{{ asset(null) }}contents/product/large/{{$val->banner}}">{{$val->name}}</a>
							</div>@if($k == 0 || $k == 2)<br>@endif
							@endforeach
							@endif
							{{--
							<div class="side-triangle white-triangle">
								<a href="#" class="capSub" data-kanalId="onOffRoad" data-imageUrl="{{ asset(null) }}frontend/images/content/bg-product2.jpg">On/Off Road</a>
							</div>
							<div class="side-triangle">
								<a href="#" class="capSub" data-kanalId="racing" data-imageUrl="{{ asset(null) }}frontend/images/content/bg-product.jpg">Racing</a>
							</div><br>
							<div class="side-triangle">
								<a href="#" class="capSub" data-kanalId="tube" data-imageUrl="{{ asset(null) }}frontend/images/content/bg-product2.jpg">Tube</a>
							</div>
							--}}
						</div><!--end.sub-cap-->
					</div><!--end.caption1-->
				</div><!--end.left-caption-->
				
				@if($resultSlide)
				@foreach ($resultSlide as $k => $val)
				<div class="left-capt2 left-capProduct @if($k > 0)hide @endif" id="onRoad">
					<div class="caption-small">
						<h4>{{$val->name}}</h4>
						<p>The perfect tire for asphalt, concrete, soil and gravel surfaces</p>
						<a href="{{url('product')}}" class="learnMore">Learn More</a>
					</div><!--end.caption-small-->
				</div><!--end.left-caption-->
				@endforeach
				@endif
				{{--
				<div class="left-capt2 left-capProduct hide" id="onOffRoad">
					<div class="caption-small">
						<h4>On/off road</h4>
						<p>The perfect tire for asphalt, concrete, soil and gravel surfaces</p>
						<a href="#" class="learnMore">Learn More</a>
					</div><!--end.caption-small-->
				</div><!--end.left-caption-->
				<div class="left-capt2 left-capProduct hide" id="racing">
					<div class="caption-small">
						<h4>Racing</h4>
						<p>The perfect tire for asphalt, concrete, soil and gravel surfaces</p>
						<a href="#" class="learnMore">Learn More</a>
					</div><!--end.caption-small-->
				</div><!--end.left-caption-->
				<div class="left-capt2 left-capProduct hide" id="tube">
					<div class="caption-small">
						<h4>Tube</h4>
						<p>The perfect tire for asphalt, concrete, soil and gravel surfaces</p>
						<a href="#" class="learnMore">Learn More</a>
					</div><!--end.caption-small-->
				</div><!--end.left-caption-->
				--}}
			</div><!--end.product-section-->
		</div>
	</section>
	<section id="news-home" class="">
		<div class="">
			<div class="news-section">
				<div class="left-news1">
					<div class="news-cap1">
						<div class="title-cap">
							<h3 class="redFont">Latest</h3>
							<h3>News</h3>
						</div>
					</div>
				</div><!--end.left-news1-->
				<div class="slider-news">
					<ul id="newsSlider" class="slider">
						@if($resultNews)
						@foreach ($resultNews as $val)
						<li class="banner-news-home" style="background-image: url({{ asset(null) }}contents/news/large/{{$val->image}})">
							<div class="slide-caption">
								<div class="caption-small">
									<h4>  {!! $val->title !!}</h4>
									<p>{!! $val->brief !!}</p>
									<a href="{{url('news/detail/'.$val->slug)}}" class="learnMore">Learn More</a>
								</div><!--end.caption-small-->
							</div><!--end.slide-caption-->
						</li>
						@endforeach
						@endif
						
					</ul>
				</div><!--end.silder-news-->
			</div><!--end.news-section-->
		</div>
	</section>
	<section id="eventHome" class="edge-right">
		<div class="edge-right-content">
		 	<div class="eventSection">
		 		<div class="left-event1">
		 			<h3 class="event-title"><span class="redFont">Events</span><br>Calendar</h3>
		 			@if($resultEvent)
					@foreach ($resultEvent as $val)
		 			<div class="event-row">
		 				<div class="date-event">
		 					<span class="number">1-2</span>
		 					<span class="month">SEP</span>	
		 				</div>
		 				<div class="detail-event">
		 					<h4>{!! $val->title !!}</h4>
		 					<p><strong>{!! $val->source !!}</strong></p>
		 				</div>
		 			</div><!--end.row-->
		 			@endforeach
		 			@endif
		 			
		 			<div class="event-row">
		 				<a href="{{url('news/event')}}" class="viewAll">View All</a>
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
		 				@if($resultEvent)
						@foreach ($resultEvent as $val)
			            <li  style="background-image: url({{ asset(null) }}contents/news/large/{{$val->image}})"></li>
			            @endforeach
		 				@endif
			            
			        </ul>
		 		</div>
		 	</div><!--end.eventSection-->
		 </div>
	</section>
</div>
<!-- end of middle -->
@endsection  