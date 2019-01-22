<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Carrito de la compra</title>

    <!-- Links de CSS -->
    <?php echo link_tag("lib/bootstrap.min.css"); ?>
    <?php echo link_tag("lib/animate/animate.css"); ?>
    <?php echo link_tag("css/shopping_cart.css"); ?>
    <?php echo link_tag("lib/fontAwesome/css/all.css"); ?>

    <!-- Links de JavaScript -->
    <script src="<?php echo base_url() ?>lib/jquery-3.3.1.min.js"></script>
    <script src="<?php echo base_url() ?>lib/bootstrap.bundle.min.js"></script>
    <script src="<?php echo base_url() ?>lib/bootstrap-notify/bootstrap-notify.min.js"></script>
    <script src="<?php echo base_url() ?>js/shopping_cart.js"></script>

</head>

<body>
    <!-- Navigation -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
        <div class="container">
            <a class="navbar-brand" href="#">Start Bootstrap</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive"
                aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarResponsive">
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item active">
                        <a class="nav-link" href="#">Home
                            <span class="sr-only">(current)</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">About</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Services</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Contact</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <div class="tramitar">
        <article class="ticket">
            <header class="ticket__wrapper">
                <div class="ticket__header">
                    Tus entradas <i class="fal fa-ticket-alt"></i>
                </div>
            </header>
            <div class="ticket__divider">
                <div class="ticket__notch"></div>
                <div class="ticket__notch ticket__notch--right"></div>
            </div>
            <div class="ticket__body">
                <section class="ticket__section">
                    <h3>Resumen</h3>
                    <p>Este es el resumen de tu pedido. Las entradas se enviarán a través de correo electrónico.</p>
                </section>

                <?php
        foreach ($carrito as $elemento) {
            $precio = "precio" . $elemento->id;
            $seccionId = "seccion" . $elemento->id;
            $precioTotal = "precioTotal" . $elemento->id;

        ?>
                <section class="ticket__section seccion<?php echo $seccionId ?>">
                    <h3>
                        <?php echo ($elemento->nombre); ?>
                    </h3>
                    <p>
                        <?php echo ($elemento->fecha); ?>
                    </p>
                    <precioIndiv><b>Precio individual: </b></precioIndiv>
                    <precio class='<?php echo $precio ?>'>
                        <?php echo  $elemento->precioIndividual ?>
                    </precio>
                    <p><b>Cantidad:     </b>
                    <?php echo ("<input class='cantidad' id='$elemento->id' originalValue='$elemento->cantidad' type='number' name='' value='$elemento->cantidad'> <br>");   ?>
                    </p><precioTotalTitle><b>Precio total:</b></precioTotalTitle>
                    <?php echo ("<precioTotalArt class='$precioTotal precioTotal'>$elemento->precioTotal</precioTotalArt>");
                    echo ("<br><button class='deleteButton' data-toggle='modal' data-target='#myModal' id='$elemento->id'>Eliminar</button>");
                    ?>
                </section>

                <?php
     }
    ?>

            </div>
            <footer class="ticket__footer">
               <b> <span>Total</span></b>
                <span id="total"></span> €

            </footer>
        </article>
    </div>

    <!-- MODAL -->
<!-- <div class="modal" id="myModal" tabindex="-1" role="dialog">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Modal title</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <p>¿Seguro que quieres eliminar este artículo?.</p>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-primary">Sí</button>
        <button type="button" class="btn btn-secondary" data-dismiss="modal">No</button>
      </div>
    </div>
  </div>
</div> -->


</body>

</html>