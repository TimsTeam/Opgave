<?php
include $_SERVER["DOCUMENT_ROOT"]."/incl/header.php";
include $_SERVER["DOCUMENT_ROOT"]."/incl/login.inc.php";

if (isset($_SESSION['username'])) : 
  header("Location: admin/frontpage.php");
endif; 

if (!isset($_SESSION['username'])) : 
$pageTitle = "Admin Login";
?>
<section class="form-wrapper container">
  <h1>Log ind</h1>
<!--  <form class="form-main" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">-->
   <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
            <div class="form-group <?php echo (!empty($username_err)) ? 'has-error' : ''; ?>">
                <label>Username:<sup>*</sup></label>
                <input type="text" name="username"class="form-control" value="<?php echo $username; ?>">
                <span class="help-block"><?php echo $username_err; ?></span>
            </div>    
            <div class="form-group <?php echo (!empty($password_err)) ? 'has-error' : ''; ?>">
                <label>Password:<sup>*</sup></label>
                <input type="password" name="password" class="form-control">
                <span class="help-block"><?php echo $password_err; ?></span>
            </div>
            <div class="form-group">
                <input type="submit" class="btn btn-primary" value="Submit">
            </div>
            <p>Don't have an account? <a href="register.php">Sign up now</a>.</p>
        </form>
</section>
<?php 
endif; 
?>
<?php include $_SERVER["DOCUMENT_ROOT"]."/incl/footer.php";?>