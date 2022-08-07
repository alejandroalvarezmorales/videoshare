<?php

    include "components/admin/admin.model.php";
    include "components/admin/admin.view.php";

    class AdminController {

        public static function render(){
            echo AdminView::print(array());
        }

        public static function getRenderizedView(){
            return AdminView::print(array());
        }

    }

?>