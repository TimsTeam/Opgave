<?php
$loginErr ="";
include $_SERVER["DOCUMENT_ROOT"]."/incl/header.php";

if (isset($_SESSION['u_id'])) : 
  header("Location: admin/frontpage.php");
endif; 

if (!isset($_SESSION['u_id'])) : 
$pageTitle = "Admin Login";
?>
<section class="form-wrapper container">
  <h1>Log ind</h1>
<!--  <form class="form-main" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">-->
  <form class="form-main" action="/incl/login.inc.php" method="post">
    <div class="form-group">
      <label for="uid">Username</label>
      <input type="text" class="form-control" name="username" id="username" placeholder="Username">
    </div>
    <div class="form-group">
      <label for="pwd">Password</label>
      <input type="password" class="form-control" name="password" id="password" placeholder="Password">
    </div>
    <button type="submit" class="btn btn-primary ml-auto" name="button">Log ind</button>
    <span class="text-danger"><?php echo $loginErr ?></span>
  </form>
</section>
<?php 
endif; 
?>
<?php include $_SERVER["DOCUMENT_ROOT"]."/incl/footer.php";?>