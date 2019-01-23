<nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
    <div class="container">
        <a class="navbar-brand" href="#">E-TICKETS</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive"
            aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarResponsive">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item active">
                    <a class="nav-link" href="<?php echo base_url() ?>index.php/home">Home <i class="fas fa-home"></i></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="<?php echo base_url() ?>index.php/cart">Carrito <i class="fas fa-shopping-cart"></i></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="<?php echo base_url() ?>index.php/perfil">Perfil <i class="fas fa-user"></i></a>
                </li>
                <?php
                    if (isset($this->session->id)){
                       ?>
                <li class="nav-item">
                    <a class="nav-link" href="<?php echo base_url() ?>index.php/logout">Cerrar sesión <i class="fas fa-sign-out-alt"></i></a>
                </li>
                <?php }else{?>
                <li class="nav-item">
                    <a class="nav-link" href="<?php echo base_url() ?>index.php/login">Iniciar sesión <i class="fas fa-sign-in-alt"></i></a>
                </li>
                <?php
                } ?>
            </ul>
        </div>
    </div>
</nav>