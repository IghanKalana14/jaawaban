<?php 
		 
	
	include 'koneksi.php';
	 
	$id = $_GET['id'];
	 
	mysqli_query($conn,"DELETE FROM tb_caleg WHERE id_caleg='$id'");
	 
	header("location:count.php");
?>