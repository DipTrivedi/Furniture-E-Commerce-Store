<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bootstrap Demo</title>
    <!-- bootstrap cdn -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

</head>

<body class="p-5">

    <label for="coupon_code" class="text-black mb-3">Enter your coupon code if you have one:</label>
    <div class="input-group w-50 couponcode-wrap mb-2">
        <input type="text" class="form-control me-2 text-uppercase" id="coupon_code" placeholder="Coupon Code">
        <button class="btn btn-dark btn-sm" id="savebtn" type="button">Apply</button>
    </div>

    <p id="coupon_message" class="fw-bold"></p>

    <pre>
        Valid Code:
        GET100
        GET200
        SAVE10
    </pre>
    <?php
        include('connection.php');

        $q='select of_code from offer where of_status=1';

        $res=mysqli_query($link,$q);
        $coupan=[];
        while($row=mysqli_fetch_assoc($res))
        {
           $coupan[]=$row['of_code'];
        }
        $coupan_json=json_encode($coupan);
        ?>
        <script>
        let validCoupons = <?php echo $coupon_json; ?>;

        document.getElementById("savebtn").addEventListener("click", function () {
            let value = document.getElementById("coupon_code").value.toUpperCase();
            let message = document.getElementById("coupon_message");

            if (validcoupan.includes(value)) {
                message.innerHTML = "Coupan Successfully Added! FLAT 10% Discount!";
                message.classList.remove("text-danger");
                message.classList.add("text-success");
            } else {
                message.innerHTML = "Invalid Coupan Code!";
                message.classList.remove("text-success");
                message.classList.add("text-danger");
            }
        });

    </script>
    


    <!-- js cdn -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM"
        crossorigin="anonymous"></script>
</body>

</html>