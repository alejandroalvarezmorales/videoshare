<?php 

    class Logger{

        public static function consolelog($data){
            $json = json_encode($data);
            $script = " <script> console.log($json); </script>";
            echo $script;
        }

    }

?>