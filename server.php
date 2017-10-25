<<?php 

  session_start();
//initalize variables
	$name='';
	$address = '';
	$id = '';
	$edit_state = false;	

 //connect to database
 $db = mysqli_connect('localhost','root','','simplecrud');

    //insert into database
	 if(isset($_POST['submit']))
	 {
	    $name = $_POST['name'];
	    $address = $_POST['address'];

	    $query = "INSERT INTO  tbl_crud (name  , address) VALUES ('$name' , '$address')";
	    mysqli_query($db,$query);
	    $_SESSION['msg'] = 'Address Saved'; 
	    header('location: index.php');//redirectto index page

	 }

	  //update record
	  if(isset($_POST['update']))
	  {
	  	$name = mysqli_real_escape_string($db,$_POST['name']);
	   	$address = mysqli_real_escape_string($db,$_POST['address']);
	   	$id = mysqli_real_escape_string($db,$_POST['id']);
	     $_SESSION['msg'] = 'Address Updated';
	     header('location:index.php');
	   	mysqli_query($db,"UPDATE tbl_crud SET name='$name',address='$address' WHERE id=$id ");
	     
	  }

	  //delete record
	   if(isset($_GET['del']))
	   {
	   	 $id = $_GET['del'];
	   	 mysqli_query($db,"DELETE FROM tbl_crud WHERE id=$id");
	   	 
	     $_SESSION['msg'] = 'Address Deleted';
	     header('location:index.php');
	   }
	 



	  //retrive data from database for display
	 $results = mysqli_query($db ,"SELECT * FROM tbl_crud");





 ?>