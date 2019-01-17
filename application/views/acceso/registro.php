<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Registro</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!--===============================================================================================-->
      <link href="https://fonts.googleapis.com/css?family=Ubuntu" rel="stylesheet">
    <!--===============================================================================================-->
      <?php echo link_tag("lib/animate/animate.css");?>
    <!--===============================================================================================-->
      <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <!--===============================================================================================-->
      <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css" integrity="sha384-UHRtZLI+pbxtHCWp1t77Bi1L4ZtiqrqD80Kn4Z8NTSRyMA2Fd33n5dQ8lWUE00s/" crossorigin="anonymous">
    <!--===============================================================================================-->
      <?php echo link_tag("css/fonts/Linearicons-Free-v1.0.0/icon-font.min.css");?>
    <!--===============================================================================================-->
      <?php echo link_tag("lib/animate/animate.css");?>
      <!--===============================================================================================-->	
      <?php echo link_tag("lib/css-hamburgers/hamburgers.min.css");?>
      <!--===============================================================================================-->
      <?php echo link_tag("lib/animsition/css/animsition.min.css");?>
      <!--===============================================================================================-->
      <?php echo link_tag("lib/select2/select2.min.css");?>
      <!--===============================================================================================-->	
      <?php echo link_tag("lib/daterangepicker/daterangepicker.css");?>
    <!--===============================================================================================-->
      <?php echo link_tag("css/acceso/util.css");?>
      <?php echo link_tag("css/acceso/acceso.css"); ?>
    <!--===============================================================================================-->	
   		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <!--===============================================================================================-->
      <script src="<?php echo base_url();?>lib/animsition/js/animsition.min.js"></script>
    <!--===============================================================================================-->
      <script src="<?php echo base_url();?>lib/select2/select2.min.js"></script>
    <!--===============================================================================================-->
      <script src="<?php echo base_url();?>lib/daterangepicker/moment.min.js"></script>
    <!--===============================================================================================-->
      <script src="<?php echo base_url();?>lib/daterangepicker/daterangepicker.js"></script>
    <!--===============================================================================================-->
      <script src="<?php echo base_url();?>lib/countdowntime/countdowntime.js"></script>
  	<!--===============================================================================================-->
    	<script src="<?php echo base_url();?>js/acceso/acceso.js"></script>
</head>
<body>
  <div class="limiter">
    <div class="container-login100" style="background-image: url('<?php echo base_url();?>fotos/acceso/bg-registro.jpg');">
        <div class="wrap-login100 p-t-30 p-b-50">
            <span class="login100-form-title p-b-41">
                Crear nueva Cuenta
                </span>

                <?php 
                    $atributos = ["class"=>"login100-form validate-form p-b-33 p-t-5"];
                    echo form_open('acceso/registrar',$atributos); 

                ?> 
                    <?php echo form_error('reg_usuario', '<div class="notificacion">', '</div>'); ?>
                    <div class="wrap-input100 validate-input" data-validate = "Introduce un nombre de Usuario">
                        <input class="input100" type="text" name="reg_usuario" placeholder="Usuario" value="<?php if(isset($usuario)){echo $usuario;};?>">
                        <span class="focus-input100" data-placeholder="&#xe82a;"></span>
                    </div>

                    <?php echo form_error('reg_contrasena', '<div class="notificacion">', '</div>'); ?>
                    <div class="wrap-input100 validate-input" data-validate="Introduce tu contraseña">
                        <input class="input100" type="password" name="reg_contrasena" placeholder="Contraseña">
                        <span class="focus-input100" data-placeholder="&#xe80f;"></span>
                    </div>

                    <?php echo form_error('reg_r_contrasena', '<div class="notificacion">', '</div>'); ?>
                    <div class="wrap-input100 validate-input" data-validate="Repite la contraseña">
                        <input class="input100" type="password" name="reg_r_contrasena" placeholder="Repite la Contraseña">
                        <span class="focus-input100" data-placeholder="&#xe80f;"></span>
                    </div>
                    
                    <?php echo form_error('reg_nombre', '<div class="notificacion">', '</div>'); ?>
                    <div class="wrap-input100 validate-input" data-validate="Nombre">
                        <input class="input100" type="text" placeholder="Nombre" name="reg_nombre" value="<?php if(isset($nombre)){echo $nombre;};?>">
                        <span class="focus-input100" data-placeholder="&#xe898;"></span>
                    </div>

                    <?php echo form_error('reg_apellidos', '<div class="notificacion">', '</div>'); ?>
                    <div class="wrap-input100 validate-input" data-validate="Apellidos">
                        <input class="input100" type="text" placeholder="Apellidos" name="reg_apellidos" value="<?php if(isset($apellidos)){echo $apellidos;};?>">
                        <span class="focus-input100" data-placeholder="&#xe898;"></span>
                    </div>

                    <?php echo form_error('reg_email', '<div class="notificacion">', '</div>'); ?>
                    <div class="wrap-input100 validate-input" data-validate="Email">
                        <input class="input100" type="text" placeholder="Email" name="reg_email" value="<?php if(isset($email)){echo $email;};?>">
                        <span class="focus-input100" data-placeholder="&#xe818;"></span>
                    </div>

                    <?php echo form_error('reg_telefono', '<div class="notificacion">', '</div>'); ?>
                    <div class="wrap-input100 validate-input" data-validate="Telefono">
                        <input class="input100" type="number" placeholder="Telefono" name="reg_telefono" value="<?php if(isset($telefono)){echo $telefono;};?>">
                        <span class="focus-input100" data-placeholder="&#xe830;"></span>
                    </div>

                    <div class="container-login100-form-btn m-t-32">
                        <button class="login100-form-btn">
                            Crear Cuenta
                        </button>
                    </div>
                </form>
         <?php echo anchor("login","Ya tengo cuenta")?>
        </div>
    </div>
    </div>


    <div id="dropDownSelect1"></div>


</body>
</html>