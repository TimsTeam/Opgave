<?php
$pageTitle = "Sko";
include $_SERVER["DOCUMENT_ROOT"]."/incl/admin-header.inc.php";
?>

<?php if (!empty($_SESSION)) : ?>

    <section class="container">
        <div class="form-wrapper">
            <h1>nyt produkt</h1>
            <form action="/includes/uploadproduct.inc.php" method="POST" enctype="multipart/form-data">
                <div class="form-group">
                    <label for="name">Navn</label>
                    <input class="form-control" type="text" name="name" placeholder="Sko navn">
                </div>
                <div class="form-group">
                    <label for="link">Beskrivelse</label>
                    <textarea class="form-control" name="desc" cols="52" rows="4" placeholder="Beskrivelse her..."></textarea>
                </div>
                <div class="form-group">
                    <label>Farve(r)</label><br>
                    <input type="text">
	                <input type="color" name="colorhex" id="cpButton" value="#ccc1d9" />
                </div>
                <div class="form-group">
                    <label for="price">Pris</label>
                    <input class="form-control" type="text" name="price" placeholder="Ex. 150">
                </div>
                <div class="form-group">
                    <label for="units">Antal</label>
                    <input class="form-control" type="text" name="units" placeholder="Ex. 2">
                </div>
                <div class="form-group">
                    <label class="file-upload" for="file"><i class="fa fa-upload" aria-hidden="true"></i> Upload Billede</label>
                    <input style="position:absolute;left: -99999px" class="form-control-file" type="file" name="file" id="file" accept="image/*">
                </div>
                <button class="btn btn-primary" type="submit" name="submit">Opret</button>
            </form>
        </div>


        <div class="form-wrapper">
            <div class="container">
                <div id="table" class="table-editable">
                    <span class="table-add glyphicon glyphicon-plus"></span>
                    <table class="table">
                        <?php
                        $sql = "SELECT * FROM products ORDER BY product_id ASC";
                        $result = $conn->query($sql);
                        ?>
                        <tr>
                            <th>No.</th>
                            <th>Navn</th>
                            <th>Antal</th>
                            <th>Pris</th>
                            <th>Kategori</th>
                            <th></th>
                        </tr>
                        <?php while ($row = $result->fetch_assoc()) : ?>
                            <tr>
                                <td><?= $row['product_no'] ?></td>
                                <td><?= $row['product_title'] ?></td>
                                <td><?= $row['product_units'] ?></td>
                                <td><?= $row['product_price'] ?></td>
                                <?php if ($row['product_category'] == 1) : ?>
                                    <td>Tømrer</td>
                                <?php elseif ($row['product_category'] == 2) : ?>
                                    <td>Elektriker</td>
                                <?php elseif ($row['product_category'] == 3) : ?>
                                    <td>VVS</td>
                                <?php elseif ($row['product_category'] == 4) : ?>
                                    <td>Murer</td>
                                <?php elseif ($row['product_category'] == 5) : ?>
                                    <td>Diverse</td>
                                <?php endif; ?>
                                <td>
                                    <form style="display: inline-block" action="edit/product.php" method="POST">
                                        <input type="hidden" name="id" value="<?= $row['product_id'] ?>">
                                        <button type="submit" name="submit"><i class="fa fa-pencil"
                                                                               style="font-size:15px;"
                                                                               aria-hidden="true"></i></button>
                                    </form>
                                        <a href="products.php?delete=<?=$row['product_id']?>" data-toggle="modal" data-target="#<?=$row['product_id']?>"><i class="fa fa-times"
                                                                               style="font-size:15px;"
                                                                               aria-hidden="true"></i></a> 
                                </td>
                            </tr>
                            <div id="<?=$row['product_id']?>" class="modal fade" role="dialog">
            <div class="modal-dialog">
                <!-- Modal content-->
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title">Bekræftelse</h4>
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                    </div>
                    <div class="modal-body">
                        <h4>Er du sikker på at du vil slette dette produkt?</h4>
                        <p>Produktnummer: <?=$row['product_no']?></p>
                        <p>Produktnavn: <?=$row['product_title']?></p>
                        <br>
                        <form action="/includes/deleteproduct.inc.php" method="POST">
                            <input type="hidden" name="id" value="<?=$row['product_id']?>">
                            <button class="btn-primary" type="submit" name="submit">Jeg er sikker</button>
                        </form>
                    </div>
                    <div class="modal-footer">
                            <button class="btn-danger" data-toggle="modal" data-target="#<?=$row['product_id']?>">LUK</button>
                    </div>
                </div>
            </div>
        </div>
                        <?php endwhile; ?>
                    </table>
                </div>
            </div>
        </div>
    </section>

    <?php $conn->close(); ?>

<?php elseif (empty($_SESSION)) : ?>
    <?= header("Location: ../login.php") ?>
<?php endif; ?>