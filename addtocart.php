<?php session_start();
if (isset($_GET['pid'])) {
    include('connection.php');

    $pid = $_GET['pid'];

    $q = 'select p_img,p_nm,p_price from product where p_status=1 and p_id=' . $pid;
    $result = mysqli_query($link, $q);
    $row = mysqli_fetch_assoc($result);
    extract($row);
    $_SESSION['cart'][]=array('qty'=>1,'nm'=>$p_nm,'img'=>$p_img,'price'=>$p_price,'id'=>$pid);

    echo'<pre>';
    print_r($_SESSION['cart']);

    header('location:cart.php');
}
elseif (!empty($_POST)){
    foreach ($_POST as $key => $value) {
        $_SESSION['cart'][$key]['qty']= $value;
    }
    header('location:cart.php');
}
elseif(isset($_GET['rid']))
{
    unset( $_SESSION['cart'][$_GET['rid']]);
    header('location:cart.php');
}
?>