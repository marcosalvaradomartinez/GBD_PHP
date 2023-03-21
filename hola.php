<html>

<body>
        <?php
            // DEFINE('var3',"!!");
            // $var1 = "Hola"; 
            // $var2 = "Mundo";
            
            // if($var1 == $var2){
            //     echo "son iguales";
            // }elseif($var1 === $var2){
            //     echo "son diferentes";
            // }else{
            //     echo "parado no bailao";
            // }
            
            $var1 = 10;
            $var2 = 0;
            $var3 = 0;

            try {
                $var3 = $var1 / $var2;
                echo $var3;
            } catch (Error $e){
                echo "Se ha producido un error global";
            }
            // }catch (Excepción $e){
            //     echo "Se ha producido una excepción";
            // }
        ?>
</body>
</html>