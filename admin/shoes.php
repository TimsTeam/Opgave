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
                
                <div class="form-group demoPanel ui-widget ui-widget-content ui-corner-all">
                    <label>Farve(r)</label><br>
                    <input type="color" value="#ff0000" id="colorWell">
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

<script>

$(document).ready(function(){

	// Change theme
    $('.css').on('click', function(evt){
        var theme=this.innerHTML.toLowerCase().replace(' ', '-'),
            url='http://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/themes/'+theme+'/jquery-ui.css';
        $('#jquiCSS').attr('href', url);
        $('.css').removeClass('sel');
        $(this).addClass('sel');
    });
	
	// Events demo
	function setColor(evt, color){
        if(color){
            $('#cpEvent').css('background-color', color);
        }
	}

	$('#cpBinding').colorpicker({
		color:'#ebf1dd',
		initialHistory: ['#ff0000','#000000','red', 'purple']
	})
		.on('change.color', setColor)
		.on('mouseover.color', setColor);
	
	// Methods demo
	$('#getVal').on('click', function(){
		alert('Selected color = "' + $('#cp1').colorpicker("val") + '"');
	});
	$('#setVal').on('click', function(){
		$('#cp1').colorpicker("val",'#31859b');
	});
	$('#enable').on('click', function(){
		$('#cp1').colorpicker("enable");
	});
	$('#disable').on('click', function(){
		$('#cp1').colorpicker("disable");
	});
	$('#clear').on('click', function(){
		$('#cp1').colorpicker("clear");
	});
	$('#destroy1').on('click', function(){
		$('#cp1').colorpicker("destroy");
	});
	// Methods demo 2 (inline colorpicker)
	$('#getVal2').on('click', function(){
		alert('Selected color = "' + $('#cpInline').colorpicker("val") + '"');
	});
	$('#setVal2').on('click', function(){
		$('#cpInline').colorpicker("val", '#31859b');
	});
	$('#enable2').on('click', function(){
		$('#cpInline').colorpicker("enable");
	});
	$('#disable2').on('click', function(){
		$('#cpInline').colorpicker("disable");
	});
	$('#destroy2').on('click', function(){
		$('#cpInline').colorpicker("destroy");
	});
	
	// Instanciate colorpickers
	$('#cp1').colorpicker({
		color:'#ff9800',
		initialHistory: ['#ff0000','#000000','red', 'purple']
	})
	$('#cpBinding').colorpicker({
		color:'#ebf1dd'
	})
    $('#cpInline').colorpicker({color:'#92cddc'});
    $('#cpInline2').colorpicker({color:'#92cddc', defaultPalette:'web'});

	// Custom theme palette
	$('#customTheme').colorpicker({
		color: '#f44336',
		customTheme: ['#f44336','#ff9800','#ffc107','#4caf50','#00bcd4','#3f51b5','#9c27b0', 'white', 'black']
	});
    $('#cpButton').colorpicker({showOn:'button'});
    $('#cpFocus').colorpicker({showOn:'focus'});
    $('#cpBoth').colorpicker();
    $('#cpOther').colorpicker({showOn:'none'});

	$('#show').on('click', function(evt){
		evt.stopImmediatePropagation();
		$('#cpOther').colorpicker("showPalette");
	});
	
	// With transparent color
	$('#transColor').colorpicker({
		transparentColor: true
	});

	// With hidden button
	$('#hideButton').colorpicker({
		hideButton: true
	});

	// No color indicator
	$('#noIndColor').colorpicker({
		displayIndicator: false
	});

	// French colorpicker
	$('#frenchColor').colorpicker({
		strings: "Couleurs de themes,Couleurs de base,Plus de couleurs,Moins de couleurs,Palette,Historique,Pas encore d'historique."
	});

	// Fix links
	$('a[href="#"]').attr('href', 'javascript:void(0)');

});

</script>
