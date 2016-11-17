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
			              <li><a href="{{url('/gallery/index/photo')}}">Photo All</a></li>
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
        @if(!empty($photo->childs->where('status','publish')->first()->id))
        
					<div class="detail-slider">
            	<ul class="slidegal">
                  @foreach($photo->childs->where('status','publish') as $childPhoto)
                  <li><img src="{{ asset(null) }}contents/foto/large/{{$childPhoto->image}}" title="{{$childPhoto->title}}" /></li>
                  @endforeach
                

                  
                </ul>
                <div class="custom-pager">
                    <ul class="pager-album">

                  @foreach($photo->childs as $key => $childPhotopager)
                      <li><a data-slideIndex="{{$key}}" href=""><img src="{{ asset(null) }}contents/foto/large/{{$childPhotopager->image}}" title="{{$childPhotopager->title}}" /></a></li>
                  @endforeach
                    </ul>
                </div><!--end.custom-pager-->
        	</div><!--end.detail-slider-->
          @endif
				</div><!--end.slide-photo-->
			</div><!--end.content-photo-details-->
		</div>
	</section>
</div>
<!-- end of middle -->
@endsection    