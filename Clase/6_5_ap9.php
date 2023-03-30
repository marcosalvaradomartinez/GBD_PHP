<?php
	// Define handler
	set_error_handler(function ($err_severity, $err_msg) {
		switch ($err_severity) {
			case E_ERROR:
			case E_USER_ERROR:
			case E_WARNING:
			case E_USER_WARNING:
				throw new Exception('-->' . $err_msg);
			default:
				throw new Error('-->' . $err_msg);
		}
	});
	
	// Defining error level
	error_reporting(E_ALL);
	
	// Connection data
	DEFINE('HOST','172.23.80.1'); // vps-ce1cd54b.vps.ovh.net
	DEFINE('DBNAME','HR');
	DEFINE('USERNAME','HR');
	DEFINE('PASSWD','H.12345678');
	$conn = null;
	$lname = '';
	$fname = '';
	
	// Set MySQLi to throw exceptions
	mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);	
	try {
		// Try a connection ...
		echo '<p>Trying to connect to: '.USERNAME.'/'.'@'.DBNAME.' using MySQLi-Procedural Programing</p>';
		$conn = mysqli_connect(HOST, USERNAME, PASSWD, DBNAME);
		echo '<p>Connection OK</p>';
		
		mysqli_autocommit($conn, false);
		
		$stmt1 = 'CREATE TABLE IF NOT EXISTS personas ( 
					per_id INT AUTO_INCREMENT PRIMARY KEY, 
					per_last_name VARCHAR(100) NOT NULL, 
					per_first_name VARCHAR(100) NOT NULL )'; 
		$table = mysqli_query($conn, $stmt1);

		// Preparing the statement to be executed			
		try {
			if (file_exists("./6_5_ap9.txt")) {
				$file = fopen("./6_5_ap9.txt", "r");
				while(! feof($file)) {
					$line = fgets($file);
					
					$p_ID = 0;
					$p_fname = '';
					$p_lname = '';
					$stmt2 = '';
					$i = 0;

					if($i > 2){
					$p_id = SUBSTR ($line, 1, 10);
					$p_fname = SUBSTR ($line, 11, 24);
					$p_fname = SUBSTR ($line, 11, 24);
					$i = $i +1;

					

					$stmt2 = 'INSERT INTO personas (per_id, per_first_name, per_last_name)
							 VALUES ('. $p_ID . ', ' . $p_fname . ','. $p_lname .')';

					echo $stmt2;
					// $table = mysqli_stmt_get_result($conn, $stmt2);
					}
				}		
			
				fclose($file);
			} else {
				throw new Exception ( "File does not exists");
			}
	} catch(Error $e) {
		echo "An error has been caught: " . $e-> getMessage();
	}
	
		mysqli_stmt_bind_param($query, "ss", $lname, $fname);
		
		// Executing the prepared statement
		mysqli_stmt_execute($query);
		$table = mysqli_stmt_get_result($query);
		
		mysqli_commit($conn);
		
	} catch (mysqli_sql_exception $e) {
		if ($conn == true) {
			mysqli_rollback($conn);
		}
		echo  $e-> getMessage();
	} catch (Exception $e) {
		echo $e-> getMessage();
	} catch (Error $e) {
		echo $e-> getMessage();
	} finally { 
		try {
			echo "Closing Database";

			mysqli_close($conn);
		} catch (Error $e) {
			// Nothing to do
		}
	}
?>