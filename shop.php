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



<div class="container mt-5">
    <div class="row">
        <div class="col-lg-7 mx-auto text-center">
            <h2 class="section-title text-white bg-dark" style="border-radius:20px">Our Categories</h2>
        </div>
        <div class="col-lg-7 mx-auto text-center">
            <center>
                <ul style="list-style:none">
                    <?php

                    include("connection.php");

                    $q = "select * from category where cat_status=1";

                    $result = mysqli_query($link, $q);


                    while ($row = mysqli_fetch_array($result))

                        echo '
            <a href="shop.php?cid=' . $row['cat_id'] . '&nm=' . $row['cat_nm'] . '" style="text-decoration:none"><li class="text-center mt-2 btn" style="display:inline-block">' . strtoupper($row['cat_nm']) . '</li>
        ';
                    ?>

                </ul>
            </center>
        </div>
    </div>
</div>
</div>

<div class="untree_co-section product-section before-footer-section">
    <div class="container">
        <div class="row">

            <!-- Start Column 1 -->

            <?php
            include("connection.php");

            if (isset($_GET['cid'])) {
                $id = $_GET['cid'];
                $q = "select count(*) as total from product,category where p_status=1 and p_cat=cat_id and cat_id=" . $id;
            } else {
                $q = "select count(*) as total from product where  p_status=1";
            }

            $result = mysqli_query($link, $q);

            $t_row = mysqli_fetch_assoc($result);
            $total_items = $t_row["total"];

            $cur_page = (isset($_GET['page'])) ? $_GET['page'] : 1;
            $page_per_item = 9;
            $total_page = ceil($total_items / $page_per_item);
            $start_pos = ($cur_page - 1) * $page_per_item;

            if (isset($_GET['cid'])) {
                $cid = $_GET['cid'];
                $q = "SELECT * FROM product WHERE p_cat=" . $cid . " AND p_status = 1 LIMIT " . $start_pos . "," . $page_per_item;

            } else {
                $q = "SELECT * FROM product WHERE p_status = 1  LIMIT " . $start_pos . "," . $page_per_item;

            }

            $r = mysqli_query($link, $q);

            if (mysqli_num_rows($r) <= 0) {
                echo 'product not found';
            }


            while ($row = mysqli_fetch_array($r)) {
                echo '<div class="col-12 col-md-4 col-lg-3 mb-5">
						<a class="product-item" href="product_single.php?id=' . $row['p_id'] . '&cat=' . $row['p_cat'] . '">
							<img src="product_img/' . $row['p_img'] . '" class="img-fluid product-thumbnail">
							<h3 class="product-title">' . $row['p_nm'] . '</h3>
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

?>

<div class="container">
    <!-- Pagination -->
    <nav aria-label="Page navigation" class="mt-5">
        <ul class="pagination justify-content-center" style="margin-top:-280px;">
            <li>
                <?php
                if ($cur_page > 1) {
                    if (isset($_GET['cid'])) {
                        echo '<a href="shop.php?cid=' . $_GET['cid'] . '&nm=' . $_GET['nm'] . '&page=' . ($cur_page - 1) . '">&lt</a>';
                    } else {
                        echo '<a href="shop.php?page=' . ($cur_page - 1) . '">&lt</a>';
                    }
                }
                ?>
            </li>
            <?php
            for ($i = 1; $i <= $total_page; $i++) {
                if (isset($_GET['cid'])) {
                    echo '<li><a href="shop.php?cid=' . $_GET['cid'] . '&nm=' . $_GET['nm'] . '&page=' . $i . '">' . $i . '</a></li>';
                } else {
                    echo '<li><a href="shop.php?page=' . $i . '">' . $i . '</a></li>';
                }
            }
            ?>
            <li>
                <?php
                if ($cur_page < $total_page) {
                    if (isset($_GET['cid'])) {
                        echo '<a href="shop.php?cid=' . $_GET['cid'] . '&nm=' . $_GET['nm'] . '&page=' . ($cur_page + 1) . '">&gt</a>';
                    } else {
                        echo '<a href="shop.php?page=' . ($cur_page + 1) . '">&gt</a>';
                    }
                }
                ?>

            </li>
        </ul>
    </nav>
</div>




<?php
include("inc/footer.php");
?>