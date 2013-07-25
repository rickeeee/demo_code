<?php
	//	AUTOS INSERT PAGE 

	// Start a session
	session_start();
	
	// include function files for this application
	require_once('dr_libraries.php');
	
	// Check that the user has logged in. 
	  if (!isset($_SESSION['valid_user']))	{
		  
	// Display the header, banner and sidebars
	display_header('Problem');
	site_banner();
	display_Lside();
	display_Rside();
	
	// Dispaly the error message
	log_in_fail();
	exit;
	
	} else {

	// 	Check to see if form is filled out FROM dr_validation.php
	$form_filled = not_compFrm($_POST);
		if ($form_filled == false)	{	
		display_header('Problem');
				site_banner();
				display_Lside();
				display_Rside();
			echo "<div id='formLayout'> 
      			<br />
      			<p>
				You did not fill out the form.<br />
				<a href='dr_autos_form.php'>BACK</a>
      			</p>									
      			</div>";
				// display the footer
				display_footer();
				exit;
			
		} else {	

	//	Clean up any $_SESSION data	From fns_data_valid.php
	sessionFltr($_SESSION);	

	//	Clean up any $_COOKIE data	From fns_data_valid.php
	cookieFltr($_COOKIE);

	//	Clean up any $_GET data	From fns_data_valid.php
	$getFltrInput = getFltr($_GET);
		if ($getFltrInput == true)	{
			display_header('Problem');
			site_banner();
			display_Lside();
			display_Rside();
			echo "<div id='formLayout'> 
      			<br />
      			<p>
				You did not fill out the form.<br />The FBI is looking for you!<br />
				<a href='dr_autos_form.php'>BACK</a>
      			</p>									
      			</div>";
			// display the footer
			display_footer();
			exit;
		} else	{

	// Run the clean up function for the $_POST array FROM dr_validation.php
	$postFltrInput = postFltr($_POST);
		if ($postFltrInput == false)	{
			echo "You did not fill out the form.<br />You can't use the site without using the interface.";
			exit;
		} else	{
	
	//	Create short variable names for constants FROM dr_other_functions.php
	$active = prepare_active();
	
	// Get an end date for the content, may be updated by user in the future
	$end_date  = "";
	
	// Grab the hidden POST variables in the form 
	$userNum = $_POST['userNum']; 
	$_SESSION['extension'] = $_POST['extension'];
	$catagory = $_POST['catagory'];
	$autoInc = $_POST['autoInc'];
	
	// Need constants made from varibles to place in photos table
	$concat = $autoInc.'a.jpg';
	$thumb = $autoInc.'T.jpg';
	
	// Storing POST variables in the session variable array 
	$title = $_POST['title'];
	$make = $_POST['make'];
	$model = $_POST['model'];
	$color = $_POST['color'];
	$year = $_POST['year'];
	$doors = $_POST['doors'];
	$engine = $_POST['engine'];
	$mileage = $_POST['mileage'];
	$trans = $_POST['trans'];
	$descrp = $_POST['description'];
	$contact = $_POST['contact'];

	//	MySQL TRANSACTION BEGINS HERE
	
	// open a database connection
	$db_con = dr_con_db();
	
	//	Switch off auto commit to allow transactions
	mysqli_autocommit($db_con, FALSE);
	$query_success = TRUE;

	//	USE PREPARED STATEMENTS AND TRANSACTIONS TOGETHER FOR GREATER SECURITY
	//	INSERT VALUES INTO THE MULITPLE TABLE	
	$sql = ("INSERT INTO multiple (userNum, autoInc, toyTypeId, insertion) VALUES (?, ?, ?, NOW())");
	mysqli_real_escape_string($db_con, $sql);
	$stmt = mysqli_prepare($db_con, $sql);
	mysqli_stmt_bind_param($stmt, "isi", $userNum, $autoInc, $catagory);
	if (!mysqli_stmt_execute($stmt)) {
	$query_success = FALSE;
	}
	mysqli_stmt_close($stmt);
	
	//	Insert values into the autoSUV table
	$sql = ("INSERT INTO autoSUV (auto_id, autoInc, toyTypeId, title, make, model, year, doors, engine, trans, description, contact_via, act_flag, run_start, run_end, last_edit, last_editby) VALUES (NULL, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, NOW(), ?, NOW(), ?)");
	mysqli_real_escape_string($db_con, $sql);
	$stmt = mysqli_prepare($db_con, $sql);
	mysqli_stmt_bind_param($stmt, "sisssissssssss", $autoInc, $catagory, $title, $make, $model, $year, $doors, $engine, $trans, $descrp, $contact, $active, $end_date, $_SESSION['valid_user']);
	if (!mysqli_stmt_execute($stmt)) {
	$query_success = FALSE;
	}
	mysqli_stmt_close($stmt);
	
	//	INSERT VALUES INTO THE IMAGES TABLE
	$sql = ("INSERT INTO images (photo_id, autoInc, photo_A, photoS, thumb) VALUES (NULL, ?, ?, ?, ?)");
	mysqli_real_escape_string($db_con, $sql);
	$stmt = mysqli_prepare($db_con, $sql);
	mysqli_stmt_bind_param($stmt, "ssss", $autoInc, $concat, $_SESSION['extension'], $thumb);
	if (!mysqli_stmt_execute($stmt)) {
	$query_success = FALSE;
	}
	mysqli_stmt_close($stmt);
	
	
	// COMIT OR ROLLBACK THE TRANSACTION
	if (!$query_success) {

	mysqli_rollback($db_con);
	
	display_header('Problem');
	site_banner();
	display_Lside();
	display_Rside();
	
	// display an error message upon failure
	no_insert_qry();
	exit;
	
	} else {
	
	// commit to the transaction if all has gone well
	mysqli_commit($db_con);
	
	// Close the database connection
	mysqli_close($db_con);
	
	// display the page name in the tab
	display_header('Autos Insert Page');
	
	// display the banner and sidebars
	site_banner();
	display_Lside();
	display_Rside();
	
	// Tell user that the ad was inserted into the database
	good_insert();	

	// display the footer
	display_footer();
	
    }
   }	
  }	
 }
}											 
?>