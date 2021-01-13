<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Drag y drop :: WebDeveloper Urian Viera</title>
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
<h3 class="text-center mt-3">Hola</h3>


<?php
require_once ('config.php');
$Querydrag_drop      = ("SELECT * FROM drag_drop ORDER BY id ASC");
$resultadodrag_drop  = mysqli_query($con, $Querydrag_drop);
?>

<div class="row"  id="drop-items">

<?php
while ($dataDrag_Drop = mysqli_fetch_assoc($resultadodrag_drop)) { ?>
    <div class="col-md-6 col-lg-4">
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
     

<script src="https://cdn.jsdelivr.net/npm/sortablejs@latest/Sortable.min.js"></script>
<script src="assets/js/script_sortable.js"></script>
</body>
</html>