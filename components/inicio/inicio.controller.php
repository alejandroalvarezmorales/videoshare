<?php 

    include "components/inicio/inicio.model.php";
    include "components/inicio/inicio.view.php";


    class InicioController{

        public static function render(){
            $data = InicioModel::getData();

            $result = InicioModel::setData();
            $data['result'] = $result;

            Logger::consolelog($result);
            Logger::consolelog($_SESSION);

            echo InicioView::print($data);


        }



    }


?>