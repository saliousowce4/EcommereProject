<?php 
session_start();
require_once 'config/connect.php';
include 'inc/header.php'; 
include 'inc/nav.php'; ?>

	
	<!-- SHOP CONTENT -->
	<section id="content">
		<div class="content-blog">
			<div class="container">
				<div class="row">
					<div class="page_header text-center">
						<h2>Compte</h2>
						<p>Tag</p>
					</div>
					<div class="col-md-12">
				<div class="row shop-login">
				<div class="col-md-6">
					<div class="box-content">
						<h3 class="heading text-center">Je suis déja client</h3>
						<div class="clearfix space40"></div>
						<?php if(isset($_GET['message'])){
								if($_GET['message'] == 1){
						 ?><div class="alert alert-danger" role="alert"> <?php echo "Invalid Login Credentials"; ?> </div>

						 <?php } }?>
						<form class="logregform" method="post" action="loginprocess.php">
							<div class="row">
								<div class="form-group">
									<div class="col-md-12">
										<label>E-mail </label>
										<input type="email" name="email" value="" class="form-control">
									</div>
								</div>
							</div>
							<div class="clearfix space20"></div>
							<div class="row">
								<div class="form-group">
									<div class="col-md-12">
										<!-- <a class="pull-right" href="#">(Lost Password?)</a> -->
										<label>Mot de passe</label>
										<input type="password" name="password" value="" class="form-control">
									</div>
								</div>
							</div>
							<div class="clearfix space20"></div>
							<div class="row">
								<div class="col-md-6">
									<!-- <span class="remember-box checkbox">
									<label for="rememberme">
									<input type="checkbox" id="rememberme" name="rememberme">Remember Me
									</label>
									</span> -->
								</div>
								<div class="col-md-6">
									<button type="submit" class="button btn-md pull-right">Login</button>
								</div>
							</div>
						</form>
					</div>
				</div>
				<div class="col-md-6">
					<div class="box-content">
						<h3 class="heading text-center">S'incrire</h3>
						<div class="clearfix space40"></div>
						<?php if(isset($_GET['message'])){ 
								if($_GET['message'] == 2){
							?><div class="alert alert-danger" role="alert"> <?php echo "Failed to Register"; ?> </div>
							<?php } } ?>
						<form class="logregform" method="post" action="registerprocess.php">
							<div class="row">
								<div class="form-group">
									<div class="col-md-12">
										<label>E-mail </label>
										<input type="email" name="email" value="" class="form-control">
									</div>
								</div>
							</div>
							<div class="clearfix space20"></div>
							<div class="row">
								<div class="form-group">
									<div class="col-md-6">
										<label>Mot de passe</label>
										<input type="password" name="password" value="" class="form-control">
									</div>
									<div class="col-md-6">
										<label>Confirmer le mot de passe</label>
										<input type="password" name="passwordagain" value="" class="form-control">
									</div>
								</div>
							</div>
							<div class="row">
								<div class="col-md-12">
									<div class="space20"></div>
									<button type="submit" class="button btn-md pull-right">S'inscire</button>
								</div>
							</div>
						</form>
					</div>
				</div>
			</div>


							
					</div>
				</div>
			</div>
		</div>
	</section>
	
<?php include 'inc/footer.php' ?>
