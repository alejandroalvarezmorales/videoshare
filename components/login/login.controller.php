<?php 
    include "./components/login/login.model.php";
    include "./components/login/login.view.php";


    class LoginController {

        public static function render(){

            $data = LoginModel::authenticate();
            if( sizeof($data['data']) > 0 ){
                Logger::consolelog($_SESSION);
                Logger::consolelog($data);
                header('Location: ?p=inicio');
            }
            echo LoginView::print($data);
        }

    }
?>
