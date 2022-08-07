<?php

    include "classes/database/DBAccessModel.php";  
    include "classes/database/SQLHelpers.php";


    class LoginModel {

        public static function authenticate(){
            $email = '';
            $password = '';

            if(isset($_POST['email']) && isset($_POST['password']) ){
                $email = $_POST['email'];
                $password = $_POST['password'];
            }


            $sql = "SELECT * FROM USUARIOS WHERE email = :email AND password = :password";
            $data = DBAccessModel::find($sql,array( "email" => $email, "password" => $password) );

            if(sizeof($data['data'])>0){
                $_SESSION["authenticated"] = 1;
                $_SESSION["email"] = $email;
                $_SESSION["login_date"] = date('Y-m-d H:m:s');
                $_SESSION['userdata'] = $data['data'];
            } else {
                $_SESSION = array();
            }
            return $data;
        }

        public static function logoff(){
            $_SESSION['authenticated'] = 0;
        }

    }

?>