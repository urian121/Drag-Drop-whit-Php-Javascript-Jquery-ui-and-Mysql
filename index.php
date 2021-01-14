<?php
include('config.php');
    if (isset($_POST['update'])) {
        foreach($_POST['positions'] as $position) {
           $index = $position[0];
           $newPosition = $position[1];

          $UpdatePosition = ("UPDATE drag_drop SET posicion = '$newPosition' WHERE id='$index' ");
          $result = mysqli_query($con, $UpdatePosition);
        }
    }
?>


<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Drag y drop :: WebDeveloper Urian Viera</title>
    <link type="text/css" rel="shortcut icon" href="assets/img/logo-mywebsite-urian-viera.svg"/>
    <link href="assets/css/bootstrap.css" rel="stylesheet">
    <link rel="stylesheet" href="assets/css/home.css">
</head>
<body>
    <nav class="navbar navbar-expand-md navbar-dark bg-dark fixed-top">
        <span class="navbar-brand">
           <img src="assets/img/logo-mywebsite-urian-viera.svg" alt="Web Developer Urian Viera" width="120">
             Web Developer Urian Viera
       </span>
     </nav>
    
<div class="container top">
<h3 class="text-center mt-5">Drag - Drop (Soltar y Arrastrar) con PHP - MYSQL - JAVASCRIPT y JQUERY-UI </h3>
<hr><br>

<?php
require_once ('config.php');
$Querydrag_drop      = ("SELECT * FROM drag_drop ORDER BY posicion");
$resultadodrag_drop  = mysqli_query($con, $Querydrag_drop);
?>

<div class="row sortable"  id="drop-items">

<?php
while ($dataDrag_Drop = mysqli_fetch_assoc($resultadodrag_drop)) { ?>
    <div class="col-md-6 col-lg-4" data-index="<?php echo $dataDrag_Drop['id']; ?>" data-position="<?php echo $dataDrag_Drop['posicion']; ?>">
        <div class="drop__card">
            <div class="drop__data">
                <img src="assets/img/<?php echo $dataDrag_Drop['imagen']; ?>" alt="" class="drop__img">
                <div>
                    <h1 class="drop__name"><?php echo $dataDrag_Drop['nombre']; ?></h1>
                    <span class="drop__profession"><?php echo $dataDrag_Drop['profesion']; ?></span>
                </div>
            </div>
            <div class="circulo">
                <h2><?php echo $dataDrag_Drop['id']; ?> </h2>
            </div>            
        </div>
    </div>
    <?php } ?>

  </div>
</div>
     


<script type="text/javascript" charset="utf-8" src="assets/js/jquery-3.3.1.min.js"></script>
<script type="text/javascript" charset="utf-8" src="assets/js/jquery-ui.min.js"></script>
<script type="text/javascript">
    $(document).ready(function () {
       $('.sortable').sortable({
           update: function (event, ui) {
               $(this).children().each(function (index) {
                    if ($(this).attr('data-position') != (index+1)) {
                        $(this).attr('data-position', (index+1)).addClass('updated');
                    }
               });

               saveNewPositions();
           }
       });
    });

    function saveNewPositions() {
        var positions = [];
        $('.updated').each(function () {
           positions.push([$(this).attr('data-index'), $(this).attr('data-position')]);
           $(this).removeClass('updated');
        });

        $.ajax({
           url: 'index.php',
           method: 'POST',
           dataType: 'text',
           data: {
               update: 1,
               positions: positions
           }, success: function (response) {
                console.log(response);
           }
        });
    }
</script>
</body>
</html>