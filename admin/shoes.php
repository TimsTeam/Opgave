<?php
$pageTitle = "Sko";
include $_SERVER["DOCUMENT_ROOT"]."/incl/admin-header.inc.php";
include $_SERVER["DOCUMENT_ROOT"]."/incl/dbInfo.php";

?>

<?php if (!empty($_SESSION)) : ?>
   <?php
        $sql = "SELECT * FROM collection";
        $result = $dbConnect->query($sql);
        $sql2 = "SELECT * FROM gender";
        $result2 = $dbConnect->query($sql2);
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
        <div class="row">
           <div class="col-6">
           <h1>Nyt produkt</h1>
           <form action="../incl/uploadShoe.php" method="POST" enctype="multipart/form-data">
               <div class="form-group">
                   <label for="name">Navn</label>
                   <input class="form-control" type="text" name="name" placeholder="Sko navn">
               </div>
                <div class="form-group">
                    <label for="link">Beskrivelse</label>
                    <textarea class="form-control" name="description" cols="52" rows="4" placeholder="Beskrivelse her..."></textarea>
                </div>
                <div class="form-group">
                    <label for="imgFile">Upload image</label>
                    <input type="file" name="UploadImage" class="form-control-file" id="imgFile">
                </div>
                <div class="form-group input_fields_wrap">
                    <label>Farve(r)</label><br>
                    <input type="text" name="colorname" value="Sort">
                    <input type="text" name="hex" value="#000000" id="hex">
	                <button type="button" class="add_color_button">Tilføj farve</button>
                </div>
                <div class="form-group">
                   <label>Type</label>
                   <select name="type">
                   <?php while ($row = $result5->fetch_assoc()) : ?>
                       <option value="<?=$row['name']?>"><?=$row['name']?></option>
                    <?php endwhile; ?>
                    </select>
               </div>
                <div class="form-group">
                    <label>Gender</label>
                    <select name="gender">
                      <?php while ($row = $result2->fetch_assoc()) : ?>
                       <option value="<?=$row['gender']?>"><?=$row['gender']?></option>
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
               <button class="btn btn-primary" type="submit" name="submit">Opret</button>
            </form>
            </div>
            <div class="col-6">
            <table class="table table-striped table-hover">
                        <?php
                        $sql = "SELECT * FROM shoes ORDER BY id DESC";
                        $result = $dbConnect->query($sql);
                        ?>
                        <tr>
                            <th>No.</th>
                            <th>Navn</th>
                            <th>Bskrivelse</th>
                            <th>Farve</th>
                            <th></th>
                            <th></th>
                        </tr>
                        <?php while ($row = $result->fetch_assoc()) : ?>
                            <tr>
                                <td><?= $row['id'] ?></td>
                                <td><?= $row['name'] ?></td>
                                <td><?= $row['description'] ?></td>
                                <td><?= $row['colorname'] ?></td>
                                <td>
                                    <form style="display: inline-block" action="edit/shoe.php" method="POST">
                                        <input type="hidden" name="id" value="<?= $row['id'] ?>">
                                        <button type="submit" name="submit">Rediger</button>
                                    </form>
                                    <form style="display: inline-block" action="../incl/deleteproduct.php" method="POST">
                                        <input type="hidden" name="id" value="<?= $row['id'] ?>">
                                        <button type="submit" name="submit">Slet</button>
                                    </form>
                                </td>
                            </tr>
                        <?php endwhile; ?>
                    </table>
                    </div>
                    </div>
</section>    

<?php elseif (empty($_SESSION)) : ?>
    <?= header("Location: ../login.php") ?>
<?php endif; ?>