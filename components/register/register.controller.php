<?php 
    include "components/register/register.model.php";
    include "components/register/register.view.php";


    class RegisterController{

        public static function render(){
            $data = RegisterModel::register();            
            echo RegisterView::print($data);
        }

    }

?>