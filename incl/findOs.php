<?php
include("dbInfo.php");

$stmt = $dbConnect->prepare("SELECT adress,phone,email FROM contactadress,contactphone,contactemail");

if($stmt->execute()){
  $stmt->store_result();
  $stmt->bind_result($adress, $phone, $email);
  $stmt->fetch();
}
// $stmt->close();
?>
<br>
<section class="container center">
    <h2>Finder os her!</h2>

    <iframe width="100%" height="450" frameborder="0" style="border:0" src="https://www.google.com/maps/embed/v1/place?q=place_id:ChIJsTYokLYySUYRwtXFxFw5iFA&key=AIzaSyBCWyS8Ui4KnSw6lHZTOsCnOFxspLYp_2Q" allowfullscreen></iframe>
</section>

<br>

<section class="container">
  <div class="row">
    <div class="col-xl-6">
      <!-- Adresse mail osv. -->
      <h4>Adresse:</h4>
      <h5><?php echo $adress ?></h5>
      <br>
      <h4>Tlf:</h4>
      <h5><?php echo $phone ?></h5>
      <br>
      <h4>Mail:</h4>
      <h5><?php echo $email ?></h5>
    </div>
    <div class="col-xl-6">
      <form class="input-os">
        <input type="text" name="name" placeholder=" Navn" required>
        <br>
        <input type="text" name="mail" placeholder=" E-Mail" required>
        <br>
        <textarea placeholder=" Besked" required></textarea>
        <br>
        <input type="submit" value="Send">
      </form>

    </div>
  </div>
</section>
