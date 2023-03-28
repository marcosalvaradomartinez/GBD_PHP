<?php
// $cadena = array(3, 27, 46, 5, 128);
// $pares=0;
// $impares=0;

// foreach ($cadena as $num) {
//     if(($num % 2) == 0){
//         $pares=$pares+1;
//     }else{
//         $impares=$impares+1;
//     }
// }

// echo "Hay " . $pares . "pares y " . $impares . " impares."

$cadena = array('x', 'l', 'a', 'b', 'l', 'a', 'c', 'l', 'd');
$i = 0;
$total=0;

for ($i = 0; $i <= sizeof($cadena); ($i++)) {
    if(($cadena[$i] == 'l' ) && ($cadena[$i+1] == 'a')){
        $total++;
}   
};

echo "Hay " . $total;

?>