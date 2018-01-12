<?php
include $_SERVER["DOCUMENT_ROOT"]."/incl/dbInfo.php";


?>
  <section class="row skoFix">
  <!-- Venstre side (filter) -->
  <div class="col-xl-2 skoBox">
  <br>
    <!-- Størrelse -->

    <div class="skoBox2">
      <span>Størrelse</span>
    </div>
    <center>

         <div class="form-check-inline" class="strFix">
        <label class="form-check-label">
          <input class="form-check-input" type="checkbox" value="">
          37
        </label>
      </div>
         <div class="form-check-inline" class="strFix">
        <label class="form-check-label">
          <input class="form-check-input" type="checkbox" value="">
          38
        </label>
      </div>
         <div class="form-check-inline" class="strFix">
        <label class="form-check-label">
          <input class="form-check-input" type="checkbox" value="">
          39
        </label>
      </div>
         <div class="form-check-inline" class="strFix">
        <label class="form-check-label">
          <input class="form-check-input" type="checkbox" value="">
          40
        </label>
      </div>
      <div class="form-check-inline" class="strFix">
        <label class="form-check-label">
          <input class="form-check-input" type="checkbox" value="">
          41
        </label>
      </div>
      <div class="form-check-inline" class="strFix">
        <label class="form-check-label">
          <input class="form-check-input" type="checkbox" value="">
          42
        </label>
      </div>
      <div class="form-check-inline" class="strFix">
        <label class="form-check-label">
          <input class="form-check-input" type="checkbox" value="">
          43
        </label>
      </div>
      <div class="form-check-inline" class="strFix">
        <label class="form-check-label">
          <input class="form-check-input" type="checkbox" value="">
          44
        </label>
      </div>
      <div class="form-check-inline" class="strFix">
        <label class="form-check-label">
          <input class="form-check-input" type="checkbox" value="">
          45
        </label>
      </div>
      <div class="form-check-inline" class="strFix">
        <label class="form-check-label">
          <input class="form-check-input" type="checkbox" value="">
          46
        </label>
      </div>
       <div class="form-check-inline" class="strFix">
        <label class="form-check-label">
          <input class="form-check-input" type="checkbox" value="">
          47
        </label>
      </div>
       <div class="form-check-inline" class="strFix">
        <label class="form-check-label">
          <input class="form-check-input" type="checkbox" value="">
          48
        </label>
      </div>


      <!-- Farve -->
      <div class="skoBox2">
        <span>Farver</span>
      </div>
      <div class="color-green colorbox">
      </div>
      <div class="color-red colorbox">
      </div>
      <div class="color-yellow colorbox">
      </div>
      <div class="color-white colorbox">
      </div>
      <div class="color-blue colorbox">
      </div>
      <div class="color-purple colorbox">
      </div>
      <div class="color-orange colorbox">
      </div>
      <div class="color-black colorbox">
      </div>
      <div class="color-teal colorbox">
      </div>

      <!-- Type -->
      <div class="skoBox2">
        <span>Type</span>
      </div>

      <div class="form-check">
        <label class="form-check-label">
          <input class="form-check-input" type="checkbox" value="">
    Sneakers
        </label>
        <label class="form-check-label">
          <input class="form-check-input" type="checkbox" value="">
          Stiletter
        </label>
        <label class="form-check-label">
          <input class="form-check-input" type="checkbox" value="">
          Sandaler
        </label>
      </div>

      <!-- Mærker -->
      <div class="skoBox2">
        <span>Mærker</span>
      </div>
      <div class="form-check mrkFix">
        <label class="form-check-label">
          <input class="form-check-input" type="checkbox" value="">
          Nike
        </label>
        <label class="form-check-label">
          <input class="form-check-input" type="checkbox" value="">
          Adidas
        </label>
        <label class="form-check-label">
          <input class="form-check-input" type="checkbox" value="">
          Vans
        </label>
        <label class="form-check-label">
          <input class="form-check-input" type="checkbox" value="">
          Puma
        </label>
        <label class="form-check-label">
          <input class="form-check-input" type="checkbox" value="">
          Gucci
        </label>
        <label class="form-check-label">
          <input class="form-check-input" type="checkbox" value="">
          Birkenstock
        </label>
        <label class="form-check-label">
          <input class="form-check-input" type="checkbox" value="">
          DAY
        </label>
        <label class="form-check-label">
          <input class="form-check-input" type="checkbox" value="">
          H2O
        </label>
        <label class="form-check-label">
          <input class="form-check-input" type="checkbox" value="">
          Ecco
        </label>
      </div>
    </center>
  </div>
  <div class="col-xl-9">
    <div>
        <!-- This is the set up of a basic gallery, your items must have the categories they belong to in a data-category
        attribute, which starts from the value 1 and goes up from there -->
        <div class="filtr-container">
            <?php
            $sql = "SELECT * FROM shoes ORDER BY id DESC";
            $result = $dbConnect->query($sql);
            ?>
            <?php while ($row = $result->fetch_assoc()) : ?>
                <div class="filtr-item col-md-3" data-category="1" data-str="<?=$row['size']?>" data-sort="value">
                       <figure><img class="img-responsive col" src="<?=$row['imgPath']?>"></figure>
                       <h4 style="margin-top:15px;"><?=$row['name']?></h4>
                       <p><?=$row['description']?></p>
                       Farve: <div class="colorBlock" style="background:<?=$row['colorhex']?>;"></div>
                       <div class="size">Str. <?=$row['size']?></div><br><br>
                       <div class="btn btn-primary">Læs mere</div>
                </div>
            <?php endwhile; ?>
        </div>
    </div>
  </div>
</section>
