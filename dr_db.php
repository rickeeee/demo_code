<?php
	// This function is for selecting, inserting & updating the database 
function dr_con_db() {
  $result = mysqli_connect('localhost', 'user_type2', 'Y6hmWccan', 'dbdesertrat');
   if (!$result) {
     echo "Could not connect to database server, please try again latter.";
   } else {
     return $result;
   }
   
}

	// Other db fucntions that account for different user types go below
	
?>