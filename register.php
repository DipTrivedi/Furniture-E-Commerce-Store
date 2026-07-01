<?php
include("inc/header.php");

if (isset($_SESSION["success"])) {
echo'<div class="container mt-5">
  <div class="row">
    <div class="col-12 text-center mb-5">';
      echo '<p class="alert alert-success">' . $_SESSION['success'] . '</p>';

      unset($_SESSION['success']);
    }
    ?></div>
  </div>
</div>
<div class="container d-flex justify-content-center align-items-center vh-100 mt-5">
  <div class="card p-4 shadow-lg" style="width: 100%; max-width: 450px;">
    <h2 class="text-center mb-4">Create Account</h2>
    <form action="register_process.php" method="post">
      <div class="mb-3">
        <label for="fullname" class="form-label">Full Name</label>
        <input type="text" class="form-control" name="fnm" placeholder="Enter full name">
        <div>
        <?php
        if (isset($_SESSION["error"])) {
          echo '<p class="danger" style="color:red">' . $_SESSION['error']['fnm'] . '</p>';
        }
        ?>
        </div>
      </div>
      <div class="mb-3">
        <label for="email" class="form-label">Email address</label>
        <input type="email" class="form-control" name="email" placeholder="Enter email">
        <?php
        if (isset($_SESSION["error"])) {
          echo '<p class="danger" style="color:red">' . $_SESSION['error']['email'] . '</p>';

        }
        ?>
      </div>
      <div class="mb-3">
        <label for="password" class="form-label">Password</label>
        <input type="password" class="form-control" name="pwd" placeholder="Create a password">
        <?php
        if (isset($_SESSION["error"])) {
          echo '<p class="danger" style="color:red">' . $_SESSION['error']['pwd'] . '</p>';
          unset($_SESSION['error']);
        }
        ?>
      </div>
      <div class="mb-3">
        <label for="confirm-password" class="form-label">Confirm Password</label>
        <input type="password" class="form-control" name="cpwd" placeholder="Confirm password">
      </div>
      <button type="submit" class="btn btn-success w-100">Register</button>
      <p class="text-center mt-3">Already have an account? <a href="login.php">Login</a></p>
    </form>
  </div>
</div>
<?php
include("inc/footer.php");
?>