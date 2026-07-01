<?php
include("inc/header.php");
?>



<!-- Start Hero Section -->
<div class="hero">
    <div class="container">
        <div class="row justify-content-between">
            <div class="col-lg-5">
                <div class="intro-excerpt">
                    <h1>Shop <img style="width:70px;" src="images/store.png" alt=""></h1>
                    <p class="mb-4">Discover our exclusive collection of premium furniture designed to bring comfort,
                        elegance, and style into your home. From cozy sofas and sleek chairs to modern tables and
                        timeless décor, every piece is crafted with care and quality materials.</p>
                    <!-- <p><a href="shop.html" class="btn btn-secondary me-2">Shop Now</a><a href="#" class="btn btn-white-outline">Explore</a></p> -->
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




<div class="untree_co-section product-section before-footer-section">
    <div class="container">
        <div class="row">

            <!-- Start Column 1 -->

            <?php
            include("connection.php");

            $s = $_POST["search"];

            $q = "select * from product where p_nm like '%$s%'";

            $r = mysqli_query($link, $q);

            if(mysqli_num_rows($r) <= 0)
            {
                echo "product not found.....!";
            }
            
                while ($row = mysqli_fetch_array($r)) {
                    echo '<div class="col-12 col-md-4 col-lg-3 mb-5">
						<a class="product-item" href="product_single.php?id=' . $row['p_id'] . '&cat=' . $row['p_cat'] . '">
							<img src="product_img/' . $row['p_img'] . '" class="img-fluid product-thumbnail">
							<h3 class="product-title">' . $row['p_nm'] . 'abc</h3>
							<strong class="product-price">$' . $row['p_price'] . '</strong>

							<span class="icon-cross">
								<img src="images/cross.svg" class="img-fluid">
							</span>
						</a>
					</div> 
                    ';
                }
            ?>

            <!-- End Column 1 -->


        </div>
    </div>

</div>
<p>.</p>







<?php
include("inc/footer.php");
?>