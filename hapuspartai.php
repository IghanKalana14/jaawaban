<?php 
		 
	
	include 'koneksi.php';
	 
	$id = $_GET['id'];
	 
	mysqli_query($conn,"DELETE FROM tb_partai WHERE id_partai='$id'");
	 
	header("location:count.php");
?>