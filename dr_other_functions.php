<?php
function u_validation() {
  // see if user is logged in and notify them if they are not 
  if (isset($_SESSION['valid_user']))  {
	  
	  // valid user will be set at login (not shown here)
      echo "Logged in as ".$_SESSION['valid_user'].".<br />";  
	  
  } else {
	  
     // display message to user
   	echo "You aren't logged in. <br />";
  }
}

function date_insrt()	{	// 	This calculates the date for autoInc
	// get the current date in a short format
	@ $date = date('mdyHis');
	
	if (!$date)	{
		
		return false;
		
	} else	{
		
		return $date;
		
	}
}

function date_start()	{	// 	This calculates the start date for listing view
	// get the current date in a short format
	@ $date = date('Y-m-d');
	
	if (!$date)	{
		
		return false;
		
	} else	{
		
		return $date;
		
	}
}

function prepare_active()	{
	// Sets a variable for insert as one must use variables with Prepared Statements / Transactions
	$active = 'Yes';
	return $active;
	
}

?>