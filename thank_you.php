<?php
include("inc/header.php");
?>

<!-- Start Hero Section -->
<div class="hero">
	<div class="container">
		<div class="row justify-content-between">
			<div class="col-lg-5">
				<div class="intro-excerpt">
					<h1>Thank You <img style="width:70px;" src="images/present.png" alt=""></h1>
				</div>
			</div>
		</div>
	</div>
</div>
<!-- End Hero Section -->

<div class="untree_co-section">
	<div class="container">
		<div class="row">
			<div class="col-md-12 text-center pt-5">
				<span class="display-3 thankyou-icon text-primary">
					<svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-cart-check mb-5" fill="currentColor"
						xmlns="http://www.w3.org/2000/svg">
						<path fill-rule="evenodd"
							d="M11.354 5.646a.5.5 0 0 1 0 .708l-3 3a.5.5 0 0 1-.708 0l-1.5-1.5a.5.5 0 1 1 .708-.708L8 8.293l2.646-2.647a.5.5 0 0 1 .708 0z" />
						<path fill-rule="evenodd"
							d="M0 1.5A.5.5 0 0 1 .5 1H2a.5.5 0 0 1 .485.379L2.89 3H14.5a.5.5 0 0 1 .491.592l-1.5 8A.5.5 0 0 1 13 12H4a.5.5 0 0 1-.491-.408L2.01 3.607 1.61 2H.5a.5.5 0 0 1-.5-.5zM3.102 4l1.313 7h8.17l1.313-7H3.102zM5 12a2 2 0 1 0 0 4 2 2 0 0 0 0-4zm7 0a2 2 0 1 0 0 4 2 2 0 0 0 0-4zm-7 1a1 1 0 1 0 0 2 1 1 0 0 0 0-2zm7 0a1 1 0 1 0 0 2 1 1 0 0 0 0-2z" />
					</svg>
				</span>
				<h2 class="display-3 text-black">Thank you!</h2>
				<p class="lead mb-5">Your order was successfully placed.</p>

				<?php
				include('connection.php');

				$key = $_GET['key'];
				$id = $_GET['orderid'];

				// Fetch order details
				$q = "SELECT * FROM orders WHERE o_id = $id";
				$result = mysqli_query($link, $q);
				$row = mysqli_fetch_assoc($result);

				extract($row);

				if ($o_key == $key) {

					// Decode JSON product IDs from o_pid
					$pid_array = json_decode($o_pid, true); // e.g. ["2","3"]

					if (!empty($pid_array) && is_array($pid_array)) {

						// Convert to comma-separated IDs
						$ids = implode(',', array_map('intval', $pid_array));

						// Fetch all product details
						$q2 = "SELECT * FROM product WHERE p_id IN ($ids)";
						$res = mysqli_query($link, $q2);

						echo '
						<div class="container mt-5">
							<div class="row">
								<div class="col-lg-8 mx-auto text-center" style="border-radius:20px;">
									<h3 class="mb-4">Your Ordered Products</h3>
									<div style="height:auto;width:100%;border:2px solid black;border-radius:10px;display:flex;flex-wrap:wrap;align-items:center;justify-content:center;gap:10px;padding:10px;">
						';

						// Loop through products and show images
						while ($prow = mysqli_fetch_assoc($res)) {
							extract($prow);
							echo '
								<div style="border:3px solid black;height:120px;width:120px;margin:5px;border-radius:10px;overflow:hidden;">
									<img src="product_img/'.$p_img.'" alt="'.$p_nm.'" style="width:100%;height:100%;object-fit:cover;">
								</div>
							';
						}

						echo '
									</div>
								</div>
							</div>
						</div><br><br>
						';
					} else {
						echo "<p style='color:red;'>No products found in this order.</p>";
					}
				} else {
					echo "<p style='color:red;'>Invalid order key!</p>";
				}
				?>

				<p><a href="shop.php" class="btn btn-sm btn-outline-black">Back to shop</a></p>
			</div>
		</div>
	</div>
</div>

<?php
include("inc/footer.php");
?>
<script src="js/bootstrap.bundle.min.js"></script>
<script src="js/tiny-slider.js"></script>
<script src="js/custom.js"></script>
</body>
</html>
