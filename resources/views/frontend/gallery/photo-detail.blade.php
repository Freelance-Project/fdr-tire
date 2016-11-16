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
			              <li><a href="#">Photo All</a></li>
			              <li class="active">Photo</li>
			            </ol>
					</div>
				</div><!--end.right-->
			</div><!--end.top-menu-->
			<div class="content-photo-details">
				<h1 class="title-photo">{{$photo->title}}</h1>
				<span class="date">{{$photo->created_at}}</span>
				<div class="share-socmed">
					<div class="right">
						<a href="#"><img src="{{ asset(null) }}frontend/images/material/socmed.jpg"></a>
					</div>
				</div>
				<div class="slide-photo">
					<div class="detail-slider">
                    	<ul class="slidegal">
                      
                          @foreach($photo->childs as $childPhoto)
                          <li><img src="{{ asset(null) }}contents/foto/large/{{$childPhoto->image}}" title="{{$childPhoto->title}}" /></li>
                          @endforeach
                        

                          
                        </ul>
                        <div class="custom-pager">
                            <ul class="pager-album">

                          @foreach($photo->childs as $childPhotopager)
                              <li><a data-slideIndex="0" href=""><img src="{{ asset(null) }}contents/foto/large/{{$childPhotopager->image}}" title="{{$childPhotopager->title}}" /></a></li>
                          @endforeach
                            
                        </div><!--end.custom-pager-->
                	</div><!--end.detail-slider-->
				</div><!--end.slide-photo-->
			</div><!--end.content-photo-details-->
		</div>
	</section>
</div>
<!-- end of middle -->
@endsection    