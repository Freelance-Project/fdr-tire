@extends('frontend.layouts.layout')

@section('content')
<!-- middle -->
<div id="middle-content" class="news-detail">
	<section id="list-news-page">
		<div class="content-news-detail">
			<div class="left-content">
				<div class="banner-berita edge-left">
					<div class="edge-left-content">
						<div class="main-images"><img src="{{ asset(null) }}frontend/images/content/news-image.jpg" /></div>
					</div>
				</div>
				<div class="wrap-news">
					<div class="top-menu-product">
						<div class="right">
							<div class="breadcum-product">
								<ol class="breadcrumb">
					              <li><a href="{{url('')}}">Home</a></li>
					              <li><a href="{{url('news')}}">News & Event</a></li>
					              <li><a href="{{url('news/detail/'.$resultNews->slug)}}">Detail</a></li>
					              <li class="active">{{ $resultNews->title }}</li>
					            </ol>
							</div>
						</div><!--end.right-->
					</div><!--end.top-menu-->
					<div class="isiBerita">
						<span class="date">{{ $resultNews->created_at }}</span>
						<h1 class="title-news">{{ $resultNews->title }}</h1>
						<div class="isi-par">
							<p>{!! $resultNews->description !!}</p>
						</div>
						<div class="share-row">

							<img src="{{ asset(null) }}frontend/images/material/share.jpg" />
						</div>
					</div>
				</div><!--end.wrap-->
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