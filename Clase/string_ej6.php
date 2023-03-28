<?php

$arr = 'abcdeLAghijLAkmnbjajkLAloiajsdLA';
$anterior='';
$actual='';
$total=0;
// echo $arr . "<br>";
// echo substr($arr, 0, 5)

for($i=0; $i<strlen($arr); $i++){
    $actual = substr($arr, $i, 1);
    if (($anterior == 'L')&&($actual == 'A')){
        $total++;
    }
    $anterior = $actual;
}
echo "El total es ".$total;

?>