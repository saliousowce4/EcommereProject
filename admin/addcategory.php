<?php
	session_start();
	require_once '../config/connect.php';
	if(!isset($_SESSION['email']) & empty($_SESSION['email'])){
		header('location: login.php');
	}

	if(isset($_POST) & !empty($_POST)){
		$name = mysqli_real_escape_string($connection, $_POST['categoryname']);
		$sql = "INSERT INTO category (name) VALUES ('$name')";
		$res = mysqli_query($connection, $sql);
		if($res){
			$smsg = "Catégorie ajoutée";
		}else{
			$fmsg = "Catégorie non ajoutée";
		}
	}
?>
<?php include 'inc/header.php'; ?>
<?php include 'inc/nav.php'; ?>
	
<section id="content">
	<div class="content-blog">
		<div class="container">
		<?php if(isset($fmsg)){ ?><div class="alert alert-danger" role="alert"> <?php echo $fmsg; ?> </div><?php } ?>
		<?php if(isset($smsg)){ ?><div class="alert alert-success" role="alert"> <?php echo $smsg; ?> </div><?php } ?>
			<form method="post">
			  <div class="form-group">
			    <label for="Productname">Catégorie</label>
			    <input type="text" class="form-control" name="categoryname" id="Categoryname" placeholder="Category Name">
			  </div>
			  
			  <button type="submit" class="btn btn-default">Soumettre</button>
			</form>
			
		</div>
	</div>

</section>
<?php include 'inc/footer.php' ?>
