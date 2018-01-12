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
<hr>
<footer class="container">

    <div class="row">
        <div class="col-xl-6">
            <p>Adresse:</p>
            <p><?php echo $adress ?></p>
            <br>
            <p>Tlf:</p>
            <p><?php echo $phone ?></p>
            <br>
            <p>Mail:</p>
            <p><?php echo $email ?></p>
        </div>
        <div class="col-xl-6 social">
            <a href="">
                <img src="assets/img/facebook_logo.svg" alt="Pis" class="fb" style="width: 30px;"> </a>
            <a href="">
                <img src="assets/img/instagram_logo.svg" alt="Pis" class="ig" style="width: 30px;"> </a>
        </div>
    </div>
</footer>


<!-- ================================================== -->
<!-- Placed at the end of the document so the pages load faster -->
<script src="https://code.jquery.com/jquery-3.2.1.min.js" integrity="sha256-hwg4gsxgFZhOsEEamdOYGBf13FyQuiTwlAQgxVSNgt4="
    crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.3/umd/popper.min.js" integrity="sha384-vFJXuSJphROIrBnz7yo7oB41mKfc8JzQZiCq4NCceLEaO4IHwicKwpJf9c9IpFgh"
    crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/js/bootstrap.min.js" integrity="sha384-alpBpkh1PFOepccYVYDB4do5UnbKysX5WZXm3XxPqe5iKTfUKjNkCk9SaVuEZflJ"
    crossorigin="anonymous"></script>
<script src="assets/js/jquery-filterizr.js"></script>
<script src="assets/js/controls.js"></script>

<!-- Kick off Filterizr -->
<script type="text/javascript">
    $(function() {
        //Initialize filterizr with default options
        $('.filtr-container').filterizr();
    });
</script>

<!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
<script>
    (function () {
        'use strict'

        if (navigator.userAgent.match(/IEMobile\/10\.0/)) {
            var msViewportStyle = document.createElement('style')
            msViewportStyle.appendChild(
                document.createTextNode(
                    '@-ms-viewport{width:auto!important}'
                )
            )
            document.head.appendChild(msViewportStyle)
        }

    }())
</script>
<script>
    function myFunction(x) {
        x.classList.toggle("change");
    }
</script>
<script>

</script>
</body>

</html>
