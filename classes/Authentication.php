<?php 
    

    class Authentication {

        public static function isAuthenticated(){
            if( isset($_SESSION["authenticated"]) && $_SESSION["authenticated"] == 1 ) {
                return 1;
            }
            return 0;
        }

        public static function logOff(){
            $_SESSION["authenticated"] = 0;
            session_destroy();
            header('Location: ?p=login');
        }


    }


?>