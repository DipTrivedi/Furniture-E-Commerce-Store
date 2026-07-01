<?php
include("inc/header.php");
include("connection.php");
$id = $_GET["id"];
$q = "SELECT * FROM product,category WHERE p_status = 1 and p_cat=cat_id and p_id=" . $id;
$result = mysqli_query($link, $q);

$row = mysqli_fetch_assoc($result);
extract($row);

// Open container and row
?>
<div class="dip">.</div>
<div class="dip">.</div>
<div class="dip">.</div>
<div class="site-section">
  <div class="container">
    <div class="row">
      <div class="col-md-6">
        <img src="product_img/<?php echo $p_img; ?>" alt="Image" class="img-fluid" style="max-width:100%;">
      </div>

      <div class="col-md-6" style="text-align:center">
        <h3 class="text-black"><?php echo $p_nm; ?></h3><br>
        <h4 class="mb-4"><?php echo nl2br($p_desc); ?></h4>
        <p><strong class="text-danger h3">Category:- <?php echo $cat_nm; ?></strong></p>
        <p><strong class="text-primary h2">Price:- $<?php echo $p_price; ?></strong></p>

        <?php
        $sta = 0;
        if (isset($_SESSION['cart'])) {
          foreach ($_SESSION['cart'] as $val) {
            extract($val);

            if ($nm == $p_nm || $price == $p_price || $img == $p_img) {
              $sta = 1;
            }
          }
        }


        if ($sta == 1) {
          echo '<div class="mb-9"><p class="alert alert-danger" style="border-radius: 20px;">product already into the cart</p></div>';
        } else {
          echo '<a href="addtocart.php?pid=' . $p_id . '"><button class="btn" style="margin-right: 10px;">add to cart</button></a>';
          echo '<a href="checkout.php?pid=' . $p_id . '"&p_nm=' . $p_nm . '><button class="btn">buy now</button></a>';
        }


        ?>


        <div class="mb-5"></div>



      </div>
    </div>
  </div>
</div>

<!-- Related Products Section -->
<div class="container my-5">
  <h2 class="text-center mb-5 alert-success">Related Products</h2>
  <div class="row g-4">

    <?php


    $cat = $_GET["cat"];
    $id = $_GET["id"];

    $q = "SELECT * FROM product,category WHERE p_status =1 and p_cat=cat_id and p_id !=$id and p_cat=" . $cat;
    $result = mysqli_query($link, $q);

    while ($row = mysqli_fetch_array($result)) {
      extract($row);
      echo '
    <div class="col-12 col-sm-6 col-md-4 col-lg-3">
  <div class="product-card">
    <a class="product-link" href="product_single.php?id=' . $p_id . '&cat=' . $p_cat . '">
      <img src="product_img/' . htmlspecialchars($p_img) . '" 
           class="product-img" 
           alt="' . htmlspecialchars($p_nm) . '">
    </a>
    <div class="product-body">
      <h5 class="product-title">' . htmlspecialchars($p_nm) . '</h5>
      <p class="product-price">$' . htmlspecialchars($p_price) . '</p>
    </div>
  </div>
</div>
    ';
    }

    ?>
  </div>
</div>

<div class="mb-5">.</div>
<div class="mb-5">.</div>

<?php
include("inc/footer.php");
?>