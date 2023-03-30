<?php

DEFINE('HOST','172.23.80.1');
DEFINE('DBNAME','HR');
DEFINE('USERNAME','HR');
DEFINE('PASSWD','H.12345678');
$conn = null;
$lnum = 0;
$p_ID = 0;
$p_fname = '';
$p_lname = '';


$p_ID = 0;
$p_fname = '';
$p_lname = '';
$stmt = '';
$i = 0;

mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);

try {

    echo '<p>Trying to connect to: '.USERNAME.'/'.PASSWD.'@'.DBNAME.' on '.HOST.' using MySQLi-Procedural Programing</p>';
	$conn = mysqli_connect(HOST, USERNAME, PASSWD, DBNAME);
    echo '<p>Connection OK</p>';
		
    mysqli_autocommit($conn, true);
    
    if (file_exists("ACT6_5-11.txt")) {
        $file = fopen("ACT6_5-11.txt", "r");
        while(! feof($file)) {
            $line = fgets($file);
            $i = $i + 1;
            
			if($i > 2){
                $p_ID =     SUBSTR ($line, 0, 9);
                $p_fname =  SUBSTR ($line, 10, 11);
                $p_lname =  SUBSTR ($line, 22, 12);

                $stmt = "INSERT INTO persones (per_id, per_fname, per_lname)
                         VALUES (". $p_ID . ", '" . $p_fname . " ', '" . $p_lname . "')";
               
                echo $stmt . "<br>";
                $table = mysqli_query($conn, $stmt);
        }		
        }
        fclose($file);
    } else {
        throw new Exception ( "File does not exists");
    }

}catch(Error $e) {
echo "An error has been caught: " . $e-> getMessage();
}catch (Exception $e) {
    echo $e-> getMessage() .'<br>';
}finally { 
    try {
        echo "Closing Database";

        mysqli_close($conn);
    } catch (Error $e) {
        // Nothing to do
    }
}

?>