<?php 

    include "components/admin/users/users.model.php";
    include "components/admin/users/users.view.php";


    class UsersController{

        public static function render(){

            UsersModel::setData();

            $data['autorizados'] = UsersModel::getData('autorizado');
            $data['pendientes'] = UsersModel::getData('pendiente');
            $data['rechazados'] = UsersModel::getData('rechazado');
          
            echo UsersView::print($data);

        }


    }

?>