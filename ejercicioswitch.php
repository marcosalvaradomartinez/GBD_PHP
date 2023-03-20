<html>

<?php
    $beer = 'san miguel';
    if($beer == 'alhambra'){
        echo 'Seguro ?';
    }elseif (($beer == 'carlsberg') or ($beer == 'heineken')) {
        echo 'Buena elección';
    }else{    
        echo 'Por favor haz otra elección';
    }
?>

</html>