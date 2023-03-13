<?php
	include 'includes/session.php';

	if(isset($_POST['add'])){
		$voterid = $_POST['voterid']; 
		$firstname = $_POST['firstname'];
		$lastname = $_POST['lastname'];
		$mobileno = $_POST['mobileno'];
		$password = password_hash($_POST['password'], PASSWORD_DEFAULT);
		$filename = $_FILES['photo']['name'];
		if(!empty($filename)){
			move_uploaded_file($_FILES['photo']['tmp_name'], '../images/'.$filename);	
		}
		$filesname = $_FILES['fingerprint']['name'];
		if(!empty($filesname)){
			move_uploaded_file($_FILES['fingerprint']['tmp_name'], '../images/'.$filesname);	
		}
		//generate voters id
		$set = '$./123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
		$voterhash = substr(str_shuffle($set), 0, 60);

		$sql = "INSERT INTO voters (voters_id, password, firstname, lastname, mobileno, photo, fingerprint, voterhash) VALUES ('$voterid', '$password', '$firstname', '$lastname', '$mobileno', '$filename', '$filesname',  '$voterhash')";
		if($conn->query($sql)){
			$_SESSION['success'] = 'Voter added successfully';
		}
		else{
			$_SESSION['error'] = $conn->error;
		}

	}
	else{
		$_SESSION['error'] = 'Fill up add form first';
	}

	header('location: voters.php');
?>