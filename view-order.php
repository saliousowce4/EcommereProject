<?php 
	ob_start();
	session_start();
	require_once 'config/connect.php';
	if(!isset($_SESSION['customer']) & empty($_SESSION['customer'])){
		header('location: login.php');
	}

include 'inc/header.php'; 
include 'inc/nav.php'; 
$uid = $_SESSION['customerid'];
$cart = $_SESSION['cart'];
?>
	
	<!-- SHOP CONTENT -->
	<section id="content">
		<div class="content-blog content-account">
			<div class="container">
				<div class="row">
					<div class="page_header text-center">
						<h2>Mon compte</h2>
					</div>
					<div class="col-md-12">

			<h3>Commande récente</h3>
			<br>
			<table class="cart-table account-table table table-bordered">
				<thead>
					<tr>
						<th>Nom du produit</th>
						<th>quantité</th>
						<th>prix</th>
						<th></th>
						<th>total Price</th>
					</tr>
				</thead>
				<tbody>

				<?php

					if(isset($_GET['id']) & !empty($_GET['id'])){
						$oid = $_GET['id'];
					}else{
						header('location: my-account.php');
					}
					$ordsql = "SELECT * FROM orders WHERE uid='$uid' AND id='$oid'";
					$ordres = mysqli_query($connection, $ordsql);
					$ordr = mysqli_fetch_assoc($ordres);

					$orditmsql = "SELECT * FROM orderitems o JOIN products p WHERE o.orderid=3 AND o.pid=p.id";
					$orditmres = mysqli_query($connection, $orditmsql);
					while($orditmr = mysqli_fetch_assoc($orditmres)){
				?>
					<tr>
						<td>
							<a href="single.php?id=<?php echo $orditmr['pid']; ?>"><?php echo substr($orditmr['name'], 0, 25); ?></a>
						</td>
						<td>
							<?php echo $orditmr['pquantity']; ?>
						</td>
						<td>
							INR <?php echo $orditmr['productprice']; ?>/-
						</td>
						<td>
							
						</td>
						<td>
							INR <?php echo $orditmr['productprice']*$orditmr['pquantity']; ?>/-
						</td>
					</tr>
				<?php } ?>
					<tr>
						<td></td>
						<td></td>
						<td></td>
						<td>
							Total
						</td>
						<td>
							<?php echo $ordr['totalprice']; ?>
						</td>
					</tr>
					<tr>
						<td></td>
						<td></td>
						<td></td>
						<td>
							Etat de commande
						</td>
						<td>
							<?php echo $ordr['orderstatus']; ?>
						</td>
					</tr>
					<tr>
						<td></td>
						<td></td>
						<td></td>
						<td>
							commande placée
						</td>
						<td>
							<?php echo $ordr['timestamp']; ?>
						</td>
					</tr>
				</tbody>
			</table>		

			<br>
			<br>
			<br>

			<div class="ma-address">
						<h3>Mes Adresses</h3>
						<p>Ces informations seront utilisées dans la validation de la commande.</p>

			<div class="row">
				<div class="col-md-6">
								<h4>Mon adresse <a href="edit-address.php">Edit</a></h4>
					<?php
						$csql = "SELECT u1.firstname, u1.lastname, u1.address1, u1.address2, u1.city, u1.state, u1.country, u1.company, u.email, u1.mobile, u1.zip FROM users u JOIN usersmeta u1 WHERE u.id=u1.uid AND u.id=$uid";
						$cres = mysqli_query($connection, $csql);
						if(mysqli_num_rows($cres) == 1){
							$cr = mysqli_fetch_assoc($cres);
							echo "<p>".$cr['firstname'] ." ". $cr['lastname'] ."</p>";
							echo "<p>".$cr['address1'] ."</p>";
							echo "<p>".$cr['address2'] ."</p>";
							echo "<p>".$cr['city'] ."</p>";
							echo "<p>".$cr['state'] ."</p>";
							echo "<p>".$cr['country'] ."</p>";
							echo "<p>".$cr['company'] ."</p>";
							echo "<p>".$cr['zip'] ."</p>";
							echo "<p>".$cr['mobile'] ."</p>";
							echo "<p>".$cr['email'] ."</p>";
						}
					?>
				</div>

				<div class="col-md-6">

				</div>
			</div>



			</div>

					</div>
				</div>
			</div>
		</div>
	</section>
	
<?php include 'inc/footer.php' ?>
