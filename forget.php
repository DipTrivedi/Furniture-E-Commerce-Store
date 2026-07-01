<?php
include("inc/header.php");
?>

<div class="container d-flex justify-content-center align-items-center vh-100">
    <div class="card p-4 shadow-lg" style="width: 100%; max-width: 400px;">
        <h2 class="text-center mb-4">Forget password</h2>
        <form action="" method="post">
            <div>Please enter your email address to search for your account.</div>
            <input type="text" placeholder="Email address" class="form-control mt-3">
            <button class="btn btn-primary w-10 mt-3">cancel</button>
            <button class="btn btn-primary w-10 mt-3">search</button>
        </form>
    </div>
</div>

<?php
include("inc/footer.php");
?>