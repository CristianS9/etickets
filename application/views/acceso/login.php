<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>login</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" type="image/png" href="<?php echo base_url(); ?>fotos/acceso/icons/favicon.ico"/>

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
		<div class="container-login100" style="background-image: url('<?php echo base_url();?>fotos/acceso/bg-login.jpg');">
			<div class="wrap-login100 p-t-30 p-b-50">
				<span class="login100-form-title p-b-41">
					Inicio de Sesion
        </span>
        
        <?php 
            $atributos = ["class"=>"login100-form validate-form p-b-33 p-t-5"];
            echo form_open('login',$atributos); 
            echo form_error('credenciales', '<div class="notificacion">', '</div>'); 
        ?> 

					<div class="wrap-input100 validate-input" data-validate = "Introduce un nombre de Usuario">
						<input class="input100" type="text" name="log_usuario" value="<?php if(isset($usuario)){echo $usuario;};?>" placeholder="Usuario">
						<span class="focus-input100" data-placeholder="&#xe82a;"></span>
					</div>

					<div class="wrap-input100 validate-input" data-validate="Introduce tu contraseña">
						<input class="input100" type="password" name="log_contrasena" placeholder="Contraseña">
						<span class="focus-input100" data-placeholder="&#xe80f;"></span>
					</div>

					<div class="container-login100-form-btn m-t-32">
						<button class="login100-form-btn">
							Login
						</button>
					</div>
				</form>
        <?php echo anchor("registro","Crear Cuenta")?>
			</div>
		</div>
	</div>
	

	<div id="dropDownSelect1"></div>
</body>
</html>