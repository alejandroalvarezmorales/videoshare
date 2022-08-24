<?php

    include "components/cursos/cursos.model.php";
    include "components/cursos/cursos.view.php";

    class CursosController{


        public static function render(){

            $result = CursosModel::getData();

            Logger::consolelog($result);

            echo CursosView::print($result);
        }

    }


?>