<?php 

    include "components/inicio/inicio.model.php";
    include "components/inicio/inicio.view.php";


    class InicioController{

        public static function render(){
            $data = InicioModel::getData();

            $result = InicioModel::setData();
            $data['result'] = $result;

            echo InicioView::print($data);


        }



    }


?>