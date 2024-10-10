<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Drag y drop :: WebDeveloper Urian Viera</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="assets/css/home.css">
</head>

<body>

    <div class="container top">
        <h1 class="text-center mt-5 mb-5 fw-bold">Drag/Drop con PHP - MySQL y JavaScript </h1>
        <hr><br>

        <?php
        require_once('config.php');
        $Querydrag_drop      = ("SELECT * FROM drag_drop ORDER BY posicion");
        $resultadodrag_drop  = mysqli_query($con, $Querydrag_drop);
        ?>

        <div class="row sortable" id="drop-items">
            <?php
            while ($dataDrag_Drop = mysqli_fetch_assoc($resultadodrag_drop)) { ?>
            <div class="col-md-6 col-lg-4" data-index="<?php echo $dataDrag_Drop['id']; ?>"
                data-position="<?php echo $dataDrag_Drop['posicion']; ?>">
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
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jqueryui-touch-punch/0.2.3/jquery.ui.touch-punch.min.js">
    </script>

    <script type="text/javascript">
    $(document).ready(function() {
        $('.sortable').sortable({
            update: function(event, ui) {
                $(this).children().each(function(index) {
                    if ($(this).attr('data-position') != (index + 1)) {
                        $(this).attr('data-position', (index + 1)).addClass('updated');
                    }
                });

                guardandoPosiciones();
            }
        });
    });

    function guardandoPosiciones() {
        let positions = [];
        $('.updated').each(function() {
            positions.push([$(this).attr('data-index'), $(this).attr('data-position')]);
            $(this).removeClass('updated');
        });

        $.ajax({
            url: 'ajax.php',
            method: 'POST',
            dataType: 'text',
            data: {
                update: 1,
                positions: positions
            },
            success: function(response) {
                console.log(response);
            }
        });
    }
    </script>
</body>

</html>