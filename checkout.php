<?php
include("inc\header.php");
?>


<!-- Start Hero Section -->
<div class="hero">
	<div class="container">
		<div class="row justify-content-between">
			<div class="col-lg-5">
				<div class="intro-excerpt">
					<h1>Checkout</h1>
				</div>
			</div>
			<div class="col-lg-7">

			</div>
		</div>
	</div>
</div>
<!-- End Hero Section -->

<div class="untree_co-section">
	<div class="container">
		<?php 
		if (!isset($_SESSION['client']))
		{
			echo '<div class="row mb-5">
			<div class="col-md-12">
				<div class="border p-4 rounded" role="alert">
					Returning customer? <a href="login.php">Click here</a> to login
				</div>
			</div>
		</div>';
		} ?>
		<div class="row">
			<div class="col-md-6 mb-5 mb-md-0">
				<h2 class="h3 mb-3 text-black">Billing Details</h2>
				<div class="p-3 p-lg-5 border bg-white">

					<form action="checkout_proccess.php" method="post">
						<div class="form-group row">
							<div class="col-md-6">
								<label for="c_fname" class="text-black">First Name <span
										class="text-danger">*</span></label>
								<input type="text" class="form-control" id="c_fname" name="fnm">
								<?php
								if (isset($_SESSION['error']['fnm'])) {
									echo '<font color="red">' . $_SESSION['error']['fnm'] . '</font><br />';
								}
								?>
							</div>
							<div class="col-md-6">
								<label for="c_lname" class="text-black">Last Name <span
										class="text-danger">*</span></label>
								<input type="text" class="form-control" id="c_lname" name="lnm">
								<?php
								if (isset($_SESSION['error']['lnm'])) {
									echo '<font color="red">' . $_SESSION['error']['lnm'] . '</font><br />';
								}
								?>
							</div>
						</div>



						<div class="form-group row">
							<div class="col-md-12">
								<label for="c_address" class="text-black">Address <span
										class="text-danger">*</span></label>
								<input type="text" class="form-control" id="c_address" name="address_line1"
									placeholder="Street address">
								<?php
								if (isset($_SESSION['error']['address_line1'])) {
									echo '<font color="red">' . $_SESSION['error']['address_line1'] . '</font><br />';
								}
								?>
							</div>
						</div>

						<div class="form-group mt-3">
							<input type="text" class="form-control" placeholder="Apartment, suite, unit etc. (optional)"
								name="address_line2">
						</div>

						<div class="form-group">
							<label for="c_country" class="text-black">Country <span class="text-danger">*</span></label>
							<select id="c_country" class="form-control" name="country">
								<option value="0" selected>Select a country</option>
								<option>bangladesh</option>
								<option>Algeria</option>
								<option>Afghanistan</option>
								<option>Ghana</option>
								<option>Albania</option>
								<option>Bahrain</option>
								<option>Colombia</option>
								<option>Dominican Republic</option>
								<option>India</option>
							</select>
							<?php
							if (isset($_SESSION['error']['country'])) {
								echo '<font color="red">' . $_SESSION['error']['country'] . '</font><br />';
							}
							?>
						</div>



						<div class="form-group row">
							<div class="col-md-6">
								<label for="c_state_country" class="text-black">State <span
										class="text-danger">*</span></label>
								<input type="text" class="form-control" id="c_state_country" name="state">
								<?php
								if (isset($_SESSION['error']['state'])) {
									echo '<font color="red">' . $_SESSION['error']['state'] . '</font><br />';
								}
								?>
							</div>
							<div class="col-md-6">
								<label for="c_city_country" class="text-black">city <span
										class="text-danger">*</span></label>
								<input type="text" class="form-control" id="c_city_country" name="city">
								<?php
								if (isset($_SESSION['error']['city'])) {
									echo '<font color="red">' . $_SESSION['error']['city'] . '</font><br />';
								}
								?>
							</div>
							<div class="col-md-6">
								<label for="c_postal_zip" class="text-black">Posta / Zip <span
										class="text-danger">*</span></label>
								<input type="text" class="form-control" id="c_postal_zip" name="zip">
								<?php
								if (isset($_SESSION['error']['zip'])) {
									echo '<font color="red">' . $_SESSION['error']['zip'] . '</font><br />';
								}
								?>
							</div>
						</div>

						<div class="form-group row mb-5">
							<div class="col-md-6">
								<label for="c_email_address" class="text-black">Email Address <span
										class="text-danger">*</span></label>
								<input type="text" class="form-control" id="c_email_address" name="email">
								<?php
								if (isset($_SESSION['error']['email'])) {
									echo '<font color="red">' . $_SESSION['error']['email'] . '</font><br />';
								}
								?>
							</div>
							<div class="col-md-6">
								<label for="c_phone" class="text-black">Phone <span class="text-danger">*</span></label>
								<input type="text" class="form-control" id="c_phone" name="phone"
									placeholder="Phone Number">
								<?php
								if (isset($_SESSION['error']['phone'])) {
									echo '<font color="red">' . $_SESSION['error']['phone'] . '</font><br />';
								}
								?>
							</div>
						</div>

						<div class="form-group">
							<label for="c_order_notes" class="text-black">Order Notes</label>
							<textarea name="o_note" id="c_order_notes" cols="30" rows="5" class="form-control"
								placeholder="Write your notes here..."></textarea>
						</div>

				</div>
			</div>


			<!-- coupon code -->

			<div class="col-md-6">

				<div class="row mb-2">
					<div class="col-md-12">
						<h2 class="h3 mb-3 text-black">Coupon Code</h2>
						<div class="p-3 p-lg-5 border bg-white">

							<label for="c_code" class="text-black mb-3">Enter your coupon code if you have one</label>
							<div class="input-group w-75 couponcode-wrap">
								<input type="text" class="form-control me-2" id="coupon_code" placeholder="Coupon Code"
									aria-label="Coupon Code" aria-describedby="button-addon2">
								<div class="input-group-append">
									<a href="checkout.php"><button class="btn btn-black btn-sm" type="button"
											value="">Apply</button></a>
								</div>
								<p id="coupon_message" style="color:red;"></p>
							</div>

						</div>
					</div>
				</div>


				<!-- your order -->




				<div class="row mb-5">
					<div class="col-md-12">
						<h2 class="h3 mb-3 text-black">Your Order</h2>
						<div class="p-3 p-lg-5 border bg-white">
							<table class="table site-block-order-table mb-5">
								<thead>
									<th>Product</th>
									<th>Total</th>
								</thead>
								<tbody>
									<?php
									if (isset($_SESSION['cart'])) {
										$total = 0;
										foreach ($_SESSION['cart'] as $key => $value) {
											$total_price = $value['price'] * $value['qty'];
											$total += $total_price;
											echo '<tr>
										<td>' . $value['nm'] . ' <strong class="mx-2">x</strong> 1</td>
										<td>$' . $value['price'] . '</td>
									</tr>';
										}
									}
									?>

									<?php
									echo '<tr>
										<td class="text-black font-weight-bold"><strong>Cart Subtotal</strong></td>
										<td class="text-black">$' . $total . '</td>
									</tr>
									<tr>
										<td class="text-black font-weight-bold"><strong>Discount Coupon</strong></td>
										<td class="text-black font-weight-bold"><strong>-0</strong></td>
									</tr>
									<tr>
										<td class="text-black font-weight-bold"><strong>Order Total</strong></td>
										<td class="text-black font-weight-bold"><strong>$' . $total . '</strong></td>
									</tr>';
									?>

								</tbody>
							</table>

							<h2 class="mb-3">Payment Method</h2>
							<h6>
								<input type="checkbox" name="payment" id="payment" value="online">
								<label for="payment">cash on delivery</label>
							</h6>
							<?php
							if (isset($_SESSION['error']['payment'])) {
								echo '<font color="red">' . $_SESSION['error']['payment'] . '</font><br />';

							}
							unset($_SESSION['error']);
							?>

							<div class="form-group">
								<button class="btn btn-black btn-lg py-3 btn-block" onclick="window.location'
									thankyou.htm'" type="submit">Place Order</button>
							</div>

						</div>
					</div>
				</div>

			</div>
		</div>
		</form>
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