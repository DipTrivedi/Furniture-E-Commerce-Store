<?php
include("inc/header.php");
if($_SERVER['HTTP_REFERER'] == 'http://localhost/PROJECT_2K25/checkout.php')
{
$_SESSION['previous_page']=$_SERVER['HTTP_REFERER'];
}
?>


<div class="container d-flex justify-content-center align-items-center vh-100">
  <div class="card p-4 shadow-lg" style="width: 100%; max-width: 400px; border-radius:50px;">
    <?php
    if (isset($_SESSION["dip"])) {
      echo '<div>';
      echo '<p class="alert alert-danger text-center" style="color:red">' . $_SESSION['dip'] . '</p>';
      unset($_SESSION['dip']);
      echo '</div>';
    }
    ?>
    <h2 class="text-center mb-4">Login</h2>
    <form action="login_proccess.php" method="post">
      <div class="mb-3">
        <label for="email" class="form-label">Email address</label>
        <input type="email" class="form-control" id="email" placeholder="Enter email" name="email">
        <div>
          <?php
          if (isset($_SESSION["error"]["email"])) {
            echo '<p class="danger" style="color:red">' . $_SESSION['error']['email'] . '</p>';
          }
          ?>
        </div>
      </div>
      <div class="mb-3">
        <label for="password" class="form-label">Password</label>
        <input type="password" class="form-control" id="password" placeholder="Password" name="pwd">
        <div>
          <?php
          if (isset($_SESSION["error"]["pwd"])) {
            echo '<p class="danger" style="color:red">' . $_SESSION['error']['pwd'] . '</p>';
            unset($_SESSION['error']);
          }
          ?>
        </div>
      </div>
      <button type="submit" class="btn btn-primary w-100">Login</button>
      <p class="text-center mt-3">Don't have an account? <a href="register.php">Register</a></p>
    </form>
  </div>
</div>

<?php
include("inc/footer.php");
?>