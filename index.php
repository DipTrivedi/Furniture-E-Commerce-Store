<?php
include("inc/header.php");
?>
<!-- Start Hero Section -->
<div class="hero">
	<div class="container">
		<div class="row justify-content-between">
			<div class="col-lg-5">
				<div class="intro-excerpt">
					<h1>Transform Home with Timeless Comfort & Style</h1>
					<p class="mb-4">Discover handpicked furniture collections that blend elegance, durability, and
						modern design. From stylish sofas to statement décor pieces, we bring comfort and sophistication
						to every corner of your home.</p>
					<p><a href="shop.php" class="btn btn-secondary me-2">Shop Now</a></p>
				</div>
			</div>
			<div class="col-lg-7">
				<div class="hero-img-wrap">
					<img src="images/couch.png" class="img-fluid">
				</div>
			</div>
		</div>
	</div>
</div>
<!-- End Hero Section -->

<!-- Start Why Choose Us Section -->
<div class="why-choose-section">
	<div class="container">
		<div class="row justify-content-between">
			<div class="col-lg-6">
				<h2 class="section-title">Why Choose Us bfyhubghbfubggubd</h2>
				<p>We believe furniture shopping should be simple, reliable, and worry-free. That’s why we offer
					unbeatable service and quality you can trust.</p>

				<div class="row my-5">
					<div class="col-6 col-md-6">
						<div class="feature">
							<div class="icon">
								<img src="images/truck.svg" alt="Image" class="imf-fluid">
							</div>
							<h3>Fast &amp; Free Shipping</h3>
							<p>Get your favorite furniture delivered quickly, at no extra cost.
							</p>
						</div>
					</div>

					<div class="col-6 col-md-6">
						<div class="feature">
							<div class="icon">
								<img src="images/bag.svg" alt="Image" class="imf-fluid">
							</div>
							<h3>Easy to Shop</h3>
							<p>A smooth, secure, and hassle-free shopping experience every time.
							</p>
						</div>
					</div>

					<div class="col-6 col-md-6">
						<div class="feature">
							<div class="icon">
								<img src="images/support.svg" alt="Image" class="imf-fluid">
							</div>
							<h3>24/7 Support</h3>
							<p>Our team is always here to help you with your questions or concerns.
							</p>
						</div>
					</div>

					<div class="col-6 col-md-6">
						<div class="feature">
							<div class="icon">
								<img src="images/return.svg" alt="Image" class="imf-fluid">
							</div>
							<h3>Hassle Free Returns</h3>
							<p>Changed your mind? Enjoy easy and stress-free returns.
							</p>
						</div>
					</div>

				</div>
			</div>

			<div class="col-lg-5">
				<div class="img-wrap">
					<img src="images/why-choose-us-img.jpg" alt="Image" class="img-fluid">
				</div>
			</div>

		</div>
	</div>
</div>
<!-- End Why Choose Us Section -->
<!-- Start Product Section -->

<div class="container mt-5">
	<div class="row">
		<div class="col-lg-7 mx-auto text-center bg-dark" Style="border-radius:20px;">
			<h2 class="section-title text-white">Our Categories</h2>
		</div>
	</div>
</div>
<div class="product-section">
	<div class="container">
		<div class="row">


			<?php

			include('connection.php');
			$q = "select * from category where cat_status=1";
			$r = mysqli_query($link, $q);
			while ($row = mysqli_fetch_array($r)) { ?>
				<div class="col-12 col-md-4 col-lg-3 mb-4">
					<a class="category-card" href="shop.php?cid=<?= $row['cat_id'] ?>&nm=<?= urlencode($row['cat_nm']) ?>">
						<div class="cat-thumb">
							<img src="category_img/<?= htmlspecialchars($row['cat_img']) ?>"
								alt="<?= htmlspecialchars($row['cat_nm']) ?>">
							<span class="cat-overlay"></span>
						</div>
						<div class="cat-body">
							<h3 class="cat-title"><?= htmlspecialchars($row['cat_nm']) ?></h3>
							<span class="cat-cta">Explore →</span>
						</div>
					</a>
				</div>
			<?php }
			?>



		</div>
	</div>
</div>
<!-- End Product Section -->

<!-- Start We Help Section -->
<div class="we-help-section">
	<div class="container">
		<div class="row justify-content-between">
			<div class="col-lg-7 mb-5 mb-lg-0">
				<div class="imgs-grid">
					<div class="grid grid-1"><img src="images/img-grid-1.jpg" alt="Untree.co"></div>
					<div class="grid grid-2"><img src="images/img-grid-2.jpg" alt="Untree.co"></div>
					<div class="grid grid-3"><img src="images/img-grid-3.jpg" alt="Untree.co"></div>
				</div>
			</div>
			<div class="col-lg-5 ps-lg-5">
				<h2 class="section-title mb-4">We Help You Make Modern Interior Design</h2>
				<p>Donec facilisis quam ut purus rutrum lobortis. Donec vitae odio quis nisl dapibus malesuada. Nullam
					ac aliquet velit. Aliquam vulputate velit imperdiet dolor tempor tristique. Pellentesque habitant
					morbi tristique senectus et netus et malesuada</p>

				<ul class="list-unstyled custom-list my-4">
					<li>Donec vitae odio quis nisl dapibus malesuada</li>
					<li>Donec vitae odio quis nisl dapibus malesuada</li>
					<li>Donec vitae odio quis nisl dapibus malesuada</li>
					<li>Donec vitae odio quis nisl dapibus malesuada</li>
				</ul>
				<p><a herf="#" class="btn">Explore</a></p>
			</div>
		</div>
	</div>
</div>
<!-- End We Help Section -->

<!-- Start Popular Product -->
<div class="popular-product">
	<div class="container">
		<div class="row">

			<?php

			include("connection.php");

			$q = "SELECT * FROM product ORDER BY RAND() LIMIT 6";

			$r = mysqli_query($link, $q);

			while ($res = mysqli_fetch_assoc($r)) {

				extract($res);

				echo '<div class="col-12 col-md-6 col-lg-4 mb-4 mb-lg-0">
				<div class="product-item-sm d-flex">
					<div class="thumbnail">
						<img src="product_img/' . $p_img . '" alt="Image" class="img-fluid">
					</div>
					<div class="pt-3">
						<h3>' . $p_nm . '</h3>
						<p>' . $p_desc . '</p>
						<p><a href="#">Read More</a></p>
					</div>
				</div>
			</div>';

			}
			?>

		</div>
	</div>
</div>
<!-- End Popular Product -->

<!-- Start Testimonial Slider -->
<div class="testimonial-section">
	<div class="container">
		<div class="row">
			<div class="col-lg-7 mx-auto text-center">
				<h2 class="section-title bg-dark text-white">Testimonials</h2>
			</div>
		</div>

		<div class="row justify-content-center">
			<div class="col-lg-12">
				<div class="testimonial-slider-wrap text-center">

					<div id="testimonial-nav">
						<span class="prev" data-controls="prev"><span class="fa fa-chevron-left"></span></span>
						<span class="next" data-controls="next"><span class="fa fa-chevron-right"></span></span>
					</div>

					<div class="testimonial-slider">

						<div class="item">
							<div class="row justify-content-center">
								<div class="col-lg-8 mx-auto">

									<div class="testimonial-block text-center">
										<blockquote class="mb-5">
											<p>&ldquo;Donec facilisis quam ut purus rutrum lobortis. Donec vitae odio
												quis nisl dapibus malesuada. Nullam ac aliquet velit. Aliquam vulputate
												velit imperdiet dolor tempor tristique. Pellentesque habitant morbi
												tristique senectus et netus et malesuada fames ac turpis egestas.
												Integer convallis volutpat dui quis scelerisque.&rdquo;</p>
										</blockquote>

										<div class="author-info">
											<div class="author-pic">
												<img src="images/person_2.jpg" alt="Maria Jones" class="img-fluid">
											</div>
											<h3 class="font-weight-bold">Saurav Joshi</h3>
											<span class="position d-block mb-3">CEO, Co-Founder, XYZ Inc.</span>
										</div>
									</div>

								</div>
							</div>
						</div>
						<!-- END item -->

						<div class="item">
							<div class="row justify-content-center">
								<div class="col-lg-8 mx-auto">

									<div class="testimonial-block text-center">
										<blockquote class="mb-5">
											<p>&ldquo;Donec facilisis quam ut purus rutrum lobortis. Donec vitae odio
												quis nisl dapibus malesuada. Nullam ac aliquet velit. Aliquam vulputate
												velit imperdiet dolor tempor tristique. Pellentesque habitant morbi
												tristique senectus et netus et malesuada fames ac turpis egestas.
												Integer convallis volutpat dui quis scelerisque.&rdquo;</p>
										</blockquote>

										<div class="author-info">
											<div class="author-pic">
												<img src="images/person_3.jpg" alt="Maria Jones" class="img-fluid">
											</div>
											<h3 class="font-weight-bold">Carray Minatee</h3>
											<span class="position d-block mb-3">CEO, Co-Founder, XYZ Inc.</span>
										</div>
									</div>

								</div>
							</div>
						</div>
						<!-- END item -->

						<div class="item">
							<div class="row justify-content-center">
								<div class="col-lg-8 mx-auto">

									<div class="testimonial-block text-center">
										<blockquote class="mb-5">
											<p>&ldquo;Donec facilisis quam ut purus rutrum lobortis. Donec vitae odio
												quis nisl dapibus malesuada. Nullam ac aliquet velit. Aliquam vulputate
												velit imperdiet dolor tempor tristique. Pellentesque habitant morbi
												tristique senectus et netus et malesuada fames ac turpis egestas.
												Integer convallis volutpat dui quis scelerisque.&rdquo;</p>
										</blockquote>

										<div class="author-info">
											<div class="author-pic">
												<img src="images/person-1.png" alt="Maria Jones" class="img-fluid">
											</div>
											<h3 class="font-weight-bold">Payal Dhare</h3>
											<span class="position d-block mb-3">CEO, Co-Founder, XYZ Inc.</span>
										</div>
									</div>

								</div>
							</div>
						</div>
						<!-- END item -->

					</div>

				</div>
			</div>
		</div>
	</div>
</div>
<!-- End Testimonial Slider -->


<?php
include("inc/footer.php");
?>