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
      2 <i class="fal fa-ticket-alt"></i>
    </div>
  </header>
  <div class="ticket__divider">
    <div class="ticket__notch"></div>
    <div class="ticket__notch ticket__notch--right"></div>
  </div>
  <div class="ticket__body">
    <section class="ticket__section">
      <h3>Your Tickets</h3>
      <p>Level 1 VIP Club Seats and Bar</p>
      <p>Block 406   Row Q   Seats 34-35</p>
      <p>Your seats are together</p>
    </section>
    <section class="ticket__section">
      <h3>Delivery Address</h3>
      <p>8 Joanne Lane, 2516 AC Den Haag</p>
      <p>Netherlands</p>
    </section>
    <section class="ticket__section">
      <h3>Payment Method</h3>
      <p>Mastercard **** 8765</p>
    </section>
  </div>
  <footer class="ticket__footer">
    <span>Total</span>
    <span>173.20 €</span>
  </footer>
</article>
</div>



</body>

</html>