<?php session_start();


if (!empty($_POST)) {

    extract($_POST);
    $_SESSION['error'] = [];

    if (empty($fnm)) {
        $_SESSION['error']['fnm'] = "please enter name";
    }

    if (empty($email)) {
        $_SESSION['error']['email'] = "please enter email";
    }

    if (empty($pwd)) {
        $_SESSION['error']['pwd'] = "please enter password";
    } else if (empty($cpwd)) {
        $_SESSION['error']['pwd'] = "please enter conform password";
    } else if ($pwd != $cpwd) {
        $_SESSION['error']['pwd'] = "don't match both password";
    } elseif (strlen($pwd) < 6) {
        $_SESSION['error']['pwd'] = "password must be 6 character";
    }

    // Display results
    if (empty($_SESSION['error'])) {

        include("connection.php");

        $t = time();

        $q = "insert into register 
       (r_nm,r_address,r_pass,r_time)
       values('" . $fnm . "','" . $email . "','" . $pwd . "','" . $t . "')";

        mysqli_query($link, $q);

        $_SESSION['success'] = "registation done...";

        header("location:register.php");

    } else {

        header("location:register.php");

    }
} else {
    header("location:register.php");
}

?>