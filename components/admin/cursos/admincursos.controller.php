<?php 

    include "components/admin/cursos/admincursos.model.php";
    include "components/admin/cursos/admincursos.view.php";

    class AdminCursosController{

        public static function render(){
            echo AdminCursosView::print(array());

        }


    }

?>