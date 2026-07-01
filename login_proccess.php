<?php session_start();
extract($_POST);
$_SESSION['error'] = [];
if (!empty($_POST)) {
    if (empty($email)) {
        $_SESSION['error']['email'] = "please enter email";
    }

    if (empty($pwd)) {
        $_SESSION['error']['pwd'] = "please enter password";
    }

    // Display results
    if (empty($_SESSION['error'])) {
        include("connection.php");

        $q = "select * from register where r_address='
        " . mysqli_real_escape_string($link,$email) . "' and r_pass='" . mysqli_real_escape_string($link,$pwd) . "' ";

        $res = mysqli_query($link, $q);

        $r = mysqli_fetch_assoc($res);

        if (!empty($r)) {
           $_SESSION['dip']="invalid username or pass....";
           header("location:login.php");
        } else {
            
            $_SESSION['client']['nm']= $r['r_nm'];
            $_SESSION['client']['id']= $r['r_id'];
            $_SESSION['client']['status']= true;

            header("location:index.php");

        }


    } else {
        header("location:login.php");
    }
} else {
    header("location:login.php");
}

?>