<?php

    include "components/cursos/cursos.model.php";
    include "components/cursos/cursos.view.php";

    class CursosController{


        public static function render(){
            echo CursosView::print(array());
        }

    }


?>