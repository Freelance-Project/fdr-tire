@extends('frontend.layouts.layout')

@section('content')
<!-- middle -->
<div id="middle-content">
	<section id="list-news-page">
		<div class="wrapper">
			<div class="left-content">
				<div class="top-menu-product">
					<div class="left">
						<div class="title-edge">
							<h3>FDR NEWS</h3>
						</div>
					</div>
					<div class="right">
						<div class="breadcum-product">
							<ol class="breadcrumb">
				              <li><a href="{{url('')}}">Home</a></li>
				              <li><a href="{{url('news')}}">News & Event</a></li>
				              <li class="active">FDR News</li>
				            </ol>
						</div>
					</div><!--end.right-->
				</div><!--end.top-menu-->
				<div class="list-news">
					@if($resultNews)
					@foreach ($resultNews as $val)
					<div class="row-news">
						<a href="{{url('news/detail/'.$val->slug)}}">
							<div class="imageframe">
								<div class="imageThumb"><img src="{{ asset(null) }}frontend/images/content/news-row1.jpg" /></div>
								<div class="frameThumb"><img src="{{ asset(null) }}frontend/images/material/frame-white.png" /></div>
							</div>
						</a>
						<div class="caption-list-news">
							<a href="{{url('news/detail/'.$val->slug)}}"><h3 class="title-list-news">{{$val->title}}</h3></a>
							<span class="date">24 Oktober 2016</span>
							<p>{!! $val->brief !!}</p>
							<a class="readMore" href="{{url('news/detail/'.$val->slug)}}">Read More</a>
						</div>
					</div><!--end.row-news-->
					@endforeach
					@endif
					{{--
					<div class="row-news">
						<a href="#">
							<div class="imageframe">
								<div class="imageThumb"><img src="{{ asset(null) }}frontend/images/content/news-row2.jpg" /></div>
								<div class="frameThumb"><img src="{{ asset(null) }}frontend/images/material/frame-white.png" /></div>
							</div>
						</a>
						<div class="caption-list-news">
							<a href="#"><h3 class="title-list-news">FDR raih MotorPlus Reader Choice Award 3 kali berturut-turut</h3></a>
							<span class="date">24 Oktober 2016</span>
							<p>Tabloid Motor Plus kembali menggelar Motor Plus Reader Choice Award 2016 dan ban FDR keluar sebagai juara untuk kategori ban.</p>
							<a class="readMore" href="#">Read More</a>
						</div>
					</div><!--end.row-news-->
					<div class="row-news">
						<a href="#">
							<div class="imageframe">
								<div class="imageThumb"><img src="{{ asset(null) }}frontend/images/content/news-row3.jpg" /></div>
								<div class="frameThumb"><img src="{{ asset(null) }}frontend/images/material/frame-white.png" /></div>
							</div>
						</a>
						<div class="caption-list-news">
							<a href="#"><h3 class="title-list-news">FDR raih MotorPlus Reader Choice Award 3 kali berturut-turut</h3></a>
							<span class="date">24 Oktober 2016</span>
							<p>Tabloid Motor Plus kembali menggelar Motor Plus Reader Choice Award 2016 dan ban FDR keluar sebagai juara untuk kategori ban.</p>
							<a class="readMore" href="#">Read More</a>
						</div>
					</div><!--end.row-news-->

					<div class="row-news">
						<a href="#">
							<div class="imageframe">
								<div class="imageThumb"><img src="{{ asset(null) }}frontend/images/content/news-row1.jpg" /></div>
								<div class="frameThumb"><img src="{{ asset(null) }}frontend/images/material/frame-white.png" /></div>
							</div>
						</a>
						<div class="caption-list-news">
							<a href="#"><h3 class="title-list-news">FDR raih MotorPlus Reader Choice Award 3 kali berturut-turut</h3></a>
							<span class="date">24 Oktober 2016</span>
							<p>Tabloid Motor Plus kembali menggelar Motor Plus Reader Choice Award 2016 dan ban FDR keluar sebagai juara untuk kategori ban.</p>
							<a class="readMore" href="#">Read More</a>
						</div>
					</div><!--end.row-news-->
					<div class="row-news">
						<a href="#">
							<div class="imageframe">
								<div class="imageThumb"><img src="{{ asset(null) }}frontend/images/content/news-row2.jpg" /></div>
								<div class="frameThumb"><img src="{{ asset(null) }}frontend/images/material/frame-white.png" /></div>
							</div>
						</a>
						<div class="caption-list-news">
							<a href="#"><h3 class="title-list-news">FDR raih MotorPlus Reader Choice Award 3 kali berturut-turut</h3></a>
							<span class="date">24 Oktober 2016</span>
							<p>Tabloid Motor Plus kembali menggelar Motor Plus Reader Choice Award 2016 dan ban FDR keluar sebagai juara untuk kategori ban.</p>
							<a class="readMore" href="#">Read More</a>
						</div>
					</div><!--end.row-news-->
					<div class="row-news">
						<a href="#">
							<div class="imageframe">
								<div class="imageThumb"><img src="{{ asset(null) }}frontend/images/content/news-row3.jpg" /></div>
								<div class="frameThumb"><img src="{{ asset(null) }}frontend/images/material/frame-white.png" /></div>
							</div>
						</a>
						<div class="caption-list-news">
							<a href="#"><h3 class="title-list-news">FDR raih MotorPlus Reader Choice Award 3 kali berturut-turut</h3></a>
							<span class="date">24 Oktober 2016</span>
							<p>Tabloid Motor Plus kembali menggelar Motor Plus Reader Choice Award 2016 dan ban FDR keluar sebagai juara untuk kategori ban.</p>
							<a class="readMore" href="#">Read More</a>
						</div>
					</div><!--end.row-news-->
					--}}
				</div><!--end.list-news-->
			</div><!--end.left-content-->
			<div class="right-content">
				<div class="right-row">
					<img src="{{ asset(null) }}frontend/images/content/fdr-right.png" />
				</div>
				<div class="right-row">
					<div class="top-menu-product">
						<div class="left">
							<div class="title-edge" style="margin-bottom:0;">
								<h3>Trending</h3>
							</div>
						</div>
					</div><!--end.top-menu-->
					<div class="row-trending">
						<div class="caption-list-news">
							<a href="#"><h3 class="title-list-news">FDR Ban Pilihan PON XIX</h3></a>
							<span class="date">24 Oktober 2016</span>
						</div>
						<a href="#">
							<div class="imageframe">
								<div class="imageThumb"><img src="{{ asset(null) }}frontend/images/content/news-row3.jpg" /></div>
								<div class="frameThumb"><img src="{{ asset(null) }}frontend/images/material/frame-grey.png" /></div>
							</div>
						</a>
					</div><!--end.row-trending-->

					<div class="row-trending">
						<div class="caption-list-news">
							<a href="#"><h3 class="title-list-news">FDR Ban Pilihan PON XIX</h3></a>
							<span class="date">24 Oktober 2016</span>
						</div>
						<a href="#">
							<div class="imageframe">
								<div class="imageThumb"><img src="{{ asset(null) }}frontend/images/content/news-row2.jpg" /></div>
								<div class="frameThumb"><img src="{{ asset(null) }}frontend/images/material/frame-grey.png" /></div>
							</div>
						</a>
					</div><!--end.row-trending-->

					<div class="row-trending">
						<div class="caption-list-news">
							<a href="#"><h3 class="title-list-news">FDR Ban Pilihan PON XIX</h3></a>
							<span class="date">24 Oktober 2016</span>
						</div>
						<a href="#">
							<div class="imageframe">
								<div class="imageThumb"><img src="{{ asset(null) }}frontend/images/content/news-row1.jpg" /></div>
								<div class="frameThumb"><img src="{{ asset(null) }}frontend/images/material/frame-grey.png" /></div>
							</div>
						</a>
					</div><!--end.row-trending-->
				</div>
			</div><!--end.right-content-->
		</div>
	</section>
</div>
<!-- end of middle -->
@endsection