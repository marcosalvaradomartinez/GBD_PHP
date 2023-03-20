<html>

<body>
        <?php
            DEFINE('var3',"!!");
            $var1 = "Hola"; 
            $var2 = "Mundo";
            
            if($var1 == $var2){
                echo "son iguales";
            }elseif($var1 === $var2){
                echo "son diferentes";
            }else{
                echo "parado no bailao";
            }

        ?>
</body>
</html>