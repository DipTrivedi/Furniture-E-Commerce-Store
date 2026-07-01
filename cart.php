<?php
include("inc/header.php");
?>

<!-- Start Hero Section -->
<div class="hero">
  <div class="container">
    <div class="row justify-content-between">
      <div class="col-lg-5">
        <div class="intro-excerpt">
          <h1>Cart</h1>
          <p class="mb-4"> Lorem ipsum dolor sit amet consectetur
            adipisicing elit.
            Repudiandae ab aliquam repellat asperiores Donec
            vitae odio quis nisl dapibus malesuada.
            Nullam ac aliquet velit. Aliquam vulputate
            velit imperdiet dolor tempor tristique.</p>
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



<div class="untree_co-section before-footer-section">
  <div class="container">
    <div class="row mb-5">
      <form action="addtocart.php" class="col-md-12" method="post">
        <div class="site-blocks-table">
          <table class="table">
            <thead>
              <tr>
                <th class="product-thumbnail">Image</th>
                <th class="product-name">Product</th>
                <th>Price</th>
                <th>Quantity</th>
                <th>Total</th>
                <th>Remove</th>
              </tr>
            </thead>
            <tbody>
              <!-- Product Row 1 -->
              <?php

              if (isset($_SESSION['cart'])) {
                $total = 0;
                foreach ($_SESSION['cart'] as $key => $value) {
                  $total_price = $value['price'] * $value['qty'];
                  $total += $total_price;
                  echo '<tr>
                <td class="product-thumbnail">
                  <img src="product_img/' . $value['img'] . '" alt="Image" class="img-fluid">
                </td>
                <td class="product-name">
                  <h2 class="h5 text-black">' . $value['nm'] . '</h2>
                </td>
                <td>$' . $value['price'] . '</td>
                <td class="text-center">
                  <div class="input-group d-flex align-items-center justify-content-center quantity-container"
                    style="max-width: 120px; margin: auto;">
                    <div class="input-group-prepend">
                      <button class="btn btn-outline-black decrease btn-decr" type="button">&minus;</button>
                    </div>
                    <input type="text" min="1" name=' . $key . ' class="form-control text-center quantity-amount" value="' . $value['qty'] . '">
                    <div class="input-group-append">
                      <button class="btn btn-outline-black increase btn-incr" type="button">&plus;</button>
                    </div>
                  </div>
                </td>
                <td>$' . $total_price . '</td>
                <td><a href="addtocart.php?rid=' . $key . '" class="btn btn-black btn-sm">X</a></td>
              </tr>
              ';
                }
              }
              ?>
            </tbody>
          </table>

        </div>

    </div>

    <div class="row">
      <div class="col-md-6">
        <div class="row mb-5">
          <div class="col-md-6 mb-3 mb-md-0">
            <button type="submit" class="btn btn-black btn-sm btn-block">Update Cart</button>
          </div>
          </form>
          <div class="col-md-6">
            <a class="btn" href="shop.php">Continue Shopping</a>
          </div>
        </div>
      </div>
      <div class="col-md-6 pl-5">
        <div class="row justify-content-end">
          <div class="col-md-7">
            <div class="row">
              <div class="col-md-12 text-right border-bottom mb-5">
                <h3 class="text-black h4 text-uppercase">Cart Totals</h3>
              </div>
            </div>
            <div class="row mb-3">
              <div class="col-md-6">
                <span class="text-black">Subtotal</span>
              </div>
              <div class="col-md-6 text-right">
                <strong class="text-black">$<?php
                if (isset($total)) {
                  echo $total;
                } else {
                  echo "0";
                }
                ?></strong>
              </div>
            </div>
            <div class="row mb-5">
              <div class="col-md-6">
                <span class="text-black">Total</span>
              </div>
              <div class="col-md-6 text-right">
                <strong class="text-black">$<?php
                if (isset($total)) {
                  echo $total;
                } else {
                  echo "0";
                }
                ?></strong>
              </div>
            </div>

            <div class="row">
              <div class="col-md-12">
                <button class="btn btn-black btn-lg py-3 btn-block" onclick=
                <?php 
                if (isset($_SESSION['cart']) && (isset($_SESSION['client'])) ){
                  echo "window.location='checkout.php'";
                }
                else{
                  echo "window.location='login.php'";
                } ?>
                >
                Proceed To Checkout</button>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

<?php
include("inc/footer.php");
?>