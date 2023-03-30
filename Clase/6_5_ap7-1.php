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
	
	// Set MySQLi to throw exceptions
	mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);	
	try {
		// Try a connection ...
		echo '<p>Trying to connect to: '.USERNAME.'/'.PASSWD.'@'.DBNAME.' using MySQLi-Procedural Programing</p>';
		$conn = mysqli_connect(HOST, USERNAME, PASSWD, DBNAME);
		echo '<p>Connection OK</p>';

		// Show a result		
		$query = 'SELECT d.department_id, department_name 
		FROM departments d 
		LEFT JOIN employees e ON d.department_id = e.department_id 
		WHERE e.employee_id IS NULL 
		ORDER BY d.department_id ASC;
		';
		$table = mysqli_query($conn, $query);
		
		echo "<table border=1>";
			while( null !== ($row = mysqli_fetch_array($table)) ) {  
				echo "<tr>";
				echo "<td>" . $row["department_id"]." ".$row["department_name"]. "</td>";
				echo "</tr>";
		}
		echo "</table>";
	} catch (mysqli_sql_exception $e) {
		echo  "</p>" . $e-> getMessage() . "</p>";
	} catch (Exception $e) {
		echo "</p>" . $e-> getMessage() . "</p>";
 	} catch (Error $e) {
		echo "</p>" . $e-> getMessage() . "</p>";
	} finally {
		try {
			echo "Closing Database";
			
			mysqli_free_result($table);
			mysqli_close($conn);
		} catch (Error $e) {
			// Nothing to do
		}
	}
?>
