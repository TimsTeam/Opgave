<?php if (isset($_POST['submit'])) :
  $pageTitle = "Redigér Produkt | Footsteps";
include_once '../../incl/admin-header.inc.php';
$productId = $_POST['id'];
$sql = "SELECT * FROM shoes WHERE id = $productId";
$result = $dbConnect->query($sql);
$row = $result->fetch_assoc();
$sql2 = "SELECT * FROM gender";
$row2 = $dbConnect->query($sql2);
$sql = "SELECT * FROM collection";
$result = $dbConnect->query($sql);
$sql3 = "SELECT * FROM size";
$result3 = $dbConnect->query($sql3);
$sql4 = "SELECT * FROM brand";
$result4 = $dbConnect->query($sql4);
$sql5 = "SELECT * FROM type";
$result5 = $dbConnect->query($sql5);
$sql6 = "SELECT * FROM model";
$result6 = $dbConnect->query($sql6);
?>
<section class="container">
    <form action="editproduct.php" method="POST" enctype="multipart/form-data">
        <div class="form-group">
            <input class="form-control" type="hidden" name="id" value="<?= $row['id'] ?>">
        </div>
        <div class="form-group">
            <label for="no">Navn</label>
            <input class="form-control" type="text" name="name" value="<?= $row['name'] ?>">
        </div>
        <div class="form-group">
            <label for="link">Beskrivelse</label>
            <input class="form-control" type="text" name="description" value="<?= $row['description'] ?>">
        </div>
        <div class="form-group input_fields_wrap">
            <label>Farve(r)</label><br>
            <input type="text" name="colorname" value="<?= $row['colorname'] ?>">
            <input type="text" name="hex" value="<?= $row['colorhex'] ?>" id="hex">
            <button type="button" class="add_color_button">Tilføj farve</button>
        </div>
        <div class="form-group">
            <label for="imgFile">Upload image</label>
            <input type="file" name="newimageupload" class="form-control-file" id="imgFile"><br>
            <div class="d-block">Nuværende billede</div>
            <img src="../../<?= $row['imgPath'] ?>" class="col-3">
        </div>
        <div class="form-group">
            <label>Køn</label>
            <select name="gender">
               <?php while ($row = $row2->fetch_assoc()) : ?>
               <option value="<?=$row['gender']?>"><?=$row['gender']?></option>
               <?php endwhile; ?>
           </select>
        </div>
        <div class="form-group">
            <label for="units">Type</label>
            <select name="type">
                <?php while ($row = $result5->fetch_assoc()) : ?>
                <option value="<?=$row['name']?>"><?=$row['name']?></option>
                <?php endwhile; ?>
            </select>
        </div>
        <div class="form-group">
            <label>Model</label>
            <select name="model">
                <?php while ($row = $result6->fetch_assoc()) : ?>
                <option value="<?=$row['name']?>"><?=$row['name']?></option>
                <?php endwhile; ?>
            </select>
        </div>
        <div class="form-group">
            <label>Kollection</label>
            <select name="collection">
                <?php while ($row = $result->fetch_assoc()) : ?>
                <option value="<?=$row['name']?>"><?=$row['name']?></option>
                <?php endwhile; ?>
            </select>
        </div>
        <div class="form-group">
            <label>Size</label>
            <select name="size">
                <?php while ($row = $result3->fetch_assoc()) : ?>
                <option value="<?=$row['size']?>"><?=$row['size']?></option>
                <?php endwhile; ?>
            </select>
        </div>
        <div class="form-group">
            <label>Mærke</label>
            <select name="brand">
                <option></option>
                <?php while ($row = $result4->fetch_assoc()) : ?>
                <option value="<?=$row['name']?>"><?=$row['name']?></option>
                <?php endwhile; ?>
            </select>
        </div>
        <button class="btn btn-primary" type="submit" name="submit">Opdatér Produkt</button>
    </form>
</section>

<?php else : ?>
<?= header("Location: ../index.php") ?>
<?php endif; ?>