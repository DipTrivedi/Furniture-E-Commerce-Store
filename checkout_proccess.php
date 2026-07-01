<?php
session_start();

if (!empty($_POST) && isset($_SESSION['client']['status'])) {
        extract($_POST);
        $_SESSION['error'] = array();

        if (empty($fnm)) {
                $_SESSION['error']['fnm'] = "please enter first name";
        }

        if (empty($lnm)) {
                $_SESSION['error']['lnm'] = "please enter last name";
        }

        if (empty($address_line1)) {
                $_SESSION['error']['address_line1'] = "please enter address";
        }

        if (empty($country)) {
                $_SESSION['error']['country'] = "please select country";
        }
        if (empty($city)) {
                $_SESSION['error']['city'] = "please enter city";
        }
        if (empty($state)) {
                $_SESSION['error']['state'] = "please enter state";
        }

        if (empty($zip)) {
                $_SESSION['error']['zip'] = "please enter zip code";
        }

        if (empty($email)) {
                $_SESSION['error']['email'] = "please enter email";
        }

        if (empty($phone)) {
                $_SESSION['error']['phone'] = "please enter phone number";
        } else if (!is_numeric($phone)) {
                $_SESSION['error']['phone'] = "please enter valid phone number";
        }

        if (empty($payment)) {
                $_SESSION['error']['payment'] = "please select payment method";
        }

        if (!empty($_SESSION['error'])) {
                header("location:checkout.php");
        } else {
                include("connection.php");

                $a = "abcdefghijklmnopqrstuvwxyz123456789";

                $key = '';

                for ($i = 0; $i <= 10; $i++) {
                        $key .= substr($a, rand(0, 34), 1);
                }


                $t = time();
                $uid = $_SESSION['client']['id'];

                $pids = array();


                foreach ($_SESSION['cart'] as $val) {
                        $pids[] = $val['id'];
                }


                $pid = json_encode($pids);

                $q = "INSERT INTO orders 
                (o_fnm, o_lnm, o_country, o_add1, o_add2, o_state, o_city, o_zip, 
                o_email, o_phone, o_note, o_payment, o_key, o_pid, o_uid, o_time) 
                VALUES 
                ('" . $fnm . "', '" . $lnm . "', '" . $country . "', '" . $address_line1 . "', '" . $address_line2 . "', '" . $state . "', '" . $city . "', '" . $zip . "', 
                '" . $email . "', '" . $phone . "', '" . $o_note . "', '" . $payment . "', '" . $key . "', '" . $pid . "', '" . $uid . "', '" . $t . "')";

                mysqli_query($link, $q);

                $order_id=mysqli_insert_id($link);

                header("location:thank_you.php?orderid=" . $order_id . "&key=" . $key);
        }
} else {
        header("location:login.php");
}
?>