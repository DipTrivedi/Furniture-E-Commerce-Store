<?php
// Example: Database check for coupon
include ("connection.php");

$subtotal = $_POST['subtotal'];
$coupon_code = mysqli_real_escape_string($link, $_POST['coupon_code']);

$q = mysqli_query($link, "SELECT * FROM offer WHERE of_code='$coupon_code'");
if(mysqli_num_rows($q) > 0){
    $row = mysqli_fetch_assoc($q);
    $discount = $row['of_discount']; // e.g., 10 means 10%

    $discount_amount = ($subtotal * $discount) / 100;
    $total = $subtotal - $discount_amount;

    echo json_encode([
        "success" => true,
        "message" => "Coupon applied successfully!",
        "discount" => $discount_amount,
        "total" => $total
    ]);
} else {
    echo json_encode([
        "success" => false,
        "message" => "Invalid coupon code!"
    ]);
}
