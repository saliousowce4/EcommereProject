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
						<h2>Souhaits</h2>
					</div>
					<div class="col-md-12">

			<h3>Ma liste de souhaits</h3>
			<br>
			<table class="cart-table account-table table table-bordered">
				<thead>
					<tr>
						<th>Nom</th>
						<th>Prix</th>
						<th>Ajouté</th>
						<th>Operations</th>
					</tr>
				</thead>
				<tbody>

				<?php
					$wishsql = "SELECT p.name, p.price, p.id AS pid, w.id AS id, w.`timestamp` FROM wishlist w JOIN products p WHERE w.pid=p.id AND w.uid='$uid'";
					$wishres = mysqli_query($connection, $wishsql);
					while($wishr = mysqli_fetch_assoc($wishres)){
				?>
					<tr>
						<td>
							<a href="single.php?id=<?php echo $wishr['pid']; ?>"><?php echo $wishr['name']; ?></a>
						</td>
						<td>
							INR <?php echo $wishr['price']; ?> /-
						</td>
						<td>
							<?php echo $wishr['timestamp']; ?>			
						</td>
						<td>
							<a href="delwishlist.php?id=<?php echo $wishr['id']; ?>">Supprimer</a>
						</td>
					</tr>
				<?php } ?>
				</tbody>
			</table>		

			<br>
			<br>
			<br>


					</div>
				</div>
			</div>
		</div>
	</section>
	
<?php include 'inc/footer.php' ?>
