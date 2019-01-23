<!-- <!DOCTYPE html>
<html ng-app="main">
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Recuperar Contraseña</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    
    
    <?php echo link_tag("css/acceso/recuperacionContrasena.css"); ?>

    <script src="<?php echo base_url();?>lib/angular.js"></script>

    <script src="<?php echo base_url();?>js/acceso/recuperacionContrasena.js"></script>
</head>
<body ng-controller="content">
    <h2>Para otorgarte acceso a tu cuenta necesitamos que nos proporciones los siguientes datos:</h2>
    <?php echo form_open("recupearcionContrasena"); ?> 
        <label>
            <span>Correo electronico</span>
            <input type="text" name="rec_email" ng-model="rec_email" ng-change="cambio('email')">
        </label>
        <div>
            <label>
                <span>Nombre de usuario</span>
                <input type="text" name="rec_usuario" ng-model="rec_usuario" ng-change="cambio('usuario')" ng-click="vaciar('telefono')"/>    
            </label>
            <span>---  O ----</span>
            
            <label> 
                <span>Numero de telefono</span>
                <input type="number" name="rec_telefono" ng-model="rec_telefono" ng-change="cambio('telefono')" ng-click="vaciar('usuario')"/>
            </label>
        </div>
        <input type="submit" value="Mandar Correo" ng-show="todoCorrecto">
    </form>
</body>
</html> -->
<!DOCTYPE html>
<html ng-app="main">
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Recuperacion Contraseña</title>
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
        <?php echo link_tag("css/acceso/recuperacionContrasena.css"); ?>
    <!--===============================================================================================-->
		

    <!--===============================================================================================-->	
        <script src="<?php echo base_url();?>lib/angular.js"></script>
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
    	<script src="<?php echo base_url();?>js/acceso/recuperacionContrasena.js"></script>
  	<!--===============================================================================================-->


</head>
<body ng-controller="content">
<div class="limiter">
		<div class="container-login100" style="background-image: url('<?php echo base_url();?>fotos/acceso/bg-recuperacion.jpg');">
            <div class="notificacion login100-form">Si los datos coinciden recibiras un correo con lo necesario para restaurar tu contraseña<br>No cierres esta pagina.Generando correo...<div class="barra"></div></div>
			<div class="wrap-login100 p-t-30 p-b-50">
            
				<span class="login100-form-title p-b-41">
					Recuperacion Contraseña
                </span>
        
                <?php 
                    $atributos = ["class"=>"login100-form validate-form p-b-33 p-t-5"];
                    echo form_open('recuperacion',$atributos); 
        
                ?> 

					<div class="wrap-input100 validate-input" data-validate = "Introduce Correo">
						<input class="input100" type="text" name="rec_email" placeholder="Email" ng-model="rec_email" ng-change="cambio('email')">
						<span class="focus-input100" data-placeholder="&#xe82a;"></span>
					</div>

					<div class="wrap-input100 validate-input" data-validate="Introcue Usuario">
						<input class="input100" type="text" name="rec_usuario" placeholder="Usuario" ng-model="rec_usuario" ng-change="cambio('usuario')" ng-click="vaciar('telefono')">
						<span class="focus-input100" data-placeholder="&#xe80f;"></span>
					</div>
                    <span class="interseccion_o">Introduce cualquiera de estos 2 campos</span>
                	<div class="wrap-input100 validate-input" data-validate = "Telefono">
						<input class="input100" type="number" name="rec_telefono" placeholder="Telefono" ng-model="rec_telefono" ng-change="cambio('telefono')" ng-click="vaciar('usuario')">
						<span class="focus-input100" data-placeholder="&#xe82a;"></span>
					</div>

					<div class="container-login100-form-btn m-t-32" ng-click="mostrarNotificacion()"ng-show="todoCorrecto">
						<div class="login100-form-btn">
							Mandar Contraseña
						</div>
					</div>
				</form>
                <div class="links">
                <?php echo anchor("login","Me he acordado");?>
                <?php echo anchor("registro","Crear Cuenta")?>
                </div>
			</div>
		</div>
	</div>
	

	<div id="dropDownSelect1"></div>
</body>
</html>