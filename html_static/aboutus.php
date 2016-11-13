<?php $page = ""; ?>
<?php include('inc_header.php');?>
<!-- middle -->
<div id="middle-content" class="about-us-content">

	<section id="news-page" class="edge-left">
		<div class="edge-left-content">
			<div class="news-page-section">
				<div class="left-capt1">
					<div class="caption1">
						<div class="news-page-caption">
							<div class="title-cap">
								<h3 class="whiteFont">About Us</h3>
							</div>
							<div class="caption-about">
								<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer quis dictum urna, quis feugiat tellus. Aenean </p>
								<a href="news-list.php" class="learnMoreGrey">More Details</a>
							</div>
						</div><!--news-page-caption-->
					</div><!--end.caption1-->
				</div><!--end.left-capt1-->
				<div class="photo-banner">
					<img src="images/content/vision-banner.jpg">
				</div>
			</div><!--end.product-section-->
		</div>
	</section>
	<section id="news-page-section2" class="edge-right">
		<div class="edge-right-content">
			<div id="bg-aboutnya" class="news-sectionRed" style="background: url(images/content/vision-home-banner.jpg) no-repeat;">
				<div class="left-news-page1 tips-page">
					<div class="news-cap1">
						<div class="title-cap red-cap">
							<h3><span class="whiteFont">Vision</span></h3>
						</div>
					</div>
				</div><!--end.left-news1-->
				<div class="left-capt2 left-capProduct" id="onRoad">
					<div class="caption-small">
						<p>PT Suryaraya Rubberindo Industries memiliki visi untuk menjadi untuk menjadi pemimpin pasar untuk produsen ban sepeda motor dengan performa dan nilai tinggi di Indonesia melalui tenaga kerja yang terampil dan teknologi terbaik.</p>
					</div><!--end.caption-small-->
				</div><!--end.left-caption-->
			</div><!--end.news-section-->
		</div>
	</section>
	<section id="news-page-section3" class="">
		<div class="not-edge">
			<div class="news-sectionRed">
				<div class="left-news-page1-reserve">
					<div class="news-cap1">
						<div class="title-cap">
							<h3><span class="whiteFont">CSR</span></h3>
							<h3 class="whiteFont">Activities</h3>
						</div>
					</div>
				</div><!--end.left-news1-->
				<div class="news-jer-reserve csrFeed" style="background:#e6e7e8;">
						<div class="row-csr">
							<div class="item-csr">
								<div class="icon-csr"><img src="images/material/icon-csr1.png"></div>
								<div class="bt-row-csr">
									<a href="#" class="bt-csr bg-orange">Pendidikan</a>
								</div>
							</div>
							<div class="item-csr">
								<div class="icon-csr"><img src="images/material/icon-csr2.png"></div>
								<div class="bt-row-csr">
									<a href="#" class="bt-csr bg-red">Kesehatan</a>
								</div>
							</div>
							<div class="item-csr">
								<div class="icon-csr"><img src="images/material/icon-csr3.png"></div>
								<div class="bt-row-csr">
									<a href="#" class="bt-csr bg-green">Lingkungan Hidup</a>
								</div>
							</div>
							<div class="item-csr">
								<div class="icon-csr"><img src="images/material/icon-csr4.png"></div>
								<div class="bt-row-csr">
									<a href="#" class="bt-csr bg-green">Kemasyarakatan</a>
								</div>
							</div>
						</div>

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
							<h3 style="margin-bottom:0;"><span class="whiteFont">Fdr racing</span></h3>
							<h3 style="margin-bottom:0;"><span class="whiteFont">Experience</span></h3>
						</div>
					</div>
				</div><!--end.left-news1-->
				<div class="news-jer downloadList relative" style="background:url(images/content/fdr-experience-banner.jpg);">
					<div class="caption-experience text-center">
						<h3>SEE FDR TIRE JOURNEY ON RACING WORLD<br>FROM THE BEGINNING UNTIL TODAY</h3>
						<a href="#" class="buttonskew-red"><div class="reserve-skew">start</div></a>
					</div>
				</div><!--end.news-jer-->
			</div><!--end.news-section-->
		</div>
	</section>
	<section id="news-page-section5" class="">
		<div class="not-edge">
			<div class="news-sectionRed">
				<div class="left-news-page1-reserve">
					<div class="news-cap1">
						<div class="title-cap">
							<h3><span class="whiteFont">AWARDS</span></h3>
						</div>
					</div>
				</div><!--end.left-news1-->
				<div class="news-jer-reserve awardsFeed" style="background:#e6e7e8;">
					<div id="awardCarousel" class="content-carousel">
						<div id="banCarousel">
							<img src="images/content/award1.png" alt="Image 1" />
							<img src="images/content/award2.png" alt="Image 2" />
							<img src="images/content/award3.png" alt="Image 3" />
							<img src="images/content/award4.png" alt="Image 4" />
							<img src="images/content/award5.png" alt="Image 5" />
						</div>
						<a href="#" id="prev"></a>
						<a href="#" id="next"></a>
					</div>
				</div><!--end.news-jer-->
			</div><!--end.news-section-->
		</div>
	</section>
</div>
<!-- end of middle -->
<script type="text/javascript" src="js/jquery.waterwheelCarousel.min.js"></script>

<script type="text/javascript">
  $(document).ready(function() {
  	 var carousel = $("#banCarousel").waterwheelCarousel({
        });
    $('#prev').bind('click', function () {
      carousel.prev();
      return false
    });

    $('#next').bind('click', function () {
      carousel.next();
      return false;
    });

  });
</script>
<?php include('inc_footer.php');?>