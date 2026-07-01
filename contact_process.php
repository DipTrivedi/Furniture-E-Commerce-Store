<?php session_start();

extract($_POST);
$error = [];

if (!empty($_POST)) {
    if (empty($fnm)) {
        $_SESSION['error']['fnm'] = "please enter first name!";
    }

    if (empty($lnm)) {
        $_SESSION['error']['lnm'] = "please enter last name!";
    }

    if (empty($email)) {
        $_SESSION['error']['email'] = "please enter email!";
    }

    if (empty($msg)) {
        $_SESSION['error']['msg'] = "please enter message!";
    }

    

    // Display results
    if (empty($error)) {

       include("connection.php");

       $t=time();

       $q="insert into contact 
       (c_fnm,c_lnm,c_email,c_msg,c_time)
       values('".$fnm."','".$lnm."','".$email."','".$msg."','".$t."')";

       mysqli_query($link,$q);

       $_SESSION['success']="Message sent";

       header("location:contact.php");

      
    } else {
        // foreach ($error as $res) {
        //     echo "<p style='color:red;'>$res</p>";
        // }
        // echo "<a href='contact.php'>Go Back</a>";
        header("location:contact.php");
    }
} else {
    header("location:contact.php");
}

?>