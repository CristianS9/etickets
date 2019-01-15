<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>login</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!--===============================================================================================-->	
	<link rel="icon" type="image/png" href="<?php echo base_url(); ?>fotos/acceso/icons/favicon.ico"/>
    <!--===============================================================================================-->
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <!--===============================================================================================-->
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css" integrity="sha384-UHRtZLI+pbxtHCWp1t77Bi1L4ZtiqrqD80Kn4Z8NTSRyMA2Fd33n5dQ8lWUE00s/" crossorigin="anonymous">
    <!--===============================================================================================-->
        <?php echo link_tag("css/acceso/vendor/animate/animate.css");?>
    <!--===============================================================================================-->	
        <?php echo link_tag("css/acceso/vendor/css-hamburgers/hamburgers.min.css");?>
    <!--===============================================================================================-->
        <?php echo link_tag("css/acceso/vendor/select2/select2.min.css");?>
    
    <!--===============================================================================================-->
        <?php echo link_tag("css/acceso/util.css");?>
        <?php echo link_tag("css/acceso/login.css"); ?>
    <!--===============================================================================================-->
    <!--===============================================================================================-->	
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <!--===============================================================================================-->	
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
    <!--===============================================================================================-->
    <script src="<?php echo base_url(); ?>css/acceso/vendor/select2/select2.min.js"></script>
    <!--===============================================================================================-->
    <script src="<?php echo base_url(); ?>css/acceso/vendor/tilt/tilt.jquery.min.js"></script>
    <!--===============================================================================================-->
    <script src="<?php echo base_url();?>js/acceso/efecto_login.js"></script>
    <script src="<?php echo base_url();?>js/acceso/login.js"></script>


</head>
<body>
  <!--   <div class="content">
        <?php $this->view("elementos/header") ?>
        <section>
            <?php echo form_open('acceso/login'); ?>
                <?php echo form_error('credenciales', '<div class="notificacion">', '</div>'); ?>
                <label>
                    <h5>Usuario</h5>
                    <input type="text" name="log_usuario" value="<?php if(isset($usuario)){echo $usuario;};?>">
                </label>
                <label>
                    <h5>Contraseña</h5>
                    <input type="password" name="log_contrasena">
                </label><br>
                <input type="submit" value="Login">
            </form>
            <?php echo anchor("registro","Registrarme");?>
        </section>
        <?php $this->view("elementos/footer") ?>
    </div>
 -->
  
 	
	<div class="limiter">
		<div class="container-login100" style="background-image: url('images/bg-01.jpg');">
			<div class="wrap-login100 p-l-110 p-r-110 p-t-62 p-b-33">
				<form class="login100-form validate-form flex-sb flex-w">
					<span class="login100-form-title p-b-53">
						Sign In With
					</span>

					<a href="#" class="btn-face m-b-20">
						<i class="fa fa-facebook-official"></i>
						Facebook
					</a>

					<a href="#" class="btn-google m-b-20">
						<img src="images/icons/icon-google.png" alt="GOOGLE">
						Google
					</a>
					
					<div class="p-t-31 p-b-9">
						<span class="txt1">
							Username
						</span>
					</div>
					<div class="wrap-input100 validate-input" data-validate = "Username is required">
						<input class="input100" type="text" name="username" >
						<span class="focus-input100"></span>
					</div>
					
					<div class="p-t-13 p-b-9">
						<span class="txt1">
							Password
						</span>

						<a href="#" class="txt2 bo1 m-l-5">
							Forgot?
						</a>
					</div>
					<div class="wrap-input100 validate-input" data-validate = "Password is required">
						<input class="input100" type="password" name="pass" >
						<span class="focus-input100"></span>
					</div>

					<div class="container-login100-form-btn m-t-17">
						<button class="login100-form-btn">
							Sign In
						</button>
					</div>

					<div class="w-full text-center p-t-55">
						<span class="txt2">
							Not a member?
						</span>

						<a href="#" class="txt2 bo1">
							Sign up now
						</a>
					</div>
				</form>
			</div>
		</div>
	</div>
	

	<div id="dropDownSelect1"></div>

</body>
</html>